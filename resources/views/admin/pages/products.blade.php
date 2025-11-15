@extends('layouts.admin')

@section('title', 'Danh sách sản phẩm')

@section('content')
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
                                            @foreach ($products as $product)
                                            <tr role="row" class="even" id="product-row-{{ $product->id }}">
                                                <td>
                                                    <img class="image-product" style="width:100px; height: 100px;"
                                                        src="{{ $product->image_url }}" alt="{{ $product->name }}">
                                                </td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->category->name}}</td>
                                                <td>{{$product->slug}}</td>
                                                <td>{{$product->cpu}}</td>
                                                <td>{{$product->gpu}}</td>
                                                <td>{{$product->connection_port}}</td>
                                                <td>{{$product->camera}}</td>
                                                <td>{{$product->battery}}</td>
                                                <td>{{$product->monitor_size}}</td>
                                                <td>{{$product->monitor_resolution}}</td>
                                                <td>{{$product->isArrival == 1 ? 'Hàng mới' : 'Hàng cũ'}}</td>
                                                <td>{{$product->description}}</td>
                                                <td>{{number_format($product->price, 0, ',', '.')}}</td>
                                                <td>{{$product->stock}}</td>
                                                <td>{{$product->status == 'in_stock' ? 'Còn hàng' : 'Hết hàng'}}</td>
                                                <td>
                                                    <a class="btn btn-app btn-update-product" href=""
                                                        data-toggle="modal"
                                                        data-target="#modalUpdate-{{ $product->id }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-app btn-delete-product"
                                                        data-id="{{ $product->id }}" href="">
                                                        <i class="fa fa-close"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalUpdate-{{ $product->id }}" tabindex="-1"
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
                                                                @csrf
                                                                <div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="product-name">Tên sản phẩm
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <input type="text" id="product-name" name="name"
                                                                            required="required" class="form-control"
                                                                            value="{{ $product->name }}">
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
                                                                            @foreach ($categories as $category)
                                                                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{
                                                                                $category->name }}</option>
                                                                            @endforeach

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
                                                                            @foreach ($manufacturers as $manufacturer)
                                                                            <option value="{{ $manufacturer->id }}" {{ $product->manufacturer_id == $manufacturer->id ? 'selected' : '' }}>{{
                                                                                $manufacturer->name }}</option>
                                                                            @endforeach
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
                                                                            value="{{ $product->description }}">
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
                                                                            value="{{ $product->gpu }}">
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
                                                                            value="{{ $product->cpu }}">
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
                                                                            value="{{ $product->ram }}">
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
                                                                            value="{{ $product->ram }}">
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
                                                                            value="{{ $product->connection_port }}">
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
                                                                            value="{{ $product->camera }}">
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
                                                                            value="{{ $product->battery }}">
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
                                                                            value="{{ $product->monitor_size }}">
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
                                                                            value="{{ $product->monitor_resolution }}">
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
                                                                            value="{{ $product->isArrival }}">
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
                                                                            value="{{ $product->price }}">
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
                                                                            value="{{ $product->stock }}">
                                                                    </div>
                                                                </div>
                                                                <div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="product-images">Hình
                                                                        ảnh</label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <label class="custom-file-upload"
                                                                            for="product-images-{{ $product->id }}"> Chọn
                                                                            ảnh </label>
                                                                        <input type="file" name="images[]"
                                                                            class="product-images"
                                                                            id="product-images-{{ $product->id }}"
                                                                            data-id="{{ $product->id }}"
                                                                            accept="image/*" multiple required>
                                                                            <div id="image-preview-container-{{ $product->id }}"
                                                                                class="image-preview-container image-preview-listproduct"
                                                                                data-id="{{ $product->id }}">
                                                                                @foreach ($product->images as $image)
                                                                                    <img src="{{ asset('storage/' . $image->image) }}" alt="Ảnh sản phẩm"
                                                                                    style="width:100px; height:100px; object-fit:cover;">
                                                                                @endforeach
                                                                            </div>
                                                                    </div>
                                                                </div>
                                                                <div class="ln_solid"></div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Đóng</button>
                                                                    <button type="submit" data-id="{{ $product->id }}"
                                                                        class="btn btn-primary btn-update-submit-product">Chỉnh
                                                                        sửa</button>
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
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

@endsection