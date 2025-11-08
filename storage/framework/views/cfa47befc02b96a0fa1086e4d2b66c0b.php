

<?php $__env->startSection('title', 'Cửa hàng'); ?>

<?php $__env->startSection('breadcrumb', 'Shop'); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('clients.partials.breadcrumb', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <!-- Shop Page Start -->
    <div class="container-fluid shop py-5">
        <div class="container py-5">
            <div class="row g-4">
                <?php echo $__env->make('clients.components.products_grid', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <div class="col-lg-9 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="rounded mb-4 position-relative">
                        <img src="<?php echo e(asset('assets/clients/img/product-banner-3.jpg')); ?>" class="img-fluid rounded w-100" style="height: 250px;"
                            alt="Image">
                        <div class="position-absolute rounded d-flex flex-column align-items-center justify-content-center text-center"
                            style="width: 100%; height: 250px; top: 0; left: 0; background: rgba(242, 139, 0, 0.3);">
                            <h4 class="display-5 text-primary">SALE</h4>
                            <h3 class="display-4 text-white mb-4">Get UP To 50% Off</h3>
                            <a href="#" class="btn btn-primary rounded-pill">Shop Now</a>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-xl-7">
                            <div class="input-group w-100 mx-auto d-flex">
                                <input type="search" class="form-control p-3" placeholder="keywords"
                                    aria-describedby="search-icon-1">
                                <span id="search-icon-1" class="input-group-text p-3"><i
                                        class="fa fa-search"></i></span>
                            </div>
                        </div>
                        <div class="col-xl-3 text-end">
                            <div class="bg-light ps-3 py-3 rounded d-flex justify-content-between">
                                <label for="electronics">Sắp xếp theo:</label>
                                <select id="sort-by" name="electronicslist"
                                    class="border-0 form-select-sm bg-light me-3" form="electronicsform">
                                    <option value="default">Mặc định</option>
                                    <option value="latest">Hàng mới nhất</option>
                                    <option value="price_asc">Giá thấp đến cao</option>
                                    <option value="price_desc">Giá cao đến thấp</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-xl-2">
                            <ul class="nav nav-pills d-inline-flex text-center py-2 px-2 rounded bg-light mb-4">
                                <li class="nav-item me-4">
                                    <a class="bg-light" data-bs-toggle="pill" href="#tab-5">
                                        <i class="fas fa-th fa-3x text-primary"></i>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="bg-light" data-bs-toggle="pill" href="#tab-6">
                                        <i class="fas fa-bars fa-3x text-primary"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="tab-5" class="tab-pane fade show p-0 active">
                            <div class="row g-4 product">
                                <?php $__currentLoopData = $productsForGrid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-lg-4">
                                    <div class="product-item rounded wow fadeInUp" data-wow-delay="0.1s">
                                        <div class="product-item-inner border rounded">
                                            <div class="product-item-inner-item">
                                                <img src="<?php echo e($product->image_url); ?>" class="img-fluid w-100 rounded-top" alt="<?php echo e($product->name); ?>">
                                                <div class="product-new">New</div>
                                                <div class="product-details">
                                                    <a href="#"><i class="fa fa-eye fa-1x"></i></a>
                                                </div>
                                            </div>
                                            <div class="text-center rounded-bottom p-4">
                                                <a href="#" class="d-block mb-2"><?php echo e($product->category->name); ?></a>
                                                <a href="#" class="d-block h4"><?php echo e($product->name); ?></a>
                                                <del class="me-2 fs-5"><?php echo e(number_format($product->price + 200, 0,',','.')); ?></del>
                                                <span class="text-primary fs-5"><?php echo e(number_format($product->price, 0,',','.')); ?></span>
                                            </div>
                                        </div>
                                        <div
                                            class="product-item-add border border-top-0 rounded-bottom  text-center p-4 pt-0">
                                            <a href="#"
                                                class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4"><i
                                                    class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="d-flex">
                                                    <i class="fas fa-star text-primary"></i>
                                                    <i class="fas fa-star text-primary"></i>
                                                    <i class="fas fa-star text-primary"></i>
                                                    <i class="fas fa-star text-primary"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <div class="d-flex">
                                                    <a href="#"
                                                        class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                                            class="rounded-circle btn-sm-square border"><i
                                                                class="fas fa-random"></i></i></a>
                                                    <a href="#"
                                                        class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                                            class="rounded-circle btn-sm-square border"><i
                                                                class="fas fa-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                        <div id="tab-6" class="products tab-pane fade show p-0">
                            <div class="row g-4 products-mini">
                                <?php $__currentLoopData = $productsForGrid; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-lg-6 col-6">
                                        <div class="products-mini-item border">
                                            <div class="row g-0">
                                                <div class="col-5">
                                                    <div class="products-mini-img border-end h-100">
                                                        <img src="<?php echo e($product->image_url); ?>" class="img-fluid w-100 h-100"
                                                            alt="<?php echo e($product->name); ?>">
                                                        <div class="products-mini-icon rounded-circle bg-primary">
                                                            <a href="#"><i class="fa fa-eye fa-1x text-white"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-7">
                                                    <div class="products-mini-content p-3">
                                                        <a href="#" class="d-block mb-2"><?php echo e($product->category->name); ?></a>
                                                        <a href="#" class="d-block h4"><?php echo e($product->name); ?></a>
                                                        <del class="me-2 fs-5"><?php echo e(number_format($product->price + 200, 0,',','.')); ?></del>
                                                        <span class="text-primary fs-5"><?php echo e(number_format($product->price, 0,',','.')); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="products-mini-add border p-3">
                                                <a href="#"
                                                    class="btn btn-primary border-secondary rounded-pill py-2 px-4"><i
                                                        class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                                                <div class="d-flex">
                                                    <a href="#"
                                                        class="text-primary d-flex align-items-center justify-content-center me-3"><span
                                                            class="rounded-circle btn-sm-square border"><i
                                                                class="fas fa-random"></i></i></a>
                                                    <a href="#"
                                                        class="text-primary d-flex align-items-center justify-content-center me-0"><span
                                                            class="rounded-circle btn-sm-square border"><i
                                                                class="fas fa-heart"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                
                                <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="pagination d-flex justify-content-center mt-5">
                                        <a href="#" class="rounded">&laquo;</a>
                                        <a href="#" class="active rounded">1</a>
                                        <a href="#" class="rounded">2</a>
                                        <a href="#" class="rounded">3</a>
                                        <a href="#" class="rounded">4</a>
                                        <a href="#" class="rounded">5</a>
                                        <a href="#" class="rounded">6</a>
                                        <a href="#" class="rounded">&raquo;</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Page End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.client_home', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/clients/pages/products.blade.php ENDPATH**/ ?>