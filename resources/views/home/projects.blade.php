<section class="business d-none d-sm-block section-padding" id="business">
    <div class="container">
        <div class="title-text-light">
            <h2>أعمالنا</h2>
        </div>
        <div class="row">
            @foreach($data['projects'] as $project)

                <div class="col-sm-6 mb-3">
                    <a href="{{route('taxonomy.show',$project->translate('en')->slug)}}" class="text-decoration-none">
                        <div class="content-business">
                            <div class="content-business_img">
                                <img src="{{$project->primary_image}}" alt="{{$project->translate('en')->title}}"/>
                            </div>
                            <h2>{{$project->title}}</h2>
                        </div>
                    </a>
                </div>


            @endforeach
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>

<section class="business business-mobile-section d-block d-sm-none section-padding" id="business">
    <div class="container">
        <div class="title-text-light">
            <h2>أعمالنا</h2>
        </div>
        <div class="swiper business-mobile">
            <div class="swiper-wrapper">
                @foreach($data['projects'] as $project)
                    <div class="swiper-slide">
                        <a href="{{route('taxonomy.show',$project->translate('en')->slug)}}" class="text-decoration-none">
                            <div class="content-business">
                                <div class="content-business_img">
                                    <img src="{{$project->primary_image}}" alt="{{$project->translate('en')->title}}"/>
                                </div>
                                <h2>{{$project->title}}</h2>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
