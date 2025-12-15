<div class="nav">
    <div class="w-100">
        <div class="row">
            <div class="col-xl-1"></div>
            <a href="/{{$lang}}/home" class="col-lg-12 nav__logo-container-small">
                <div class="nav__logo d-flex align-items-center">
                    <div class="nav__logo__title mx-3">
                        <div>
                            {{ $contents['nav_logo_title'][0] }}
                        </div>
                        <div>
                            {{ $contents['nav_logo_title'][1] }}
                        </div>
                    </div>
                    <div class="nav__logo__icon">
                        <img src="{{URL::asset('/assets/icons/nav_icon.png')}}" alt="Altar logo">
                    </div>

                </div>
            </a>
            <div class="col-xl-4 col-lg-12">
                <div class="d-flex align-items-center h-100">
                    <div class="d-flex w-100 nav__item-container">
                        @foreach ($contents['menu'] as $item)
                            <div class="nav__item d-flex align-items-center justify-content-center mx-2">
                                <a href="/{{$lang}}/{{$item['uri']}}">
                                    {{$item['text']}}
                                </a>
                            </div>
                        @endforeach
                        @if($contents['donate'][0]['visibility'] != 'hide')
                            <div class="nav__item nav__item-highlighted d-flex align-items-center justify-content-center mx-2">
                                <a href="/{{$lang}}/{{$contents['donate'][0]['uri']}}">
                                    {{$contents['donate'][0]['text']}}
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <a href="/{{$lang}}/home" class="col-xl-5 nav__logo-container-big">
                <div class="nav__logo d-flex align-items-center">
                    <div class="nav__logo__title mx-3">
                        <div>
                            {{ $contents['nav_logo_title'][0] }}
                        </div>
                        <div>
                            {{ $contents['nav_logo_title'][1] }}
                        </div>
                    </div>
                    <div class="nav__logo__icon">
                        <img src="{{URL::asset('/assets/icons/nav_icon.png')}}" alt="Altar logo">
                    </div>

                </div>
            </a>

            <div class="nav__language col-xl-1 d-flex align-items-center">
                <div class="custom-select">
                    <select id="languageSelect">
                        <option value="en" @selected($lang == 'en')>ENG</option>
                        <option value="ge" @selected($lang == 'ge')>ქარ</option>
                        <option value="ru" @selected($lang == 'ru')>РУС</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="/components/header-component/header-component.js"></script>
