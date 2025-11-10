<!-- Cart Header -->
<div class="offcanvas-header">
    <h5 class="offcanvas-title" id="cartSidebarLabel">Giỏ hàng của bạn</h5>
    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
</div>

  <div class="offcanvas-body d-flex flex-column p-0" style="height:calc(100vh - 56px);">
    @php
    $subtotal = 0;
    @endphp
    <!-- Cart Items -->
    <div class="list-group flex-grow-1" style="overflow-y:auto;">
        <!-- Ví dụ 1 sản phẩm -->
            @if (!empty($cartItems) && count($cartItems) > 0)
            @foreach ($cartItems as $item)
            @php
            $product = auth()->check() ? $item->product : \App\Models\Product::find($item['product_id']); 
            $quantity = auth()->check() ? $item->quantity : $item['quantity']; 
            $subtotal += $quantity * $product->price;            
            @endphp
            <div class="list-group-item d-flex align-items-start border-0">
                {{-- Img --}}
                <div class="mini-cart-img position-relative" style="width:80px; height:80px; flex-shrink:0;">
                    <a href="javascript:void(0)">
                        <img src="{{ asset($product->images->first()->image_path ?? 'storage/upload/products/default-product.png') }}"
                            alt="{{ $product->name }}" class="img-thumbnail" style="width:100%; height:100%; object-fit:cover;">
                    </a>
                    <button data-id="{{ $product->id }}" class="mini-cart-item-delete btn btn-sm btn-danger" title="Xóa sản phẩm"
                        style="position:absolute; top:-5px; right:-5px; padding:0.25rem;">
                        <i class="fa fa-trash"></i>
                    </button>
                </div>
                {{-- Thông tin --}}
                <div class="mini-cart-info ml-3 flex-grow-1">
                    <h6 class="mb-1"><a href="product-details.html" class="text-decoration-none">{{$product->name}}</a></h6>
                    <span class="text-muted">{{$quantity}} x {{number_format($product->price,0,',','.')}}</span>
                </div>
            </div>
            @endforeach
            @else
            @endif
    </div>

    <!-- Cart Summary -->
    <div class="p-3 border-top">
        <div class="d-flex justify-content-between mb-3">
            <strong>Tổng tiền:</strong>
            <span>{{number_format($subtotal,0,',','.')}} VNĐ</span>
        </div>
        <div class="d-grid gap-2 mb-2">
            <a href="{{ route('cart.index') }}" class="btn btn-outline-primary btn-block">Xem giỏ hàng</a>
            <a href="checkout.html" class="btn btn-primary btn-block">Thanh toán</a>
        </div>
    </div>

</div>