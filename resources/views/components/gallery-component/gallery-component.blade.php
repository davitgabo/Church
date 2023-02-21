<div class="gallery">
    <div class="container">
        <div class="gallery__title">
            {{$contents['title'][0]['text']}}
        </div>

    </div>
    <div class="" style="height: 100%; position:relative;">
        <div id="mygallery" style="height: 100%; width: 80%">
            @foreach($images as $image)
            <a href="/assets/images/{{$image->name}}" style="margin-right: 3rem" data-caption="{{($lang == 'ge') ? $image->desc_ge : $image->desc_en}}">
                <img style="height: 300px" src="/assets/images/{{$image->name}}"/>
            </a>
            @endforeach
        </div>
        <div id="navigationDiv" style="position: absolute; bottom: 0.375rem; left: 0; background-color: white">

        </div>
    </div>
</div>

<script src="/components/gallery-component/gallery-component.js"></script>
