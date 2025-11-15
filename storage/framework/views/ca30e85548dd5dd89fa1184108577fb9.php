

<?php $__env->startSection('title', 'Danh sách danh mục sản phẩm'); ?>

<?php $__env->startSection('content'); ?>
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Quản lý nhãn hàng</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Danh sách nhãn hàng</h2>
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
                                <div class="card-box table-responsive">
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
                                                <th>Tên danh mục</th>
                                                <th>Slug</th>
                                                <th>Mô tả</th>
                                                <th>Chỉnh sửa</th>
                                                <th>Xóa</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $manufacturers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $manufacturer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr role="row" class="even">
                                                <td>
                                                    <img class="image-manufacturer" style="width:100px; height: 100px;"
                                                        src="<?php echo e(asset('storage/' . $manufacturer->image)); ?>"
                                                        alt="<?php echo e($manufacturer->name); ?>">
                                                </td>
                                                <td><?php echo e($manufacturer->name); ?></td>
                                                <td><?php echo e($manufacturer->slug); ?></td>
                                                <td><?php echo e($manufacturer->description); ?></td>
                                                <td>
                                                    <a class="btn btn-app btn-update-manufacturer" href=""
                                                        data-toggle="modal"
                                                        data-target="#modalUpdate-<?php echo e($manufacturer->id); ?>">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-app btn-delete-manufacturer" data-id="<?php echo e($manufacturer->id); ?>" href="">
                                                        <i class="fa fa-close"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalUpdate-<?php echo e($manufacturer->id); ?>" tabindex="-1"
                                                aria-labelledby="manufacturerModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="manufacturerModalLabel">Modal title
                                                            </h5>
                                                            <button type="button" class="btn-close ms-2"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span> &times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form 
                                                                id="update-manufacturer" method="POST"
                                                                enctype="multipart/form-data"
                                                                class="form-horizontal form-label-left">
                                                                <?php echo csrf_field(); ?>
                                                                <div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="manufacturer-name">Tên danh
                                                                        mục
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <input type="text" id="manufacturer-name"
                                                                            name="name" required="required"
                                                                            class="form-control" value="<?php echo e($manufacturer->name); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="manufacturer-description">Mô tả
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <input type="text" id="manufacturer-description"
                                                                            name="description" required="required"
                                                                            class="form-control" value="<?php echo e($manufacturer->description); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="manufacturer-image">Hình
                                                                        ảnh</label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <img src="<?php echo e(asset('storage/' .$manufacturer->image)); ?>" alt="<?php echo e($manufacturer->image); ?>"
                                                                            id="image-preview" class="image-preview"
                                                                            class="img-thumbnail mt-2">
                                                                        <label class="custom-file-upload"
                                                                            for="manufacturer-image-<?php echo e($manufacturer->id); ?>"> Chọn ảnh </label>
                                                                        <input type="file" name="image" class="manufacturer-image"
                                                                            id="manufacturer-image-<?php echo e($manufacturer->id); ?>" data-id="<?php echo e($manufacturer->id); ?>" accept="image/*">
                                                                    </div>
                                                                </div>
                                                                <div class="ln_solid"></div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Đóng</button>
                                                                    <button type="submit" 
                                                                    data-id="<?php echo e($manufacturer->id); ?>"
                                                                    class="btn btn-primary btn-update-submit-manufacturer">Chỉnh sửa</button>
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
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/admin/pages/manufacturers.blade.php ENDPATH**/ ?>