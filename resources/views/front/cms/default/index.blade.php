<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $settings['title'] }}</title>
    <meta name="keywords" content="{{ $settings['keywords'] }}">
    <meta name="description" content="{{ $settings['description'] }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="{{ asset('css/cms.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/jquery/unslider/dist/css/unslider.css') }}">
</head>
<body>
    <div id="top">
        <div class="container">
            您好，欢迎来到 {{ $settings['title'] }}
            <div class="pull-right">免费咨询电话： {{ $settings['tel'] }}</div>
        </div>
    </div>
    <header id="header">
        <div class="container">
            <img src="{{ asset('cms/'.$organization['slug'].'/images/logo.png') }}" alt="{{ $settings['title'] }}" id="logo">

            <ul id="navigation">
                <li class="active"><a href="">首页</a></li>
                <li><a href="">医院简介</a></li>
                <li><a href="">医师团队</a></li>
                <li><a href="">来院路线</a></li>
            </ul>
        </div>
    </header>
    <nav id="nav">
        <div class="container">
            <ul id="menu">
                @foreach ( $menus as $menu )
                    <li class="menu_{{ $menu['id'] }}"><i></i><span data-text="{{ $menu['title'] }}"></span></li>
                @endforeach
            </ul>
        </div>
    </nav>
    <div id="banner">
        <div class="banner_unslider">
            <ul>
                @foreach ( $slide_3 as $item )
                    <li data-nav="{{ $item['title'] }}"> 
                        <a href="javascript: void(0);">
                            <img src="{{ asset('cms/images/'.$item['path']) }}" />
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div id="body_top">
        <div class="container">
            <div class="top_item left">
                <h4>
                    精品项目
                    <span>activity area</span>
                </h4>
                <div class="activity_area">
                    <div class="banner_unslider">
                        <ul>
                            @foreach ( $slide_4 as $item )
                                <li><a href="javascript: void(0);">
                                    <img src="{{ asset('cms/images/'.$item['path']) }}" />
                                </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="communion">
                    <div class="m-l-5">
                        <img src="{{ asset('cms/images/2_13.png') }}" alt="">
                    </div>
                    <div class="tel_online">
                        <a href=""><img src="{{ asset('cms/images/2_17.png') }}" alt=""></a><br>
                        <a href=""><img src="{{ asset('cms/images/2_18.png') }}" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="top_item center">
                <h4>
                    壹美动态
                    <span>medical beauty dynamic</span>
                </h4>
            </div>
            <div class="top_item right">
                <h4>
                    精彩视频
                    <span>video</span>
                </h4>
                <div class="topvebanner">
                    <script type="text/javascript">
                        var swf_width = 264;
                        var swf_height = 184;
                        var texts = '';
                        var files = 'http://www.bjyjy.net/video/1.flv';

                        // var files = 'http://www.gzyjymryy.com/templets/skin2014/ckplayer/171017.flv';
                        var config = '0:自动播放|1:连续播放|100:默认音量|0:控制栏位置|2:控制栏显示|0x000033:主体颜色|60:主体透明度|0x66ff00:光晕颜色|0xffffff:图标颜色|0xffffff:文字颜色|:logo文字|:logo地址|:结束swf地址';
                        document.write('<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="' + swf_width + '" height="' + swf_height + '">');
                        document.write('<param name="movie" value="http://www.hfyjy.cn/video/vcastr2.swf"><param name="quality" value="high">');
                        document.write('<param name="menu" value="false"><param name=wmode value="opaque">');
                        document.write('<param name="FlashVars" value="vcastr_file=' + files + '&vcastr_title=' + texts + '&vcastr_config=' + config + '">');
                        document.write('<embed src="http://www.hfyjy.cn/video/vcastr2.swf" wmode="opaque" FlashVars="vcastr_file=' + files + '&vcastr_title=' + texts + '&vcastr_config=' + config + '" menu="false" quality="high" width="' + swf_width + '" height="' + swf_height + '" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />');
                        document.write('</object>');
                    </script>
                </div>
                <h4>
                    医院环境
                    <span>environment</span>
                </h4>
                <img src="{{ asset('cms/'.$organization['slug'].'/images/pad1.jpg') }}" alt="">
            </div>
            <div class="clear-float"></div>
        </div>
    </div>
    <div id="body_middle">
        <div class="container">
            <ul class="tab">
                @foreach ( $middle_menus as $key => $menu )
                    <li class="@if ( !$key ) active @endif tab_item">
                        <a href="" class="tab_controller">
                            <img src="{{ asset('cms/images/'.$menu['icon']) }}" alt=""> {{ $menu['title'] }}
                        </a>
                        <div class="content" id="content_{{ $key }}">
                            <div class="left">
                                <img src="{{ asset('cms/images/tabs/tab0'.($key+1).'_01.jpg') }}" alt="">
                            </div>
                            <div class="center">
                                <h4><a href="">开内眼角的风险</a></h4>
                                <p>1、内眦瘢痕增生：一般在开内眼角术后3-6个月后会自行变软、变平。如瘢痕增生明显，可遵医嘱做理疗、按摩、外用瘢痕膏等治疗。...</p>
                                <a href="" class="top_detail">[ 详情 ]</a>
                                <ul class="posts">
                                    @foreach ( $posts as $post )
                                        <li class="post">
                                            <a href="{{ url('front/cms/posts/'.$post['id']) }}">{{ $post['title'] }}</a>
                                            <span class="detail"><a href="{{ $post['id'] }}">详情</a></span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="right">
                                <img src="{{ asset('cms/images/tabs/tab0'.($key+1).'_02.jpg') }}" alt="">
                            </div>
                            <div class="clear-float-left">
                                <ul class="bottom">
                                    <li><a href=""><img src="{{ asset('cms/images/consult/consult.jpg') }}" alt=""></a></li>
                                    <li><a href=""><img src="{{ asset('cms/images/consult/reservation.jpg') }}" alt=""></a></li>
                                    <li><a href=""><img src="{{ asset('cms/images/consult/route.jpg') }}" alt=""></a></li>
                                </ul>
                                <div class="intrest">你可能还会对<br>这些感兴趣</div>
                                <ul class="tags">
                                    @foreach ( $tags as $tag )
                                        <li><a href="">{{ $tag['title'] }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="clear-float"></div>
        </div>
    </div>
    <div id="gallery">
        <div class="container">
            <ul>
                @foreach ( $galleries as $gallery )
                    <li>
                        <a href="javascript: void(0);">
                            <img src="{{ asset('cms/images/'.$gallery['path']) }}" alt="{{ $gallery['title'] }}">
                            <div>
                                <p>{!! $gallery['title'] !!}</p>
                            </div>
                            <span></span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div id="body_bottom">
        <div class="container">
            <div class="clear-float">
                <div id="hospital">
                    <h4>
                        医院环境
                        <span>hospital environment</span>
                        <a href="#" class="unslider-arrow prev"></a>
                        <a href="#" class="unslider-arrow next"></a>
                    </h4>
                    <div class="content unslider">
                        <ul>
                            @foreach ( $slide_1 as $item )
                                <li><a href="javascript: void(0);">
                                    <img src="{{ asset('cms/images/'.$item['path']) }}" />
                                    <span>{{ $item['title'] }}</span>
                                </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div id="equipment">
                    <h4>
                        仪器设备
                        <span>equipment</span>
                        <a href="#" class="unslider-arrow prev"></a>
                        <a href="#" class="unslider-arrow next"></a>
                    </h4>
                    <div class="content unslider">
                        <ul>
                            @foreach ( $slide_2 as $item )
                                <li><a href="javascript: void(0);">
                                    <img src="{{ asset('cms/images/'.$item['path']) }}" />
                                    <span>{{ $item['title'] }}</span>
                                </a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="info">
        <div class="container">
            <img src="{{ asset('cms/'.$organization['slug'].'/images/logo_bottom.png') }}" alt="{{ $settings['title'] }}" id="logo_bottom">
            <ul class="pull-right">
                <li><i class="fa fa-map-marker"></i> 医院地址：{{ $settings['address'] }}</li>
                <li><i class="fa fa-phone"></i> 咨询热线：{{ $settings['tel'] }}</li>
                <li><i class="fa fa-clock"></i> 营业时间：{{ $settings['open_time'] }}</li>
                <li><i class="fa fa-arrow-right"></i> 备案号：{{ $settings['record_no'] }}</li>
                <li><i class="fa fa-arrow-alt-circle-right"></i> 医疗广告审查证明文号：{{ $settings['medical_advertisement_no'] }}</li>
            </ul>
        </div>
    </div>
    <div id="bottom">
        <div class="container">
            网站声明：本站部分信息来源于互联网，不代表本院立场，如有涉及侵权违规，请告知我们及时处理。
        </div>
    </div>
    <div id="left" class="left" style="display: none;">
        <i class="close">&times;</i>
        <a href="">
            <img src="{{ asset('cms/images/side/001.png') }}" alt="">
        </a>
    </div>
    <div id="popup" style="display: none;">
        <i class="close">&times;</i>
        <a href="">
            <img src="{{ asset('cms/images/center/001.gif') }}" alt="">
        </a>
    </div>

    <script src="{{ asset('js/cms.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/jquery/unslider/dist/js/unslider-min.js') }}"></script>
    <script type="text/javascript">
        $(function(){
            $('.banner_unslider').unslider({
                autoplay: true,
                arrows: false
            });
            $('.unslider').unslider({
                autoplay: true,
                nav: false,
                arrows: false
            });
        });
    </script>
</body>
</html>