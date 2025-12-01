<?php $__env->startSection('title', 'Trang chấm kpi'); ?>

<?php $__env->startSection('content'); ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Quản lý KPI</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Danh sách nhân viên</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <p class="text-muted font-13 m-b-30">
                                        Hiển thị danh sách nhân viên chấm kpi
                                    </p>
                                    <table id="datatable-buttons" class="table table-striped table-bordered"
                                        style="width:100%">
                                        <thead>
                                            <tr role="row">
                                                <th>#</th>
                                                <th>Tên nhân viên</th>
                                                <th>Email</th>
                                                <th>Số điện thoại</th>
                                                <th colspan="2">Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr role="row" class="even">
                                                <td><?php echo e($employee->id); ?></td>
                                                <td><?php echo e($employee->name); ?></td>
                                                <td><?php echo e($employee->email); ?></td>
                                                <td><?php echo e($employee->phone_number); ?></td>
                                                <td>
                                                    <a href="<?php echo e(route('kpi.create', $employee->id)); ?>" class="btn btn-primary">
                                                        Chấm KPI
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="<?php echo e(route('kpi.view', $employee->id)); ?>" class="btn btn-primary">
                                                        Lịch sử KPI
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>

</div>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\laragon\www\QuanlyShopphp\resources\views/admin/pages/kpi.blade.php ENDPATH**/ ?>