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
            @foreach ( $menus as $menu_first )
                <div class="card" id="{{ $menu_first->slug }}">
                    <div class="card-header">{{ $menu_first->title }}</div>
                    <div class="card-block">
                        <dl class="row text-center">
                            @foreach ( $menu_first->links as $link )
                                <dd class="col-xs-4 col-sm-3 col-md-2">
                                    <a href="{{ url($link->url) }}" class="link">
                                        <span class="link-title">{{ $link->title }}</span>
                                        <span class="link-info">{{ $link->description }}</span>
                                    </a>
                                    @if ( auth('backend')->user()->corporation_id == '100' )
                                        <a href="{{ url('/backend/links/'.$link->id.'/edit') }}" class="edit"><i class="fa fa-edit"></i></a>
                                        <a data-id="{{ $link->id }}" href="javascript: void(0);" class="delete"><i class="fa fa-trash-o"></i></a>
                                        <form action="{{ url('/backend/links/'.$link->id) }}" method="POST" name="delete_item_{{ $link->id }}" style="display: none;">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                        </form>
                                    @endif
                                </dd>
                            @endforeach
                            @if ( $menu_first->children )
                                @foreach ( $menu_first->children as $menu_second )
                                    @if ( $menu_second->links() )
                                        <dt class="col-xs-4 col-sm-3 col-md-2 row2" id="{{ $menu_second->slug }}">
                                            <span>{{ $menu_second->title }}</span>
                                        </dt>
                                        @foreach ( $menu_second->links as $link )
                                            <dd class="col-xs-4 col-sm-3 col-md-2">
                                                <a href="{{ url($link->url) }}" class="link">
                                                    <span class="link-title">{{ $link->title }}</span>
                                                    <span class="link-info">{{ $link->description }}</span>
                                                </a>
                                                @if ( auth('backend')->user()->corporation_id == '100' )
                                                    <a href="{{ url('/backend/links/'.$link->id.'/edit') }}" class="edit"><i class="fa fa-edit"></i></a>
                                                    <a data-id="{{ $link->id }}" href="javascript: void(0);" class="delete"><i class="fa fa-trash-o"></i></a>
                                                    <form action="{{ url('/backend/links/'.$link->id) }}" method="POST" name="delete_item_{{ $link->id }}" style="display: none;">
                                                        @csrf
                                                        {{ method_field('DELETE') }}
                                                    </form>
                                                @endif
                                            </dd>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        </dl>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('template/color_admin/plugins/gritter/js/jquery.gritter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template/color_admin/plugins/bootstrap-sweetalert-master/dist/sweetalert.js') }}"></script>

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
    </script>
@endsection
