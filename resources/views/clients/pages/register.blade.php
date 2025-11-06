@extends('layouts.client')

@section('title', 'Đăng ký')
@section('breadcrumb', 'Register')

@section('content')
    @include('clients.partials.breadcrumb')
    <!-- Register Area Start -->
<div class="ltn__login-area pb-110">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title-area text-center">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br> Sit aliquid, non distinctio vel iste.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="account-login-inner">
                    <form action="{{route('post-register')}}" method="POST" id="register-form" class="ltn__form-box contact-form-box">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Họ và tên" required>
                            @error('name')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Email" required>
                            @error('email')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu" required>
                            @error('password')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Xác nhận mật khẩu" required>
                            @error('password_confirmation')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="checkbox" id="agreeCheck" required>
                            <label class="form-check-label" for="agreeCheck">
                                Tôi đồng ý cho xử lý dữ liệu cá nhân của mình để nhận tài liệu tiếp thị được cá nhân hóa theo mẫu đồng ý và chính sách bảo mật.
                            </label>
                            @error('checkbox')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary rounded-pill py-3">Tạo tài khoản</button>
                        </div>

                        <div class="text-center mt-4">
                            <p>Already have an account? <a href="/">Login now</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Area End -->

@endsection