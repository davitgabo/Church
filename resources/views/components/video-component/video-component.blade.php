<div>
    <h1> {{$slider['title']}}</h1>
    <iframe width="560" height="315" src="https://www.youtube.com/embed/{{$slider['video_id']}}"
            title="YouTube video player"
            frameborder="0"
            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
            allowfullscreen></iframe>
    <p>
        {{$slider['text']}}
    </p>
</div>
