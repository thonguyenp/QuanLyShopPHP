

<?php $__env->startSection('title', 'Trang cá nhân'); ?>
<?php $__env->startSection('breadcrumb', 'Profile'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('clients.partials.breadcrumb', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders" role="tablist">
        <a class="nav-link active ms-0" data-bs-toggle="tab" href="#liton_tab_dashboard">Bảng điều khiển</a>
        <a class="nav-link" data-bs-toggle="tab" href="#liton_tab_orders">Đơn hàng</a>
        <a class="nav-link" data-bs-toggle="tab" href="#liton_tab_address">Địa chỉ</a>
        <a class="nav-link" data-bs-toggle="tab" href="#liton_tab_account">Chi tiết tài khoản</a>
        <a class="nav-link" data-bs-toggle="tab" href="#liton_tab_password">Đổi mật khẩu</a>
    </nav>

    <hr class="mt-0 mb-4">

    <!-- Nội dung các tab -->
    <div class="tab-content">

        <!-- Bảng điều khiển -->
        <div class="tab-pane fade show active" id="liton_tab_dashboard">
            <div class="card mb-4">
                <div class="card-header">Bảng điều khiển</div>
                <div class="card-body">
                    Hello <strong><?php echo e($user->email); ?></strong> (not <strong><?php echo e($user->email); ?></strong>) 
                    <small><a href="javascript:void(0)">Đăng xuất</a></small>

                    Từ bảng điều khiển tài khoản của bạn, bạn có thể xem <span>đơn hàng gần đây</span>, quản lý <span>địa chỉ giao hàng và thanh toán của bạn</span>, và <span>chỉnh sửa mật khẩu và thông tin chi tiết về tài khoản của bạn</span>.
                </div>
            </div>
        </div>

        <!-- Đơn hàng -->
        <div class="tab-pane fade" id="liton_tab_orders">
            <div class="card mb-4">
                <div class="card-header">Đơn hàng của bạn</div>
                <div class="card-body">
                    <p>Hiển thị danh sách các đơn hàng gần đây của bạn.</p>
                    <!-- Bạn có thể thêm table hiển thị đơn hàng ở đây -->
                </div>
            </div>
        </div>

        <!-- Địa chỉ -->
        <div class="tab-pane fade" id="liton_tab_address">
            <div class="card mb-4">
                <div class="card-header">Địa chỉ giao hàng</div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                            <th>Tên người nhận</th>
                            <th>Địa chỉ</th>
                            <th>Thành phố</th>
                            <th>Số điện thoại</th>
                            <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>1</td>
                            <td>Jun 22, 2019</td>
                            <td>Pending</td>
                            <td>$3000</td>
                            <td>
                                <button type="submit" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Bạn có muốn xóa địa chỉ này?')">Xóa</button>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-end">
                        <button class="btn btn-primary" style="width: 200px;">Thêm địa chỉ mới</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chi tiết tài khoản -->
        <div class="tab-pane fade" id="liton_tab_account">
            <div class="row">
                <div class="col-xl-4">
                    <!-- Profile picture card-->
                    <div class="card mb-4 mb-xl-0">
                        <div class="card-header">Ảnh đại diện</div>
                        <div class="card-body text-center">
                            <img class="img-account-profile rounded-circle mb-2"
                                src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                            <div class="small font-italic text-muted mb-4">JPG hoặc PNG, tối đa 5MB</div>
                            <button class="btn btn-primary" type="button">Tải ảnh mới</button>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Chi tiết tài khoản</div>
                        <div class="card-body">
                            <form>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputName">Họ và tên</label>
                                        <input class="form-control" id="inputName" name="inputName" type="text"
                                            placeholder="Nhập tên của bạn" value="Nguyễn Văn A">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="small mb-1" for="inputEmailAddress">Địa chỉ email</label>
                                    <input class="form-control" id="inputEmailAddress" type="email"
                                        placeholder="Nhập email" value="name@example.com">
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="inputPhone">Số điện thoại</label>
                                        <input class="form-control" id="inputPhone" type="tel"
                                            placeholder="Nhập số điện thoại" value="0123-456-789">
                                    </div>
                                </div>

                                <button class="btn btn-primary" type="button">Lưu thay đổi</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Đổi mật khẩu -->
        <div class="tab-pane fade" id="liton_tab_password">
            <div class="card mb-4">
                <div class="card-header">Đổi mật khẩu</div>
                <div class="card-body">
                    <form>
                        <div class="mb-3">
                            <label class="small mb-1" for="currentPassword">Mật khẩu hiện tại</label>
                            <input class="form-control" id="currentPassword" type="password">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="newPassword">Mật khẩu mới</label>
                            <input class="form-control" id="newPassword" type="password">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="confirmPassword">Nhập lại mật khẩu mới</label>
                            <input class="form-control" id="confirmPassword" type="password">
                        </div>
                        <button class="btn btn-primary" type="button">Cập nhật mật khẩu</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.client_home', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/clients/pages/account.blade.php ENDPATH**/ ?>