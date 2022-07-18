<section class="article section-padding" id="article">
    <div class="container">
        <div class="title-text-light">
            <h2>أحدث المقالات</h2>
        </div>
        <div class="row">
            @foreach($data['blogs'] as $blog)
                <div class="col-md-6 col-lg-4 mb-4">
                    <a href="{{route('taxonomy.show',$blog->translate('en')->slug)}}" class="text-decoration-none">
                        <div class="article-content">
                            <div class="article-content_img">
                                <img src="{{$blog->primary_image}}" alt="{{$blog->title}}"/>
                            </div>
                            <h4>{{$blog->title}}</h4>
                            <div class="text-white">
                                {!!  implode(' ', array_slice(explode(' ', $blog->content), 0, 15))!!}
                            </div>
                           @include('partials.continue-read')

                        </div>
                    </a>
                </div>
            @endforeach

        </div>
        <div class="text-center">
            <a href="{{route('blogs.page')}}" class="btn btn-secondary btn-view">
                <b>
                    مشاهدة المزيد
                </b>
            </a>
        </div>
    </div>
</section>
