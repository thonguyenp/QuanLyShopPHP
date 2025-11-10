<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function addToCart(Request $request)
    {
        $request->merge(['quantity' => (int) $request->quantity]);

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product = Product::findOrFail($request->product_id);

        if ($request->quantity > $product->stock) {
            return response()->json(['message' => 'Số lượng vượt quá tồn kho'], 400);
        }

        // Nếu người dùng đã đăng nhập => lưu giỏ hàng vào DB
        if (Auth::check()) {
            $cartItem = CartItem::where('user_id', Auth::id())
                ->where('product_id', $request->product_id)
                ->first();

            if ($cartItem) {
                $cartItem->quantity += $request->quantity;
                $cartItem->save();
            } else {
                CartItem::create([
                    'user_id' => Auth::id(),
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity,
                ]);
            }

            $cartCount = CartItem::where('user_id', Auth::id())->count();
        }

        // Nếu người dùng chưa đăng nhập => dùng session
        else {
            $cart = session()->get('cart', []);

            if (isset($cart[$request->product_id])) {
                // Cộng thêm số lượng nếu sản phẩm đã tồn tại trong giỏ
                $cart[$request->product_id]['quantity'] += $request->quantity;
            } else {
                // Tạo sản phẩm mới trong giỏ
                $cart[$request->product_id] = [
                    'product_id' => $request->product_id,
                    'name' => $product->name,
                    'price' => $product->price,
                    'quantity' => $request->quantity,
                    'stock' => $product->stock,
                    'image' => $product->images->first()->image_path ?? 'upload/products/default-product.png',
                ];
            }

            session()->put('cart', $cart);
            $cartCount = count($cart);
        }

        return response()->json([
            'status' => true,
            'cart_count' => $cartCount,
        ]);
    }

    public function loadMiniCart()
    {
        $cartItems = [];
        if (Auth::check()) {
            // Người dùng đã đăng nhập → lấy giỏ hàng từ database
            $cartItems = CartItem::with('product')
                ->where('user_id', Auth::id())
                ->get();
        } else {
            // Người dùng chưa đăng nhập → lấy giỏ hàng từ session
            $cartItems = session('cart', []);
        }

        return response()->json([
            'status' => true,
            'html' => view('clients.components.includes.mini_cart', compact('cartItems'))->render(),
        ]);
    }

    public function removeFromMiniCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required',
        ]);
        // Nếu người dùng đã đăng nhập -> xóa db
        if (Auth::check()) {
            // Xóa item có cùng id với người dùng và cùng product_id với product chọn xóa
            CartItem::where('user_id', Auth::id())->where('product_id', $request->product_id)->delete();
            // Đếm lại dữ liệu
            $cartCount = CartItem::where('user_id', Auth::id())->count();
        }
        // Nếu ng dùng chưa đăng nhập => xóa session
        else {
            // Lấy cart ra
            $cart = session()->get('cart', []);

            // Xóa sản phẩm theo ID
            unset($cart[$request->product_id]);

            // Nếu giỏ hàng còn sản phẩm thì cập nhật lại
            if (! empty($cart)) {
                session()->put('cart', $cart);
            } else {
                // Nếu không còn gì thì xóa luôn key 'cart'
                session()->forget('cart');
            }

            $cartCount = count($cart);
        }

        return response()->json([
            'status' => true,
            'cart_count' => $cartCount,
        ]);
    }

    public function viewCart()
    {
        if (Auth::check()) {
            // Lấy cart từ db
            $cartProducts = CartItem::where('user_id', Auth::id())->with('product')->get()->map(function ($item) {
                return [
                    'product_id' => $item->product->id,
                    'name' => $item->product->name,
                    'price' => $item->product->price,
                    'quantity' => $item->quantity,
                    'stock' => $item->product->stock,
                ];
            })->toArray();
        } else {
            // Lấy cart từ section
            $cartProducts = session()->get('cart', []);
        }

        // dd($cartItems);
        return view('clients.pages.cart', compact('cartProducts'));
    }

    // Cập nhật lại cart page
    public function updateCart(Request $request)
    {
        $productId = $request->product_id;
        $quantity = $request->quantity;

        if (Auth::check()) {
            // Update cart từ db
            $cartProducts = CartItem::where('user_id', Auth::id())->where('product_id', $productId)->first();
            // Kiểm tra product có trong sản phẩm không
            if (! $cartProducts) {
                return response()->json(['error' => 'Sản phẩm không tồn tại trong giỏ hàng'], 404);
            }
            $product = Product::find($productId);
            // Kiểm tra quantity có vượt quá stock không
            if ($quantity > $product->stock) {
                return response()->json(['error' => 'Số lượng vượt quá tồn kho'], 400);
            }
            $cartProducts->quantity = $quantity;
            $cartProducts->save();
        } else {
            // Update cart từ section
            $cart = session()->get('cart', []);
            // Kiểm tra product có trong sản phẩm không
            if (! isset($cart[$productId])) {
                return response()->json(['error' => 'Sản phẩm không tồn tại trong giỏ hàng'], 404);
            }
            $product = Product::find($productId);
            // Kiểm tra quantity có vượt quá stock không
            if ($quantity > $product->stock) {
                return response()->json(['error' => 'Số lượng vượt quá tồn kho'], 400);
            }
            $cart[$productId]['quantity'] = $quantity;
            session()->put('cart', $cart);
        }
        // Tính lại cartTotal
        $subtotal = $quantity * $product->price;
        $total = $this->calculateCartTotal();
        $grandtotal = $total + 25000;

        return response()->json([
            'quantity' => $quantity,
            'subtotal' => number_format($subtotal, 0, ',', '.'),
            'total' => number_format($total, 0, ',', '.'),
            'grandtotal' => number_format($grandtotal, 0, ',', '.'),

        ]);
    }

    // tính tổng total sau khi cập nhật lại cart page
    public function calculateCartTotal()
    {
        if (Auth::check()) {
            return CartItem::where('user_id', Auth::id())->with('product')->get()
                ->sum(fn ($item) => $item->quantity * $item->product->price);
        } else {
            // Lấy cart từ section
            $cart = session()->get('cart', []);

            return collect($cart)->sum(fn ($item) => $item['quantity'] * $item['price']);
        }
    }

    public function removeCartItem(Request $request)
    {
        $productId = $request->product_id;

        if (Auth::check()) {
            // Update cart từ db
            CartItem::where('user_id', Auth::id())->where('product_id', $productId)->delete();
            // Kiểm tra product có trong sản phẩm không
        } else {
            // Update cart từ section
            $cart = session()->get('cart', []);
            
            // Xóa sản phẩm theo ID
            unset($cart[$request->product_id]);

            // Nếu giỏ hàng còn sản phẩm thì cập nhật lại
            if (! empty($cart)) {
                session()->put('cart', $cart);
            } else {
                // Nếu không còn gì thì xóa luôn key 'cart'
                session()->forget('cart');
            }
        }
        // Tính lại cartTotal
        $total = $this->calculateCartTotal();
        $grandtotal = $total + 25000;

        return response()->json([
            'total' => number_format($total, 0, ',', '.'),
            'grandtotal' => number_format($grandtotal, 0, ',', '.'),
        ]);

    }
}
