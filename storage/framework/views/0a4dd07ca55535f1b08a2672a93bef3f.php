

<?php $__env->startSection('title', 'Quản lý danh mục'); ?>

<?php $__env->startSection('content'); ?>
<!-- page content -->
<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Tạo Danh Mục</h3>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_title">
						<h2>Thêm danh mục mới: <small>different form elements</small></h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br />
						<form action="<?php echo e(route('admin.category.add')); ?>" id="add-category" method="POST" enctype="multipart/form-data"
							class="form-horizontal form-label-left">
							<?php echo csrf_field(); ?>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="category-name">Tên danh
									mục
									<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" id="category-name" name="name" required="required"
										class="form-control ">
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align"
									for="category-description">Mô tả
									<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" id="category-description" name="description"
										required="required" class="form-control">
								</div>
							</div>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="category-image">Hình
									ảnh</label>
								<div class="col-md-6 col-sm-6 ">
									<label class="custom-file-upload"
										for="category-image"> Chọn ảnh </label>
									<input type="file" name="image" id="category-image"
										accept="image/*"> 
									<img src="" alt="Ảnh xem trước" id="image-preview"
										class="img-thumbnail mt-2">
								</div>
							</div>
							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">
									<button class="btn btn-primary btn_reset" type="reset">Reset</button>
									<button type="submit" class="btn btn-success">Thêm Danh Mục</button>
								</div>
							</div>

						</form>
					</div>
				</div>
			</div>
		</div>

	</div>

</div>
<!-- /page content -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH E:\laragon\www\QuanLyShop\resources\views/admin/pages/categories-add.blade.php ENDPATH**/ ?>