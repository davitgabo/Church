<div class="nav">
    @php
        $menu_items = ['ტაძრის შესახებ', 'გალერეა', 'კონტაქტი', 'შემოწირე'];
        $nav_logo_title = 'ზუგდიდის ივერიის ყოვლაწმინდა ღვთისმშობლის სახელობის საკათედრო ტაძარი';
    @endphp

    @for ($i = 0; $i < count($menu_items); $i++)
        @if($i === count($menu_items) - 1)
            <div class="nav__item nav__item-highlighted">
                {{ $menu_items[$i] }}
            </div>
        @else
            <div class="nav__item">
                {{ $menu_items[$i] }}
            </div>
        @endif
    @endfor

    <div class="nav__logo">
        <div class="nav__logo__title">
            {{ $nav_logo_title }}
        </div>
        <div class="nav__logo__icon">
            <img src="{{URL::asset('/assets/icons/nav_icon.png')}}" alt="Altar logo">
        </div>
    </div>

    <div class="nav__language">
        <select class="nav__language__select" name="" id="">
            <option value="eng">ENG</option>
            <option value="geo">ქარ</option>
        </select>
    </div>
</div>
