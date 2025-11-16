

<?php $__env->startSection('title', 'Danh sách đơn hàng'); ?>

<?php $__env->startSection('content'); ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Quản lý đơn hàng</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Danh sách đơn hàng</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive" style="overflow-x: auto;">
                                    <p class="text-muted font-13 m-b-30">
                                        The Buttons extension for DataTables provides a common set of options, API
                                        methods and styling to display buttons on a page that will interact with a
                                        DataTable. The core library provides the based framework upon which plug-ins can
                                        built.
                                    </p>
                                    <table id="datatable-buttons" class="table table-striped table-bordered"
                                        style="width:100%">
                                        <thead>
                                            <tr role="row">
                                                <th>ID</th>
                                                <th>Tài khoản</th>
                                                <th>Thông tin người đặt</th>
                                                <th>Tổng tiền</th>
                                                <th>Trạng thái đơn hàng</th>
                                                <th>Trạng thái thanh toán</th>
                                                <th>Chi tiết đơn hàng</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr role="row" class="even">
                                                <td><?php echo e($order->id); ?></td>
                                                <td><?php echo e($order->user->name); ?></td>
                                                <td>
                                                    <a href="javascript:void(0)" data-toggle="modal" data-target="#addressShippingModal-<?php echo e($order->id); ?>">
                                                        <?php echo e($order->shippingAddress->address); ?>

                                                        </a>
                                                </td>
                                                <td><?php echo e(number_format($order->total_price, 0, ',', '.')); ?></td>
                                                <td>
                                                    <?php if($order->status == 'pending'): ?>
                                                    <span class="badge badge-warning">Đợi xác nhận</span>
                                                    <?php elseif($order->status == 'processing'): ?>
                                                    <span class="badge badge-info">Đang giao hàng</span>
                                                    <?php elseif($order->status == 'completed'): ?>
                                                    <span class="badge badge-success">Đã hoàn thành</span>
                                                    <?php elseif($order->status == 'canceled'): ?>
                                                    <span class="badge badge-danger">Đã hủy</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <?php if($order->payment->status == 'pending'): ?>
                                                    <span class="badge badge-warning">Đợi xác nhận</span>
                                                    <?php elseif($order->payment->status == 'completed'): ?>
                                                    <span class="badge badge-info">Đã thanh toán</span>
                                                    <?php elseif($order->payment->status == 'failed'): ?>
                                                    <span class="badge badge-success">Thanh toán bị lỗi</span>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <button class="btn btn-info" data-toggle="modal" data-target="#orderItemlModal-<?php echo e($order->id); ?>">Xem</button>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button type="button"
                                                            class="btn btn-danger dropdown-toggle dropdown-toggle-split"
                                                            data-toggle="dropdown" aria-haspopup="true"
                                                            aria-expanded="false">
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <?php if($order->status == 'pending'): ?>
                                                            <a class="dropdown-item confirm-order" href="#"
                                                                data-id="<?php echo e($order->id); ?>">Xác nhận</a>
                                                            <?php endif; ?>
                                                            <a class="dropdown-item" href="#">Xem chi tiết</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    
                                    <div class="modal fade" id="addressShippingModal-<?php echo e($order->id); ?>" tabindex="-1"
                                        aria-labelledby="addressShippingModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="addressShippingModalLabel">Thông tin giao hàng
                                                    </h5>
                                                    <button type="button" class="btn-close ms-2" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span> &times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Người nhận: <?php echo e($order->shippingAddress->full_name); ?></p>
                                                    <p>Địa chỉ: <?php echo e($order->shippingAddress->address); ?></p>
                                                    <p>Thành phố: <?php echo e($order->shippingAddress->city); ?></p>
                                                    <p>Số điện thoại: <?php echo e($order->shippingAddress->phone); ?></p>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="modal fade" id="orderItemlModal-<?php echo e($order->id); ?>" tabindex="-1"
                                        aria-labelledby="orderItemlModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="orderItemlModalLabel">Chi tiết hóa đơn
                                                    </h5>
                                                    <button type="button" class="btn-close ms-2" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span> &times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <table class="table table-bordered">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Tên sản phẩm</th>
                                                                <th>Số lượng</th>
                                                                <th>Đơn giá</th>
                                                                <th>Thành tiền</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
                                                                $index = 1;
                                                            ?>
                                                            <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo e($index++); ?></td>
                                                                    <td><?php echo e($item->product->name); ?></td>
                                                                    <td><?php echo e($item->quantity); ?></td>
                                                                    <td><?php echo e(number_format($item->price, 0, ',', '.')); ?> VND</td>
                                                                    <td><?php echo e(number_format($item->price * $item->quantity, 0, ',', '.')); ?> VND</td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

</div>

</div>
<!-- /page content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/admin/pages/orders.blade.php ENDPATH**/ ?>