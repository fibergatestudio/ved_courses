@if ($paginator->hasPages())
    <div class="groups-footer groups-footer_style ug__footer-pagination-margin">
        <div class="groops-pagination">
            <div class="groops-pagination__btn-previous">
            <a class="groops-pagination__btn-previous{{ $paginator->previousPageUrl()=='' ? '_not-active' : ''}}"
                href="{{ $paginator->previousPageUrl() }}">Назад</a>
            </div>
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <div class="groops-pagination__pagination-item">{{ $element }}</div>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <div class="groops-pagination__pagination-item groops-pagination__pagination-item_style">
                                <a class="groops-pagination__pagination-item_active" href="#">
                                    {{ $page }}
                                </a>
                            </div>
                        @else
                            <div class="groops-pagination__pagination-item groops-pagination__pagination-item_style">
                                <a href="{{ $url }}">{{ $page }}</a>
                            </div>
                        @endif
                    @endforeach
                @endif
            @endforeach
            <div class="groops-pagination__btn-forward">
                <a class="groops-pagination__btn-previous{{ $paginator->nextPageUrl()=='' ? '_not-active' : ''}}"
                    href="{{ $paginator->nextPageUrl() }}">Вперед</a>
            </div>
        </div>

    </div>
@endif
