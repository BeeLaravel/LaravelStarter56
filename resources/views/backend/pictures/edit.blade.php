@extends('backend.layouts.master')
@section('styles')
    <style type="text/css">
        
    </style>
@endsection
@section('page')
	<div class="container-fluid">
        <div class="animated fadeIn">
            <form action="{{ url('/backend/pictures/'.$item->id) }}" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <strong>图片库</strong>
                        <small>编辑</small>
                    </div>
                    <div class="card-block">
                        @if ( $errors->any() )
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ( $errors->all() as $error )
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @csrf
                        {{ method_field('PATCH') }}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">标题 *</label>
                                    <input type="text" name="title" value="{{ $item['title'] ?? '' }}" class="form-control" id="title" placeholder="请输入标题">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="image">图片 *</label>
                                    <img src="{{'/storage/'.$item['image']}}" style="display: block; margin: 0 auto; height: 400px;">
                                    <input type="file" name="image" class="form-control" id="image">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="category_id">请选择分类</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option value="0">==请选择==</option>
                                        @foreach ( $categories as $category_id => $category_title )
                                            <option value="{{ $category_id }}" @if ( $category_id == $item['category_id'] ) selected @endif>{{ $category_title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="description">描述</label>
                                    <textarea name="description" class="form-control" id="description" placeholder="描述">{{ $item['description'] }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="sort">排序</label>
                                    <input type="number" name="sort" value="{{ $item['sort']??'255' }}" class="form-control" id="sort" required min="0" max="255">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-dot-circle-o"></i> 提交</button>
                        <button type="reset" class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> 重置</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
