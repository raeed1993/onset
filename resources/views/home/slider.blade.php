<section class="header-slider" id="header-slider">
    <div class="swiper swiper-header">
        <div class="swiper-wrapper">

            @foreach($data['sliders'] as $slider)
                @php
                    $file =$slider->primary_image;
                   $image_explode = explode('.',$file);
                    $extension = end($image_explode);

                @endphp
                @if (in_array($extension, ['jpg', 'jpeg', 'gif', 'png', 'bmp', 'svg', 'svgz', 'cgm', 'djv', 'djvu', 'ico', 'ief','jpe', 'pbm', 'pgm', 'pnm', 'ppm', 'ras', 'rgb', 'tif', 'tiff', 'wbmp', 'xbm', 'xpm', 'xwd']))
                    <div class="swiper-slide">
                        <div class="overlay">
                            <img src="{{$slider->primary_image}}"
                                 alt="{{isset($slider->translate(app()->getLocale())->title)?$slider->translate(app()->getLocale())->title:'Image Slider'}}"/>
                            <div class="slider-content">
                                {{--                                <div class="slider-content_img">--}}
                                {{--                                    <img src="" alt=""/>--}}
                                {{--                                </div>--}}
                                @if (isset($slider->translate(app()->getLocale())->title))
                                    <p>{{$slider->translate(app()->getLocale())->title}}</p>
                                @endif

                                @if (!is_null($slider->links[0])&&count($slider->links)>0)
                                    <a class="btn btn-primary" href="{{$slider->links[0]}}">Go</a>
                                @endif

                            </div>
                        </div>
                    </div>
                @else
                    <div class="swiper-slide">
                        <iframe
                            width="560"
                            height="315"
                            src="{{$slider->primary_image}}"
                            title=" video player"
                            frameborder="0"
                            allow="accelerometer; autoplay=true; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                            allowfullscreen
                        ></iframe>
                    </div>
                @endif

            @endforeach


        </div>
        <div class="contact">
          @include('partials.social')
        </div>

        <div class="swiper-pagination"></div>
    </div>
</section>
