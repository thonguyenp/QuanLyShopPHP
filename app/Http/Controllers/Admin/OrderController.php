<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

    public function sendMailInvoice(Request $request)
    {
        $order = Order::with('orderItems.product', 'shippingAddress', 'user', 'payment')->find($request->order_id);
        // dd($order);
        try {
            Mail::send('admin.emails.invoice',compact('order'),function ($message) use ($order) {
                $message->to($order->user->email)
                    ->subject('Hóa đơn đặt hàng của khách hàng ' . $order->shippingAddress->full_name);
            });

            return response()->json([
                'status' => true,
                'message' => 'Hóa đơn đã được gửi qua email!',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Không thể gửi hóa đơn qua email. Vui lòng thử lại sau. ' . $th->getMessage(),
            ]);
        }
    }
}
