@extends('backend.layouts.master')
@section('title', '链接库')

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('template/color_admin/plugins/gritter/css/jquery.gritter.css')}}"><!-- jquery.gritter 弹窗 -->
    <link rel="stylesheet" type="text/css" href="{{asset('template/color_admin/plugins/bootstrap-sweetalert-master/dist/sweetalert.css')}}"><!-- bootstrap-sweetalert 弹窗 -->
    <link rel="stylesheet" type="text/css" href="/statics/backend/styles/links.css">
    <style type="text/css">
        
    </style>
@endsection
@section('page')
	<div class="container-fluid">
        <div class="animated fadeIn">
            <div class="card" id="new">
                <div class="card-header">搜索</div>
                <div class="card-block">
                	<form action="" method="post" class="form-horizontal ">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <input type="text" id="input1-group2" name="input1-group2" class="form-control" placeholder="输入你想搜索的内容">
                                    <span class="button-group-btn">
                                        <button type="button" class="btn btn-primary"><i class="fa fa-search"></i> 搜索</button>
                                        <a href="{{ url('/backend/links/create') }}" role="button" class="btn btn-success"><i class="fa fa-plus"></i> 添加</a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card" id="">
                <div class="card-header">{{ $category->title??'默认分类' }}</div>
                <div class="card-block">
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/x-handlebars-template" id="waterfall-tpl">
        @{{#data}}
            <div class="item">
                <a href="@{{image}}">
                    <img src="@{{image}}" alt="@{{title}}" width="240" />
                </a>
            </div>
        @{{/data}}
    </script>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('template/color_admin/plugins/gritter/js/jquery.gritter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template/color_admin/plugins/bootstrap-sweetalert-master/dist/sweetalert.js') }}"></script>
    <script src="/vendor/jquery/handlebars/handlebars.1.0.0.js"></script>
    <script src="/vendor/jquery/waterfall/waterfall.0.1.73.js"></script>

    <script type="text/javascript" >
        $(function(){
            @foreach (session('flash_notification', collect())->toArray() as $message)
                $.gritter.add({
                    title: "操作消息！",
                    text: "{!! $message['message'] !!}"
                });
            @endforeach

            {{ session()->forget('flash_notification') }}

            $(document).on('click', '.delete', function(){ // 删除
                var id = $(this).attr('data-id');
                swal({
                    title: "确定删除？",
                    text: "删除将不可逆，请谨慎操作！",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    cancelButtonText: "取消",
                    confirmButtonText: "确定",
                    closeOnConfirm: false
                }, function () {
                    $('form[name=delete_item_'+id+']').submit();
                });
            });
        });

        $('#container').waterfall({
            itemCls: 'item', // 子项类名
            colWidth: 250, // 列宽
            align: 'center',
            // maxPage: 2,  // 最大页
            bufferPixel: 50, // 加载时机
            isFadeIn: true, // 淡入淡出
            isAnimated: true, // 动画
            animationOptions: { // 动画样式
            },
            checkImagesLoaded: true, // 
            callbacks: { // 回调
                loadingFinished: function($loading, isBeyondMaxPage) {
                    if ( !isBeyondMaxPage ) { // 达到最大页数
                        $loading.fadeOut();
                    } else { // 不是最大页
                        $loading.remove();
                    }
                },
                renderData: function (data, dataType) {
                    var tpl,
                        template;

                    if ( dataType === 'json' ||  dataType === 'jsonp'  ) {
                        tpl = $('#waterfall-tpl').html();
                        template = Handlebars.compile(tpl);

                        return template(data);
                    } else { // html
                        return data;
                    }
                }
            },
            path: function(page) {
                return '/api/user/pictures/{{$category->slug??''}}?page=' + page;
            },
            debug: false
        });
    </script>
@endsection
