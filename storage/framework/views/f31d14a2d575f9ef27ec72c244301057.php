<div class="tab-content">
    <div id="tab-5" class="tab-pane fade show p-0 active">
        <div class="row g-4 product">
            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-4">
                <div class="product-item rounded wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-item-inner border rounded">
                        
                        <div class="product-item-inner-item">
                            <img src="<?php echo e($product->image_url); ?>" class="img-fluid w-100 rounded-top"
                                alt="<?php echo e($product->name); ?>">
                            <div class="product-new">New</div>
                            <div class="product-details">
                                <a href="<?php echo e(route('products.detail', $product->slug)); ?>"><i
                                        class="fa fa-eye fa-1x"></i></a>
                            </div>
                        </div>
                        
                        <div class="text-center rounded-bottom p-4">
                            <a href="#" class="d-block mb-2"><?php echo e($product->category->name); ?></a>
                            <a href="<?php echo e(route('products.detail', $product->slug)); ?>"
                                class="d-block h4"><?php echo e($product->name); ?></a>
                            <del class="me-2 fs-5"><?php echo e(number_format($product->price + 200,
                                0,',','.')); ?></del>
                            <span class="text-primary fs-5"><?php echo e(number_format($product->price,
                                0,',','.')); ?></span>
                        </div>
                    </div>
                    
                    <div class="product-item-add border border-top-0 rounded-bottom text-center p-4 pt-0">
                        <a href="<?php echo e(route('cart.add')); ?>" 
                        data-id="<?php echo e($product->id); ?>" 
                        class="add-to-cart-btn btn btn-primary border border-secondary rounded-pill px-4 py-2 mb-4 text-primary">
                            <i class="fa fa-shopping-bag me-2 text-white"></i> Thêm vào giỏ hàng
                        </a>
                        <div class="d-flex justify-content-between align-items-center">
                            <?php echo $__env->make('clients.components.includes.rating', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                            <a href="#" 
                                class="text-primary d-flex align-items-center justify-content-center me-0"
                                data-bs-toggle="modal"
                                data-bs-target="#liton_wishlist_modal-<?php echo e($product->id); ?>">
                                <span class="rounded-circle btn-sm-square border">
                                    <i class="fas fa-heart"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="pagination-wrapper d-flex justify-content-center mt-5">
                    <?php echo $products->links('clients.components.pagination.pagination_custom'); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('clients.components.includes.include-modals', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH E:\laragon\www\QuanLyShop\resources\views/clients/components/products_grid.blade.php ENDPATH**/ ?>