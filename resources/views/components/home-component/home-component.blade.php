<div class="home">
    <div class="row h-100">
        <div class="col-xl-5">
            <div class="home__text-section">
                <div class="home__text-section__title">
                    {{$contents['title'][0]['text']}}
                </div>
                <div class="home__text-section__text-slider">
                    <div id="carouselText" class="carousel slide carousel-fade" data-pause="false" data-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($contents['slider'] as $slider)
                                @if ($loop->first)
                                    <div class="carousel-item home__text-section__text-slider__text active" data-bs-interval="5000">
                                @else
                                    <div class="carousel-item home__text-section__text-slider__text" data-bs-interval="5000">
                                @endif
                                        {{$slider['text']}}
                                    </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="home__slider-indicators">
                        <div class="home__slider-indicator home__slider-indicator__active"></div>
                        <div class="home__slider-indicator"></div>
                        <div class="home__slider-indicator"></div>
                    </div>
                </div>
                    @if($contents['donate'][0]['visibility'] != 'hide')
                <div class="home__text-section__donate">
                    <a href="/{{$lang}}/{{$contents['Make donation'][0]['uri']}}">
                        <div class="home__text-section__donate__part-one">
                            {{$contents['Make donation'][0]['text']}} <img src="{{ URL::asset('/assets/icons/arrow_long_right.png')}}" alt="Arrow pointing right">
                        </div>
                        <div class="home__text-section__donate__part-two">
                            {{$contents['Make donation'][1]['text']}}
                        </div>
                    </a>
                </div>
                    @endif
            </div>
        </div>

        <div class="col-xl-7">
            <div id="imageCarousel" class="carousel slide carousel-fade h-100" data-pause="false" data-ride="carousel">
                <div class="carousel-inner h-100">
                    @foreach($contents['slider'] as $slider)
                        @if ($loop->first)
                            <div class="carousel-item carousel-item-count active h-100" data-bs-interval="5000">
                        @else
                            <div class="carousel-item carousel-item-count h-100" data-bs-interval="5000">
                        @endif
                                <div class="h-100" style="background-image: url('/assets/images/{{$slider['uri']}}')"></div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

