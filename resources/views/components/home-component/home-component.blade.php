<div class="home">
    <div class="row h-100">
        <div class="col-xl-5">
            <div class="home__text-section">
                <div class="home__text-section__title">
                    ტაძრის მშენებლობა
                    - სულიერი გადარჩენის საწინდარია
                </div>
                <div class="home__text-section__text-slider">
                    <div id="carouselText" class="carousel slide carousel-fade" data-pause="false" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item home__text-section__text-slider__text active" data-bs-interval="5000">
                                რომელიც განკუთვნილია
                                დაფიქრდით პროექტის მიმდინარეობაზე და გააცანით იგი ფართო საზოგადოებას. სამეგრელოში პირველად შენდება ტაძარი, რომელიც ერთ-ერთი მათგანია
                                ეს იქნება ყველაზე მასშტაბური პროექტი საქართველოში
                            </div>
                            <div class="carousel-item home__text-section__text-slider__text" data-bs-interval="5000">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. A animi aut commodi earum est ex, expedita facilis fugit laudantium magni nesciunt numquam, quam quas quidem, repudiandae saepe sed ullam vero?
                            </div>
                            <div class="carousel-item home__text-section__text-slider__text" data-bs-interval="5000">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores assumenda aut delectus distinctio ducimus est ex excepturi exercitationem fuga ipsam, iure omnis ratione, reprehenderit repudiandae, similique soluta voluptas voluptate. Fugiat.
                            </div>
                        </div>
                    </div>
                    <div class="home__slider-indicators">
                        <div class="home__slider-indicator home__slider-indicator__active"></div>
                        <div class="home__slider-indicator"></div>
                        <div class="home__slider-indicator"></div>
                    </div>
                </div>
                <div class="home__text-section__donate">
                    <a href="">
                        <div class="home__text-section__donate__part-one">
                            გააკეთეთ <img src="{{ URL::asset('/assets/icons/arrow_long_right.png')}}" alt="Arrow pointing right">
                        </div>
                        <div class="home__text-section__donate__part-two">
                            შემოწირვა
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-xl-7">
            <div id="imageCarousel" class="carousel slide carousel-fade h-100" data-pause="false" data-ride="carousel">
                <div class="carousel-inner h-100">
                    <div class="carousel-item carousel-item-count active h-100" data-bs-interval="5000">
                        {{--                    <img class="d-block w-100" src="https://live.staticflickr.com/4340/36741542010_2a0ddb9eb1_b.jpg" alt="First slide">--}}
                        <div class="h-100" style="background-image: url('https://live.staticflickr.com/4340/36741542010_2a0ddb9eb1_b.jpg')"></div>
                    </div>
                    <div class="carousel-item carousel-item-count h-100" data-bs-interval="5000">
                        {{--                    <img class="d-block w-100" src="https://upload.wikimedia.org/wikipedia/commons/8/82/Samtavisi_Cathedral.jpg" alt="Second slide">--}}
                        <div class="h-100" style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/8/82/Samtavisi_Cathedral.jpg')"></div>
                    </div>
                    <div class="carousel-item carousel-item-count h-100" data-bs-interval="5000">
                        {{--                    <img class="d-block w-100" src="{{ URL::asset('/assets/icons/dl.beatsnoop 1.png')}}" alt="Third slide">--}}
                        <div class="h-100" style="background-image: url('{{ URL::asset('/assets/icons/dl.beatsnoop 1.png')}}')"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

