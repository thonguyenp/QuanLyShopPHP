

<?php $__env->startSection('title', 'Danh sách sản phẩm'); ?>

<?php $__env->startSection('content'); ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Quản lý sản phẩm</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Danh sách sản phẩm</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive" style="overflow-x: auto;">
                                    <p class="text-muted font-13 m-b-30">
                                        The Buttons extension for DataTables provides a common set of options, API
                                        methods and styling to display buttons on a page that will interact with a
                                        DataTable. The core library provides the based framework upon which plug-ins can
                                        built.
                                    </p>
                                    <table id="datatable-buttons" class="table table-striped table-bordered"
                                        style="width:100%">
                                        <thead>
                                            <tr role="row">
                                                <th>Hình ảnh</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Danh mục</th>
                                                <th>Slug</th>
                                                <th>GPU</th>
                                                <th>CPU</th>
                                                <th>Cổng giao tiếp</th>
                                                <th>Camera</th>
                                                <th>Pin</th>
                                                <th>Kích thước màn hình</th>
                                                <th>Độ phân giải màn hình</th>
                                                <th>Vừa nhập kho</th>
                                                <th>Mô tả</th>
                                                <th>Giá</th>
                                                <th>Số lượng tồn</th>
                                                <th>Tình trạng</th>
                                                <th>Chỉnh sửa</th>
                                                <th>Xóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr role="row" class="even" id="product-row-<?php echo e($product->id); ?>">
                                                <td>
                                                    <img class="image-product" style="width:100px; height: 100px;"
                                                        src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->name); ?>">
                                                </td>
                                                <td><?php echo e($product->name); ?></td>
                                                <td><?php echo e($product->category->name); ?></td>
                                                <td><?php echo e($product->slug); ?></td>
                                                <td><?php echo e($product->cpu); ?></td>
                                                <td><?php echo e($product->gpu); ?></td>
                                                <td><?php echo e($product->connection_port); ?></td>
                                                <td><?php echo e($product->camera); ?></td>
                                                <td><?php echo e($product->battery); ?></td>
                                                <td><?php echo e($product->monitor_size); ?></td>
                                                <td><?php echo e($product->monitor_resolution); ?></td>
                                                <td><?php echo e($product->isArrival == 1 ? 'Hàng mới' : 'Hàng cũ'); ?></td>
                                                <td><?php echo e($product->description); ?></td>
                                                <td><?php echo e(number_format($product->price, 0, ',', '.')); ?></td>
                                                <td><?php echo e($product->stock); ?></td>
                                                <td><?php echo e($product->status == 'in_stock' ? 'Còn hàng' : 'Hết hàng'); ?></td>
                                                <td>
                                                    <a class="btn btn-app btn-update-product" href=""
                                                        data-toggle="modal"
                                                        data-target="#modalUpdate-<?php echo e($product->id); ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-app btn-delete-product"
                                                        data-id="<?php echo e($product->id); ?>" href="">
                                                        <i class="fa fa-close"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalUpdate-<?php echo e($product->id); ?>" tabindex="-1"
                                                aria-labelledby="productModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="productModalLabel">Modal title
                                                            </h5>
                                                            <button type="button" class="btn-close ms-2"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span> &times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="udate-product" method="POST"
                                                                enctype="multipart/form-data"
                                                                class="form-horizontal form-label-left">
                                                                <?php echo csrf_field(); ?>
                                                                <div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="product-name">Tên sản phẩm
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <input type="text" id="product-name" name="name"
                                                                            required="required" class="form-control"
                                                                            value="<?php echo e($product->name); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="product-category">Danh mục
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <select name="category_id" id="category_id"
                                                                            class="form-control">
                                                                            <option value="">Chọn danh mục</option>
                                                                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($category->id); ?>" <?php echo e($product->category_id == $category->id ? 'selected' : ''); ?>><?php echo e($category->name); ?></option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="product-manufacturer">Hãng sản xuất
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <select name="manufacturer_id" id="manufacturer_id"
                                                                            class="form-control">
                                                                            <option value="">Chọn danh mục</option>
                                                                            <?php $__currentLoopData = $manufacturers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manufacturer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                            <option value="<?php echo e($manufacturer->id); ?>" <?php echo e($product->manufacturer_id == $manufacturer->id ? 'selected' : ''); ?>><?php echo e($manufacturer->name); ?></option>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        </select>
                                                                    </div>
                                                                </div>

                                                                <div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="product-description">Mô tả
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <input type="text" id="product-description"
                                                                            name="description" required="required"
                                                                            class="form-control"
                                                                            value="<?php echo e($product->description); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="product-gpu">GPU
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <input type="text" id="product-gpu"
                                                                            name="gpu" required="required"
                                                                            class="form-control"
                                                                            value="<?php echo e($product->gpu); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="product-cpu">CPU
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <input type="text" id="product-cpu"
                                                                            name="cpu" required="required"
                                                                            class="form-control"
                                                                            value="<?php echo e($product->cpu); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="product-ram">RAM
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <input type="text" id="product-ram"
                                                                            name="ram" required="required"
                                                                            class="form-control"
                                                                            value="<?php echo e($product->ram); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="product-rom">ROM
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <input type="text" id="product-rom"
                                                                            name="rom" required="required"
                                                                            class="form-control"
                                                                            value="<?php echo e($product->ram); ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="product-connection-port">Cổng giao tiếp
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <input type="text" id="product-connection-port"
                                                                            name="connection_port" required="required"
                                                                            class="form-control"
                                                                            value="<?php echo e($product->connection_port); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="product-camera">Camera
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <input type="text" id="product-camera"
                                                                            name="camera" required="required"
                                                                            class="form-control"
                                                                            value="<?php echo e($product->camera); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="product-battery">Pin
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <input type="text" id="product-battery"
                                                                            name="battery" required="required"
                                                                            class="form-control"
                                                                            value="<?php echo e($product->battery); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="product-monitor-size">Kích thước màn hình
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <input type="text" id="product-monitor-size"
                                                                            name="monitor_size" required="required"
                                                                            class="form-control"
                                                                            value="<?php echo e($product->monitor_size); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="product-monitor-resolution">Độ phân giải
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <input type="text" id="product-monitor-resolution"
                                                                            name="monitor_resolution" required="required"
                                                                            class="form-control"
                                                                            value="<?php echo e($product->monitor_resolution); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="product-isArrival">Vừa nhập kho
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <input type="text" id="product-isArrival"
                                                                            name="isArrival" required="required"
                                                                            class="form-control"
                                                                            value="<?php echo e($product->isArrival); ?>">
                                                                    </div>
                                                                </div><div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="product-price">Giá
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <input type="text" id="product-price"
                                                                            name="price" required="required"
                                                                            class="form-control"
                                                                            value="<?php echo e($product->price); ?>">
                                                                    </div>
                                                                </div><div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="product-stock">Số lượng tồn
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <input type="text" id="product-stock"
                                                                            name="stock" required="required"
                                                                            class="form-control"
                                                                            value="<?php echo e($product->stock); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="product-images">Hình
                                                                        ảnh</label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <label class="custom-file-upload"
                                                                            for="product-images-<?php echo e($product->id); ?>"> Chọn
                                                                            ảnh </label>
                                                                        <input type="file" name="images[]"
                                                                            class="product-images"
                                                                            id="product-images-<?php echo e($product->id); ?>"
                                                                            data-id="<?php echo e($product->id); ?>"
                                                                            accept="image/*" multiple required>
                                                                            <div id="image-preview-container-<?php echo e($product->id); ?>"
                                                                                class="image-preview-container image-preview-listproduct"
                                                                                data-id="<?php echo e($product->id); ?>">
                                                                                <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                    <img src="<?php echo e(asset('storage/' . $image->image)); ?>" alt="Ảnh sản phẩm"
                                                                                    style="width:100px; height:100px; object-fit:cover;">
                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="ln_solid"></div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Đóng</button>
                                                                    <button type="submit" data-id="<?php echo e($product->id); ?>"
                                                                        class="btn btn-primary btn-update-submit-product">Chỉnh
                                                                        sửa</button>
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/admin/pages/products.blade.php ENDPATH**/ ?>