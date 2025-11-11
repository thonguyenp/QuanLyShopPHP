<div class="d-flex mb-2 align-content-center">
    @for ($i = 1;$i <= 5; $i++) 
        @if ($i <=floor($product->average_rating)) 
            <i class="fas fa-star"></i>
        @elseif($i == ceil($product->average_rating) && $product->average_rating - floor($product->average_rating) >= 0.5)
            <i class="fas fa-star-half-alt"></i>
        @else
            <i class="far fa-star"></i>
        @endif
        @endfor
    <span>{{$product->reviews->count()}} đánh giá</span>
</div>