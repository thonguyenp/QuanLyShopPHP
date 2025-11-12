@extends('layouts.client_home')

@section('title', 'Danh sách yêu thích')

@section('breadcrumb', 'Wishlist')

@section('content')
@include('clients.partials.breadcrumb')
<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Ảnh</th>
                        <th scope="col">Tên</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Tình trạng</th>
                        <th scope="col">Thêm vào giỏ hàng</th>
                        <th scope="col">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($wishlist as $item)
                    <tr>
                        <td class="wishlist-product-image">
                            <img src="{{ $item->product->image_url }}" alt=""
                                style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;">
                        </td>
                        <td class="align-content-center">
                            <a href="{{ route('products.detail', $item->product->slug) }}">{{$item->product->name}}</a>
                        </td>
                        <td>
                            <p class="mb-0 py-4">{{number_format($item->product->price,0,',','.')}}</p>
                        </td>
                        <td>
                            <p class="mb-0 py-4">
                                @if ($item->product->status == 'in_stock')
                                Còn hàng
                                @else
                                Hết hàng
                                @endif
                            </p>
                        </td>
                        <td class="align-content-center">
                            <a href="{{ route('cart.add') }}" data-id="{{ $item->product->id }}"
                                class="add-to-cart-btn btn btn-primary border border-secondary rounded-pill px-4 py-2 text-primary">
                                Thêm vào giỏ hàng
                            </a>

                        </td>
                        <td class="py-4">
                            <button data-id="{{ $item->product->id }}"
                                class="wishlist-product-remove btn btn-md rounded-circle bg-light border">
                                <i class="fa fa-times text-danger"></i>
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            Danh sách yêu thích của bạn đang trống
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Cart Page End -->
@endsection