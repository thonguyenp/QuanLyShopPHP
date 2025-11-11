@foreach ($product->reviews as $review)
<div class="d-flex">
    <img src="{{ $review->user->avatar_url }}" class="img-fluid rounded-circle p-3" style="width: 100px; height: 100px;" alt="{{ $review->user->name }}">
    <div class="">
        <p class="mb-2" style="font-size: 14px;">{{$review->created_at->format('d/m/Y')}}</p>
        <div class="d-flex justify-content-between">
            <h5 class="me-2">{{$review->user->name}}</h5>
            <div class="d-flex mb-3">
                <ul class="d-flex list-unstyled mb-0">
                    @for ($i = 1; $i <= 5; $i++)
                        <li>
                            <a href="javascript:void(0)">
                                <i class="{{ $review->rating >= $i ? 'fas fa-star' : 'far fa-star' }}"></i>
                            </a>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
        <p>{{$review->comment}}</p>
    </div>
</div>
@endforeach