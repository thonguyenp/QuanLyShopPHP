@extends('layouts.client_home')

@section('title', 'Thanh toán')

@section('breadcrumb', 'Checkout')

@section('content')
@include('clients.partials.breadcrumb')
<!-- Checkout Page Start -->
<div class="container-fluid bg-light overflow-hidden py-5">
    <div class="container py-5">
        <h1 class="mb-4 wow fadeInUp" data-wow-delay="0.1s">Chi tiết thanh toán</h1>
        <div class="select-adress">
            <div class="row">
            <div class="col-1">
                <h6>Chọn Địa chỉ:</h6>
            </div>
                <div class="col-3 align-content-center">
                    <select name="address_id" id="list_address" class="input-item">
                        @foreach ($addresses as $address)
                        <option value="{{ $address->id }}" {{ $address->defaultAddress ? 'selected' : '' }}>
                            {{ $address->full_name }} - {{ $address->address }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-2">
                    <a href="{{ route('account') }}" class="btn btn-primary text-primary">Thêm địa chỉ mới</a>
                </div>

            </div>
        </div>
        <div class="row g-5">
            <div class="col-md-12 col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="form-item w-100">
                            <label class="form-label my-3">Họ và tên<sup>*</sup></label>
                            <input type="text" name="ltn_name" placeholder="Họ và tên" class="form-control" value="{{ $defaultAddress->full_name }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="form-item w-100">
                            <label class="form-label my-3">Số điện thoại<sup>*</sup></label>
                            <input type="text" name="ltn_phone" placeholder="Số điện thoại" class="form-control" value="{{ $defaultAddress->phone }}" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-item">
                    <label class="form-label my-3">Số nhà và tên đường<sup>*</sup></label>
                    <input type="text" name="ltn_address" placeholder="Số nhà và tên đường" class="form-control" value="{{ $defaultAddress->address }}" readonly>
                </div>
                <div class="form-item">
                    <label class="form-label my-3">Thành phố <sup>*</sup></label>
                    <input type="text" name="ltn_city" class="form-control" placeholder="Thành phố" value="{{ $defaultAddress->city }}" readonly>
                </div>
                <div class="form-item">
                    <label class="form-label my-3">Địa chỉ email<sup>*</sup></label>
                    <input type="email" placeholder="Địa chỉ email" class="form-control" value="{{ $user->email }}">
                </div>
                <div class="form-check my-3">
                    <input class="form-check-input" type="checkbox" id="Address-1" name="Address" value="Address"
                        readonly>
                    <label class="form-check-label" for="Address-1">Ship to a different address?</label>
                </div>
                <div class="form-item">
                    <textarea name="text" class="form-control" spellcheck="false" cols="30" rows="11"
                        placeholder="Oreder Notes (Optional)"></textarea>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 col-xl-6 wow fadeInUp" data-wow-delay="0.3s">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th scope="col" class="text-start">Tên</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartProducts as $item)
                                <tr class="text-center">
                                <th scope="row" class="text-start py-4">
                                    {{ $item->product->name }}
                                </th>
                                <td class="py-4">{{number_format($item->product->price, 0, ',', '.')}}</td>
                                <td class="py-4">{{($item->quantity)}}</td>
                                <td class="py-4">{{number_format($item->quantity * $item->product->price, 0, ',', '.')}}</td>
                            </tr>
                            @endforeach
                            
                            <tr>
                                <th scope="row">
                                </th>
                                <td class="py-4"></td>
                                <td class="py-4">
                                    <p class="mb-0 text-dark py-2">Tổng tiền</p>
                                </td>
                                <td class="py-4">
                                    <div class="py-2 text-center border-bottom border-top">
                                        <p class="mb-0 text-dark"></p>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4">
                                    <p class="mb-0 text-dark py-4">Phí vận chuyển và xử lý</p>
                                </td>
                                <td class="py-4">
                                </td>
                                <td colspan="3" class="py-4">
                                    <p class="mb-0 text-dark py-4">{{number_format(25000, 0, ',', '.')}}</p>
                                </td>
                            </tr>
                            <tr>
                                <td class="py-4">
                                    <p class="mb-0 text-dark py-2">Tổng hóa đơn</p>
                                </td>
                                <td class="py-4"></td>
                                <td class="py-4"></td>
                                <td class="py-4">
                                    <div class="py-2 text-center border-bottom border-top">
                                        <p class="mb-0 text-dark totalPrice_checkout">{{number_format($totalPrice + 25000, 0, ',', '.')}}</p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <form action="" method="post">
                    @csrf
                    <div id="checkout_payment">
                        <div class="row g-0 text-center align-items-center justify-content-center border-bottom py-2">
                            <div class="col-12">
                                <div class="form-check text-start my-2">
                                    <input type="radio" class="form-check-input bg-primary border-0" id="payment_paypal"
                                        name="payment_method" value="paypal">
                                    <label class="form-check-label" for="Transfer-paypal">Paypal</label>
                                </div>
                                <p class="text-start text-dark">Thanh toán qua Paypal</p>
                            </div>
                        </div>

                        <div class="row g-0 text-center align-items-center justify-content-center border-bottom py-2">
                            <div class="col-12">
                                <div class="form-check text-start my-2">
                                    <input type="radio" class="form-check-input bg-primary border-0" id="payment_cod"
                                        name="payment_method" value="COD">
                                    <label class="form-check-label" for="Transfer-cod">COD</label>
                                </div>
                                <p class="text-start text-dark">Trả tiền khi nhận hàng</p>
                            </div>
                        </div>

                    </div>
                </form>
                {{-- Button order --}}
                <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                    <button type="button"
                        class="btn btn-primary border-secondary py-3 px-4 text-uppercase w-100 text-primary">Place
                        Order</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Checkout Page End -->

@endsection