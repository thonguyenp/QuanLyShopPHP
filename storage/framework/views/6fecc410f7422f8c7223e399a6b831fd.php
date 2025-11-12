

<?php $__env->startSection('title', 'Danh sách yêu thích'); ?>

<?php $__env->startSection('breadcrumb', 'Wishlist'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('clients.partials.breadcrumb', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Tình trạng</th>
                        <th scope="col">Thêm vào giỏ hàng</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $wishlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="wishlist-product-image">
                            <img src="<?php echo e($item->product->image_url); ?>" alt=""
                                style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                        </td>
                        <td class="align-content-center">
                            <a href="<?php echo e(route('products.detail', $item->product->slug)); ?>"><?php echo e($item->product->name); ?></a>
                        </td>
                        <td>
                            <p class="mb-0 py-4"><?php echo e(number_format($item->product->price,0,',','.')); ?></p>
                        </td>
                        <td>
                            <p class="mb-0 py-4">
                                <?php if($item->product->status == 'in_stock'): ?>
                                Còn hàng
                                <?php else: ?>
                                Hết hàng
                                <?php endif; ?>
                            </p>
                        </td>
                        <td class="align-content-center">
                            <a href="<?php echo e(route('cart.add')); ?>" data-id="<?php echo e($item->product->id); ?>"
                                class="add-to-cart-btn btn btn-primary border border-secondary rounded-pill px-4 py-2 text-primary">
                                Thêm vào giỏ hàng
                            </a>

                        </td>
                        <td class="py-4">
                            <button data-id="<?php echo e($item->product->id); ?>"
                                class="wishlist-product-remove btn btn-md rounded-circle bg-light border">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center">
                            Danh sách yêu thích của bạn đang trống
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Cart Page End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.client_home', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/clients/pages/wishlist.blade.php ENDPATH**/ ?>