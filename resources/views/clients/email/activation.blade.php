<!DOCTYPE html>
<html>
<head>
    <title>Kích hoạt tài khoản</title>
</head>
<body>
    <h3>Xin chào {{ $user->name }}</h3>
    <p>Cảm ơn bạn đã đăng ký tại website của chúng tôi. Để kích hoạt tài khoản của bạn, vui lòng nhấp vào liên kết dưới đây:</p>
    <a href="{{ url('/activate/'.$token) }}" style="padding: 10px 50px; background-color: orange; color: #fff; text-decoration: none;">Kích hoạt tài khoản</a>
    <p>Mọi thắc mắc, vui lòng gửi về bộ phận hỗ trợ khách hàng</p>
</body>
</html>
