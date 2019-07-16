<header class="app-header navbar">
    <button class="navbar-toggler mobile-sidebar-toggler hidden-lg-up" type="button">☰</button>
    <a class="navbar-brand" href="#"></a>
    <ul class="nav navbar-nav hidden-md-down">
        <li class="nav-item">
            <a class="nav-link navbar-toggler sidebar-toggler" href="#">☰</a>
        </li>
        @foreach ( $application_menus as $item )
            <li class="nav-item px-1">
                <a class="nav-link" href="{{ url($item->slug) }}">{{ $item->title }}</a>
            </li>
        @endforeach
    </ul>
    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item hidden-md-down">
            <a class="nav-link" href="#"><i class="icon-bell"></i><span class="badge badge-pill badge-danger">5</span></a>
        </li>
        <li class="nav-item hidden-md-down">
            <a class="nav-link" href="#"><i class="icon-list"></i></a>
        </li>
        <li class="nav-item hidden-md-down">
            <a class="nav-link" href="#"><i class="icon-location-pin"></i></a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <img src="/template/coreui/img/avatars/6.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                <span class="hidden-md-down">{{ auth('backend')->user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>@lang('view.account')</strong>
                </div>
                <a class="dropdown-item" href="#"><i class="fa fa-bell-o"></i> @lang('view.updates')<span class="badge badge-info">42</span></a>
                <a class="dropdown-item" href="#"><i class="fa fa-envelope-o"></i> @lang('view.messages')<span class="badge badge-success">42</span></a>
                <a class="dropdown-item" href="#"><i class="fa fa-tasks"></i> @lang('view.tasks')<span class="badge badge-danger">42</span></a>
                <a class="dropdown-item" href="#"><i class="fa fa-comments"></i> @lang('view.comments')<span class="badge badge-warning">42</span></a>
                <div class="dropdown-header text-center">
                    <strong>@lang('view.settings')</strong>
                </div>
                <a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile</a>
                <a class="dropdown-item" href="#"><i class="fa fa-wrench"></i> Settings</a>
                <a class="dropdown-item" href="#"><i class="fa fa-usd"></i> Payments<span class="badge badge-default">42</span></a>
                <a class="dropdown-item" href="#"><i class="fa fa-file"></i> Projects<span class="badge badge-primary">42</span></a>
                <div class="divider"></div>
                <a class="dropdown-item" href="#"><i class="fa fa-shield"></i> Lock Account</a>
                <a class="dropdown-item" href="javascript: void(0);" onclick="javascript: exit();"><i class="fa fa-lock"></i> @lang('view.logout')</a>
                <form action="{{ url('/backend/logout') }}" method="POST" id="exit_form">
                    @csrf
                </form>
            </div>
        </li>
        <li class="nav-item hidden-md-down">
            <a class="nav-link navbar-toggler aside-menu-toggler" href="#">☰</a>
        </li>
    </ul>
</header>
<script type="text/javascript">
    function exit(){
        $("#exit_form").submit();
    }
</script>