

<?php $__env->startSection('title', 'Giỏ hàng'); ?>

<?php $__env->startSection('breadcrumb', 'Cart'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('clients.partials.breadcrumb', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $cartTotal = 0;
                    ?>
                    <?php $__empty_1 = true; $__currentLoopData = $cartProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <?php
                    $subTotal = $item['price'] * $item['quantity'];
                    $cartTotal += $subTotal;
                    ?>
                    <tr>
                        <th scope="row">
                            <p class="mb-0 py-4"><?php echo e($item['name']); ?></p>
                        </th>
                        <td>
                            <p class="mb-0 py-4"><?php echo e(number_format($item['price'],0,',','.')); ?></p>
                        </td>
                        <td>
                            <div class="input-group quantity py-3" style="width: 100px;">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <input type="text" readonly data-max="<?php echo e($item['stock']); ?>"
                                    class="form-control plus-minus-box form-control-sm text-center border-0"
                                    data-id="<?php echo e($item['product_id']); ?>" value="<?php echo e($item['quantity']); ?>">
                                <div class="input-group-btn">
                                    <button class="btn btn-sm inc btn-plus rounded-circle bg-light border">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="mb-0 py-4"><?php echo e(number_format($subTotal,0,',','.')); ?> VND</p>
                        </td>
                        <td class="cart-product-remove py-4">
                            <button data-id="<?php echo e($item['product_id']); ?>"
                                class="remove-from-cart btn btn-md rounded-circle bg-light border">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="6" class="text-center">
                            Giỏ hàng của bạn đang trống
                        </td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        <?php if(!empty($cartProducts)): ?>
            <div class="row g-4 justify-content-end">
            <div class="col-8"></div>
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="bg-light rounded">
                    <div class="p-4">
                        <h1 class="display-6 mb-4">Tổng giỏ hàng</h1>
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-0 me-4">Tổng tiền hàng:</h5>
                            <p class="mb-0"><?php echo e(number_format($cartTotal,0,',','.')); ?> VND</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Phí vận chuyển:</h5>
                            <div>
                                <p class="mb-0">25.000 VND</p>
                            </div>
                        </div>
                    </div>
                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                        <h5 class="mb-0 ps-4 me-4">Tổng thanh toán:</h5>
                        <p class="mb-0 pe-4"><?php echo e(number_format($cartTotal + 25000,0,',','.')); ?> VND</p>
                    </div>
                    <button class="btn btn-primary rounded-pill px-4 py-3 text-uppercase mb-4 ms-4" type="button">Thanh
                        toán</button>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- Cart Page End -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.client_home', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/clients/pages/cart.blade.php ENDPATH**/ ?>