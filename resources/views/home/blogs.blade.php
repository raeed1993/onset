<section class="article  d-none d-sm-block   section-padding" id="article">
    <div class="container">
        <div class="title-text-light">
            <h2>
                @lang('home.latest_blogs')
            </h2>
        </div>
        <div class="row">
            @foreach($data['blogs'] as $blog)
                <section class="col-md-6 col-lg-4 mb-4">
                    <a href="{{route('taxonomy.show',$blog->translate('en')->slug)}}"
                       class="text-decoration-none">
                        <div class="article-content text-white">
                            <div class="article-content_img">
                                <img src="{{$blog->primary_image}}" alt="{{$blog->title}}"/>
                            </div>
                            <h4>{{$blog->title}}</h4>
                            <section>
                                {!!  implode(' ', array_slice(explode(' ', $blog->content), 0, 15))!!}
                            </section>
                            @include('partials.continue-read')
                        </div>

                    </a>
                </section>
            @endforeach

        </div>
        <div class="text-center">
            <a href="{{route('blogs.page')}}"
               class="btn btn-secondary btn-view">
                <b>
                    @lang('home.see_more')
                </b>
            </a>
        </div>
    </div>
</section>
<section class="business business-mobile-section d-block d-sm-none section-padding" id="business">
    <div class="container">

        <div class="swiper business-mobile">
            <div class="swiper-wrapper">
                @foreach($data['blogs'] as $blog)
                    <section class="swiper-slide">
                        <a href="{{route('taxonomy.show',$blog->translate('en')->slug)}}"
                           class="text-decoration-none">
                            <div class="content-business">
                                <div class="content-business_img">
                                    <img src="{{$blog->primary_image}}" alt="{{$blog->translate('en')->title}}"/>
                                </div>
                                <h2>{{$blog->title}}</h2>
                                <section>
                                    {!!  implode(' ', array_slice(explode(' ', $blog->content), 0, 15))!!}
                                </section>
                                @include('partials.continue-read')

                            </div>
                        </a>
                    </section>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
        <div class="text-center">
            <a href="{{route('blogs.page')}}" class="btn btn-secondary btn-view">
                <b>
                    @lang('home.see_more')
                </b>
            </a>
        </div>
    </div>
</section>
