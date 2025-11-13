<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login Admin</title>

    <!-- Bootstrap -->
    <link href="<?php echo e(asset('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo e(asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo e(asset('assets/admin/vendors/nprogress/nprogress.css')); ?>" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo e(asset('assets/admin/vendors/animate.css/animate.min.css')); ?>" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo e(asset('assets/admin/build/css/custom.min.css')); ?>" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form action="" method="post">
                        <?php echo csrf_field(); ?>
                        <h1>Đăng nhập</h1>
                        <div>
                            <input type="text" class="form-control" name="email" placeholder="Username" required />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="password" placeholder="Password"
                                required />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default submit">Đăng nhập</button>
                        </div>
                        <div class="separator">

                            <div class="clearfix"></div>

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-shopping-bag"></i> Electro</h1>
                                <p>©2025 All Rights Reserved. Electro! is a Bootstrap 4 template. Privacy and
                                    Terms
                                </p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>

</html><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/admin/pages/login.blade.php ENDPATH**/ ?>