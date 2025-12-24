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
    <form class="w-50 dashboard__sub-section__add-form" action="/store" method="post" enctype="multipart/form-data">
        <h5>სიახლეების დამატება</h5>
        @csrf
        <div class="d-flex">
            <img id="uploadedImage" src="#" alt="">
        </div>
        <label for="uploadImage" class="dashboard__sub-section__upload-label">
            <img src="{{URL::asset('/assets/icons/upload_img.png')}}" alt=""> ფოტოს დამატება
        </label>
        <input hidden type="file" name="image" class="form-control-file" id="uploadImage" onchange="readURL(this, 'uploadedImage');">
        <div class="my-3">
            <input class="form-control" type="text" name="news_title_ge" placeholder="სიახლის ქართული სათაური">
        </div>
        <div class="my-3">
            <input class="form-control" type="text" name="news_title_en" placeholder="სიახლის ინგლისური სათაური">
        </div>
        <div class="my-3">
            <input class="form-control" type="text" name="news_title_ru" placeholder="სიახლის რუსული სათაური">
        </div>
        <div class="my-3">
            <input class="form-control" name="subheader_ge" placeholder="სიახლის ქართული ქვესათაური"></input>
        </div>
        <div class="my-3">
            <input class="form-control" name="subheader_en" placeholder="სიახლის ინგლისური ქვესათაური"></input>
        </div>
        <div class="my-3">
            <input class="form-control" name="subheader_ru" placeholder="სიახლის რუსული ქვესათაური"></input>
        </div>
        <div class="my-3">
            <input class="form-control" type="text" name="text_ge" placeholder="სიახლის ქართული ტექსტი">
        </div>
        <div class="my-3">
            <input class="form-control" type="text" name="text_en" placeholder="სიახლის ინგლისური ტექსტი">
        </div>
        <div class="my-3">
            <input class="form-control" type="text" name="text_ru" placeholder="სიახლის რუსული ტექსტი">
        </div>
        <div class="my-3">
            <input class="form-check-input" id="videoUrl" type="checkbox" onclick="addVideoUrl()">
            <label for="videoUrl">თან ახლავს ვიდეო</label>
        </div>
        <div class="my-3" id="videoUrlContainer">
        </div>
        <div class="my-3">
            <input class="form-check-input" id="videoUrl" name="is_slider" type="checkbox" value="1">
            <label for="videoUrl">სლაიდერად დამატება</label>
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
    @foreach($contents['donate'] as $item)
        <x-dashboard-item-component.dashboard-item-component :$item />
    @endforeach
</div>
<div class="dashboard__sub-section">
    <h3 class="dashboard__sub-section__heading"> გადახდის გვერდი </h3>
    @foreach($contents['payment'] as $item)
        <x-dashboard-item-component.dashboard-item-component :$item />
    @endforeach
</div>
