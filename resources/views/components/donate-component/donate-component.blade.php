<div class="donate">
    <div class="container">
        <div class="donate__title">
            გააკეთე შემოწირვა
        </div>
        <div class="row mb-5">
            <div class="col-5">
                <div class="donate__card d-flex align-items-center">
                    <img class="mr-2" src="{{ URL::asset('/assets/icons/card.png')}}">
                    <div class="donate__card__text ml-2">
                        <span class="underline">შემოწირე</span> ბარათით
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
            <div class="col-5">
                <div class="donate__card d-flex align-items-center">
                    <img class="mr-2" src="{{ URL::asset('/assets/icons/paypal.png')}}">
                    <div class="donate__card__text ml-2 mt-2">
                        donations@ioverionchurch.ge
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-5">
                <div class="donate__card d-flex align-items-center">

                    <div class="donate__card__text ml-2">
                        <span class="underline">გადმორიცხე</span> ბანკით
                    </div>
                </div>
            </div>
            <div class="col-2"></div>
            <div class="col-5">
                <div class="donate__card__title">
                    შენი შემოწირულობა
                    მნიშვნელოვანია
                </div>
            </div>
        </div>


        <div class="donate__progress-bar">
            <div class="donate__progress-bar__amount">
                300 ₾ ჩარიცხულია 200,000 ₾ დან
            </div>
            <div class="donate__progress-bar__bar w-100">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>

        <div class="donate__last-donations">
            <div class="donate__last-donations__title">
                ბოლო შემოწირულობები
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
                                    hidden
                                </div>
                            @endif
                            @if($donation->comment_visibility)
                                <div>
                                    {{$donation->comment}}
                                </div>
                            @else
                                <div class="hiddenData">
                                    hidden
                                </div>
                            @endif
                            <div>
                                {{$donation->created_at}}
                            </div>
                            @if($donation->amount_visibility)
                                <div>
                                    {{$donation->amount}}
                                </div>
                            @else
                                <div class="hiddenData">
                                   hidden
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
                    <span class="underline">ნახე</span> ყველა
                </button>
            </div>
        </div>
    </div>
</div>
<script src="/components/donate-component/donate-component.js"></script>
