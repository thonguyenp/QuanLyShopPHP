

<?php $__env->startSection('title', 'Cửa hàng'); ?>

<?php $__env->startSection('breadcrumb', 'Shop'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('clients.partials.breadcrumb', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<!-- Spinner Start -->
<div id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<!-- Spinner End -->
<!-- Shop Page Start -->
<div class="container-fluid shop py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    
                    <div class="product-categories mb-4">
                        <h4>Danh mục sản phẩm</h4>
                        <ul class="list-unstyled">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="categories-item">
                                    <a href="#" class="category-filter text-dark" data-id="<?php echo e($category->id); ?>">
                                        <i class="fas fa-apple-alt text-secondary me-2"></i>
                                        <?php echo e($category->name); ?></a>
                                    <span>(<?php echo e($category->products->count()); ?>)</span>
                                </div>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    
                    <div class="price mb-4">
                        <h4 class="mb-2">Price Range</h4>

                        <div class="range-slider">
                            <div class="slider-track"></div>
                            <div class="slider-range" id="sliderRange"></div>

                            <input type="range" id="minRange" min="0" max="100000000" value="0" step="1" oninput="">
                            <input type="range" id="maxRange" min="0" max="100000000" value="100000000" step="1" oninput="">
                        </div>

                        <div class="mt-2">
                            <span>From: <span id="minValue">0</span> VNĐ</span>
                            <br>
                            <span>To: <span id="maxValue">100.000.000</span> VNĐ</span>
                        </div>
                    </div>
                    
                    <div class="manufacturer mb-4">
                        <h4>Nhà sản xuất</h4>
                        <div class="container">
                            <div class="row">
                                <?php $__currentLoopData = $manufacturers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manufacturer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-6">
                                    <a href="">
                                        <img src="<?php echo e(asset('storage/'. $manufacturer->image)); ?>" class="img-fluid"
                                            alt="<?php echo e($manufacturer->name); ?>"
                                            style="width: 250px; height: 100px">
                                    </a>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="new-arrival-home mb-4">
                        <h4 class="mb-3">Sản phẩm mới</h4>
                        <?php $__currentLoopData = $latestProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="new-arrival-item">
                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                <img src="<?php echo e($product->image_url); ?>" class="img-fluid rounded" alt="<?php echo e($product->name); ?>">
                            </div>
                            <div>
                                <h6 class="mb-2"><?php echo e($product->name); ?></h6>
                                <?php echo $__env->make('clients.components.includes.rating', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2"><?php echo e(number_format($product->price,0,',','.')); ?> VNĐ</h5>
                                    <h5 class="text-danger text-decoration-line-through"><?php echo e(number_format($product->price + 20000,0,',','.')); ?></h5>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
            </div>
            <div class="col-lg-9 wow fadeInUp" data-wow-delay="0.1s">
                <div class="rounded mb-4 position-relative">
                    <img src="<?php echo e(asset('assets/clients/img/product-banner-3.jpg')); ?>" class="img-fluid rounded w-100"
                        style="height: 250px;" alt="Image">
                    <div class="position-absolute rounded d-flex flex-column align-items-center justify-content-center text-center"
                        style="width: 100%; height: 250px; top: 0; left: 0; background: rgba(242, 139, 0, 0.3);">
                        <h4 class="display-5 text-primary">SALE</h4>
                        <h3 class="display-4 text-white mb-4">Get UP To 50% Off</h3>
                        <a href="#" class="btn btn-primary rounded-pill">Shop Now</a>
                    </div>
                </div>
                <div class="row g-4">
                    <!-- Ô 1: ô search -->
                    <div class="col-xl-6">
                        <div class="input-group w-100 mx-auto d-flex">
                            <input type="search" class="form-control p-3" placeholder="keywords"
                                aria-describedby="search-icon-1">
                            <span id="search-icon-1" class="input-group-text p-3"><i class="fa fa-search"></i></span>
                        </div>
                    </div>

                    <!-- Ô 2: ô sắp xếp -->
                    <div class="col-xl-4 text-end">
                        <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between">
                            <label for="sort-by">Sort By:</label>
                            <select id="sort-by" class="border-0 form-select-sm bg-light me-3">
                                <option value="default">Mặc định</option>
                                <option value="latest">Hàng mới nhất</option>
                                <option value="price_asc">Giá thấp đến cao</option>
                                <option value="price_desc">Giá cao đến thấp</option>
                            </select>
                        </div>
                    </div>

                    <!-- Ô 3: icon view -->
                    <div class="col-lg-2 col-xl-2">
                        <ul class="nav nav-pills d-inline-flex text-center py-2 px-2 rounded bg-light mb-4">
                            <li class="nav-item me-2">
                                <a class="bg-light" data-bs-toggle="pill" href="#tab-5">
                                    <i class="fas fa-th fa-2x text-primary"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="product-content">
                    <?php echo $__env->make('clients.components.products_grid',['products' => $products], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Page End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.client_home', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/clients/pages/products.blade.php ENDPATH**/ ?>