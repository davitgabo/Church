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
    <form action="/store" method="post" enctype="multipart/form-data">
        @csrf
        <span>GE:</span> <textarea name="text_ge"></textarea>
        <span>EN:</span> <textarea name="text_en"></textarea>
        <span>Image</span><input type="file" name="image">
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
