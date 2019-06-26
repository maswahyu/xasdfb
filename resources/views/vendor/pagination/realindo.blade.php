@if ($paginator->hasPages())
    <ul class="pager" >
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="pager__item disabled" aria-label="@lang('pagination.previous')">
                <a class="pager__link">
                &lsaquo;
                </a>
            </li>
        @else
            <li class="pager__item">
                <a class="pager__link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="pager__item disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="pager__item" aria-current="page"><span class="pager__link" style="background-color: #a67c28;color: white;">{{ $page }}</span></li>
                    @else
                        <li class="pager__item"><a class="pager__link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="pager__item">
                <a class="pager__link" href="{{ $paginator->nextPageUrl() }}">
                    &rsaquo;
                </a>
            </li>
        @else
            <li class="pager__item disabled">
                <a class="pager__link">&rsaquo;</a>
            </li>
        @endif
    </ul>
@endif
