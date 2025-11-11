<?php $__currentLoopData = $product->reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="d-flex">
    <img src="<?php echo e($review->user->avatar_url); ?>" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="<?php echo e($review->user->name); ?>">
    <div class="">
        <p class="mb-2" style="font-size: 14px;"><?php echo e($review->created_at->format('d/m/Y')); ?></p>
        <div class="d-flex justify-content-between">
            <h5 class="me-2"><?php echo e($review->user->name); ?></h5>
            <div class="d-flex mb-3">
                <ul class="d-flex list-unstyled mb-0">
                    <?php for($i = 1; $i <= 5; $i++): ?>
                        <li>
                            <a href="javascript:void(0)">
                                <i class="<?php echo e($review->rating >= $i ? 'fas fa-star' : 'far fa-star'); ?>"></i>
                            </a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
        <p><?php echo e($review->comment); ?></p>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/clients/components/includes/review-list.blade.php ENDPATH**/ ?>