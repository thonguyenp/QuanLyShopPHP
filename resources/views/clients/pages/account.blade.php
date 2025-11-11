@extends('layouts.client_home')

@section('title', 'Trang cá nhân')
@section('breadcrumb', 'Profile')

@section('content')
@include('clients.partials.breadcrumb')

<div class="container-xl px-4 mt-4">
    <!-- Account page navigation-->
    <nav class="nav nav-borders" role="tablist">
        <a class="nav-link active ms-0" data-bs-toggle="tab" href="#liton_tab_dashboard">Bảng điều khiển</a>
        <a class="nav-link" data-bs-toggle="tab" href="#liton_tab_orders">Đơn hàng</a>
        <a class="nav-link" data-bs-toggle="tab" href="#liton_tab_address">Địa chỉ</a>
        <a class="nav-link" data-bs-toggle="tab" href="#liton_tab_account">Chi tiết tài khoản</a>
        <a class="nav-link" data-bs-toggle="tab" href="#liton_tab_password">Đổi mật khẩu</a>
    </nav>

    <hr class="mt-0 mb-4">

    <!-- Nội dung các tab -->
    <div class="tab-content">

        <!-- Bảng điều khiển -->
        <div class="tab-pane fade show active" id="liton_tab_dashboard">
            <div class="card mb-4">
                <div class="card-header">Bảng điều khiển</div>
                <div class="card-body">
                    Hello <strong>{{ $user->email }}</strong> (not <strong>{{ $user->email }}</strong>)
                    <small><a href="{{route('logout')}}">Đăng xuất</a></small>

                    Từ bảng điều khiển tài khoản của bạn, bạn có thể xem <span>đơn hàng gần đây</span>, quản lý
                    <span>địa chỉ giao hàng và thanh toán của bạn</span>, và <span>chỉnh sửa mật khẩu và thông tin chi
                        tiết về tài khoản của bạn</span>.
                </div>
            </div>
        </div>

        <!-- Đơn hàng -->
        <div class="tab-pane fade" id="liton_tab_orders">
            <div class="card mb-4">
                <div class="card-header">Đơn hàng của bạn</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Đơn hàng</th>
                                    <th>Ngày đặt hàng</th>
                                    <th>Trạng thái</th>
                                    <th>Tổng tiền</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                                    <td>#{{$order->id}}</td>
                                    <td>{{$order->created_at->format('d/m/Y')}}</td>
                                    <td>
                                        @if ($order->status == 'pending')
                                            <span class="badge bg-warning">Chờ xác nhận</span>
                                        @elseif ($order->status == 'processing')
                                            <span class="badge bg-primary">Đang xử lý</span>
                                        @elseif ($order->status == 'completed')
                                            <span class="badge bg-success">Đã hoàn thành</span>
                                        @elseif ($order->status == 'canceled')
                                            <span class="badge bg-danger">Đã hủy</span>
                                        @endif
                                    </td>
                                    <td>{{number_format($order->total_price,0,',','.')}} VNĐ</td>
                                    <td><a class="btn btn-sm btn-info" href="{{ route('order.showOrder', $order->id) }}">Xem chi tiết đơn hàng</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <!-- Địa chỉ -->
        <div class="tab-pane fade" id="liton_tab_address">
            <div class="card mb-4">
                <div class="card-header">Địa chỉ giao hàng</div>
                <div class="card-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Tên người nhận</th>
                                <th>Địa chỉ</th>
                                <th>Thành phố</th>
                                <th>Số điện thoại</th>
                                <th>Mặc định</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($addresses as $item)
                            <tr>
                                <td>{{$item->full_name}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{$item->city}}</td>
                                <td>{{$item->phone}}</td>
                                <td>
                                    @if ($item->default)
                                    <span class="badge bg-success">Mặc định</span>
                                    @else
                                    <form action="{{route('account.address.update', $item->id)}}" method="post"
                                        class="d-line">
                                        @csrf
                                        @method('PUT')
                                        <button class="btn btn-primary">Chọn</button>
                                    </form>
                                    @endif
                                </td>
                                <td>
                                    <form action="{{route('account.address.delete', $item->id)}}" method="POST"
                                        class="d-line">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Bạn có muốn xóa địa chỉ này không?')">Xóa</button>
                                    </form>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary" style="width: 200px;" data-bs-toggle="modal"
                            data-bs-target="#addAddress">Thêm địa chỉ mới</button>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="addAddress" tabindex="-1" aria-labelledby="addAddressLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="addAddressLabel">Thêm địa chỉ mới</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('account.address.add')}}" method="post" id="addAddressForm">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="full_name" class="form-label">Tên người dùng</label>
                                        <input type="text" class="form-control" id="full_name" name="full_name"
                                            required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="address" class="form-label">Địa chỉ</label>
                                        <input type="text" class="form-control" id="address" name="address" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="city" class="form-label">Thành phố</label>
                                        <input type="text" class="form-control" id="city" name="city" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone" class="form-label">Số điện thoại</label>
                                        <input type="text" class="form-control" id="phone" name="phone" required>
                                    </div>
                                    <div class="mb-3 form-check">
                                        <input type="checkbox" class="form-check-input" id="default" name="default">
                                        <label for="default" class="form-label">Đặt làm địa chỉ mặc định</label>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Chi tiết tài khoản -->
        <div class="tab-pane fade" id="liton_tab_account">
            <form action="{{route('account.update')}}" method="post" id="update-account" enctype="multipart/form-data">
                <div class="row">
                    @method('PUT')
                    <div class="col-xl-4">
                        <!-- Profile picture card-->
                        <div class="card mb-4 mb-xl-0">
                            <div class="card-header">Ảnh đại diện</div>
                            <div class="card-body text-center">
                                <img id="preview-image"
                                    src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('images/default-avatar.png') }}"
                                    class="profile-pic rounded-circle mb-2" style="width: 100px; height: 100px;"
                                    alt="avatar">
                                <div class="small font-italic text-muted mb-4">JPG hoặc PNG, tối đa 5MB</div>
                                <input type="file" name="avatar" id="avatar" accept="image/" class="d-none">
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header">Chi tiết tài khoản</div>
                            <div class="card-body">
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="ltn_name">Họ và tên</label>
                                        <input class="form-control" id="ltn_name" name="ltn_name" type="text"
                                            placeholder="Nhập tên của bạn" value="{{$user->name}}">
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="ltn_email">Email (không được thay
                                            đổi)</label>
                                        <input class="form-control" id="ltn_email" name="ltn_email" type="email"
                                            readonly placeholder="Nhập email" value="{{$user->email}}">
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="ltn_phone_number">Số điện thoại</label>
                                        <input class="form-control" id="ltn_phone_number" type="tel"
                                            name="ltn_phone_number" placeholder="Nhập số điện thoại"
                                            value="{{$user->phone_number}}">
                                    </div>
                                </div>

                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="ltn_address">Địa chỉ</label>
                                        <input class="form-control" id="ltn_address" type="text" name="ltn_address"
                                            placeholder="Nhập số địa chỉ" value="{{$user->address}}">
                                    </div>
                                </div>
                                <button class="btn btn-primary" type="submit">Lưu thay đổi</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- Đổi mật khẩu -->
        <div class="tab-pane fade" id="liton_tab_password">
            <div class="card mb-4">
                <div class="card-header">Đổi mật khẩu</div>
                <div class="card-body">
                    <form action="{{route('account.change-pasword')}}" method="POST" id="change-password-form">
                        <div class="mb-3">
                            <label class="small mb-1" for="current_password">Mật khẩu hiện tại</label>
                            <input class="form-control" name="current_password" id="current_password" type="password">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="new_password">Mật khẩu mới</label>
                            <input class="form-control" name="new_password" id="new_password" type="password">
                        </div>
                        <div class="mb-3">
                            <label class="small mb-1" for="confirm_new_password">Nhập lại mật khẩu mới</label>
                            <input class="form-control" name="confirm_new_password" id="confirm_new_password"
                                type="password">
                        </div>
                        <button class="btn btn-primary" type="submit">Cập nhật mật khẩu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection