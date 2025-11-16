<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        $orders = Order::with('orderItems', 'shippingAddress', 'user', 'payment')->get();

        // dd($orders);
        return view('admin.pages.orders', compact('orders'));
    }

    public function confirmOrder(Request $request)
    {
        $order = Order::find($request->order_id);
        if ($order) {
            $order->status = 'processing';
            $order->save();

            return response()->json([
                'status' => true,
                'message' => 'Xác nhận đơn hàng thành công',
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Đơn hàng không tồn tại',
        ]);
    }

    public function showOrderDetail($id)
    {
        $order = Order::with('orderItems.product', 'shippingAddress', 'user', 'payment')->find($id);
        // dd($order);
        return view('admin.pages.order-detail', compact('order'));
    }
}
