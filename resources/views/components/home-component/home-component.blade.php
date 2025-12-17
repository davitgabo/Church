<div class="home">
    <div class="row h-100 flex-column-reverse flex-xl-row">
        <div class="col-xl-5 col-12">
            <div class="home__text-section container-lg">
                <div class="home__text-section__text-slider">
                    <div id="carouselText" class="carousel slide carousel-fade" data-pause="true" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($contents['slider'] as $slider)
                                @if($slider['is_slider'])
                                    @if ($loop->first)
                                        <div class="carousel-item home__text-section__text-slider__text active"
                                            data-bs-interval="10000">
                                    @else
                                                <div class="carousel-item home__text-section__text-slider__text"
                                                    data-bs-interval="10000">
                                    @endif
                                                    <div class="home__text-section__title">
                                                        {{$slider['news_title']}}
                                                        
                                                    </div>
                                                    <div class="home__text-section__text-slider__text-desc">
                                                        {{$slider['text']}}
                                                    </div>
                                                    
                                                </div>
                                @endif  
                            @endforeach
                        </div>
                    </div>
                    <div class="home__slider-indicators">
                            @if(count($contents['slider'])>1)
                                @foreach($contents['slider'] as $value)
                                    @if($value['is_slider'])
                                        @if($loop->first)
                                            <div class="home__slider-indicator home__slider-indicator__active" onclick="slideTo('{{$loop->index}}')"></div>
                                        @else
                                            <div class="home__slider-indicator" onclick="slideTo('{{$loop->index}}')"></div>
                                        @endif
                                    @endif 
                                @endforeach
                            @endif
                    </div>
                </div>
                    @if($contents['donate'][0]['visibility'] != 'hide')
                        <div class="home__text-section__donate">
                            <a href="/{{$lang}}/{{$contents['Make donation'][0]['uri']}}">
                                <div class="home__text-section__donate__part-one">
                                    {{$contents['Make donation'][0]['text']}} <img
                                        src="{{ URL::asset('/assets/icons/arrow_long_right.png')}}"
                                        alt="Arrow pointing right">
                                </div>
                                <div class="home__text-section__donate__part-two">
                                    {{$contents['Make donation'][1]['text']}}
                                </div>
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-xl-7 col-12">
                <div id="imageCarousel" class="carousel slide carousel-fade h-100" data-pause="false"
                     data-ride="carousel">
                    <div class="carousel-inner h-100">
                        @foreach($contents['slider'] as $slider)
                            @if($slider['is_slider'])
                            
                            @if ($loop->first)
                                <div class="carousel-item carousel-item-count active" data-bs-interval="10000">
                            @else
                                <div class="carousel-item carousel-item-count" data-bs-interval="10000">
                            @endif
                                    <div class="carousel-item__img-container position-relative">
                                        <div class="news-tag position-absolute">
                                        {{$lang == 'ge' ? 'სიახლე' : ($lang == 'en' ? 'News' : 'Новость')}}
                                        </div>
                                        <img class="h-100" src="/assets/images/{{$slider['uri']}}" alt="">
                                        @if($slider['video_id'])
                                            <a class="video__url" href="/{{$lang}}/news/{{$slider['id']}}">
                                                <img class="video-icon" src="/assets/icons/outline-green-triangle.png" alt="">
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            @endif 
                        @endforeach
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-100 mt-5">
        <div class="row">
            <div class="col-xl-1"></div>
            <div class="col-12 col-xl-10">
                <div class="news-title-container p-2 p-sm-5 p-xl-0">
                    <div class="news-title-container__title-news">
                    {{$lang == 'ge' ? 'სიახლეები' : ($lang == 'en' ? 'News' : 'Новости')}}
                    </div>
                    <div class="news-title-container__all-news">
                        <a href="/{{$lang}}/all-news">{{$lang == 'ge' ? 'ყველა სიახლე' : ($lang == 'en' ? 'All News' : 'Все Новости')}}</a>
                    </div>
                </div>
                <div class="news-container row">
                    <div class="col-0 col-sm-1"></div>
                    <div class="col-12 col-sm-10 news-container__inner">
                        @foreach($homeNews as $newsItem)
                            <x-news-item-component.news-item-component :$newsItem :$lang />
                        @endforeach
                    </div>
                    <div class="col-0 col-sm-1"></div>
                    
                </div>
            </div>
            <div class="col-xl-1"></div>
        </div>

        @if ($homeNews->hasPages())
            <div class="news-container__pagination d-flex justify-content-center mt-4 mb-5">

                @if ($homeNews->onFirstPage())
                    <img src="{{ asset('assets/icons/arrow-left.png') }}" class="opacity-50">
                @else
                    <a href="{{ $homeNews->previousPageUrl() }}">
                        <img src="{{ asset('assets/icons/arrow-left.png') }}">
                    </a>
                @endif

                @foreach ($homeNews->links()->elements[0] ?? [] as $page => $url)
                    @if ($page == $homeNews->currentPage())
                        <div class="news-container__pagination__item news-container__pagination__item--active">
                            {{ $page }}
                        </div>
                    @else
                        <a href="{{ $url }}" class="news-container__pagination__item">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach

                @if ($homeNews->hasMorePages())
                    <a href="{{ $homeNews->nextPageUrl() }}">
                        <img src="{{ asset('assets/icons/arrow-right.png') }}">
                    </a>
                @else
                    <img src="{{ asset('assets/icons/arrow-right.png') }}" class="opacity-50">
                @endif
            </div>
        @endif
    </div>
</div>
<script src="/components/home-component/home-component.js"></script>

