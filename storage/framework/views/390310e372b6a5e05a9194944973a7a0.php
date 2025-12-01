

<?php $__env->startSection('title', 'Trang chấm kpi'); ?>


<?php $__env->startSection('content'); ?>
<div class="right_col" role="main">
    <div class="x_panel">
        <div class="x_title">
            <h2>Chấm KPI cho nhân viên: <?php echo e($user->name); ?></h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">

            <form class="form-horizontal" method="POST" action="<?php echo e(route('kpi.store')); ?>">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>">

                <div class="form-group">
                    <label class="col-md-2 col-sm-2 col-xs-12 control-label">
                        Kỳ đánh giá
                    </label>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <input type="month" 
                            name="period" 
                            class="form-control"
                            required>
                    </div>
                </div>
                <hr>

                <?php $__currentLoopData = $criteria; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="form-group">
                        <label class="col-md-4 col-sm-4 col-xs-12 control-label">
                            <?php echo e($c->name); ?> (Tối đa <?php echo e($c->max_score); ?> điểm)
                        </label>

                        <div class="col-md-2 col-sm-2 col-xs-12">
                            <input type="number"
                                class="form-control"
                                name="scores[<?php echo e($c->id); ?>]"
                                max="<?php echo e($c->max_score); ?>"
                                min="0"
                                value="<?php echo e(old('scores.'.$c->id)); ?>"
                                required>

                            <?php $__errorArgs = ['scores.'.$c->id];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span class="text-danger"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                <div class="form-group">
                    <label class="col-md-2 col-sm-2 col-xs-12 control-label">Ghi chú</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea name="note" class="form-control" rows="3"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-2">
                        <button type="submit" class="btn btn-success">Lưu KPI</button>
                        <a href="<?php echo e(route('kpi.index')); ?>" class="btn btn-default">Quay lại</a>
                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/admin/pages/kpi-create.blade.php ENDPATH**/ ?>