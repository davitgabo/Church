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
                            <input type="text" class="make-donation__form-section__form__input" name="amount" placeholder="{{ ($lang=='ge') ? "ოდენობა" : 'amount'}}">
                        </div>
                        <div class="col-6 mt-4">
                            <input id="showDonation" type="checkbox" class="form-check-input" name="show_donation">
                            <label for="showDonation">{{ ($lang=='ge') ? "გახადე საჯარო" : 'My donation is public'}}</label>
                            <input id="showAmount" type="checkbox" class="form-check-input" name="show_amount">
                            <label for="showAmount">{{ ($lang=='ge') ? "ჩანდეს თანხა" : 'Show amount'}}</label>
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
                        <button type="submit"> {{ ($lang=='ge') ? "გაგზავნა" : 'Comment'}} </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="make-donation__info">
                <div class="mb-2">
                    Bank Account: <span id="bankAccNo">GE00TB000000000000</span> <span onclick="copy('bankAccNo')">copy</span>
                </div>
                <hr>
                <div class="mb-4">
                    Payment Title: <span id="paymentTitle">{{$payment}}</span> <span onclick="copy('paymentTitle')">copy</span>
                </div>
                <div class="make-donation__info__note">
                    Please transfer the amount you want to donate to the selected bank account with payment title: {{$payment}}
                </div>
            </div>
        </div>
    </div>

</div>
