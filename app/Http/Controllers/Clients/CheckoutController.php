<?php

namespace App\Http\Controllers\Clients;

use App\Http\Controllers\Controller;
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

    // public function placeOrder(Request $request)
    // {
    //     $user = Auth::user();
    //     $cartProducts = CartItem::where('user_id', $user->id)->get();

    //     if ($cartProducts->isEmpty()) {
    //         return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống');
    //     }
    //     DB::beginTransaction();

    //     try {
    //         // Tạo 1 order
    //         $order = new Order;
    //         $order->user_id = $user->id;
    //         $order->shipping_address_id = $request->address_id;
    //         $order->total_price = $cartProducts->sum(fn ($item) => $item->quantity * $item->product->price) + 25000;
    //         $order->status = 'pending'; // mặc định là pending
    //         $order->save();
    //         // Tạo các order items dựa trên order
    //         foreach ($cartProducts as $item) {
    //             OrderItem::create([
    //                 'order_id' => $order->id,
    //                 'product_id' => $item->product->id,
    //                 'quantity' => $item->quantity,
    //                 'price' => $item->product->price,
    //             ]);
    //         }

    //         $product = $item->product;
    //         if ($product->stock < $item->quantity) {
    //             throw new \Exception("Sản phẩm {$product->name} không đủ hàng trong kho");
    //         }
    //         $product->stock -= $item->quantity;
    //         $product->save();

    //         Payment::create([
    //             'order_id' => $order->id,
    //             'payment_method' => $request->payment_method,
    //             'amount' => $order->total_price,
    //             'status' => 'pending',
    //             'paid_at' => null,
    //         ]);

    //         // Sau khi tạo xong order thì xóa hết item trong cart đi
    //         CartItem::where('user_id', $user->id)->delete();
    //         DB::commit();
    //         toastr()->success('Đặt hàng thành công');

    //         return redirect()->route('account');
    //     } catch (Exception $e) {
    //         Log::error('Lỗi đặt hàng: '.$e->getMessage());
    //         DB::rollBack();
    //         toastr()->error('Có lỗi xảy ra, vui lòng thử lại!');

    //         return redirect()->route('checkout');
    //     }
    // }

    public function placeOrder(Request $request)
    {
        $user = Auth::user();
        $cartProducts = CartItem::where('user_id', $user->id)->get();

        if ($cartProducts->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống');
        }

        DB::beginTransaction();
        try {
            // Tính tổng tiền
            $totalPrice = $cartProducts->sum(fn ($item) => $item->quantity * $item->product->price) + 25000;

            // Tạo order
            $order = Order::create([
                'user_id' => $user->id,
                'shipping_address_id' => $request->address_id,
                'total_price' => $totalPrice,
                'status' => 'pending',
            ]);

            // Tạo order items
            foreach ($cartProducts as $item) {
                if ($item->product->stock < $item->quantity) {
                    throw new \Exception("Sản phẩm {$item->product->name} không đủ hàng trong kho");
                }

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product->id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);

                // Cập nhật tồn kho
                $item->product->decrement('stock', $item->quantity);
            }

            // Thanh toán
            $paymentMethod = $request->payment_method;
            $payment = Payment::create([
                'order_id' => $order->id,
                'payment_method' => $paymentMethod,
                'amount' => $totalPrice,
                'status' => 'pending',
            ]);

            DB::commit();

            if ($paymentMethod === 'cash') {
                toastr()->success('Đặt hàng thành công, chọn COD');
                return redirect()->route('account');
            } elseif ($paymentMethod === 'atm') {
                $paymentUrl = $this->redirectToVnpay($order);

                return response()->json([
                    'redirect_url' => $paymentUrl
                ]);
            }
            // Xóa giỏ hàng
            CartItem::where('user_id', $user->id)->delete();

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Lỗi đặt hàng: '.$e->getMessage());
            toastr()->error('Có lỗi xảy ra, vui lòng thử lại!');

            return redirect()->route('checkout');
        }
    }

    protected function redirectToVnpay($order)
    {    
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "https://localhost/vnpay_php/vnpay_return.php";
    $vnp_TmnCode = env('VNPAY_TMN_CODE'); 
    $vnp_HashSecret = env('VNPAY_HASH_SECRET');    
    
    $vnp_TxnRef = $order->id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này 
    $vnp_OrderInfo = "Thanh toán hóa đơn";
    $vnp_OrderType = "";
    $vnp_Amount = $order->total_price;
    $vnp_Locale = "VN";
    $vnp_BankCode = 'NCB';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
    );
    
    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }
    
    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }
    
    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['redirect'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
        // vui lòng tham khảo thêm tại code demo
    }
}
