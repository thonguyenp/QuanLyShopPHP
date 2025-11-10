<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $addresses = ShippingAddress::where('user_id', $user->id)->get();
        $defaultAddress = $addresses->where('default', 1)->first();
        // Nếu chưa có địa chỉ => chuyển về tài khoản người dùng và in thông báo
        if (is_null($addresses) || is_null($defaultAddress))
        {
            toastr()->error('Vui lòng nhập thêm địa chỉ giao hàng');
            return redirect()->route('account');
        }
        $cartProducts = CartItem::where('user_id', $user->id)->with('product')->get();
        $totalPrice = $cartProducts->sum(fn ($item) => $item->quantity * $item->product->price);
        return view('clients.pages.checkout', compact('addresses', 'defaultAddress', 'user', 'cartProducts', 'totalPrice'));
    }

    public function getAddress (Request $request)
    {
        $address = ShippingAddress::where('id', $request->address_id)
        ->where('user_id', Auth::id())->first();
        if (!$address)
        {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy địa chỉ'
            ]);
        }
        return response()->json([
            'success' => true,
            'data' => $address
        ]);
    }
}
