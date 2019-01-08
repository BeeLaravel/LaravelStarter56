@extends('admin.layouts.base')

@section('stylesheet')
    <link rel="stylesheet" type="text/css" href="{{asset('template/color_admin/plugins/gritter/css/jquery.gritter.css')}}"><!-- jquery.gritter 弹窗 -->
    <link rel="stylesheet" type="text/css" href="{{asset('template/color_admin/plugins/bootstrap-sweetalert-master/dist/sweetalert.css')}}"><!-- bootstrap-sweetalert 弹窗 -->
    <link rel="stylesheet" type="text/css" href="{{asset('template/color_admin/plugins/DataTables/media/css/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template/color_admin/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css')}}">
@endsection

@section('content')
    <ol class="breadcrumb pull-right">
        <li><a href="{{url('admin')}}">首页</a></li>
        <li><a href="{{url('admin/users')}}">用户</a></li>
        <li class="active">文章</li>
    </ol>
    <h1 class="page-header">文章 <small>用户文章</small></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse" data-sortable-id="table-basic-5">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    </div>
                    <h4 class="panel-title">列表</h4>
                </div>
                <div class="panel-body">
                    {{--@if ( auth('admin')->user()->can('post.add') )--}}
                        <a href="{{ url('admin/posts/create') }}" class="pull-right">
                            <button type="button" class="btn btn-primary m-r-5 m-b-5"><i class="fa fa-plus-square-o"></i> 添加文章</button>
                        </a>
                    {{--@endif--}}
                    <form action="" method="POST" class="form-inline" style="margin-bottom: 5px;">
                        <div class="form-group">
                            <label class="control-label">类型：</label>
                            <select name="type" class="form-control">
                                <option value="">所有</option>
                                @foreach ( $types as $key => $value )
                                    <option value="{{$key}}" @if ( $search['type']==$key ) selected="selected" @endif>{{$value}}</option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                    <table class="table table-bordered table-hover responsive dt-responsive" id="datatable" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>标题</th>
                                <th>标识</th>
                                <th>类型</th>
                                <th>创建时间</th>
                                <th>更新时间</th>
                                <th>操作</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="{{ asset('template/color_admin/plugins/gritter/js/jquery.gritter.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template/color_admin/plugins/bootstrap-sweetalert-master/dist/sweetalert.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template/color_admin/plugins/DataTables/media/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template/color_admin/plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template/color_admin/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('admin/js/user/post.js') }}"></script>
    <script src="{{ asset('template/color_admin/js/apps.min.js') }}"></script>

    <script type="text/javascript" >
        $(function(){
            App.init();

            @foreach (session('flash_notification', collect())->toArray() as $message)
                $.gritter.add({
                    title: "操作消息！",
                    text: "{!! $message['message'] !!}"
                });
            @endforeach

            {{ session()->forget('flash_notification') }}

            $(document).on('click', '.destroy', function(){ // 删除
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
