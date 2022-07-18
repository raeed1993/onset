<section class="customer section-padding" id="customer">
    <div class="container">
        <div class="title-text-dark">
            <h2>آراء عملائنا</h2>
        </div>
        <div class="swiper swiper-customer">
            <div class="swiper-wrapper">
                @foreach($data['clients'] as $client)
                    <div class="swiper-slide">
                        <div class="customer-content">
                            <h4>{{$client->content}}</h4>
                            <div class="customer-information">
                                <img src="{{$client->primary_image}}" alt="{{$client->translate('en')->title}}"/>
                                <div class="customer-information_content">
                                    <p>اسم العميل</p>
                                    <p>{{$client->title}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
