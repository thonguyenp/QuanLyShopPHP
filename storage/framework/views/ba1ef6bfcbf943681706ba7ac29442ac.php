

<?php $__env->startSection('title', 'Chi tiết sản phẩm'); ?>

<?php $__env->startSection('breadcrumb', 'Product Detail'); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('clients.partials.breadcrumb', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<!-- Single Products Start -->
<div class="container-fluid shop py-5">
    <div class="container py-5">
        <div class="row g-4">
            
            <div class="col-lg-5 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                
                <div class="container related-product">
                    <h4 class="mb-3">Sản phẩm liên quan</h4>
                    <?php $__currentLoopData = $relatedProducts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="row">
                            <div class="col-6 rounded me-4" style="width: 100px; height: 100px;">
                                <img src="<?php echo e($product->image_url); ?>" class="img-fluid rounded" alt="<?php echo e($product->name); ?>">
                            </div>
                            <div class="col-6">
                                <h6 class="mb-2"><a href="#"><?php echo e($product->name); ?></a></h6>
                                <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="mb-1">
                                    <h5 class="text-danger text-decoration-line-through"><?php echo e(number_format($product->price + 200,0,',','.')); ?></h5>
                                    <h5 class="fw-bold me-2"><?php echo e(number_format($product->price,0,',','.')); ?></h5>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="d-flex justify-content-center my-4">
                    <a href="#" class="btn btn-primary px-4 py-3 rounded-pill w100">View More</a>
                </div>
            </div>
            
            <div class="col-lg-7 col-xl-9 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-4 single-product">
                    
                    <div class="col-xl-6">
                        <div class="single-carousel owl-carousel">
                            <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="single-item"
                                data-dot="<img class='img-fluid' src='<?php echo e(asset('storage/' . $image->image)); ?>' alt='<?php echo e($product->name); ?>'>">
                                <div class="single-inner bg-light rounded">
                                    <img src="<?php echo e(asset('storage/') . $image->image); ?>" class="img-fluid rounded"
                                        alt="<?php echo e($product->name); ?>">
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                    
                    <div class="col-xl-6">
                        <h4 class="fw-bold mb-3"><?php echo e($product->name); ?></h4>
                        <p class="mb-3"><?php echo e($product->manufacturer->name); ?> - <?php echo e($product->category->name); ?></p>
                        <h5 class="fw-bold mb-3"><?php echo e(number_format($product->price,0,',','.')); ?></h5>
                        
                        <div class="d-flex mb-4">
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star text-secondary"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        
                        <div class="d-flex flex-column mb-3">
                            <small><?php echo e($product->status); ?></small>
                            <small>Available: <strong class="text-primary"><?php echo e($product->stock); ?></strong></small>
                        </div>
                        <p class="mb-4"><?php echo e($product->description); ?></p>
                        
                        <div class="input-group quantity mb-5" style="width: 100px;">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" class="form-control form-control-sm text-center border-0" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <a href="#"
                            class="btn btn-primary border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                class="fa fa-shopping-bag me-2 text-white"></i> Add to cart</a>
                    </div>
                    
                    <div class="col-lg-12">
                        <nav>
                            <div class="nav nav-tabs mb-3">
                                <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                    id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                    aria-controls="nav-about" aria-selected="true">Description</button>
                                <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                    id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                    aria-controls="nav-mission" aria-selected="false">Reviews</button>
                            </div>
                        </nav>
                        <div class="tab-content mb-5">
                            
                            <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                <p>
                                    Mô tả sản phẩm: 
                                    <?php echo e($product->description); ?>

                                </p>
                                <b class="fw-bold">CPU: </b>
                                <p class="small">
                                    <?php echo e($product->cpu); ?>

                                </p>
                                <b class="fw-bold">GPU: </b>
                                <p class="small">
                                    <?php echo e($product->gpu); ?>

                                </p>
                                <b class="fw-bold">RAM: </b>
                                <p class="small">
                                    <?php echo e($product->ram); ?>

                                </p>
                                <b class="fw-bold">Dung lượng lưu trữ: </b>
                                <p class="small">
                                    <?php echo e($product->rom); ?>

                                </p>
                                <b class="fw-bold">Camera: </b>
                                <p class="small">
                                    <?php echo e($product->camera); ?>

                                </p>
                                <b class="fw-bold">Thời lượng pin: </b>
                                <p class="small">
                                    <?php echo e($product->battery); ?>

                                </p>
                                <b class="fw-bold">Kích thước màn hình: </b>
                                <p class="small">
                                    <?php echo e($product->monitor_size); ?> </p>
                                <b class="fw-bold mb-0">Độ phân giải:</b>
                                <p class="small"><?php echo e($product->monitor_resolution); ?></p>
                            </div>
                            
                            <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                <div class="d-flex">
                                    <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3"
                                        style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Jason Smith</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p>The generated Lorem Ipsum is therefore always free from repetition
                                            injected humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3"
                                        style="width: 100px; height: 100px;" alt="">
                                    <div class="">
                                        <p class="mb-2" style="font-size: 14px;">April 12, 2024</p>
                                        <div class="d-flex justify-content-between">
                                            <h5>Sam Peters</h5>
                                            <div class="d-flex mb-3">
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star text-secondary"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <p class="text-dark">The generated Lorem Ipsum is therefore always free from
                                            repetition injected humour, or non-characteristic
                                            words etc. Susp endisse ultricies nisi vel quam suscipit </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <form action="#">
                        <h4 class="mb-5 fw-bold">Leave a Reply</h4>
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border-bottom rounded">
                                    <input type="text" class="form-control border-0 me-4" placeholder="Yur Name *">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="border-bottom rounded">
                                    <input type="email" class="form-control border-0" placeholder="Your Email *">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="border-bottom rounded my-4">
                                    <textarea name="" id="" class="form-control border-0" cols="30" rows="8"
                                        placeholder="Your Review *" spellcheck="false"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between py-3 mb-5">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 me-3">Please rate:</p>
                                        <div class="d-flex align-items-center" style="font-size: 12px;">
                                            <i class="fa fa-star text-muted"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                    <a href="#"
                                        class="btn btn-primary border border-secondary text-primary rounded-pill px-4 py-3">
                                        Post Comment</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
<!-- Single Products End -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.client_home', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/clients/pages/product-detail.blade.php ENDPATH**/ ?>