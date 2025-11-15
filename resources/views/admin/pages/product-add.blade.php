@extends('layouts.admin')

@section('title', 'Quản lý sản phẩm')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tạo sản phẩm</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Thêm sản phẩm mới: </h2>
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
                        <form action="{{ route('admin.product.add') }}" id="add-product" method="POST"
                            enctype="multipart/form-data" class="form-horizontal form-label-left">
                            @csrf
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="product-name">Tên sản
                                    phẩm
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="product-name" name="name" required="required"
                                        class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="product-name"> Danh mục
                                    <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select id="product-category" name="category_id" required="required"
                                        class="form-control">
                                        <option value="">Chọn danh mục</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="product-gpu">Tên GPU
                                    <span class="">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="product-gpu" name="gpu"
                                        class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="product-cpu">Tên CPU
                                    <span class="">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="product-cpu" name="CPU"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="product-ram">RAM
                                    <span class="">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="product-ram" name="ram"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="product-rom">Bộ nhớ trong
                                    <span class="">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="product-rom" name="rom"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="product-connection-port">Cổng kết nối
                                    <span class="">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="product-connection-port" name="connection-port"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="product-camera">Camera
                                    <span class="">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="product-camera" name="camera"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="product-battery">Thời lượng pin
                                    <span class="">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="product-battery" name="battery"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="product-monitor-size">Kích thước màn hình
                                    <span class="">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="product-monitor-size" name="monitor-size"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="product-monitor-resolution">Kích thước màn hình
                                    <span class="">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="product-monitor-resolution" name="monitor-resolution"
                                        class="form-control">
                                </div>
                            </div>
                            {{-- Cái này sửa lại là checkbox --}}
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="product-isArrival">
                                    Hàng mới nhập kho
                                </label>
                                <div class="col-md-6 col-sm-6">
                                    <div class="checkbox">
                                        <input type="checkbox" id="product-isArrival" name="isArrival" value="1">
                                    </div>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="product-price">Giá
                                    <span class="">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="product-price" name="price"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="product-stock">Số lượng
                                    <span class="">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" id="product-stock" name="stock"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="product-images">Hình
                                    ảnh</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <label class="custom-file-upload" for="product-images"> Chọn ảnh </label>
                                    <input type="file" name="images[]" id="product-images" accept="image/*" required multiple>
                                    <div id="image-preview-container">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="ln_solid"></div>
                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <button class="btn btn-primary btn_reset" type="reset">Reset</button>
                                    <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
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

@endsection