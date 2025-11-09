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
        $request->merge(['quantity' => (int )$request->quantity]);
        $request->validate([
            'product_id' => "required|exists:products,id",
            'quantity' => "required|integer|min:1"
        ]);

        $product = Product::findOrFail($request->product_id);
        if ($request->quantity > $product->stock)
        {
            return response()->json(['message' => 'Số lượng vượt quá tồn kho'], 400);
        }
        // người dùng đã đăng nhập => lưu cart vào db
        if (Auth::check()) {
            $cartItem = CartItem::where(column: 'user_id', operator: Auth::id())
                ->where(column: 'product_id', operator: $request->product_id)
                ->first();

            if ($cartItem) {
                $cartItem->quantity += $request->quantity;
                $cartItem->save();
            } else {
                CartItem::create(attributes: [
                    'user_id' => Auth::id(),
                    'product_id' => $request->product_id,
                    'quantity' => $request->quantity
                ]);
            }
            $cartCount = CartItem::where('user_id', Auth::id())->count();
        }
        // Nếu ng dùng chưa đăng nhập => dùng session để lưu cart
        else 
        {
            $cart = session()->get('cart', []);
            if (isset($cart[$request->product_id]))
            {
                $cart[$request->product_id]['quantity'] += $request->quantity;   
            }
            else
            {
                $cart[$request->id] = [
                    'product_id' => $request->product_id,
                    'name' => $request->name,
                    'price' => $request->price,
                    'quantity' => $request->quantity,
                    'stock' => $product->stock,
                    'image' => $product->images->first()->image ?? 'uploads/products/default.png'
                ];
            }
            session()->put('cart', $cart);
            $cartCount = count($cart);
        }


        return response()->json([
            'message' => true,
            'cart_count' => $cartCount
        ]);
    }

    public function loadMiniCart()
    {
        $cartItems = [];
        if (auth()->check()) {
        // Người dùng đã đăng nhập → lấy giỏ hàng từ database
        $cartItems = CartItem::with('product')
            ->where('user_id', auth()->id())
            ->get();
        } else {
            // Người dùng chưa đăng nhập → lấy giỏ hàng từ session
            $cartItems = session('cart', []);
        }

        return response()->json([
            'status' => true,
            'html' => view('clients.components.includes.mini_cart', compact('cartItems'))->render()
        ]);
    }
}
