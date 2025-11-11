<div class="d-flex mb-2 align-content-center">
    <?php for($i = 1;$i <= 5; $i++): ?> 
        <?php if($i <=floor($product->average_rating)): ?> 
            <i class="fas fa-star"></i>
        <?php elseif($i == ceil($product->average_rating) && $product->average_rating - floor($product->average_rating) >= 0.5): ?>
            <i class="fas fa-star-half-alt"></i>
        <?php else: ?>
            <i class="far fa-star"></i>
        <?php endif; ?>
        <?php endfor; ?>
    <span><?php echo e($product->reviews->count()); ?> đánh giá</span>
</div><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/clients/components/includes/rating.blade.php ENDPATH**/ ?>