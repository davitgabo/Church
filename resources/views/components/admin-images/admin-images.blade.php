<div class="dashboard__sub-section">
    <h3 class="dashboard__sub-section__heading"> მთავარი გვერდი </h3>
    <div class="row">
        @foreach($sliders as $item)
            <div class="col-4">
                <div class="d-flex flex-column dashboard__sub-section__edit-form">
                    <form action="/slider/change/{{$item->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label class="dashboard__sub-section__change-image my-1 d-flex justify-content-center" for="sliderImage_{{$loop->index}}">
                            <img id="sliderImageRe_{{$loop->index}}" class="gallery-img" src="/assets/images/{{$item->uri}}" alt="">
                        </label>
                        <input hidden type="file" name="image" class="form-control-file" id="sliderImage_{{$loop->index}}" onchange="readURL(this, 'sliderImageRe_' + {{$loop->index}});">
                        <div class="my-2 d-flex">
                            <span class="mr-2">GE:</span> <div class="dashboard__sub-section__edit-form__text">{{$item->text_ge}}</div>
                        </div>
                        <div class="my-2 d-flex">
                            <span class="mr-2">EN:</span> <div class="dashboard__sub-section__edit-form__text">{{$item->text}}</div>
                        </div>
                        <div class="my-2 d-flex">
                            <span class="mr-2">RU:</span> <div class="dashboard__sub-section__edit-form__text">{{$item->text_ru}}</div>
                        </div>
                        <button type="submit" class="btn btn-success">შეცვლა</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

</div>

<div class="dashboard__sub-section">
    <h3 class="dashboard__sub-section__heading"> ჩვენს შესახებ </h3>
    <form action="/slider/change/{{$contents['about'][3]['id']}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label class="dashboard__sub-section__change-image" for="aboutImage">
            <img id="aboutImg" class="gallery-img" src="/assets/images/{{$contents['about'][3]['uri']}}" alt="">
        </label>
        <input hidden type="file" name="image" class="form-control-file" id="aboutImage" onchange="readURL(this, 'aboutImg');">
        <button type="submit" class="btn btn-success">შეცვლა</button>
    </form>
</div>

<div class="dashboard__sub-section">
    <h3 class="dashboard__sub-section__heading"> გალერეა </h3>
    <div class="row">
        @foreach($images as $image)
            <div class="col-4">
                <div class="d-flex flex-column dashboard__sub-section__edit-form">
                    <form id="pic_edit_{{$image->id}}" class="d-flex flex-column" action="/gallery/change/{{$image->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label class="dashboard__sub-section__change-image my-1 d-flex justify-content-center" for="changeImage_{{$loop->index}}">
                            <img id="galleryImageRe_{{$loop->index}}" class="gallery-img" src="/assets/images/{{$image->name}}" alt="">
                        </label>
                        <div class="my-2 d-flex">
                            <span class="mr-2">GE:</span> <textarea class="form-control" cols="25" rows="3" name="desc_ge">{{$image->desc_ge}}</textarea>
                        </div>
                        <div class="my-2 d-flex">
                            <span class="mr-2">EN:</span> <textarea class="form-control" name="desc_en">{{$image->desc_en}}</textarea>
                        </div>
                        <div class="my-2 d-flex">
                            <span class="mr-2">RU:</span> <textarea class="form-control" name="desc_en">{{$image->desc_ru}}</textarea>
                        </div>
                        <input hidden type="file" name="image" class="form-control-file" onchange="readURL(this, 'galleryImageRe_' + {{$loop->index}});" id="changeImage_{{$loop->index}}">
                    </form>
                    <form id="pic_delete_{{$image->id}}" action="/gallery/delete/{{$image->id}}" method="post">
                        @csrf
                        @method('DELETE')
                    </form>
                    <div class="d-flex my-2">
                        <button form="pic_edit_{{$image->id}}" type="submit" class="btn btn-success dashboard__sub-section__edit-btn">შეცვლა</button>
                        <button form="pic_delete_{{$image->id}}" type="submit" class="btn btn-danger ml-2">წაშლა</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <form class="w-50 dashboard__sub-section__add-form" action="/gallery/store" method="post" enctype="multipart/form-data">
        @csrf
        <div class="d-flex">
            <img id="uploadedImage" src="#" alt="">
        </div>
        <label for="uploadImage" class="dashboard__sub-section__upload-label">
            <img src="{{URL::asset('/assets/icons/upload_img.png')}}" alt=""> ფოტოს დამატება
        </label>
        <input hidden type="file" name="image" class="form-control-file" id="uploadImage" onchange="readURL(this, 'uploadedImage');">
        <div class="my-3">
            <input class="form-control" type="text" name="desc_ge" placeholder="სურათის ქართული აღწერა">
        </div>
        <div  class="my-3">
            <input class="form-control" type="text" name="desc_en" placeholder="სურათის ინგლისური აღწერა">
        </div>
        <div  class="my-3">
            <input class="form-control" type="text" name="desc_ru" placeholder="სურათის რუსული აღწერა">
        </div>
        <button type="submit" class="btn btn-primary">დამატება</button>
    </form>

</div>
