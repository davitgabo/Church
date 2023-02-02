<div class="dashboard__sub-section">
    <h3 class="dashboard__sub-section__heading"> ნავიგაცია </h3>
    @foreach($contents['all'] as $item)
        <x-dashboard-item-component.dashboard-item-component :$item />
    @endforeach
</div>
<div class="dashboard__sub-section">
    <h3 class="dashboard__sub-section__heading"> მთავარი გვერდი </h3>
    @foreach($contents['home'] as $item)
        <x-dashboard-item-component.dashboard-item-component :$item />

    @endforeach
{{--    <form action="/store" method="post" enctype="multipart/form-data">--}}
{{--        @csrf--}}
{{--        <span>GE:</span> <textarea name="text_ge"></textarea>--}}
{{--        <span>EN:</span> <textarea name="text_en"></textarea>--}}
{{--        <span>Image</span><input type="file" name="image">--}}
{{--        <button type="submit" class="btn btn-primary">დამატება</button>--}}
{{--    </form>--}}
    <form class="w-50 dashboard__sub-section__add-form" action="/store" method="post" enctype="multipart/form-data">
        <h5>სლაიდერის ინფორმაცია</h5>
        @csrf
        <div class="d-flex">
            <img id="uploadedImage" src="#" alt="">
        </div>
        <label for="uploadImage" class="dashboard__sub-section__upload-label">
            <img src="{{URL::asset('/assets/icons/upload_img.png')}}" alt=""> ფოტოს დამატება
        </label>
        <input hidden type="file" name="image" class="form-control-file" id="uploadImage" onchange="readURL(this);">
        <div class="my-3">
            <input class="form-control" type="text" name="text_ge" placeholder="სლაიდერის ქართული ტექსტი">
        </div>
        <div  class="my-3">
            <input class="form-control" type="text" name="text_en" placeholder="სლაიდერის ინგლისური ტექსტი">
        </div>
        <button type="submit" class="btn btn-primary">დამატება</button>
    </form>
</div>
<div class="dashboard__sub-section">
    <h3 class="dashboard__sub-section__heading"> ტაძრის შესახებ </h3>
    @foreach($contents['about'] as $item)
        <x-dashboard-item-component.dashboard-item-component :$item />
    @endforeach
</div>
<div class="dashboard__sub-section">
    <h3 class="dashboard__sub-section__heading"> კონტაქტის გვერდი </h3>
    @foreach($contents['contact'] as $item)
        <x-dashboard-item-component.dashboard-item-component :$item />
    @endforeach
</div>
<div class="dashboard__sub-section">
    <h3 class="dashboard__sub-section__heading"> დონაციის გვერდი </h3>
    {{--                    @foreach($contents['donate'] as $item)--}}
    {{--                        <x-dashboard-item-component.dashboard-item-component :$item /> --}}
    {{--                    @endforeach--}}
</div>
