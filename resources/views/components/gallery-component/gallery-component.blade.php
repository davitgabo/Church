<div class="container" style="position: relative">
    <div class="" style="height: 100%; position:relative;">
        <div id="mygallery" style="height: 100%;">
            @foreach($images as $image)
            <a href="{{URL::asset('/assets/images/1675333418sameba.jpg')}}">
                <img alt="Title 1" style="height: 300px" src="/assets/images/{{$image->name}}"/>
            </a>
            @endforeach
        </div>
        <div id="navigationDiv" style="position: absolute; bottom: 2rem; left: 0; background-color: white">dsaaaaaaaaaaaaaaaaaa</div>
    </div>

</div>

<script src="/components/gallery-component/gallery-component.js"></script>
