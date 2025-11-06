

<?php $__env->startSection('title', 'Đăng nhập'); ?>
<?php $__env->startSection('breadcrumb', 'Login'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('clients.partials.breadcrumb', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <!-- Register Area Start -->
<div class="ltn__login-area pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br> Sit aliquid, non distinctio vel iste.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="account-login-inner">
                    <form action="<?php echo e(route('post-login')); ?>" method="POST" id="login-form" class="ltn__form-box contact-form-box">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" value="<?php echo e(old('email')); ?>" placeholder="Email">
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="alert alert-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mt-4 text-end" >
                            <p><a href="<?php echo e(url('/register')); ?>">Forgot password?</a></p>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary rounded-pill py-2">Đăng nhập</button>
                        </div>

                        <div class="text-center mt-4">
                            <p>Still not having an account? <a href="<?php echo e(url('/register')); ?>">Register now</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Area End -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.client', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/clients/pages/login.blade.php ENDPATH**/ ?>