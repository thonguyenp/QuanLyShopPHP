<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo e(asset('assets/clients/lib/animate/animate.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('assets/clients/lib/owlcarousel/assets/owl.carousel.min.css')); ?>" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo e(asset('assets/clients/css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo e(asset('assets/clients/css/style.css')); ?>" rel="stylesheet">
</head>

<body>

    <!-- Header Start -->
    <?php echo $__env->make('clients.partials.header_home', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    <?php echo $__env->make('clients.partials.footer_home', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <!-- Header Start -->




    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('assets/clients/lib/wow/wow.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/clients/lib/owlcarousel/owl.carousel.min.js')); ?>"></script>


    <!-- Template Javascript -->
    <script src="<?php echo e(asset('assets/clients/js/main.js')); ?>"></script>
</body>

</html><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/layouts/client_home.blade.php ENDPATH**/ ?>