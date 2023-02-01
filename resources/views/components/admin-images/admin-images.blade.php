<div>
    <div class="dashboard__sub-section">
        <h3 class="dashboard__sub-section__heading"> მთავარი გვერდი </h3>

        @foreach($sliders as $item)
            <form action="/slider/change/{{$item->id}}" method="post" enctype="multipart/form-data">
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
        <form action="/slider/change/{{$contents['about'][3]['id']}}" method="post" enctype="multipart/form-data">
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
        <form action="/gallery/change/{{$image->id}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <label for="changeImage_{{$loop->index}}">
                <img class="gallery-img" src="/assets/images/sameba.jpg" alt="">
            </label>
            <span>GE:</span> <textarea name="desc_ge">{{$image->desc_ge}}</textarea>
            <span>EN:</span> <textarea name="desc_en">{{$image->desc_en}}</textarea>
            <input  type="file" name="image" class="form-control-file" id="changeImage_{{$loop->index}}">
            <button type="submit" class="btn btn-success">შეცვლა</button>
        </form>
            <form action="/gallery/delete/{{$image->id}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">წაშლა</button>
            </form>
        @endforeach

        <form action="/gallery/store" method="post" enctype="multipart/form-data">
            @csrf
            <label for="uploadImage"> ფოტოს დამატება </label>
            <input type="file" name="image" class="form-control-file" id="uploadImage">
            <input type="text" name="desc_ge" >
            <input type="text" name="desc_en" >
            <button type="submit" class="btn btn-primary">დამატება</button>
        </form>
    </div>
</div>
