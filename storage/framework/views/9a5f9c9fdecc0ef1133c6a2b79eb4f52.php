
<?php $__env->startSection('title','Thưởng KPI'); ?>

<?php $__env->startSection('content'); ?>
<div class="right_col">
    <div class="x_panel">
        <div class="x_title">
            <h2>Thưởng KPI: <?php echo e($user->name); ?></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            
            <form method="GET" action="<?php echo e(route('kpi.annual', $user->id)); ?>" class="form-inline" style="margin-bottom: 20px;">
                <div class="form-group">
                    <label for="year" style="margin-right: 10px;">Chọn năm:</label>
                    <input type="number" name="year" id="year"
                        value="<?php echo e(request('year', date('Y'))); ?>"
                        class="form-control" min="2000" max="<?php echo e(date('Y')); ?>">
                </div>

                <button type="submit" class="btn btn-primary" style="margin-left: 10px;">
                    Lọc
                </button>

                <?php if(request('year')): ?>
                    <a href="<?php echo e(route('kpi.annual', $user->id)); ?>" class="btn btn-secondary" style="margin-left: 10px;">
                        Xóa lọc
                    </a>
                <?php endif; ?>
            </form>


            <table class="table table-bordered mt-3">
                <tr><th>Năm</th><td><?php echo e($year); ?></td></tr>
                <tr><th>Tổng điểm KPI</th><td><?php echo e($totalScores); ?> / <?php echo e($maxYearScore); ?></td></tr>
                <tr><th>Tiền thưởng</th><td><?php echo e(number_format($bonus,0,',','.')); ?> VND</td></tr>
            </table>

            <a href="<?php echo e(route('kpi.index')); ?>" class="btn btn-default">Quay lại</a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/admin/pages/kpi-annual.blade.php ENDPATH**/ ?>