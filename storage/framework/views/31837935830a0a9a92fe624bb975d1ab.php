

<?php $__env->startSection('title', 'Quản lý thông tin admin'); ?>

<?php $__env->startSection('content'); ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Tài khoản</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3  profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view img-account" id="avatar-preview"
                                        style="width:100px; height:100px;" src="<?php echo e(asset('storage/' . $user->avatar)); ?>"
                                        alt="Avatar" title="Avatar">
                                </div>
                                <form action="" enctype="multipart/form-data">
                                    <input type="file" id="avatar" name="avatar" accept="image/*" style="display:none" src="" alt="">
                                    <a href="javascript:void(0)" class="btn btn-success update-avatar"
                                    style="margin: 10px 5px;">
                                        <i class="fa fa-edit m-right-xs">Chọn ảnh</i>
                                    </a>
                                </form>
                            </div>
                            <h3 id="user-name"><?php echo e($user->name); ?></h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-map-marker user-profile-icon"></i> <span id="user-address"><?php echo e($user->address); ?></span>
                                </li>

                                <li>
                                    <i class="fa fa-briefcase user-profile-icon"></i> <span id="user-email"><?php echo e($user->email); ?></span>
                                </li>

                                <li class="m-top-xs">
                                    <i class="fa fa-phone user-profile-icon"></i>
                                    <span id="user-phone"><?php echo e($user->phone_number); ?></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-9 col-sm-9 ">
                            <nav class="nav nav-borders" role="tablist">
                                <a class="nav-link active ms-0" data-toggle="tab" href="#update-profile-container">Thông
                                    tin cá nhân</a>
                                <a class="nav-link" data-toggle="tab" href="#change-password-container">Đổi mật khẩu</a>
                            </nav>
                            <div class="tab-content mt-3">
                                <div class="tab-pane fade show active" id="update-profile-container">
                                    <form id="update-profile" data-parsley-validate
                                        class="form-horizontal form-label-left">
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="name">Họ và
                                                tên <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="name" required value="<?php echo e($user->name); ?>"
                                                    class="form-control ">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="email">Email <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="email" readonly name="email" required
                                                    value="<?php echo e($user->email); ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="phone_number">Số điện thoại <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="phone_number" name="phone_number" required
                                                    value="<?php echo e($user->phone_number); ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="address">Địa chỉ <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="text" id="address" name="address" required
                                                    value="<?php echo e($user->address); ?>" class="form-control">
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6 offset-md-3">
                                                <button class="btn btn-primary" type="reset">Reset</button>
                                                <button type="submit" class="btn btn-success">Cập nhật</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                                <div class="tab-pane fade" id="change-password-container">
                                    <form id="change-password" data-parsley-validate
                                        class="form-horizontal form-label-left">

                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="current_password">Mật khẩu hiện tại <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="password" id="current_password" required class="form-control ">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="new_password">Mật khẩu mới <span class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="password" id="new_password" name="new_password" required
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3 label-align"
                                                for="confirm_password">Xác nhận mật khẩu mới <span
                                                    class="required">*</span>
                                            </label>
                                            <div class="col-md-6 col-sm-6 ">
                                                <input type="password" id="confirm_password" name="confirm_password"
                                                    required class="form-control">
                                            </div>
                                        </div>

                                        <div class="ln_solid"></div>
                                        <div class="item form-group">
                                            <div class="col-md-6 col-sm-6 offset-md-3">
                                                <button class="btn btn-primary" type="reset">Reset</button>
                                                <button type="submit" class="btn btn-success">Cập nhật</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/admin/pages/profile.blade.php ENDPATH**/ ?>