<div class="container">
    <div class="news-page-tag">
        {{$lang == 'ge' ? 'სიახლე' : ($lang == 'en' ? 'News' : 'Новость')}}
    </div>
    <div class="video__title">
        {{$slider['title']}}
    </div>
    <div class="video__date">
        {{ $slider['created_at'] ? $slider['created_at']->format('d/m/Y') : '' }}
    </div>
    <div class="video__iframe d-flex justify-content-center">
        @if($slider['video_id'])
            <iframe src="https://www.youtube.com/embed/{{$slider['video_id']}}"
                    title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
        @elseif($slider['uri'])
            <img src="{{ URL::asset('/assets/images/'.$slider['uri'])}}" alt="">
        @endif
    </div>
    <div class="video__desc">
        @if($slider['video_id'])
            {{$slider['text']}}
        @elseif($slider['uri'])
            {{$slider['subheader']}}
        @endif
    </div>
    @if(!$slider['video_id'])
        <div class="video__text">
            {{$slider['text']}}
        </div>
    @endif

</div>
