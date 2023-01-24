<div class="nav">
    @foreach ($contents['menu'] as $item)
        @if(!$loop->last)
            <div class="nav__item">
                <a href="/{{$lang}}/{{$item['uri']}}">
                    {{$item['text']}}
                </a>
            </div>
        @elseif($item['visibility'] != 'hide')
            <div class="nav__item nav__item-highlighted">
                <a href="/{{$lang}}/{{$item['uri']}}">
                    {{$item['text']}}
                </a>
            </div>
        @endif
    @endforeach
    <div class="nav__logo">
        <div class="nav__logo__title">
            {{ $contents['nav_logo_title'] }}
        </div>
        <div class="nav__logo__icon">
            <img src="{{URL::asset('/assets/icons/nav_icon.png')}}" alt="Altar logo">
        </div>
    </div>

    <div class="nav__language">
        <select class="nav__language__select" name="" id="">
            <option value="eng" @selected($lang == 'en')>ENG</option>
            <option value="geo" @selected($lang == 'ge')>ქარ</option>
        </select>
    </div>
</div>
