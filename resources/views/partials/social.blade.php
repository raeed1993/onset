<ul>
    @foreach($links as $link)
        @if ($link->translate('en')->slug == 'behance')
            <li>
                <a href="{{$link->links[0]}}">
                    <i class="uil uil-behance"></i>
                </a>
            </li>
        @elseif ($link->translate('en')->slug == 'instgram')
            <li>
                <a href="{{$link->links[0]}}">
                    <i class="uil uil-instagram"></i>
                </a>
            </li>
        @elseif($link->translate('en')->slug == 'facebook')
            <li>
                <a href="{{$link->links[0]}}">
                    <i class="uil uil-facebook-f"></i>
                </a>
            </li>
        @elseif($link->translate('en')->slug == 'youtube')
            <li>
                <a href="{{$link->links[0]}}">
                    <i class="uil uil-youtube"></i>
                </a>
            </li>
        @elseif($link->translate('en')->slug == 'linkedin')

            <li>
                <a href="{{$link->links[0]}}">
                    <i class="uil uil-linkedin-alt"></i>
                </a>
            </li>
        @endif
    @endforeach
</ul>


