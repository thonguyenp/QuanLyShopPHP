

<?php $__env->startSection('title', 'Chi tiết đơn hàng'); ?>

<?php $__env->startSection('content'); ?>
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
                                        <small class="pull-right"> Ngày tạo: <?php echo e($order->created_at); ?></small>
                                    </h1>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    Từ
                                    <address>
                                        <strong><?php echo e($order->shippingAddress->full_name); ?></strong>
                                        <br><?php echo e($order->shippingAddress->address); ?>

                                        <br><?php echo e($order->shippingAddress->city); ?>

                                        <br>Số điện thoại: <?php echo e($order->shippingAddress->phone); ?>

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
                                    <b>Order ID: #<?php echo e($order->id); ?></b>
                                    <br>Email: <?php echo e($order->user->email); ?> <br>
                                    <b>Tài khoản:</b> <?php echo e($order->user->name); ?>

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
                                            <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <img src="<?php echo e($item->product->image_url); ?>" style="width:100px; height:100px;" alt="<?php echo e($item->product->name); ?>">
                                                </td>
                                                <td><?php echo e($item->product->name); ?></td>
                                                <td><?php echo e(number_format($item->product->price, 0, ',', '.')); ?> VND</td>
                                                <td><?php echo e($item->quantity); ?></td>
                                                <td><?php echo e(number_format($item->product->price * $item->quantity, 0, ',', '.')); ?> VND</td>
                                            </tr>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                                    <?php if($order->payment->payment_method == 'cash'): ?>
                                        <img style="width:50px; height:50px" src="<?php echo e(asset('assets/admin/images/cash-on-delivery.png')); ?>" alt="COD">
                                    <?php elseif($order->payment->payment_method == 'atm'): ?>
                                        <img style="width:50px; height:50px" src="<?php echo e(asset('assets/admin/images/vnpay.png')); ?>" alt="VNPAY">
                                    <?php endif; ?>

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
                                                    <td><?php echo e(number_format(num: $order->total_price - 25000, decimals: 0, decimal_separator: ',', thousands_separator: '.')); ?> VND</td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping</th>
                                                    <td><?php echo e(number_format(num: 25000, decimals: 0, decimal_separator: ',', thousands_separator: '.')); ?> VND</td>
                                                </tr>
                                                <tr>
                                                    <th>Tổng tiền:</th>
                                                    <td><?php echo e(number_format(num: $order->total_price, decimals: 0, decimal_separator: ',', thousands_separator: '.')); ?> VND</td>
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
                                    <?php if($order->status != 'canceled'): ?>
                                        <button class="btn btn-default" onclick="window.print();">
                                            <i class="fa fa-print"></i> In hóa đơn
                                        </button>
                                        <button class="btn btn-success pull-right send-invoice-mail" data-id="<?php echo e($order->id); ?>">
                                            <i class="fa fa-credit-card"></i> Gửi hóa đơn
                                        </button>

                                        <?php if($order->status == 'pending'): ?>
                                            <button class="btn btn-danger pull-right" style="margin-right: 5px;" data-id="<?php echo e($order->id); ?>">
                                                <i class="fa fa-remove"></i> Hủy đơn hàng
                                            </button>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <button class="btn btn-danger" style="cursor: not-allowed">
                                            <i class="fa fa-info"></i> Đơn hàng đã hủy
                                        </button>
                                    <?php endif; ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/admin/pages/order-detail.blade.php ENDPATH**/ ?>