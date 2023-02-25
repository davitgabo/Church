<div class="contact h-100 container-lg container-md container-sm">
    <div class="row h-100">
        <div class="col-xl-6 col-12">
            <div class="contact__form-section">
                <div class="contact__form-section__title">
                    {{$contents['title'][0]['text']}}
                </div>

                <div class="contact__form-section__form">
                    <form action="/send" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6">
                                <input class="contact__form-section__form__input" placeholder="სახელი" type="text" name="name">
                            </div>
                            <div class="col-6">
                                <input class="contact__form-section__form__input" placeholder="გვარი" type="text" name="surname">
                            </div>
                            <div class="col-12">
                                <input class="contact__form-section__form__input" placeholder="ფოსტა" type="text" name="email">
                            </div>
                            <div class="col-12">
                                <input class="contact__form-section__form__input" placeholder="საკითხი" type="text" name="subject">
                            </div>
                            <div class="col-12">
                                <textarea class="contact__form-section__form__input col-12" placeholder="წერილი" name="text" id="" cols="30" rows="5"></textarea>
                            </div>
                        </div>

                        <button class="contact__form-section__form__submit-button w-100" type="submit">გაგზავნე</button>
                    </form>
                </div>

            </div>
        </div>
        <div class="col-xl-6 col-12 p-0">
            <div class="contact-info">
                <div>
                    <div class="contact-info__email">
                        {{$contents['mail'][0]['text']}}
                    </div>
                    <div class="contact-info__phone">
                        {{$contents['tel'][0]['text']}}
                    </div>
                    <div class="contact-info__address">
                        {{$contents['address'][0]['text']}}
                    </div>
                    <div class="contact-info__socials">
                        <a href="">{{$contents['social'][0]['text']}}</a>
                        <a href="">{{$contents['social'][1]['text']}}</a>
                        <a href="">{{$contents['social'][2]['text']}}</a>
                    </div>
                </div>
                <iframe class="map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d19788.501348222082!2d41.867815784989745!3d42.500516539925016!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x405c24c170ceb273%3A0x1ed767221cb32af1!2sSt.%20Virgin%20Mary%20icon%20of%20the%20Iveron%20church!5e0!3m2!1sen!2sge!4v1674496739208!5m2!1sen!2sge" width="50%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>

</div>
