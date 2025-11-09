@extends('layouts.client_home')

@section('title', 'Đăng nhập')
@section('breadcrumb', 'Login')

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
                    <form action="{{route('post-login')}}" method="POST" id="login-form" class="ltn__form-box contact-form-box">
                        @csrf
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Email">
                            @error('email')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                            @error('password')
                                <div class="alert alert-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mt-4 text-end" >
                            <p><a href="{{route('password.request')}}">Forgot password?</a></p>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary rounded-pill py-2">Đăng nhập</button>
                        </div>

                        <div class="text-center mt-4">
                            <p>Still not having an account? <a href="{{url('/register')}}">Register now</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Register Area End -->

@endsection