<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\ShippingAddress;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CheckoutController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $addresses = ShippingAddress::where('user_id', $user->id)->get();
        $defaultAddress = $addresses->where('default', 1)->first();
        // Nếu chưa có địa chỉ => chuyển về tài khoản người dùng và in thông báo
        if (is_null($addresses) || is_null($defaultAddress)) {
            toastr()->error('Vui lòng nhập thêm địa chỉ giao hàng');

            return redirect()->route('account');
        }
        $cartProducts = CartItem::where('user_id', $user->id)->with('product')->get();
        $totalPrice = $cartProducts->sum(fn ($item) => $item->quantity * $item->product->price);

        return view('clients.pages.checkout', compact('addresses', 'defaultAddress', 'user', 'cartProducts', 'totalPrice'));
    }

    public function getAddress(Request $request)
    {
        $address = ShippingAddress::where('id', $request->address_id)
            ->where('user_id', Auth::id())->first();
        if (! $address) {
            return response()->json([
                'success' => false,
                'message' => 'Không tìm thấy địa chỉ',
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $address,
        ]);
    }

    public function placeOrder(Request $request)
    {
        $user = Auth::user();
        $cartProducts = CartItem::where('user_id', $user->id)->get();

        if ($cartProducts->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống');
        }
        DB::beginTransaction();

        try {
            // Tạo 1 order
            $order = new Order;
            $order->user_id = $user->id;
            $order->shipping_address_id = $request->address_id;
            $order->total_price = $cartProducts->sum(fn ($item) => $item->quantity * $item->product->price) + 25000;
            $order->status = 'pending'; // mặc định là pending
            $order->save();
            // Tạo các order items dựa trên order
            foreach ($cartProducts as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product->id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);
            }

            $product = $item->product;
            if ($product->stock < $item->quantity)
            {
                throw new \Exception("Sản phẩm {$product->name} không đủ hàng trong kho");
            }
            $product->stock -= $item->quantity;
            $product->save();

            Payment::create([
                'order_id' => $order->id,
                'payment_method' => $request->payment_method,
                'amount' => $order->total_price,
                'status' => 'pending',
                'paid_at' => null,
            ]);
            
            // Sau khi tạo xong order thì xóa hết item trong cart đi
            CartItem::where('user_id', $user->id)->delete();
            DB::commit();
            toastr()->success('Đặt hàng thành công');
            return redirect()->route('account');
        } catch (Exception $e) {
            Log::error('Lỗi đặt hàng: ' . $e->getMessage());
            DB::rollBack();
            toastr()->error('Có lỗi xảy ra, vui lòng thử lại!');
            return redirect()->route('checkout');
        }
    }
}
