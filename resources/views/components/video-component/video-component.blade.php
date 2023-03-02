<div class="container">
    <div class="video__title">
        {{$slider['title']}}
    </div>
    <div class="video__iframe">
        <iframe src="https://www.youtube.com/embed/{{$slider['video_id']}}"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
    </div>
    <div class="video__desc">
        {{$slider['text']}}

    </div>
</div>
