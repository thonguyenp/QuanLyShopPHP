<?php $__env->startSection('title', 'Xem KPI của nhân viên'); ?>

<?php $__env->startSection('content'); ?>
<div class="right_col" role="main">
    <div class="x_panel">
        <div class="x_title">
            <h2>KPI của nhân viên: <?php echo e($user->name); ?></h2>
            <div class="clearfix"></div>
        </div>

        <div class="x_content">

            
            <form method="GET" action="<?php echo e(route('kpi.view', $user->id)); ?>" class="form-inline" style="margin-bottom: 20px;">
                <div class="form-group">
                    <label for="period" style="margin-right: 10px;">Chọn kỳ đánh giá:</label>
                    <input type="month" name="period" id="period"
                           value="<?php echo e(request('period')); ?>"
                           class="form-control">
                </div>

                <button type="submit" class="btn btn-primary" style="margin-left: 10px;">
                    Lọc
                </button>

                <?php if(request('period')): ?>
                    <a href="<?php echo e(route('kpi.view', $user->id)); ?>" class="btn btn-secondary" style="margin-left: 10px;">
                        Xóa lọc
                    </a>
                <?php endif; ?>
            </form>
            
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Kỳ đánh giá</th>
                        <th>Tiêu chí</th>
                        <th>Điểm</th>
                        <th>Người chấm</th>
                        <th>Ghi chú</th>
                        <th>Ngày tạo</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $scores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($s->period); ?></td>
                            <td><?php echo e($s->criteria->name); ?></td>
                            <td><?php echo e($s->score); ?></td>
                            <td><?php echo e($s->rater->name); ?></td>
                            <td><?php echo e($s->note); ?></td>
                            <td><?php echo e($s->created_at->format('d/m/Y')); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="6" class="text-center">Không có dữ liệu KPI cho kỳ này.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\QuanLyShopPHP\resources\views/admin/pages/kpi-view.blade.php ENDPATH**/ ?>