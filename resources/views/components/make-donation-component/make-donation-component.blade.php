<div class="make-donation h-100">
    <div class="row h-100">
        <div class="col-xl-6">
            <div class="make-donation__form-section">
                <div class="make-donation__form-section__title">
                    {{$contents['title'][0]['text']}}
                </div>

                <div class="make-donation__form-section__form">
                    <form action="/donations/store" class="row" method="post">
                        @csrf
                        <input type="hidden" name="payment_title" value="{{$payment}}">
                        <div class="col-6 mt-4">
                            <input type="text" class="make-donation__form-section__form__input" name="amount" placeholder="{{ ($lang=='ge') ? "თანხა" : 'Amount'}}">
                        </div>
                        <div class="col-12 mt-4">
                            <div>
                                <input id="showDonation" type="checkbox" class="form-check-input" name="show_donation">
                                <label for="showDonation">{{ ($lang=='ge') ? "გახადე საჯარო" : 'My donation is public'}}</label>
                            </div>
                            <div>
                                <input id="showAmount" type="checkbox" class="form-check-input" name="show_amount">
                                <label for="showAmount">{{ ($lang=='ge') ? "ჩანდეს თანხა" : 'Show amount'}}</label>
                            </div>
                        </div>
                        <div class="col-6 mt-4">
                            <input type="text" class="make-donation__form-section__form__input" name="first_name" placeholder="{{ ($lang=='ge') ? "სახელი" : 'First Name'}}">
                            <input class="mt-2" id="showName" name="show_name" type="checkbox" class="form-check-input">
                            <label class="mt-2" for="showName">{{ ($lang=='ge') ? "ჩანდეს ჩემი სახელი" : 'Show my name in donations'}}</label>
                        </div>
                        <div class="col-6 mt-4">
                            <input type="text" class="make-donation__form-section__form__input" name="last_name" placeholder="{{ ($lang=='ge') ? "გვარი" : 'Last Name'}}">
                        </div>
                        <div class="col-12 mt-4">
                            <textarea id="" cols="30" rows="5" class="make-donation__form-section__form__input" name="comment" placeholder="{{ ($lang=='ge') ? "კომენტარი" : 'Comment'}}"></textarea>
                            <input class="mt-2" id="showComment" name="show_comment" type="checkbox" class="form-check-input">
                            <label class="mt-2" for="showComment">{{ ($lang=='ge') ? "აჩვენე ჩემი კომენტარი შემოწირულობებში" : 'Show my comment in donations'}}</label>
                        </div>
                        <button class="make-donation__form-section__form__submit-button mt-3" type="submit"> {{ ($lang=='ge') ? "შემოწირვა" : 'DONATE'}} </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="make-donation__info">
                <div class="mb-2 d-flex align-items-center">
                    <span class="span-width">{{ ($lang=='ge') ? "ბანკის ანგარიში" : 'Bank Account'}}:</span> <span class="mx-2" id="bankAccNo"> {{$contents['iban'][0]['text']}} </span> <span onclick="copy('bankAccNo')"><img src="{{ URL::asset('/assets/icons/copy.png')}}"> <span class="copy">copy</span></span>
                </div>
                <hr>
                <div class="mb-4 d-flex align-items-center">
                    <span class="span-width">{{ ($lang=='ge') ? "საგადახდო კოდი" : 'Payment Title'}}:</span> <span class="mx-2" id="paymentTitle">{{$payment}}</span> <span onclick="copy('paymentTitle')"><img src="{{ URL::asset('/assets/icons/copy.png')}}"> <span class="copy">copy</span></span>
                </div>
                <div class="make-donation__info__note">
                    {{$contents['payment_warning'][0]['text']}}: {{$payment}}
                </div>
            </div>
        </div>
    </div>

</div>
