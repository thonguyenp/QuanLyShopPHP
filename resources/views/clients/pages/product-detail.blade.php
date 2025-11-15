@extends('layouts.client_home')

@section('title', 'Chi tiết sản phẩm')

@section('breadcrumb', 'Product Detail')

@section('content')
@include('clients.partials.breadcrumb')
<!-- Single Products Start -->
<div class="container-fluid shop py-5">
    <div class="container py-5">
        <div class="row g-4">
            {{-- Cột trái --}}
            <div class="col-lg-5 col-xl-3 wow fadeInUp" data-wow-delay="0.1s">
                {{-- Sản phẩm liên quan --}}
                <div class="container related-product">
                    <h4 class="mb-3">Sản phẩm liên quan</h4>
                    @foreach ($relatedProducts as $related)
                    <div class="row">
                        <div class="col-6 rounded me-4" style="width: 100px; height: 100px;">
                            <img src="{{ $related->image_url }}" class="img-fluid rounded" alt="{{ $related->name }}">
                        </div>
                        <div class="col-6">
                            <h6 class="mb-2"><a href="#">{{ $related->name }}</a></h6>
                            @include('clients.components.includes.rating', ['product' => $related])
                            <div class="mb-1">
                                <h5 class="text-danger text-decoration-line-through">{{number_format($related->price +
                                    200,0,',','.')}}</h5>
                                <h5 class="fw-bold me-2">{{number_format($related->price,0,',','.')}}</h5>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center my-4">
                    <a href="#" class="btn btn-primary px-4 py-3 rounded-pill w100">View More</a>
                </div>
            </div>
            {{-- Cột phải --}}
            <div class="col-lg-7 col-xl-9 wow fadeInUp" data-wow-delay="0.1s">
                <div class="row g-4 single-product">
                    {{-- Product imgs --}}
                    <div class="col-xl-6">
                        <div class="single-carousel owl-carousel">
                            @foreach ($product->images as $image)
                            <div class="single-item"
                                data-dot="<img class='img-fluid' src='{{ asset('storage/' . $image->image) }}' alt='{{ $product->name }}'>">
                                <div class="single-inner bg-light rounded">
                                    <img src="{{ asset('storage/' . $image->image) }}" class="img-fluid rounded"
                                        alt="{{ $product->name }}">
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    {{-- Product detail --}}
                    <div class="col-xl-6">
                        <h4 class="fw-bold mb-3">{{$product->name}}</h4>
                        <p class="mb-3">{{ $product->manufacturer->name }} - {{$product->category->name}}</p>
                        <h5 class="fw-bold mb-3">{{number_format($product->price,0,',','.')}}</h5>
                        {{-- Star rating --}}
                        <div class="d-flex mb-2 align-content-center">
                            @for ($i = 1;$i <= 5; $i++)
                                @if ($i <= floor($averageRating))
                                    <i class="fas fa-star"></i>
                                @elseif($i == ceil($averageRating) && $averageRating - floor($averageRating) >= 0.5)
                                    <i class="fas fa-star-half-alt"></i>
                                @else
                                    <i class="far fa-star"></i>
                                @endif
                            @endfor
                            <span>{{$product->reviews->count()}} đánh giá</span>
                        </div>
                        {{-- Short Description --}}
                        <div class="d-flex flex-column mb-3">
                            <small>{{$product->status}}</small>
                            <small>Available: <strong class="text-primary">{{$product->stock}}</strong></small>
                        </div>
                        <p class="mb-4">{{$product->description}}</p>
                        {{-- Button quantity --}}
                        <div class="input-group quantity mb-5" style="width: 100px;">
                            <div class="input-group-btn">
                                <button class="btn btn-sm btn-minus rounded-circle bg-light border">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <input type="text" readonly data-max="{{ $product->stock }}"
                                class="form-control plus-minus-box form-control-sm text-center border-0" value="1">
                            <div class="input-group-btn">
                                <button class="btn btn-sm inc btn-plus rounded-circle bg-light border">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <a href="{{ route('cart.add') }}" data-id="{{ $product->id }}" data-bs-toggle="modal"
                            data-bs-target="#add_to_cart_modal-{{ $product->id }}"
                            class="add-to-cart-btn btn btn-primary border border-secondary rounded-pill px-4 py-2 mb-4 text-primary">
                            <i class="fa fa-shopping-bag me-2 text-white"></i> Thêm vào giỏ hàng
                        </a>
                    </div>
                    {{-- Description / Review --}}
                    <div class="col-lg-12">
                        <nav>
                            <div class="nav nav-tabs mb-3">
                                <button class="nav-link active border-white border-bottom-0" type="button" role="tab"
                                    id="nav-about-tab" data-bs-toggle="tab" data-bs-target="#nav-about"
                                    aria-controls="nav-about" aria-selected="true">Description</button>
                                <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                    id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                    aria-controls="nav-mission" aria-selected="false">Reviews</button>
                            </div>
                        </nav>
                        <div class="tab-content mb-5">
                            {{-- Detailed Description --}}
                            <div class="tab-pane active" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
                                <p>
                                    Mô tả sản phẩm:
                                    {{ $product->description }}
                                </p>
                                <b class="fw-bold">CPU: </b>
                                <p class="small">
                                    {{ $product->cpu }}
                                </p>
                                <b class="fw-bold">GPU: </b>
                                <p class="small">
                                    {{ $product->gpu }}
                                </p>
                                <b class="fw-bold">RAM: </b>
                                <p class="small">
                                    {{ $product->ram }}
                                </p>
                                <b class="fw-bold">Dung lượng lưu trữ: </b>
                                <p class="small">
                                    {{ $product->rom }}
                                </p>
                                <b class="fw-bold">Camera: </b>
                                <p class="small">
                                    {{ $product->camera }}
                                </p>
                                <b class="fw-bold">Thời lượng pin: </b>
                                <p class="small">
                                    {{ $product->battery }}
                                </p>
                                <b class="fw-bold">Kích thước màn hình: </b>
                                <p class="small">
                                    {{ $product->monitor_size }} </p>
                                <b class="fw-bold mb-0">Độ phân giải:</b>
                                <p class="small">{{$product->monitor_resolution}}</p>
                            </div>
                            {{-- Review --}}
                            <div class="tab-pane" id="nav-mission" role="tabpanel" aria-labelledby="nav-mission-tab">
                                <div class="ltn_comment-inner">
                                    @include('clients.components.includes.review-list', ['product' => $product])
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Form upload comment --}}
                    {{-- Có đăng nhập + đã mua + chưa review => hiển thị form bình luận --}}
                    @if (Auth::check() && $hasPurchased && !$hasReviewed)
                    <form id="review-form" data-product-id="{{ $product->id }}">
                        <h4 class="mb-5 fw-bold">Bình luận</h4>
                        <div class="row g-4">
                            <div class="col-lg-6">
                                <div class="border-bottom rounded">
                                    <input type="text" class="form-control border-0 me-4" value="{{ $user->name }}"
                                        placeholder="Tên của bạn">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="border-bottom rounded">
                                    <input type="email" class="form-control border-0" value="{{ $user->email }}"
                                        placeholder="Email của bạn">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="border-bottom rounded my-4">
                                    <textarea name="comment" id="review-content" class="form-control border-0" cols="30"
                                        rows="8" placeholder="Nhập đánh giá của bạn" spellcheck="false"></textarea>
                                </div>
                                <div id="review-error"></div> <!-- chỗ hiển thị lỗi -->
                            </div>
                            <div class="col-lg-12">
                                <div class="d-flex justify-content-between py-3 mb-5">
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0 me-3">Please rate:</p>
                                        <div class="d-flex align-items-center" style="font-size: 12px;">
                                            <ul class="d-flex list-unstyled mb-0">
                                                @for ($i = 1; $i <= 5; $i++) <li>
                                                    <a href="javascript:void(0)" style="display: inline"
                                                        class="rating-star" data-value="{{ $i }}">
                                                        <i class="far fa-star"></i>
                                                    </a>
                                                    </li>
                                                    @endfor
                                            </ul>
                                        </div>
                                    </div>
                                    <input type="hidden" name="rating" id="rating-value" value="0">
                                    <button type="submit"
                                        class="btn btn-primary border border-secondary text-primary rounded-pill px-4 py-3">
                                        Gửi
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- Single Products End -->
@include('clients.components.includes.include-modals')
@endsection