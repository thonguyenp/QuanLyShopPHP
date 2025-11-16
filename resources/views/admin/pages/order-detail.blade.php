@extends('layouts.admin')

@section('title', 'Chi tiết đơn hàng')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Hóa đơn</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="button">Go!</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Hóa đơn</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <section class="content invoice">
                            <!-- title row -->
                            <div class="row">
                                <div class="  invoice-header">
                                    <h1>
                                        <i class="fa fa-globe"></i> Hóa đơn.
                                        <small class="pull-right"> Ngày tạo: {{$order->created_at}}</small>
                                    </h1>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    Từ
                                    <address>
                                        <strong>{{$order->shippingAddress->full_name}}</strong>
                                        <br>{{ $order->shippingAddress->address }}
                                        <br>{{ $order->shippingAddress->city }}
                                        <br>Số điện thoại: {{ $order->shippingAddress->phone }}
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    Đến
                                    <address>
                                        <strong>Electro</strong>
                                        <br>Vinh Thanh
                                        <br>Nha Trang, Khanh Hoa
                                        <br>Số điện thoại: 1 (804) 123-9876
                                        <br>Email: tho.np.64cntt@ntu.edu.vn
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <b>Order ID: #{{$order->id}}</b>
                                    <br>Email: {{ $order->user->email }} <br>
                                    <b>Tài khoản:</b> {{ $order->user->name }}
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="  table">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Ảnh</th>
                                                <th>Sản phẩm</th>
                                                <th>Giá</th>
                                                <th>Số lượng</th>
                                                <th>Thành tiền</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($order->orderItems as $item)
                                            <tr>
                                                <td>
                                                    <img src="{{$item->product->image_url }}" style="width:100px; height:100px;" alt="{{ $item->product->name }}">
                                                </td>
                                                <td>{{ $item->product->name }}</td>
                                                <td>{{number_format($item->product->price, 0, ',', '.')}} VND</td>
                                                <td>{{$item->quantity}}</td>
                                                <td>{{number_format($item->product->price * $item->quantity, 0, ',', '.')}} VND</td>
                                            </tr>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-md-6">
                                    <p class="lead">Phương thức thanh toán:</p>

                                    @if($order->payment->payment_method == 'cash')
                                        <img style="width:50px; height:50px" src="{{ asset('assets/admin/images/cash-on-delivery.png') }}" alt="COD">
                                    @elseif ($order->payment->payment_method == 'atm')
                                        <img style="width:50px; height:50px" src="{{ asset('assets/admin/images/vnpay.png') }}" alt="VNPAY">
                                    @endif

                                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning
                                        heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo
                                        ifttt zimbra.
                                    </p>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th style="width:50%">Tiền hàng:</th>
                                                    <td>{{ number_format(num: $order->total_price - 25000, decimals: 0, decimal_separator: ',', thousands_separator: '.') }} VND</td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping</th>
                                                    <td>{{ number_format(num: 25000, decimals: 0, decimal_separator: ',', thousands_separator: '.') }} VND</td>
                                                </tr>
                                                <tr>
                                                    <th>Tổng tiền:</th>
                                                    <td>{{ number_format(num: $order->total_price, decimals: 0, decimal_separator: ',', thousands_separator: '.') }} VND</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div>
                                    @if ($order->status != 'canceled')
                                        <button class="btn btn-default" onclick="window.print();">
                                            <i class="fa fa-print"></i> In hóa đơn
                                        </button>
                                        <button class="btn btn-success pull-right send-invoice-mail" data-id="{{ $order->id }}">
                                            <i class="fa fa-credit-card"></i> Gửi hóa đơn
                                        </button>

                                        @if ($order->status == 'pending')
                                            <button class="btn btn-danger pull-right" style="margin-right: 5px;" data-id="{{ $order->id }}">
                                                <i class="fa fa-remove"></i> Hủy đơn hàng
                                            </button>
                                        @endif
                                    @else
                                        <button class="btn btn-danger" style="cursor: not-allowed">
                                            <i class="fa fa-info"></i> Đơn hàng đã hủy
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection