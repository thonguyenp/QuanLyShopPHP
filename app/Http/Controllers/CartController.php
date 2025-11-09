<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //
    public function viewCart ()
    {
        if (Auth::check()) 
        {
            // Lấy cart từ db

        }
        else 
        {
            // Lấy cart từ section
            $cartItems = session()->get('cart', []);

        }

        return view('clients.pages.cart', compact('cartItems'));
    }

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
                    'image' => $product->images->first()->image_path ?? 'uploads/products/default-product.png',
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
            if (!empty($cart)) {
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
}
