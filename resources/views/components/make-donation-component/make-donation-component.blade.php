<div class="make-donation h-100">
    <div class="row h-100">
        <div class="col-xl-6">
            <div class="make-donation__form-section">
                <div class="make-donation__form-section__title">
{{--                    {{$contents['title'][0]['text']}}--}}
                    Make a donation
                </div>

                <div class="make-donation__form-section__form">
                    <form action="" class="row">
                        <div class="col-6 mt-4">
                            <input type="text" class="make-donation__form-section__form__input" placeholder="ოდენობა">
                        </div>
                        <div class="col-6 mt-4">
                            <input id="showDonation" type="checkbox" class="form-check-input">
                            <label for="showDonation">My donation is public</label>
                        </div>
                        <div class="col-6 mt-4">
                            <input type="text" class="make-donation__form-section__form__input" placeholder="სახელი">
                            <input class="mt-2" id="showName" type="checkbox" class="form-check-input">
                            <label class="mt-2" for="showName">Show my name in donations</label>
                        </div>
                        <div class="col-6 mt-4">
                            <input type="text" class="make-donation__form-section__form__input" placeholder="გვარი">
                        </div>
                        <div class="col-12 mt-4">
                            <textarea name="" id="" cols="30" rows="5" class="make-donation__form-section__form__input" placeholder="კომენტარი"></textarea>
                            <input class="mt-2" id="showComment" type="checkbox" class="form-check-input">
                            <label class="mt-2" for="showComment">Show my comment in donations</label>
                        </div>
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
                    Payment Title: <span id="paymentTitle">32125</span> <span onclick="copy('paymentTitle')">copy</span>
                </div>
                <div class="make-donation__info__note">
                    Please transfer the amount you want to donate to the selected bank account with payment title: 32125
                </div>
            </div>
        </div>
    </div>

</div>
