<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            @foreach ( $menus as $menu_first )
                <li class="nav-item nav-dropdown">
                    <a class="nav-link nav-dropdown-toggle" href="{{ url('/backend/pictures/category/'.($menu_first->slug??'default')) }}"><i class="fa fa-external-link"></i> {{ $menu_first->title??'默认分类' }}</a>

                    @if ( $menu_first->children )
                        <ul class="nav-dropdown-items">
                            @foreach ( $menu_first->children as $menu_second )
                                <li class="nav-item">
                                    <a class="nav-link" href="#{{ $menu_second->slug }}"><i class="fa fa-external-link"></i> {{ $menu_second->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach
        </ul>
    </nav>
</div>