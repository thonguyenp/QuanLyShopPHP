<!-- Topbar Start -->
<div class="container-fluid px-5 d-none border-bottom d-lg-block">
    <div class="row gx-0 align-items-center">
        <div class="col-lg-6 text-center text-lg-start mb-lg-0">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <a href="#" class="text-muted me-2"> <a href="<?php echo e(route('about')); ?>">About Us</a></a><small> / </small>
                <a href="#" class="text-muted ms-2"><a href="<?php echo e(route('contact.index')); ?>">Contact</a> </a>

            </div>
        </div>
        <div class="col-lg-6 text-center text-lg-end">
            <div class="d-inline-flex align-items-center" style="height: 45px;">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle text-muted ms-2" data-bs-toggle="dropdown"><small><i
                                class="fa fa-home me-2"></i> My Dashboard</small></a>
                    <div class="dropdown-menu rounded">
                        <?php if(!Auth::check()): ?>
                        <a href="<?php echo e(route('login')); ?>" class="dropdown-item">Login</a>
                        <a href="<?php echo e(route('register')); ?>" class="dropdown-item">Register</a>
                        <?php else: ?>
                        <a href="<?php echo e(route('account')); ?>" class="dropdown-item">My Account</a>
                        <a href="" class="dropdown-item">Wishlist</a>
                        <a href="" class="dropdown-item">Notifications</a>
                        <form action="<?php echo e(route('logout')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                        <?php endif; ?>
                        

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid px-5 py-4 d-none d-lg-block">
    <div class="row gx-0 align-items-center text-center">
        <div class="col-md-4 col-lg-3 text-center text-lg-start">
            <div class="d-inline-flex align-items-center">
                <a href="<?php echo e(route('home')); ?>" class="navbar-brand p-0">
                    <h1 class="display-5 text-primary m-0"><i
                            class="fas fa-shopping-bag text-secondary me-2"></i>Electro</h1>
                </a>
            </div>
        </div>
        <div class="col-md-4 col-lg-6 text-center">
            <div class="position-relative ps-4">
                <div class="d-flex border rounded-pill">
                    
                    <input class="form-control border-0 rounded-pill w-100 py-3" type="text"
                        placeholder="Search Looking For?">
                    <button type="button" class="btn btn-primary rounded-pill py-3 px-5" style="border: 0;"><i
                            class="fas fa-search"></i></button>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Topbar End -->
<!-- Navbar Start -->
<div class="container-fluid nav-bar p-0 sticky-top bg-primary">
    <nav class="navbar navbar-expand-lg navbar-light bg-primary px-3">
        <!-- Nút toggle (3 gạch) cho màn hình nhỏ -->
        <button class="navbar-toggler text-white border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu chính -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <!-- Menu trái -->
            <div class="navbar-nav me-auto mb-2 mb-lg-0">
                <a href="<?php echo e(route('home')); ?>" class="nav-item nav-link active text-white">Home</a>
                <a href="<?php echo e(route('products.index')); ?>" class="nav-item nav-link text-white">Shop</a>
                <a href="<?php echo e(route('contact.index')); ?>" class="nav-item nav-link text-white">Contact</a>
            </div>

            <!-- Menu phải (nút yêu thích + giỏ hàng) -->
            <div class="d-flex align-items-center mt-2 me-3">
                <a href="#" class="text-white me-3">
                    <span class="rounded-circle btn-md-square border p-2">
                        <i class="fas fa-heart"></i>
                    </span>
                </a>
                <a href="#" id="mini-cart-icon" class="text-white position-relative" data-bs-toggle="offcanvas"
                    aria-controls="cartSidebar" data-bs-target="#cartSidebar">
                    <span class="rounded-circle btn-md-square border p-2">
                        <i class="fas fa-shopping-cart"></i>
                    </span>
                    <span id="cart_count"
                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?php if(auth()->guard()->check()): ?>
                        <?php echo e(\App\Models\CartItem::where('user_id', auth()->id())->sum('quantity')); ?>

                        <?php else: ?>
                        <?php echo e(session('cart') ? array_sum(array_column(session('cart'), 'quantity')) : 0); ?>

                        <?php endif; ?>
                    </span>
                </a>
                <!-- Cart Sidebar (Offcanvas) --> 
                <div class="offcanvas offcanvas-end" tabindex="-1" id="cartSidebar" aria-labelledby="cartSidebarLabel"> 
                    <div class="mini-cart-container">
                         <?php echo $__env->make('clients.components.includes.mini_cart', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?> 
                    </div> 
                </div>
            </div>
        </div>
    </nav>
</div>
<!-- Navbar End -->

<?php /**PATH E:\laragon\www\QuanLyShop\resources\views/clients/partials/header_home.blade.php ENDPATH**/ ?>