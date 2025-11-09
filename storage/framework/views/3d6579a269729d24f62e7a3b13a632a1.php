<!-- Cart Header -->
<div class="offcanvas-header">
    <h5 class="offcanvas-title" id="cartSidebarLabel">Giỏ hàng của bạn</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>

<div class="offcanvas-body d-flex flex-column p-0" style="height:100%;">
    <?php
    $subtotal = 0;
    ?>
    <!-- Cart Items -->
    <div class="list-group flex-grow-1" style="overflow-y:auto;">
        <!-- Ví dụ 1 sản phẩm -->
        <div class="list-group-item d-flex align-items-start border-0">
            <?php if(!empty($cartItems) && count($cartItems) > 0): ?>
            <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $product = auth()->check() ? $item->product : \App\Models\Product::find($item['product_id']);
            $quantity = auth()->check() ? $item->quantity : $item['quantity'];
            $subtotal += $quantity * $product->price;
            ?>
            
            <div class="mini-cart-img position-relative" style="width:80px; height:80px; flex-shrink:0;">
                <a href="javascript:void(0)">
                    <img src="<?php echo e(asset($product->images->first()->image_path ?? 'storage/uploads/products/default-product.png')); ?>"
                        alt="Red Hot Tomato" class="img-thumbnail" style="width:100%; height:100%; object-fit:cover;">
                </a>
                <button data-id="<?php echo e($product->id); ?>" class="btn btn-sm btn-danger" title="Xóa sản phẩm"
                    style="position:absolute; top:-5px; right:-5px; padding:0.25rem;">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
            
            <div class="mini-cart-info ml-3 flex-grow-1">
                <h6 class="mb-1"><a href="product-details.html" class="text-decoration-none"><?php echo e($product->name); ?></a></h6>
                <span class="text-muted"><?php echo e($quantity); ?> x <?php echo e(number_format($product->price,0,',','.')); ?></span>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Cart Summary -->
    <div class="p-3 border-top">
        <div class="d-flex justify-content-between mb-3">
            <strong>Tổng tiền:</strong>
            <span><?php echo e(number_format($subtotal,0,',','.')); ?>VNĐ</span>
        </div>
        <div class="d-grid gap-2 mb-2">
            <a href="cart.html" class="btn btn-outline-primary btn-block">Xem giỏ hàng</a>
            <a href="checkout.html" class="btn btn-primary btn-block">Thanh toán</a>
        </div>
    </div>

</div><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/clients/components/includes/mini_cart.blade.php ENDPATH**/ ?>