@extends('admin.layout.base')

@section('stylesheet')
    <link rel="stylesheet" type="text/css" href="{{ asset('template/color_admin/plugins/parsley/src/parsley.css') }}" />
    <link href="{{asset('template/color_admin/plugins/jquery-tag-it/css/jquery.tagit.css')}}" rel="stylesheet" />
@endsection

@section('content')
    <ol class="breadcrumb pull-right">
        <li><a href="{{url('/admin')}}">首页</a></li>
        <li><a href="{{url('/admin/users')}}">用户</a></li>
        <li><a href="{{url('/admin/tags')}}">标签</a></li>
        <li class="active">新增</li>
    </ol>
    <h1 class="page-header">标签 <small>用户标签</small></h1>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse" data-sortable-id="form-validation-1">
                <div class="panel-heading">
                    <div class="panel-heading-btn">
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                    </div>
                    <h4 class="panel-title">编辑</h4>
                </div>
                @if ( $errors->any() )
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ( $errors->all() as $error )
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel-body panel-form">
                    <form class="form-horizontal form-bordered" action="{{ url('/admin/tags/'.$item['id']) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="form-group"><!-- 标题 -->
                            <label class="control-label col-md-4 col-sm-4" for="title">标题 * :</label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" type="text" name="title" value="{{ $item['title'] }}" placeholder="标题" data-parsley-required="true" id="title" />
                            </div>
                        </div>
                        <div class="form-group"><!-- 标识 -->
                            <label class="control-label col-md-4 col-sm-4" for="slug">标识 * :</label>
                            <div class="col-md-6 col-sm-6">
                                <input class="form-control" type="text" name="slug" value="{{ $item['slug'] }}" placeholder="标识" data-parsley-required="true" id="slug" />
                            </div>
                        </div>
                        <div class="form-group"><!-- 类型 -->
                            <label class="control-label col-md-4 col-sm-4" for="type">类型 * :</label>
                            <div class="col-md-6 col-sm-6">
                                <select class="form-control" name="type" id="type">
                                    @forelse ( $types as $type )
                                        <option value="{{ $type }}" @if ( ($item['type']??'common')==$type ) selected="selected" @endif>{{ $type }}</option>
                                    @empty
                                        <option value="common">通用</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><!-- 描述 -->
                            <label class="control-label col-md-4 col-sm-4" for="description">描述 :</label>
                            <div class="col-md-6 col-sm-6">
                                <textarea class="form-control" name="description" placeholder="描述" id="description">{{ $item['description'] }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-4 col-sm-4"></label>
                            <div class="col-md-6 col-sm-6">
                                <button type="submit" class="btn btn-primary">提交</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('template/color_admin/plugins/parsley/dist/parsley.min.js') }}"></script>
    <script src="{{ asset('template/color_admin/plugins/parsley/src/i18n/zh_cn.js') }}"></script>
    <script src="{{ asset('template/color_admin/plugins/jquery-tag-it/js/tag-it.min.js')}} "></script>

    <script src="{{ asset('template/color_admin/js/apps.min.js') }}"></script>

    <script type="text/javascript">
        $(function(){
            App.init();
            $('form').parsley();
        });
    </script>
@endsection