@if ($paginator->hasPages())
    <div class="pagination">
        @if ($paginator->onFirstPage())
            <a href="#" class="disable rounded">&laquo;</a>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pagination-link rounded">&laquo;</a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <a href="#" class="disable"><span>{{$element}}</span></a>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a href="javascript:void(0)" class="active rounded">{{$page}}</a>
                    @else
                        <a href="{{ $url }}" class="pagination-link rounded">{{$page}}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination-link rounded">&raquo;</a>
        @else
            <a href="#" class="disable rounded">&raquo;</a>
        @endif
    </div>    
@endif
