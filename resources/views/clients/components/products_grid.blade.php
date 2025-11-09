<div class="tab-content">
    <div id="tab-5" class="tab-pane fade show p-0 active">
        <div class="row g-4 product">
            @foreach ($products as $product)
            <div class="col-lg-4">
                <div class="product-item rounded wow fadeInUp" data-wow-delay="0.1s">
                    <div class="product-item-inner border rounded">
                        {{-- img --}}
                        <div class="product-item-inner-item">
                            <img src="{{ $product->image_url }}" class="img-fluid w-100 rounded-top"
                                alt="{{ $product->name }}">
                            <div class="product-new">New</div>
                            <div class="product-details">
                                <a href="{{ route('products.detail', $product->slug)}}"><i
                                        class="fa fa-eye fa-1x"></i></a>
                            </div>
                        </div>
                        {{-- content --}}
                        <div class="text-center rounded-bottom p-4">
                            <a href="#" class="d-block mb-2">{{$product->category->name}}</a>
                            <a href="{{ route('products.detail', $product->slug)}}"
                                class="d-block h4">{{$product->name}}</a>
                            <del class="me-2 fs-5">{{number_format($product->price + 200,
                                0,',','.')}}</del>
                            <span class="text-primary fs-5">{{number_format($product->price,
                                0,',','.')}}</span>
                        </div>
                    </div>
                    {{-- button --}}
                    <div class="product-item-add border border-top-0 rounded-bottom text-center p-4 pt-0">
                        <a href="#" class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4"
                            data-bs-toggle="modal"
                            data-bs-target="#add_to_cart_modal-{{ $product->id }}">
                            <i class="fas fa-shopping-cart me-2"></i> Add To Cart
                        </a>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex">
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star text-primary"></i>
                                <i class="fas fa-star"></i>
                            </div>
                            <a href="#" 
                                class="text-primary d-flex align-items-center justify-content-center me-0"
                                data-bs-toggle="modal"
                                data-bs-target="#liton_wishlist_modal-{{ $product->id }}">
                                <span class="rounded-circle btn-sm-square border">
                                    <i class="fas fa-heart"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="col-12 wow fadeInUp" data-wow-delay="0.1s">
                <div class="pagination-wrapper d-flex justify-content-center mt-5">
                    {!! $products->links('clients.components.pagination.pagination_custom') !!}
                </div>
            </div>
        </div>
    </div>
</div>

@foreach ($products as $product)
    @include('clients.components.includes.include-modals')
@endforeach
