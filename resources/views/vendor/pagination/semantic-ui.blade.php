@if ($paginator->hasPages())
    <div class="ui pagination menu" role="navigation">
        {{-- Previous Page Link --}}

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="icon item-p disabled" aria-disabled="true">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="item-p active" href="{{ $url }}" aria-current="page">{{ $page }}</a>
                    @else
                        <a class="item-p" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

    </div>
@endif
