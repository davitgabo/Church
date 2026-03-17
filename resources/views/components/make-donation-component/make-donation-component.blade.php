<div class="make-donation h-100 container-lg container-md container-sm pb-3">
    <div class="row h-100">
        <div class="col-xl-6 col-12">
            <div class="make-donation__form-section">
                <div class="make-donation__form-section__title">
                    {{$contents['title'][0]['text']}}
                </div>

                <div class="make-donation__info d-none-xl">
                    <div class="mb-2 d-flex align-items-center make-donation__info__acc">
                        <span class="span-width">{{ ($lang=='ge') ? "ბანკის ანგარიში" : (($lang=='ru') ? 'Банковский счет' : (($lang=='gr') ? 'Τραπεζικός Λογαριασμός' : 'Bank Account'))}}:</span> <span class="mx-2" id="bankAccNo"> {{$contents['iban'][0]['text']}} </span> <span><img src="{{ URL::asset('/assets/icons/copy.png')}}"> <span class="copy">{{ ($lang=='ge') ? "კოპირება" : (($lang=='ru') ? 'копировать' : (($lang=='gr') ? 'αντιγραφή' : 'copy'))}}</span></span>
                    </div>
                    <hr>
                    <div class="mb-4 d-flex align-items-center make-donation__info__acc">
                        <span class="span-width">{{ ($lang=='ge') ? "საგადახდო კოდი" : (($lang=='ru') ? 'Платежный код' : (($lang=='gr') ? 'Κωδικός Πληρωμής' : 'Payment Title'))}}:</span> <span class="mx-2" id="paymentTitle">{{$payment}}</span> <span><img src="{{ URL::asset('/assets/icons/copy.png')}}"> <span class="copy">{{ ($lang=='ge') ? "კოპირება" : (($lang=='ru') ? 'копировать' : (($lang=='gr') ? 'αντιγραφή' : 'copy'))}}</span></span>
                    </div>
                    <div class="make-donation__info__note">
                        {{$contents['payment_warning'][0]['text']}}: {{$payment}}
                    </div>
                </div>

                <div class="make-donation__form-section__form mb-3">
                    <div class="make-donation__info d-none-lg">
                        <div class="mb-2 d-flex align-items-center make-donation__info__acc">
                            <span class="span-width">{{ ($lang=='ge') ? "ბანკის ანგარიში" : (($lang=='ru') ? 'Банковский счет' : (($lang=='gr') ? 'Τραπεζικός Λογαριασμός' : 'Bank Account'))}}:</span> <span class="mx-2" id="bankAccNo"> {{$contents['iban'][0]['text']}} </span> <span><img src="{{ URL::asset('/assets/icons/copy.png')}}"> <span class="copy">{{ ($lang=='ge') ? "კოპირება" : (($lang=='ru') ? 'копировать' : (($lang=='gr') ? 'αντιγραφή' : 'copy'))}}</span></span>
                        </div>
                        <hr>
                        <div class="mb-4 d-flex align-items-center make-donation__info__acc">
                            <span class="span-width">{{ ($lang=='ge') ? "საგადახდო კოდი" : (($lang=='ru') ? 'Платежный код' : (($lang=='gr') ? 'Κωδικός Πληρωμής' : 'Payment Title'))}}:</span> <span class="mx-2" id="paymentTitle">{{$payment}}</span> <span><img src="{{ URL::asset('/assets/icons/copy.png')}}"> <span class="copy">{{ ($lang=='ge') ? "კოპირება" : (($lang=='ru') ? 'копировать' : (($lang=='gr') ? 'αντιγραφή' : 'copy'))}}</span></span>
                        </div>
                        <div class="make-donation__info__note">
                            {{$contents['payment_warning'][0]['text']}}: {{$payment}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordModalLabel">Thank you!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                We've received your donation
            </div>
        </div>
    </div>
</div>
<script src="/components/make-donation-component/make-donation-component.js"></script>

