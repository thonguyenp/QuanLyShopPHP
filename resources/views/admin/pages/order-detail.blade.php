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
                                    <p class="lead">Payment Methods:</p>
                                    <img src="images/visa.png" alt="Visa">
                                    <img src="images/mastercard.png" alt="Mastercard">
                                    <img src="images/american-express.png" alt="American Express">
                                    <img src="images/paypal.png" alt="Paypal">
                                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning
                                        heekya handango imeem plugg dopplr jibjab, movity jajah plickers sifteo edmodo
                                        ifttt zimbra.
                                    </p>
                                </div>
                                <!-- /.col -->
                                <div class="col-md-6">
                                    <p class="lead">Amount Due 2/22/2014</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <th style="width:50%">Subtotal:</th>
                                                    <td>$250.30</td>
                                                </tr>
                                                <tr>
                                                    <th>Tax (9.3%)</th>
                                                    <td>$10.34</td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping:</th>
                                                    <td>$5.80</td>
                                                </tr>
                                                <tr>
                                                    <th>Total:</th>
                                                    <td>$265.24</td>
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
                                <div class=" ">
                                    <button class="btn btn-default" onclick="window.print();"><i
                                            class="fa fa-print"></i> Print</button>
                                    <button class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit
                                        Payment</button>
                                    <button class="btn btn-primary pull-right" style="margin-right: 5px;"><i
                                            class="fa fa-download"></i> Generate PDF</button>
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