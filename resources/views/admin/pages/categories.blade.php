@extends('layouts.admin')

@section('title', 'Danh sách danh mục sản phẩm')

@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Quản lý danh mục</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Danh sách danh mục</h2>
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
                                            @foreach ($categories as $category)
                                            <tr role="row" class="even">
                                                <td>
                                                    <img class="image-category" style="width:100px; height: 100px;"
                                                        src="{{ asset('storage/' . $category->image) }}"
                                                        alt="{{ $category->name }}">
                                                </td>
                                                <td>{{$category->name}}</td>
                                                <td>{{$category->slug}}</td>
                                                <td>{{$category->description}}</td>
                                                <td>
                                                    <a class="btn btn-app btn-update-category" href=""
                                                        data-toggle="modal"
                                                        data-target="#modalUpdate-{{ $category->id }}">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a class="btn btn-app btn-delete-category" href="">
                                                        <i class="fa fa-close"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="modalUpdate-{{ $category->id }}" tabindex="-1"
                                                aria-labelledby="categoryModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="categoryModalLabel">Modal title
                                                            </h5>
                                                            <button type="button" class="btn-close ms-2"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span> &times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form 
                                                                id="udate-category" method="POST"
                                                                enctype="multipart/form-data"
                                                                class="form-horizontal form-label-left">
                                                                @csrf
                                                                <div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="category-name">Tên danh
                                                                        mục
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <input type="text" id="category-name"
                                                                            name="name" required="required"
                                                                            class="form-control" value="{{ $category->name }}">
                                                                    </div>
                                                                </div>
                                                                <div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="category-description">Mô tả
                                                                        <span class="required">*</span>
                                                                    </label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <input type="text" id="category-description"
                                                                            name="description" required="required"
                                                                            class="form-control" value="{{ $category->description }}">
                                                                    </div>
                                                                </div>
                                                                <div class="item form-group">
                                                                    <label
                                                                        class="col-form-label col-md-3 col-sm-3 label-align"
                                                                        for="category-image">Hình
                                                                        ảnh</label>
                                                                    <div class="col-md-6 col-sm-6 ">
                                                                        <img src="{{asset('storage/' .$category->image)}}" alt="{{ $category->image }}"
                                                                            id="image-preview" class="image-preview"
                                                                            class="img-thumbnail mt-2">
                                                                        <label class="custom-file-upload"
                                                                            for="category-image-{{ $category->id }}"> Chọn ảnh </label>
                                                                        <input type="file" name="image" class="category-image"
                                                                            id="category-image-{{ $category->id }}" data-id="{{ $category->id }}" accept="image/*">
                                                                    </div>
                                                                </div>
                                                                <div class="ln_solid"></div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-dismiss="modal">Đóng</button>
                                                                    <button type="submit" 
                                                                    data-id="{{ $category->id }}"
                                                                    class="btn btn-primary btn-update-submit-category">Chỉnh sửa</button>
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