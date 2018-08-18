@extends('admin.layout.page')
@section('page')
    <div id="header" class="header navbar navbar-default navbar-fixed-top"><!-- header -->
        <div class="container-fluid"><!-- container-fluid -->
            <div class="navbar-header"><!-- mobile sidebar expand / collapse button -->
                <a href="{{url('template/color/index')}}" class="navbar-brand"><i class="fa fa-github fa-2x"></i> <span style="font-size: 30px; font-weight: bolder;">BeeSoft</span></a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <ul class="nav navbar-nav navbar-right"><!-- header right -->
                <li>
                    <form class="navbar-form full-width">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="输入关键词" />
                            <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                        </div>
                    </form>
                </li>
                <li class="dropdown"><!-- 通知 -->
                    <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
                        <i class="fa fa-bell-o"></i>
                        <span class="label">5</span>
                    </a>
                    <ul class="dropdown-menu media-list pull-right animated fadeInDown">
                        <li class="dropdown-header">通知 (5)</li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left"><i class="fa fa-bug media-object bg-red"></i></div>
                                <div class="media-body">
                                    <h6 class="media-heading">Server Error Reports</h6>
                                    <div class="text-muted f-s-11">3 minutes ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left"><img src="{{asset('template/color_admin/img/user-1.jpg')}}" class="media-object" alt="" /></div>
                                <div class="media-body">
                                    <h6 class="media-heading">John Smith</h6>
                                    <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                    <div class="text-muted f-s-11">25 minutes ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left"><img src="{{asset('template/color_admin/img/user-2.jpg')}}" class="media-object" alt="" /></div>
                                <div class="media-body">
                                    <h6 class="media-heading">Olivia</h6>
                                    <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                    <div class="text-muted f-s-11">35 minutes ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left"><i class="fa fa-plus media-object bg-green"></i></div>
                                <div class="media-body">
                                    <h6 class="media-heading"> New User Registered</h6>
                                    <div class="text-muted f-s-11">1 hour ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="media">
                            <a href="javascript:;">
                                <div class="media-left"><i class="fa fa-envelope media-object bg-blue"></i></div>
                                <div class="media-body">
                                    <h6 class="media-heading"> New Email From John</h6>
                                    <div class="text-muted f-s-11">2 hour ago</div>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-footer text-center">
                            <a href="javascript:;">View more</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown navbar-user"><!-- 用户 -->
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{asset('template/color_admin/img/user-13.jpg')}}" alt="" /> 
                        <span class="hidden-xs"></span> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu animated fadeInLeft">
                        <li class="arrow"></li>
                        <li><a href="javascript:;">编辑资料 {{auth()->user()->id}}</a></li>
                        <li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> 邮箱</a></li>
                        <li><a href="javascript:;">日历</a></li>
                        <li><a href="javascript:;">设置</a></li>
                        <li class="divider"></li>
                        <li><a href="javascript:;" onclick="exit()">退出</a></li>
                        <form action="{{ url('/admin/logout') }}" method="POST" id="exit_form">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div id="sidebar" class="sidebar"><!-- 侧边栏 -->
        <div data-scrollbar="true" data-height="100%"><!-- 侧边栏 scrollbar -->
            <ul class="nav"><!-- 侧边栏 用户 -->
                <li class="nav-profile">
                    <div class="image">
                        <a href="javascript:;"><img src="{{asset('template/color_admin/img/user-13.jpg')}}" alt="" /></a>
                    </div>
                    <div class="info">
                        BeeSoft
                        <small style="font-size: 80%;">beherochuling@163.com</small>
                    </div>
                </li>
            </ul>
            <!-- end 侧边栏 用户 -->
            <!-- begin 侧边栏 导航 -->
            <ul class="nav">
                <li class="nav-header">导航</li>
                <li class="has-sub active">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-laptop"></i>
                        <span>仪表盘</span>
                    </a>
                    <ul class="sub-menu">
                        <li class="active"><a href="{{url('template/color/index')}}">仪表盘 v1</a></li>
                        <li><a href="{{url('template/color/index_v2')}}">仪表盘 v2</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <span class="badge pull-right">10</span>
                        <i class="fa fa-inbox"></i> 
                        <span>邮件</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('template/color/email_inbox')}}">邮箱 v1</a></li>
                        <li><a href="{{url('template/color/email_inbox_v2')}}">邮箱 v2</a></li>
                        <li><a href="{{url('template/color/email_compose')}}">写邮件</a></li>
                        <li><a href="{{url('template/color/email_detail')}}">邮件详情</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-suitcase"></i>
                        <span>界面元素</span> 
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('template/color/ui_general')}}">普通</a></li>
                        <li><a href="{{url('template/color/ui_typography')}}">排版</a></li>
                        <li><a href="{{url('template/color/ui_tabs_accordions')}}">选项卡 & 折叠面板</a></li>
                        <li><a href="{{url('template/color/ui_unlimited_tabs')}}">无限选项卡</a></li>
                        <li><a href="{{url('template/color/ui_modal_notification')}}">模态框 & 通知</a></li>
                        <li><a href="{{url('template/color/ui_widget_boxes')}}">物件</a></li>
                        <li><a href="{{url('template/color/ui_media_object')}}">媒体对象</a></li>
                        <li><a href="{{url('template/color/ui_buttons')}}">按钮</a></li>
                        <li><a href="{{url('template/color/ui_icons')}}">图标</a></li>
                        <li><a href="{{url('template/color/ui_simple_line_icons')}}">图标2</a></li>
                        <li><a href="{{url('template/color/ui_ionicons')}}">图标Ionicons</a></li>
                        <li><a href="{{url('template/color/ui_tree')}}">树状视图</a></li>
                        <li><a href="{{url('template/color/ui_language_bar_icon')}}">国旗</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-file-o"></i>
                        <span>表单</span> 
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('template/color/form_elements')}}">表单元素</a></li>
                        <li><a href="{{url('template/color/form_plugins')}}">表单插件</a></li>
                        <li><a href="{{url('template/color/form_slider_switcher')}}">切换开关 & 拖动</a></li>
                        <li><a href="{{url('template/color/form_validation')}}">表单验证</a></li>
                        <li><a href="{{url('template/color/form_wizards')}}">向导</a></li>
                        <li><a href="{{url('template/color/form_wizards_validation')}}">向导+验证</a></li>
                        <li><a href="{{url('template/color/form_wysiwyg')}}">WYSIWYG</a></li>
                        <li><a href="{{url('template/color/form_editable')}}">X-Editable</a></li>
                        <li><a href="{{url('template/color/form_multiple_upload')}}">Multiple File Upload</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-th"></i>
                        <span>表格</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('template/color/table_basic')}}">基本表格</a></li>
                        <li class="has-sub">
                            <a href="javascript:;"><b class="caret pull-right"></b> 表格操作</a>
                            <ul class="sub-menu">
                                <li><a href="{{url('template/color/table_manage')}}">默认</a></li>
                                <li><a href="{{url('template/color/table_manage_autofill')}}">自动获取焦点</a></li>
                                <li><a href="{{url('template/color/table_manage_buttons')}}">按钮</a></li>
                                <li><a href="{{url('template/color/table_manage_colreorder')}}">ColReorder</a></li>
                                <li><a href="{{url('template/color/table_manage_fixed_columns')}}">Fixed Column</a></li>
                                <li><a href="{{url('template/color/table_manage_fixed_header')}}">Fixed Header</a></li>
                                <li><a href="{{url('template/color/table_manage_keytable')}}">KeyTable</a></li>
                                <li><a href="{{url('template/color/table_manage_responsive')}}">Responsive</a></li>
                                <li><a href="{{url('template/color/table_manage_rowreorder')}}">RowReorder</a></li>
                                <li><a href="{{url('template/color/table_manage_scroller')}}">Scroller</a></li>
                                <li><a href="{{url('template/color/table_manage_select')}}">Select</a></li>
                                <li><a href="{{url('template/color/table_manage_combine')}}">Extension Combination</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-star"></i> 
                        <span>前端 <span class="label label-theme m-l-5">NEW</span></span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('template/color')}}" target="_blank">Parallax 单页面</a></li>
                        <li><a href="{{url('template/color')}}" target="_blank">博客</a></li>
                        <li><a href="{{url('template/color')}}" target="_blank">论坛</a></li>
                        <li><a href="{{url('template/color')}}" target="_blank">商城<i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-envelope"></i>
                        <span>邮件模板</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('template/color/email_system')}}">系统</a></li>
                        <li><a href="{{url('template/color/email_newsletter')}}">Newsletter</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-area-chart"></i>
                        <span>图表</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('template/color/chart-flot')}}">Flot Chart</a></li>
                        <li><a href="{{url('template/color/chart-morris')}}">Morris Chart</a></li>
                        <li><a href="{{url('template/color/chart-js')}}">Chart JS</a></li>
                        <li><a href="{{url('template/color/chart-d3')}}">d3 Chart</a></li>
                    </ul>
                </li>
                <li><a href="{{url('template/color/calendar')}}"><i class="fa fa-calendar"></i> <span>Calendar</span></a></li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-map-marker"></i>
                        <span>地图</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('template/color/map_vector')}}">矢量地图</a></li>
                        <li><a href="{{url('template/color/map_google')}}">谷歌地图</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-camera"></i>
                        <span>画廊</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('template/color/gallery')}}">画廊 v1</a></li>
                        <li><a href="{{url('template/color/gallery_v2')}}">画廊 v2</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-cogs"></i>
                        <span>页面</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('template/color/page_blank')}}">空白页面</a></li>
                        <li><a href="{{url('template/color/page_with_footer')}}">带底部</a></li>
                        <li><a href="{{url('template/color/page_without_sidebar')}}">Page without Sidebar</a></li>
                        <li><a href="{{url('template/color/page_with_right_sidebar')}}">Page with Right Sidebar</a></li>
                        <li><a href="{{url('template/color/page_with_minified_sidebar')}}">Page with Minified Sidebar</a></li>
                        <li><a href="{{url('template/color/page_with_two_sidebar')}}">Page with Two Sidebar</a></li>
                        <li><a href="{{url('template/color/page_with_line_icons')}}">Page with Line Icons</a></li>
                        <li><a href="{{url('template/color/page_with_ionicons')}}">Page with Ionicons</a></li>
                        <li><a href="{{url('template/color/page_full_height')}}">Full Height Content</a></li>
                        <li><a href="{{url('template/color/page_with_wide_sidebar')}}">Page with Wide Sidebar</a></li>
                        <li><a href="{{url('template/color/page_with_light_sidebar')}}">Page with Light Sidebar</a></li>
                        <li><a href="{{url('template/color/page_with_mega_menu')}}">Page with Mega Menu</a></li>
                        <li><a href="{{url('template/color/page_with_top_menu')}}">Page with Top Menu</a></li>
                        <li><a href="{{url('template/color/page_with_boxed_layout')}}">Page with Boxed Layout</a></li>
                        <li><a href="{{url('template/color/page_with_mixed_menu')}}">Page with Mixed Menu</a></li>
                        <li><a href="{{url('template/color/page_boxed_layout_with_mixed_menu')}}">Boxed Layout with Mixed Menu</a></li>
                        <li><a href="{{url('template/color/page_with_transparent_sidebar')}}">Page with Transparent Sidebar</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-gift"></i>
                        <span>Extra</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('template/color/extra_timeline')}}">Timeline</a></li>
                        <li><a href="{{url('template/color/extra_coming_soon')}}">Coming Soon Page</a></li>
                        <li><a href="{{url('template/color/extra_search_results')}}">Search Results</a></li>
                        <li><a href="{{url('template/color/extra_invoice')}}">Invoice</a></li>
                        <li><a href="{{url('template/color/extra_404_error')}}">404 Error Page</a></li>
                        <li><a href="{{url('template/color/extra_profile')}}">Profile Page</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-key"></i>
                        <span>注册 & 登录</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('template/color/login')}}">登录</a></li>
                        <li><a href="{{url('template/color/login_v2')}}">登录 v2</a></li>
                        <li><a href="{{url('template/color/login_v3')}}">登录 v3</a></li>
                        <li><a href="{{url('template/color/register_v3')}}">注册 v3</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-cubes"></i>
                        <span>版本 <span class="label label-theme m-l-5">NEW</span></span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="javascript:;">HTML</a></li>
                        <li><a href="{{url('template/color')}}">AJAX</a></li>
                        <li><a href="{{url('template/color')}}">ANGULAR JS</a></li>
                        <li><a href="{{url('template/color')}}">MATERIAL DESIGN<i class="fa fa-paper-plane text-theme m-l-5"></i></a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-medkit"></i>
                        <span>帮助</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{url('template/color/helper_css')}}">Predefined CSS Classes</a></li>
                    </ul>
                </li>
                <li class="has-sub">
                    <a href="javascript:;">
                        <b class="caret pull-right"></b>
                        <i class="fa fa-align-left"></i> 
                        <span>Menu Level</span>
                    </a>
                    <ul class="sub-menu">
                        <li class="has-sub">
                            <a href="javascript:;">
                                <b class="caret pull-right"></b>
                                Menu 1.1
                            </a>
                            <ul class="sub-menu">
                                <li class="has-sub">
                                    <a href="javascript:;">
                                        <b class="caret pull-right"></b>
                                        Menu 2.1
                                    </a>
                                    <ul class="sub-menu">
                                        <li><a href="javascript:;">Menu 3.1</a></li>
                                        <li><a href="javascript:;">Menu 3.2</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:;">Menu 2.2</a></li>
                                <li><a href="javascript:;">Menu 2.3</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:;">Menu 1.2</a></li>
                        <li><a href="javascript:;">Menu 1.3</a></li>
                    </ul>
                </li>
                <!-- begin sidebar minify button -->
                <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
                <!-- end sidebar minify button -->
            </ul>
            <!-- end 侧边栏 导航 -->
        </div>
    </div>
    <div class="sidebar-bg"></div><!-- 侧边栏 背景 -->
    <div id="content" class="content @if ( $config['content-full-width']??0 ) content-full-width @endif">@yield('content')</div><!-- content -->
    <div class="theme-panel"><!-- theme-panel -->
        <a href="javascript:;" data-click="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
        <div class="theme-panel-content">
            <h5 class="m-t-0">Color Theme</h5>
            <ul class="theme-list clearfix">
                <li class="active"><a href="javascript:;" class="bg-green" data-theme="default" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Default">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-red" data-theme="red" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Red">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-blue" data-theme="blue" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Blue">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-purple" data-theme="purple" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Purple">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-orange" data-theme="orange" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Orange">&nbsp;</a></li>
                <li><a href="javascript:;" class="bg-black" data-theme="black" data-click="theme-selector" data-toggle="tooltip" data-trigger="hover" data-container="body" data-title="Black">&nbsp;</a></li>
            </ul>
            <div class="divider"></div>
            <div class="row m-t-10">
                <div class="col-md-5 control-label double-line">头部 样式</div>
                <div class="col-md-7">
                    <select name="header-styling" class="form-control input-sm">
                        <option value="1">默认</option>
                        <option value="2">反色</option>
                    </select>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-5 control-label">头部</div>
                <div class="col-md-7">
                    <select name="header-fixed" class="form-control input-sm">
                        <option value="1">固定</option>
                        <option value="2">默认</option>
                    </select>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-5 control-label double-line">侧边栏 样式</div>
                <div class="col-md-7">
                    <select name="sidebar-styling" class="form-control input-sm">
                        <option value="1">默认</option>
                        <option value="2">网格</option>
                    </select>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-5 control-label">侧边栏</div>
                <div class="col-md-7">
                    <select name="sidebar-fixed" class="form-control input-sm">
                        <option value="1">固定</option>
                        <option value="2">默认</option>
                    </select>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-5 control-label double-line">侧边栏 Gradient</div>
                <div class="col-md-7">
                    <select name="content-gradient" class="form-control input-sm">
                        <option value="1">禁用</option>
                        <option value="2">启用</option>
                    </select>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-5 control-label double-line">内容样式</div>
                <div class="col-md-7">
                    <select name="content-styling" class="form-control input-sm">
                        <option value="1">默认</option>
                        <option value="2">黑色</option>
                    </select>
                </div>
            </div>
            <div class="row m-t-10">
                <div class="col-md-12">
                    <a href="#" class="btn btn-inverse btn-block btn-sm" data-click="reset-local-storage"><i class="fa fa-refresh m-r-3"></i> 重置本地存储</a>
                </div>
            </div>
        </div>
    </div>
    <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a><!-- scroll-to-top -->

    <script type="text/javascript">
        function exit(){
            $("#exit_form").submit();
        }
    </script>
@endsection