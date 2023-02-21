<div class="gallery">
    <div class="container">
        <div class="gallery__title">
            გალერეა
        </div>

    </div>
    <div class="gallery__img-container">
        <div id="mygallery">
            @foreach($images as $image)
            <a href="/assets/images/{{$image->name}}" data-caption="{{($lang == 'ge') ? $image->desc_ge : $image->desc_en}}">
                <img class="gallery__img" src="/assets/images/{{$image->name}}"/>
            </a>
            @endforeach
        </div>
        <div id="navigationDiv" style="position: absolute; bottom: 0.375rem; left: 0; background-color: white">

        </div>
    </div>
</div>

<script src="/components/gallery-component/gallery-component.js"></script>
