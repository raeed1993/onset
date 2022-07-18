<section class="partners section-padding" id="partners">
    <div class="container">
        <div class="title-text-dark">
            <h2>تشرفنا بالتعامل مع</h2>
        </div>
        <div class="swiper swiper-partners">
            <div class="swiper-wrapper">
                @foreach($data['clients'] as $client)
                    <div class="swiper-slide">
                        <div class="partners-content">
                            <img src="{{$client->primary_image}}" alt="{{$client->translate('en')->title}}"/>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
