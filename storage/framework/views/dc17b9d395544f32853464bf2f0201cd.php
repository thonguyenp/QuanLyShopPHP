<?php if($paginator->hasPages()): ?>
    <div class="pagination">
        <?php if($paginator->onFirstPage()): ?>
            <a href="#" class="disable rounded">&laquo;</a>
        <?php else: ?>
            <a href="<?php echo e($paginator->previousPageUrl()); ?>" class="pagination-link rounded">&laquo;</a>
        <?php endif; ?>

        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(is_string($element)): ?>
                <a href="#" class="disable"><span><?php echo e($element); ?></span></a>
            <?php endif; ?>

            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <a href="javascript:void(0)" class="active rounded"><?php echo e($page); ?></a>
                    <?php else: ?>
                        <a href="<?php echo e($url); ?>" class="pagination-link rounded"><?php echo e($page); ?></a>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <?php if($paginator->hasMorePages()): ?>
            <a href="<?php echo e($paginator->nextPageUrl()); ?>" class="pagination-link rounded">&raquo;</a>
        <?php else: ?>
            <a href="#" class="disable rounded">&raquo;</a>
        <?php endif; ?>
    </div>    
<?php endif; ?>
<?php /**PATH E:\laragon\www\QuanLyShop\resources\views/clients/components/pagination/pagination_custom.blade.php ENDPATH**/ ?>