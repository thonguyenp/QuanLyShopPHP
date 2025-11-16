<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Hóa đơn mua hàng</title>
</head>
<body style="font-family: Arial, sans-serif; font-size: 15px; color: #333; line-height: 1.5; margin: 0; padding: 20px; background-color: #f4f4f4;">

    <div style="max-width: 700px; margin: 0 auto; background: #ffffff; padding: 25px; border-radius: 8px;">

        <p>Chào <strong>{{ $order->shippingAddress->full_name }}</strong>,</p>
        <p>Cảm ơn bạn đã đặt hàng tại <strong>Electro Shop</strong>. Dưới đây là chi tiết hóa đơn của bạn.</p>

        <h2 style="text-align: center; background: #f28b00; color: #fff; padding: 10px; border-radius: 5px;">
            Hóa đơn mua hàng
        </h2>

        <p style="text-align: right; font-size: 14px; color: #777;">
            Ngày tạo: {{ $order->created_at->format('d/m/Y H:i') }}
        </p>

        <!-- Thông tin người gửi / người nhận -->
        <table style="width: 100%; margin-bottom: 20px; border-collapse: collapse;">
            <tr>
                <td style="width: 50%; vertical-align: top;">
                    <strong>Người nhận:</strong>
                    <p style="margin-top: 5px;">
                        {{ $order->shippingAddress->full_name }}<br>
                        {{ $order->shippingAddress->address }}<br>
                        {{ $order->shippingAddress->city }}<br>
                        Số điện thoại: {{ $order->shippingAddress->phone }}
                    </p>
                </td>

                <td style="width: 50%; vertical-align: top;">
                    <strong>Người gửi:</strong>
                    <p style="margin-top: 5px;">
                        Electro<br>
                        984 đường 23/10, Nha Trang, Khánh Hòa<br>
                        Điện thoại: 1 (804) 123-9876<br>
                        Email: tho.np.64cntt@ntu.edu.vn
                    </p>
                </td>
            </tr>
        </table>

        <!-- Order Info -->
        <strong>Thông tin đơn hàng:</strong>
        <p style="margin-top: 5px;">
            Mã đơn hàng: <strong>#{{ $order->id }}</strong><br>
            Trạng thái: <strong>{{ ucfirst($order->status) }}</strong>
        </p>

        <!-- Sản phẩm -->
        <h3 style="margin-top: 20px;">Chi tiết sản phẩm</h3>

        <table style="width: 100%; border-collapse: collapse; margin-top: 10px;">
            <thead>
                <tr style="background: #f28b00; color: #fff;">
                    <th style="padding: 10px; text-align: left;">Sản phẩm</th>
                    <th style="padding: 10px; text-align: center;">Số lượng</th>
                    <th style="padding: 10px; text-align: right;">Đơn giá</th>
                    <th style="padding: 10px; text-align: right;">Thành tiền</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($order->orderItems as $item)
                <tr style="border-bottom: 1px solid #ddd;">
                    <td style="padding: 10px 5px;">
                        {{ $item->product->name }}
                    </td>
                    <td style="padding: 10px 5px; text-align: center;">
                        {{ $item->quantity }}
                    </td>
                    <td style="padding: 10px 5px; text-align: right;">
                        {{ number_format($item->price, 0, ',', '.') }}₫
                    </td>
                    <td style="padding: 10px 5px; text-align: right;">
                        {{ number_format($item->price * $item->quantity, 0, ',', '.') }}₫
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Tổng tiền -->
        <table style="width: 100%; border-collapse: collapse; margin-top: 20px;">
            <tr>
                <td style="text-align: right; padding: 5px;">Tạm tính:</td>
                <td style="text-align: right; padding: 5px; width: 150px;">
                    {{ number_format($order->total_price-25000, 0, ',', '.') }}₫
                </td>
            </tr>

            <tr>
                <td style="text-align: right; padding: 5px;">Phí vận chuyển:</td>
                <td style="text-align: right; padding: 5px;">
                    {{ number_format(25000, 0, ',', '.') }}₫
                </td>
            </tr>

            <tr>
                <td style="text-align: right; padding: 5px; font-weight: bold;">Tổng cộng:</td>
                <td style="text-align: right; padding: 5px; font-weight: bold; color: #f28b00; font-size: 18px;">
                    {{ number_format($order->total_price, 0, ',', '.') }}₫
                </td>
            </tr>
        </table>

        <hr style="margin: 25px 0; border: none; border-top: 1px solid #ddd;">

        <p style="font-size: 14px; color: #777;">
            Nếu bạn có bất kỳ câu hỏi nào, hãy liên hệ đội hỗ trợ của chúng tôi qua email 
            <strong>tho.np.64cntt@ntu.edu.vn</strong>.
        </p>

        <p style="text-align: center; font-size: 13px; color: #aaa; margin-top: 30px;">
            © {{ date('Y') }} Electro Shop — Cảm ơn bạn đã mua hàng!
        </p>

    </div>

</body>
</html>
