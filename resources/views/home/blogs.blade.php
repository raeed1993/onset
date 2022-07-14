<section class="article section-padding" id="article">
    <div class="container">
        <div class="title-text-light">
            <h2>أحدث المقالات</h2>
        </div>
        <div class="row">
            @foreach($data['blogs'] as $blog)
                <div class="col-md-6 col-lg-4 mb-4">
                    <div class="article-content">
                        <div class="article-content_img">
                            <img src="{{$blog->primary_image}}" alt="{{$blog->title}}"/>
                        </div>
                        <h4>{{$blog->title}}</h4>
                      <div class="text-white">
                          {!!  implode(' ', array_slice(explode(' ', $blog->content), 0, 15))!!}
                      </div>
                        <a href="{{route('taxonomy.show',$blog->translate('en')->slug)}}">
                            تابع القراءة>>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="text-center">
            <a href="" class="btn btn-secondary btn-view">مشاهدة المزيد</a>
        </div>
    </div>
</section>
