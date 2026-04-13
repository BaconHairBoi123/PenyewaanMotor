@if ($paginator->hasPages())
    <ul class="pg-pagination list-unstyled d-flex justify-content-center align-items-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><a href="javascript:void(0)" style="opacity: 0.5; pointer-events: none;"><i class="fas fa-angle-left"></i></a></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}"><i class="fas fa-angle-left"></i></a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><a href="javascript:void(0)" style="opacity: 0.5; pointer-events: none;">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><a href="javascript:void(0)">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}"><i class="fas fa-angle-right"></i></a></li>
        @else
            <li class="disabled"><a href="javascript:void(0)" style="opacity: 0.5; pointer-events: none;"><i class="fas fa-angle-right"></i></a></li>
        @endif
    </ul>
@endif
