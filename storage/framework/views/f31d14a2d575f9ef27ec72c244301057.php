<div class="col-lg-3 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-categories mb-4">
                        <h4>Danh mục sản phẩm</h4>
                        <ul class="list-unstyled">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <div class="categories-item">
                                    <a href="#" class="text-dark"><i class="fas fa-apple-alt text-secondary me-2"></i>
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

                            <input type="range" id="minRange" min="0" max="500" value="100" step="1" oninput="updateDualRange()">
                            <input type="range" id="maxRange" min="0" max="500" value="400" step="1" oninput="updateDualRange()">
                        </div>

                        <div class="mt-2">
                            <span>From: $<span id="minValue">100</span></span>
                            <span class="mx-2">—</span>
                            <span>To: $<span id="maxValue">400</span></span>
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
                    <div class="featured-product mb-4">
                        <h4 class="mb-3">Sản phẩm mới</h4>
                        <div class="featured-product-item">
                            <div class="rounded me-4" style="width: 100px; height: 100px;">
                                <img src="img/product-5.png" class="img-fluid rounded" alt="Image">
                            </div>
                            <div>
                                <h6 class="mb-2">Camera Leance</h6>
                                <div class="d-flex mb-2">
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star text-secondary"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="d-flex mb-2">
                                    <h5 class="fw-bold me-2">2.99 $</h5>
                                    <h5 class="text-danger text-decoration-line-through">4.11 $</h5>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center my-4">
                            <a href="#" class="btn btn-primary px-4 py-3 rounded-pill w-100">Vew More</a>
                        </div>
                    </div>
</div><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/clients/components/products_grid.blade.php ENDPATH**/ ?>