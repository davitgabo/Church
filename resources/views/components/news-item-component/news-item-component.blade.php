<a href="{{'news/'.$newsItem->id}}">
    <div class="news-container__item d-flex flex-xl-row flex-column gap-xl-5 position-relative">
        <div class="news-container__item__img align-self-center align-self-xl-start">
            <img src="{{ URL::asset('/assets/images/'.$newsItem->uri)}}" alt="">
        </div>
        <div class="news-container__item__text p-2 p-sm-0">    
            <div class="news-container__item__text__date mt-3 mt-xl-0">
                {{ $newsItem->created_at?->format('d/m/Y') }}
            </div>
            <div class="news-container__item__text__title">
                {{ $newsItem['news_title_'.$lang] }}
            </div>
            <div class="news-container__item__text__desc">
                {{ $newsItem->description }}
            </div>
            <div class="news-container__item__text__read-more position-absolute bottom-0">
                <span>{{$lang == 'ge' ? 'წაკითხვა' : ($lang == 'en' ? 'Read More' : 'Читать Далее')}}</span><img
                    src="{{ URL::asset('/assets/icons/arrow_long_right.png')}}"
                    alt="Arrow pointing right">
            </div>
        </div>
    </div>
</a>