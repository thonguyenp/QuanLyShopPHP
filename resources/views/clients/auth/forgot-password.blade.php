@extends('layouts.client_home')

@section('title', 'Đặt lại mật khẩu')

@section('breadcrumb', 'Forgot Password')

@section('content')
    @include('clients.partials.breadcrumb')
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
                        <form action="{{route('password.email')}}" method="POST" id="login-form" class="ltn__form-box contact-form-box">
                            @csrf
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control" value="{{old('email')}}" placeholder="Email">
                                @error('email')
                                    <div class="alert alert-danger">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary rounded-pill py-2 mb-3">Gửi link đặt lại mật khẩu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection