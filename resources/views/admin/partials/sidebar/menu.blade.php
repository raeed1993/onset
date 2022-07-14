<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{route('home')}}" class="brand-link">
        <img src="{{asset('images/logoFooter.png')}}" alt="{{ config('app.name', 'ONSET') }} Logo"
             class="brand-image  "
             height="100"
             width="100"
             style="opacity: .8">
{{--        <span class="brand-text font-weight-light">{{ config('app.name', 'ONSET') }} </span>--}}
    </a>


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->


        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->





                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                           Dashboard
                        </p>
                    </a>
                </li>
                <li class="mt-1 mb-1 p-0 w-100" style="border-bottom: 1px solid #4b545c;">

                </li>
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link">
                        <i class="nav-icon fas fa-shopping-basket"></i>
                        <p>
                            Orders
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.contact.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Contact Us
                        </p>
                    </a>
                </li>
                <li class="mt-1 mb-1 p-0 w-100" style="border-bottom: 1px solid #4b545c;">

                </li>
                <li class="nav-item">
                    <a href="{{route('admin.slider.index')}}" class="nav-link {{$url == route('admin.slider.index')?'active':''}}">
                        <i class="nav-icon fas fa-sliders-h"></i>
                        <p>
                           Sliders
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.blog.index')}}" class="nav-link {{$url == route('admin.blog.index')||$url == route('admin.blog.create')||$url == route('admin.blog.edit',['id'=>$param])?'active':''}}">
                        <i class="nav-icon fas fa-file"></i>
                        <p>
                           Blogs
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.service.index')}}" class="nav-link {{$url == route('admin.service.index')||$url == route('admin.service.create')||$url == route('admin.service.edit',['id'=>$param])?'active':''}}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                           Services
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.project.index')}}" class="nav-link {{$url == route('admin.project.index')||$url == route('admin.project.create')||$url == route('admin.project.edit',['id'=>$param])?'active':''}}">
                        <i class="nav-icon fa fa-project-diagram"></i>
                        <p>
                            Projects
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.client.index')}}" class="nav-link {{$url == route('admin.client.index')||$url == route('admin.client.create')||$url == route('admin.client.edit',['id'=>$param])?'active':''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                           Clients
                        </p>
                    </a>
                </li>
{{--                <li class="nav-item ">--}}
{{--                    <a href="{{route('admin.meta.index')}}" class="nav-link {{$url == route('admin.meta.index')||$url == route('admin.meta.edit',0)?'active':''}}">--}}
{{--                        <i class="nav-icon fas fa-location-arrow"></i>--}}
{{--                        <p>--}}
{{--                           Meta--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="mt-1 mb-1 p-0 w-100" style="border-bottom: 1px solid #4b545c;">

                </li>
                <li class="nav-item {{$url == route('admin.website.edit')?'menu-open':''}} ">
                    <a href="#" class="nav-link {{$url == route('admin.website.edit')?'active':''}}">
                        <i class="nav-icon fas fa-globe"></i>
                        <p>
                            Website
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">

                        <li class="nav-item">
                            <a href="{{route('admin.website.edit')}}" class="nav-link  {{$url == route('admin.website.edit')?'active':''}}">

                                <p class="ml-3">- Pages</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index2.html" class="nav-link ">

                                <p class="ml-3">- Social Links</p>
                            </a>
                        </li>

                    </ul>

                </li>
                <li class="nav-item">
                    <a href="pages/kanban.html" class="nav-link">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="mt-1 mb-1 p-0 w-100" style="border-bottom: 1px solid #4b545c;">

                </li>

                <li class="nav-item">
                    <a href="pages/kanban.html" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
