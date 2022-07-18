<nav class="main-header navbar navbar-expand navbar-dark">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

    </ul>

    <!-- Right navbar links -->

    <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
            <a class="nav-link" href="{{route('home.page')}}" target="_blank" title="website">
                <i class="fas fa-globe text-lg"></i>  Website
            </a>

        </li>
        @if ($orderCount->count()>0)
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-shopping-basket text-lg"></i>

                    <span class="badge badge-danger navbar-badge text-md">{{$orderCount->count()}}</span>


                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">{{$orderCount->count()}} Orders</span>
                    <div class="dropdown-divider"></div>
                    @foreach($orderCount as $contact)

                        <a href="{{route('admin.order.show',$contact->id)}}" class="dropdown-item">
                            <i class="fas fa-shopping-bag mr-2"></i> {{$contact->full_name}}
                            <span class="float-right text-muted text-sm">{{$contact->created_at->toDateString()}}</span>
                        </a>
                        <div class="dropdown-divider"></div>
                    @endforeach


                    <a href="{{route('admin.order.index')}}" class="dropdown-item dropdown-footer">See All Orders</a>
                </div>

            </li>
        @endif
        @if ($contactCount->count()>0)
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-envelope text-lg"></i>

                    <span class="badge badge-warning navbar-badge text-md">{{$contactCount->count()}}</span>


                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <span class="dropdown-item dropdown-header">{{$contactCount->count()}} Messages</span>
                    <div class="dropdown-divider"></div>
                    @foreach($contactCount as $contact)

                        <a href="{{route('admin.contact.show',$contact->id)}}" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> {{$contact->name}}
                            <span class="float-right text-muted text-sm">{{$contact->created_at->toDateString()}}</span>
                        </a>
                        <div class="dropdown-divider"></div>
                    @endforeach


                    <a href="{{route('admin.contact.index')}}" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>

            </li>
        @endif
    </ul>
</nav>
