

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
                                                <td><?php echo e($order->shippingAddress->address); ?></td>
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
                                                    <button class="btn btn-info">Xem</button>
                                                </td>
                                                <td>
                                                    xcvxc
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
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