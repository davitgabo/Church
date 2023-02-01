<div>
    <div class="dashboard__sub-section">
        <h3 class="dashboard__sub-section__heading"> მთავარი გვერდი </h3>

        @foreach($sliders as $item)
            <form action="/" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <label for="sliderImage_{{$loop->index}}"><img class="gallery-img" src="/assets/images/{{$item->uri}}" alt=""></label>
                <input type="file" name="image" class="form-control-file" id="sliderImage_{{$loop->index}}">
                <button type="submit" class="btn btn-success">შეცვლა</button>
            </form>
        @endforeach
    </div>

    <div class="dashboard__sub-section">
        <h3 class="dashboard__sub-section__heading"> ჩვენს შესახებ </h3>
        <form action="/" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="aboutImage"><img class="gallery-img" src="/assets/images/{{$contents['about'][3]['uri']}}" alt=""></label>
            <input type="file" name="image" class="form-control-file" id="aboutImage">
            <button type="submit" class="btn btn-success">შეცვლა</button>
        </form>
    </div>

    <div class="dashboard__sub-section">
        <h3 class="dashboard__sub-section__heading"> გალერეა </h3>

        @foreach($images as $image)
        <form action="/" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="changeImage_{{$loop->index}}">
                <img class="gallery-img" src="/assets/images/sameba.jpg" alt="">
            </label>
            <input hidden type="file" name="image" class="form-control-file" id="changeImage_{{$loop->index}}">
            <button type="submit" class="btn btn-success">შეცვლა</button>
            <button type="submit" class="btn btn-danger">წაშლა</button>
        </form>
        @endforeach

        <form action="/" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="uploadImage"> ფოტოს დამატება </label>
            <input type="file" name="image" class="form-control-file" id="uploadImage">
            <button type="submit" class="btn btn-primary">დამატება</button>
        </form>
    </div>
</div>
