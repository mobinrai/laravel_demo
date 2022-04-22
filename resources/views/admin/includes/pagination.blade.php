@if ($paginator->hasPages())
    <ul class="pager list-inline d-flex mt-1">
        @if ($paginator->onFirstPage())
            <li class="disabled pe-1"><span>← Previous</span></li>
        @else
            <li>
                <a class="pe-1" href="{{ $paginator->previousPageUrl() }}" rel="prev">← Previous</a> 
            </li>
        @endif
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active pe-1"><span>{{ $page }}</span></li>
                    @else
                        <li><a class="pe-1" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())
            <li><a class="" href="{{ $paginator->nextPageUrl() }}" rel="next">Next →</a></li>
        @else
            <li class="disabled"><span>Next →</span></li>
        @endif
    </ul>
@endif

