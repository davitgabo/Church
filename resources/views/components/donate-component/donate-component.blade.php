<div class="donate">
    <div class="container">
        <div class="donate__title">
            {{$contents['title'][0]['text']}}
        </div>
        <div class="row mb-5">
            <div class="col-xl-5 col-12">
                <a href="/{{$lang}}/payment">
                    <div class="donate__card d-flex align-items-center mb-5">
                        <img class="mr-2" src="{{ URL::asset('/assets/icons/card.png')}}">
                        <div class="donate__card__text ml-2">
                            @if($lang == 'ge')
                                <span class="underline">შემოწირე</span> ბარათით
                            @else
                                <span class="underline">Donate</span> with Card
                            @endif
                        </div>
                    </div>
                </a>

                <a href="/{{$lang}}/payment">
                    <div class="donate__card d-flex align-items-center mb-5">
                        <img class="mr-2" src="{{ URL::asset('/assets/icons/bank.png')}}">
                        <div class="donate__card__text ml-2">
                            @if($lang == 'ge')
                                <span class="underline">გადმორიცხე</span> ბანკით
                            @else
                                <span class="underline">Transfer</span> from Bank
                            @endif
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-2"></div>
            <div class="col-xl-5 col-12">
                <div class="donate__card d-flex align-items-center mb-5">
                    <img class="mr-2" src="{{ URL::asset('/assets/icons/paypal.png')}}">
                    <div class="donate__card__text ml-2 mt-2">
                        {{$contents['email'][0]['text']}}
                    </div>
                </div>

                <div class="donate__card__title mb-3 mt-2">
                    {{$contents['message'][0]['text']}}
                </div>
            </div>
        </div>
        <div class="donate__progress-bar">
            <div class="donate__progress-bar__amount">
                @if($lang == 'ge')
                    <span>{{ number_format($donated) }} ₾ </span> <span>ჩარიცხულია </span> <span>{{ number_format((float)$contents['amount'][0]['text']) }} ₾ დან</span>
                @else
                    <span>{{ number_format($donated) }} ₾ </span> <span>Raised of </span> <span>{{ number_format((float)$contents['amount'][0]['text']) }} ₾</span>
                @endif
            </div>
            <div class="donate__progress-bar__bar w-100">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: {{($donated/(float)$contents['amount'][0]['text'])*100}}%" aria-valuenow="{{($donated/(float)$contents['amount'][0]['text'])*100}}" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>

        <div class="donate__last-donations">
            <div class="donate__last-donations__title">
                {{$contents['list_title'][0]['text']}}
            </div>

            <div id="paginationData" style="display: none" class="donate__last-donations__list">
                @foreach($donations as $donation)

                    <div
                        class="donate__last-donations__list__item"
                    >
                            @if($donation->name_visibility)
                            <div>
                                {{$donation->first_name. ' ' . $donation->last_name}}
                            </div>
                            @else
                                <div class="hiddenData">
                                    {{ ($lang=='ge') ? 'დაფარული' : 'hidden'}}
                                </div>
                            @endif
                            @if($donation->comment_visibility)
                                <div>
                                    {{$donation->comment}}
                                </div>
                            @else
                                <div class="hiddenData">
                                    {{ ($lang=='ge') ? 'დაფარული' : 'hidden'}}
                                </div>
                            @endif
                            <div>

                                {{date('d-m-y',$donation->created_at->timestamp)}}
                            </div>
                            @if($donation->amount_visibility)
                                <div>
                                    {{$donation->amount}}
                                </div>
                            @else
                                <div class="hiddenData">
                                    {{ ($lang=='ge') ? 'დაფარული' : 'hidden'}}
                                </div>
                            @endif
                    </div>
                @endforeach
            </div>
            <div id="paginationVisibleData">

            </div>
            <div id="pagination"></div>
            <div id="showAllButton" class="donate__last-donations__list__show-all my-2 m-auto">
                <button onclick="showAll()">
                    <span class="underline">{{ ($lang=='ge') ? 'ნახე' : 'See'}}</span>
                    {{ ($lang=='ge') ? 'ყველა' : 'More'}}
                </button>
            </div>
        </div>
    </div>
</div>
<script src="/components/donate-component/donate-component.js"></script>
