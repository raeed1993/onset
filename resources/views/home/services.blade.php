<section class="services section-padding" id="services">
    <div class="container">
        <div class="title-text-dark">
            <h2>
                @lang('home.services')
            </h2>
        </div>
        <div class="swiper swiper-services">
            <div class="swiper-wrapper">
                @foreach($data['services'] as $service)
                    <div class="swiper-slide">
                        <a href="{{route(app()->getLocale()=='en'?app()->getLocale().'.taxonomy.show':'taxonomy.show',$service->translate('en')->slug)}}"
                           class="text-black text-decoration-none">
                            <div class="content-services">
                                {{--                            <i class="uil uil-video"></i>--}}
                                <img src="{{$service->primary_image}}" alt="{{$service->title}}">
                                <p>{{$service->title}}</p>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section>
