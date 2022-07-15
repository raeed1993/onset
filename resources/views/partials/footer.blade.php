<footer>
    <div class="container section-padding">
        <div class="row align-items-center border-top border-white pt-4">
            <div class="col-md-6 mb-3">
                <div class="footer-logo">
                    <div class="footer-logo_img">
                        <img src="{{asset('images/logoFooter.png')}}" alt="logoFooter"/>
                    </div>
                    <div class="contact">
                        @include('partials.social')
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <div class="footer-contact">
                    <ul>
                        @foreach($links as $link)
                            @if ($link->translate('en')->slug == 'phone')
                                <li>
                                    <a href="{{$link->links[0]}}">
                                        <p>{{$link->links[0]}}</p>
                                        <i class="uil uil-phone"></i>
                                    </a>
                                </li>
                            @elseif($link->translate('en')->slug == 'email')
                                <li>
                                    <a href="{{$link->links[0]}}">
                                        {{$link->links[0]}}
                                        <i class="uil uil-envelope-alt"></i>
                                    </a>
                                </li>
                            @elseif($link->translate('en')->slug == 'location')
                                <li>
                                    <a href="{{$link->links[0]}}">
                                        {{$link->links[0]}}
                                        <i class="uil uil-location-point"></i>
                                    </a>
                                </li>



                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
