

<?php $__env->startSection('title', 'Chi tiết đơn hàng'); ?>

<?php $__env->startSection('breadcrumb', 'Order Detail'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('clients.partials.breadcrumb', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<div class="liton_shoping-cart-area mb-120">
    <div class="container mt-4">
        <div class="row">
            <div class="col-6">
                <h3>Chi tiết đơn hàng #<?php echo e($order->id); ?></h3>
                <p>Ngày đặt: <?php echo e($order->created_at->format('d/m/Y')); ?></p>
                <p>Trạng thái:
                    <?php if($order->status == 'pending'): ?>
                    <span class="badge bg-warning">Chờ xác nhận</span>
                    <?php elseif($order->status == 'processing'): ?>
                    <span class="badge bg-primary">Đang xử lý</span>
                    <?php elseif($order->status == 'completed'): ?>
                    <span class="badge bg-success">Đã hoàn thành</span>
                    <?php elseif($order->status == 'canceled'): ?>
                    <span class="badge bg-danger">Đã hủy</span>
                    <?php endif; ?>
                </p>
                <p>Phương thức thanh toán:
                    <?php if($order->payment && $order->payment->payment_method == 'cash'): ?>
                    <span class="badge bg-success">Thanh toán khi nhận hàng</span>
                    <?php elseif($order->payment && $order->payment->payment_method == 'atm'): ?>
                    <span class="badge bg-success">Thanh toán bằng ngân hàng</span>
                    <?php else: ?>
                    <span class="badge bg-danger">Chưa xác định</span>
                    <?php endif; ?>
                </p>
                <p>Tổng tiền:
                    <?php echo e(number_format($order->total_price,0,',','.')); ?> VNĐ
                </p>

            </div>
            <div class="col-6">
                <h4>Thông tin giao hàng: </h4>
                <p>Người nhận: <?php echo e($order->shippingAddress->full_name); ?></p>
                <p>Địa chỉ: <?php echo e($order->shippingAddress->address); ?></p>
                <p>Thành phố: <?php echo e($order->shippingAddress->city); ?></p>
                <p>Số điện thoại: <?php echo e($order->shippingAddress->phone); ?></p>
            </div>
        </div>
        <h4 class="mt-4">Sản phẩm trong đơn hàng</h4>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên Sản phẩm</th>
                    <th>Đơn giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>

            <tbody>
                <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td>
                        <img src="<?php echo e(asset('storage/' . $item->product->image)); ?>" alt="">
                    </td>
                    <td><?php echo e($item->product->name); ?></td>
                    <td><?php echo e(number_format($item->price,0,',','.')); ?> VNĐ</td>
                    <td><?php echo e(number_format($item->quantity,0,',','.')); ?></td>
                    <td><?php echo e(number_format($item->price * $item->quantity,0,',','.')); ?> VNĐ</td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php if($order->status == 'pending'): ?>
        <form action="<?php echo e(route('order.cancel', $order->id)); ?>" method="post" onsubmit="return confirm('Bạn có chắc muốn hủy đơn hàng này?');">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-danger btn-sm my-3">
                Hủy đơn hàng
            </button>
        </form>
        <?php endif; ?>
        <?php if($order->status == 'completed'): ?>
        <h4 class="mt-4">Đánh giá sản phẩm</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $order->orderItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->product->name); ?></td>
                    <td>
                        <a href="<?php echo e(route('products.detail',$item->product->slug)); ?>"
                            class="btn btn-primary">Đánh giá</a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php endif; ?>

    </div>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.client_home', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/clients/pages/order-detail.blade.php ENDPATH**/ ?>