<nav class="pagination">
        <ul class="pagination-list">
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li>
                                <a href="{{ $url }}" class="pagination-link is-current">{{ $page }}</a>
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="pagination-link">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </ul>
    </nav>