<div id="page_overlay" class="overlay-body" style="display: none;"></div>


<header id="header" class="d-none d-lg-block header-contact" >
    <div class="container">
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="#">
                <img src="{{asset('images/logo.png')}}" alt="" />
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{$url==route('home.page')?'active':''}}" aria-current="page" href="{{route('home.page')}}">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$url==route('services.page')?'active':''}}" href="{{route('services.page')}}">خدماتنا</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$url==route('projects.page')?'active':''}}" href="{{route('projects.page')}}">معرض الأعمال</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$url==route('blogs.page')?'active':''}}" href="{{route('blogs.page')}}">المدونة</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$url==route('about.page')?'active':''}}" href="{{route('about.page')}}">من نحن</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{$url==route('contact.page')?'active':''}}" href="{{route('contact.page')}}">تواصل معنا</a>
                    </li>
                    <li class="nav-item dropdown">
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
                        <ul
                            class="dropdown-menu"
                            aria-labelledby="navbarDropdownMenuLink"
                        >
                            <li><a class="dropdown-item" href="#">ar</a></li>
                            <li><a class="dropdown-item" href="#">en</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<header id="header" class="header-contact d-lg-none">
    <nav class="navbar mobile-header">
        <a class="navbar-brand" href="#">
            <img src="{{asset('/images/logo.png')}}" alt="logo" />
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
            <a href="#" class="nav-link">الرئيسية</a>
            <a href="#" class="nav-link">خدماتنا</a>
            <a href="#" class="nav-link">معرض الأعمال</a>
            <a href="#" class="nav-link">المدونة</a>
            <a href="#" class="nav-link">من نحن</a>
            <a href="#" class="nav-link">المدونة</a>
            <a href="#" class="nav-link">تواصل معنا</a>
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
                <li><a class="dropdown-item" href="#">ar</a></li>
                <li><a class="dropdown-item" href="#">en</a></li>
            </ul>
        </div>
    </div>
</header>
