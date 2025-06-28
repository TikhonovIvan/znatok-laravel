@if ($paginator->hasPages())
    <div class="main__pagination__wrapper" data-aos="fade-up">
        <ul class="main__page__pagination">

            {{-- Предыдущая страница --}}
            @if ($paginator->onFirstPage())
                <li><a class="disable" href="#"><i class="icofont-double-left"></i></a></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}"><i class="icofont-double-left"></i></a></li>
            @endif

            {{-- Номера страниц --}}
            @foreach ($elements as $element)
                {{-- Разделитель "..." --}}
                @if (is_string($element))
                    <li><a class="disable" href="#">{{ $element }}</a></li>
                @endif

                {{-- Ссылки на страницы --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><a class="active" href="#">{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Следующая страница --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}"><i class="icofont-double-right"></i></a></li>
            @else
                <li><a class="disable" href="#"><i class="icofont-double-right"></i></a></li>
            @endif

        </ul>
    </div>
@endif
