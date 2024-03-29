<section class="partners section-padding" id="partners">
    <div class="container">
        <div class="title-text-dark">
            <h2>
                @lang('home.we_are_honored_to_deal_with')
            </h2>
        </div>
        <div class="swiper swiper-partners">
            <div class="swiper-wrapper">
                @foreach($data['clientsBig'] as $client)
                    <div class="swiper-slide">
                        <div class="partners-content">
                            <img src="{{$client->primary_image}}" alt="partners"/>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
