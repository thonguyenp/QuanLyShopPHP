

<?php $__env->startSection('title', 'Quản lý người dùng'); ?>

<?php $__env->startSection('content'); ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Quản lý người dùng</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="x_panel">
            <div class="x_content">
                <div class="row">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 col-sm-4  profile_details">
                        <div class="well profile_view">
                            <div class="col-sm-12">
                                <h4 class="brief text-uppercase"><i><?php echo e($user->role->name); ?></i></h4>
                                <div class="left col-md-7 col-sm-7">
                                    <h2> <?php echo e($user->name); ?></h2>
                                    <p><strong>Email: </strong> <?php echo e($user->email); ?> </p>
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-building"></i> Address: <?php echo e($user->address); ?></li>
                                        <li><i class="fa fa-phone"></i> Phone: <?php echo e($user->phone_number); ?></li>
                                    </ul>
                                </div>
                                <div class="right col-md-5 col-sm-5 text-center">
                                    <img src="<?php echo e(asset('storage/' . (($user->avatar == '') || ($user->avatar == null) ? 'upload/users/default-avatar.png' : $user->avatar))); ?>"
                                        alt="" class="img-circle img-fluid">
                                </div>
                            </div>
                            <div class=" profile-bottom text-center">
                                <div class="col-sm-2"></div>
                                <div class=" col-sm-10 emphasis d-flex gap-2">
                                    <?php if($user->role->name == 'customer'): ?>
                                    <button type="button" class="btn btn-primary btn-sm upgradeStaff"
                                        data-userid="<?php echo e($user->id); ?>">
                                        <i class="fa fa-user"> </i> Khách hàng
                                    </button>
                                    <?php elseif($user->role->name == 'staff'): ?>
                                    <button type="button" class="btn btn-primary btn-sm upgradeStaff"
                                        data-userid="<?php echo e($user->id); ?>">
                                        <i class="fa fa-user"> </i> Nhân viên
                                    </button>

                                    <?php endif; ?>
                                    <?php if($user->status == 'banned'): ?>
                                    <button type="button" class="btn btn-success btn-sm changeStatus"
                                        data-userid="<?php echo e($user->id); ?>" data-status="banned">
                                        <i class="fa fa-check"> </i> Bỏ chặn
                                    </button>
                                    <?php else: ?>
                                    <button type="button" class="btn btn-warning btn-sm changeStatus"
                                        data-userid="<?php echo e($user->id); ?>" data-status="active">
                                        <i class="fa fa-check"> </i> Chặn
                                    </button>
                                    <?php endif; ?>
                                    <?php if($user->status == 'deleted'): ?>
                                    <button type="button" class="btn btn-success btn-sm changeStatus"
                                        data-userid="<?php echo e($user->id); ?>" data-status="active">
                                        <i class="fa fa-check"> </i> Khôi phục
                                    </button>
                                    <?php else: ?>
                                    <button type="button" class="btn btn-danger btn-sm changeStatus"
                                        data-userid="<?php echo e($user->id); ?>" data-status="deleted">
                                        <i class="fa fa-check"> </i> Xóa
                                    </button>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/admin/pages/users.blade.php ENDPATH**/ ?>