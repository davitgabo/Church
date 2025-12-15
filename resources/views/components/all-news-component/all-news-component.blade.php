<div class="w-100 mt-5">
        <div class="row">
            <div class="col-xl-1"></div>
            <div class="col-12 col-xl-10">
                <div class="news-title-container p-2 p-sm-5 p-xl-0">
                    <div class="news-title-container__title-all-news">
                        {{$lang == 'ge' ? 'სიახლეები' : ($lang == 'en' ? 'News' : 'Новости')}}
                    </div>
                </div>
                <div class="news-container row">
                    <div class="col-0 col-sm-1"></div>
                    <div class="col-12 col-sm-10 news-container__inner">
                        @foreach($news as $newsItem)
                            <x-news-item-component.news-item-component :$newsItem :$lang />
                        @endforeach
                    </div>
                    <div class="col-0 col-sm-1"></div>
                    
                </div>
            </div>
            <div class="col-xl-1"></div>
        </div>

        @if ($news->hasPages())
            <div class="news-container__pagination d-flex justify-content-center mt-4 mb-5">

                @if ($news->onFirstPage())
                    <img src="{{ asset('assets/icons/arrow-left.png') }}" class="opacity-50">
                @else
                    <a href="{{ $news->previousPageUrl() }}">
                        <img src="{{ asset('assets/icons/arrow-left.png') }}">
                    </a>
                @endif

                @foreach ($news->links()->elements[0] ?? [] as $page => $url)
                    @if ($page == $news->currentPage())
                        <div class="news-container__pagination__item news-container__pagination__item--active">
                            {{ $page }}
                        </div>
                    @else
                        <a href="{{ $url }}" class="news-container__pagination__item">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach

                @if ($news->hasMorePages())
                    <a href="{{ $news->nextPageUrl() }}">
                        <img src="{{ asset('assets/icons/arrow-right.png') }}">
                    </a>
                @else
                    <img src="{{ asset('assets/icons/arrow-right.png') }}" class="opacity-50">
                @endif
            </div>
        @endif
    </div>