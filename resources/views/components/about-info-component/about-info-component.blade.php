<div class="about-info">
    <div class="row h-100">
        <div class="col-xl-6">
            <div class="about-info__text-section">
                <div class="about-info__text-section__title">
                    {{$contents['title'][0]['text']}}
                </div>

                <div class="about-info__text-section__text">
                    <div class="about-info__text-section__text-one">
                        {{$contents['about text'][0]['text']}}
                    </div>
                    <div class="about-info__text-section__text-two">
                        {{$contents['about text'][1]['text']}}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="about-info__second-section">
                <div class="about-info__second-section__title">
                    {{$contents['picture title'][0]['text']}}
                </div>
                <div class="about-info__second-section__title-two">
                    {{$contents['picture title'][1]['text']}}
                </div>
                <div class="about-info__second-section__img" style="background-image: url('/assets/images/{{$contents['picture title'][0]['uri']}}')"></div>
            </div>
        </div>
    </div>
</div>

