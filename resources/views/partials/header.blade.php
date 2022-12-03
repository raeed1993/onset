<div id="page_overlay" class="overlay-body d-none"></div>


<header id="header" class="d-none d-lg-block header-contact">
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            @if (app()->getLocale() =='ar')
                <a class="navbar-brand" href="{{route('home.page')}}">
                    <img src="{{asset('images/logo.png')}}" height="50" width="50" alt="onset logo"/>
                </a>
            @else
                <a class="navbar-brand" href="{{route('en.home.page')}}">
                    <img src="{{asset('images/logo.png')}}" height="50" width="50" alt="onset logo"/>
                </a>
            @endif
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    @if (app()->getLocale() =='ar')
                        <li class="nav-item">
                            <a class="nav-link {{$url==route('home.page')?'active':''}}" aria-current="page"
                               href="{{route('home.page')}}">
                                @lang('pages.home')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$url==route('services.page')?'active':''}}"
                               href="{{route('services.page')}}">
                                @lang('pages.services')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$url==route('projects.page')?'active':''}}"
                               href="{{route('projects.page')}}">
                                @lang('pages.portfolio')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$url==route('blogs.page')?'active':''}}"
                               href="{{route('blogs.page')}}">
                                @lang('pages.blog')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$url==route('about.page')?'active':''}}"
                               href="{{route('about.page')}}">
                                @lang('pages.about_us')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$url==route('contact.page')?'active':''}}"
                               href="{{route('contact.page')}}">
                                @lang('pages.contact_us')
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link {{$url==route('en.home.page')?'active':''}}" aria-current="page"
                               href="{{route('en.home.page')}}">
                                @lang('pages.home')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$url==route('en.services.page')?'active':''}}"
                               href="{{route('en.services.page')}}">
                                @lang('pages.services')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$url==route('en.projects.page')?'active':''}}"
                               href="{{route('en.projects.page')}}">
                                @lang('pages.portfolio')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$url==route('en.blogs.page')?'active':''}}"
                               href="{{route('en.blogs.page')}}">
                                @lang('pages.blog')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$url==route('en.about.page')?'active':''}}"
                               href="{{route('en.about.page')}}">
                                @lang('pages.about_us')
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{$url==route('en.contact.page')?'active':''}}"
                               href="{{route('en.contact.page')}}">
                                @lang('pages.contact_us')
                            </a>
                        </li>
                    @endif
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="navbarDropdownMenuLink"
                            role="button"
                            data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class="uil uil-globe"></i>
                        </a>
                        <ul
                            class="dropdown-menu"
                            aria-labelledby="navbarDropdownMenuLink">
                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>

                                    {{--                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"--}}
                                    {{--                                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
                                    {{--                                        {{ $properties['native'] }}--}}
                                    {{--                                    </a>--}}
                                    @if (app()->getLocale() =='ar')
                                        @if (\Illuminate\Support\Facades\Route::getCurrentRoute()->parameters()>0)
                                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                               href="{{route('en.'.\Illuminate\Support\Facades\Route::currentRouteName(),\Illuminate\Support\Facades\Route::getCurrentRoute()->parameters())}}">
                                                {{ $properties['native'] }}
                                            </a>


                                        @else
                                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                               href="{{ route('en.'.\Illuminate\Support\Facades\Route::currentRouteName())}}">
                                                {{ $properties['native'] }}
                                            </a>
                                        @endif
                                    @else
                                        @if (\Illuminate\Support\Facades\Route::getCurrentRoute()->parameters()>0)
                                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                               href="{{route(explode('en.',\Illuminate\Support\Facades\Route::currentRouteName())[1],\Illuminate\Support\Facades\Route::getCurrentRoute()->parameters())}}">
                                                {{ $properties['native'] }}
                                            </a>


                                        @else
                                            <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                               href="{{route(explode('en.',\Illuminate\Support\Facades\Route::currentRouteName())[1])}}">
                                                {{ $properties['native'] }}
                                            </a>
                                        @endif
                                    @endif


                                </li>
                            @endforeach

                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<header id="header" class="header-contact d-lg-none">
    <nav class="navbar mobile-header">
        <a class="navbar-brand" href="{{route('home.page')}}">
            <img src="{{asset('/images/logo.png')}}" alt="onset logo"/>
        </a>
        <a id="mobile_nav_toggler" class="btn">
            <i class="uil uil-bars"></i>
        </a>
    </nav>
    <div id="mobile_nav" class="bg-white nav-close">
        <div id="mobile_nav_close">
            <i class="uil uil-multiply"></i>
        </div>
        <div class="mobile-nav-content">
            @if (app()->getLocale() =='ar')
                <a href="{{route('home.page')}}"
                   class="nav-link {{$url==route('home.page')?'active':''}}">@lang('pages.home')</a>
                <a href="{{route('services.page')}}"
                   class="nav-link {{$url==route('services.page')?'active':''}}">@lang('pages.services')</a>
                <a href="{{route('projects.page')}}"
                   class="nav-link {{$url==route('projects.page')?'active':''}}"> @lang('pages.portfolio')</a>
                <a href="{{route('blogs.page')}}"
                   class="nav-link {{$url==route('blogs.page')?'active':''}}"> @lang('pages.blog')</a>
                <a href="{{route('about.page')}}"
                   class="nav-link {{$url==route('about.page')?'active':''}}">@lang('pages.about_us')</a>
                <a href="{{route('contact.page')}}"
                   class="nav-link {{$url==route('contact.page')?'active':''}}">@lang('pages.contact_us')</a>

            @else
                <a href="{{route('en.home.page')}}"
                   class="nav-link {{$url==route('en.home.page')?'active':''}}">@lang('pages.home')</a>
                <a href="{{route('en.services.page')}}"
                   class="nav-link {{$url==route('en.services.page')?'active':''}}">@lang('pages.services')</a>
                <a href="{{route('en.projects.page')}}"
                   class="nav-link {{$url==route('en.projects.page')?'active':''}}"> @lang('pages.portfolio')</a>
                <a href="{{route('en.blogs.page')}}"
                   class="nav-link {{$url==route('en.blogs.page')?'active':''}}"> @lang('pages.blog')</a>
                <a href="{{route('en.about.page')}}"
                   class="nav-link {{$url==route('en.about.page')?'active':''}}">@lang('pages.about_us')</a>
                <a href="{{route('en.contact.page')}}"
                   class="nav-link {{$url==route('en.contact.page')?'active':''}}">@lang('pages.contact_us')</a>
            @endif
            <a
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdownMenuLink"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
            >
                <i class="uil uil-globe"></i>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>

                        {{--                                    <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"--}}
                        {{--                                       href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">--}}
                        {{--                                        {{ $properties['native'] }}--}}
                        {{--                                    </a>--}}
                        @if (app()->getLocale() =='ar')
                            @if (\Illuminate\Support\Facades\Route::getCurrentRoute()->parameters()>0)
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                   href="{{route('en.'.\Illuminate\Support\Facades\Route::currentRouteName(),\Illuminate\Support\Facades\Route::getCurrentRoute()->parameters())}}">
                                    {{ $properties['native'] }}
                                </a>


                            @else
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                   href="{{ route('en.'.\Illuminate\Support\Facades\Route::currentRouteName())}}">
                                    {{ $properties['native'] }}
                                </a>
                            @endif
                        @else
                            @if (\Illuminate\Support\Facades\Route::getCurrentRoute()->parameters()>0)
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                   href="{{route(explode('en.',\Illuminate\Support\Facades\Route::currentRouteName())[1],\Illuminate\Support\Facades\Route::getCurrentRoute()->parameters())}}">
                                    {{ $properties['native'] }}
                                </a>


                            @else
                                <a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
                                   href="{{route(explode('en.',\Illuminate\Support\Facades\Route::currentRouteName())[1])}}">
                                    {{ $properties['native'] }}
                                </a>
                            @endif
                        @endif


                    </li>
                @endforeach

                {{--                <li><a class="dropdown-item" href="#">ar</a></li>--}}
                {{--                <li><a class="dropdown-item" href="#">en</a></li>--}}
            </ul>
        </div>
    </div>
</header>
