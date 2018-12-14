@extends('project.cases.layout')
@section('metas')
@endsection
@section('title', '案例库 - 主页')
@section('stylesheets')
	<link rel="stylesheet" type="text/css" href="/vendor/jquery/layer-3.1.1/theme/default/layer.css">

	<style type="text/css">
		body {
			margin: 0;
		}
		header {
			height: 50px;
			line-height: 50px;
			margin-bottom: 30px;
		    border-top: 4px solid #f46660;
			box-shadow: 0px 1px 11px 2px rgba(42, 42, 42, 0.1);
		}
		header a {
			float: right;
			margin-top: 6px;
			margin-left: 8px;
		}
		.container {
			width: 1200px;
			margin: 0 auto;
		}
		.chosen-container {
		    vertical-align: text-bottom;
		}
		.item {
			padding: 10px;
			box-shadow: 0 1px 3px rgba(34, 25, 25, .4);
			overflow: hidden;
		}
		.item:hover {
			box-shadow: 0 1px 5px rgba(34, 25, 25, .8);
		}
		h5 {
			font-size: 16px;
		    margin-block-start: 8px;
		    margin-block-end: 8px;
		}
		p.line {
			margin-block-start: 6px;
			margin-block-end: 6px;
		}
	</style>
@endsection
@section('inportant_scripts') 
@endsection
@section('content')
	<header>
		<div class="container">
			<select name="department" class="chosen">
				<option value="">所有科室</option>
				@foreach ( $departments as $index => $item )
					<option value="{{$index}}">{{$item}}</option>
				@endforeach
			</select>
			<select name="project" class="chosen">
				<option value="">所有项目</option>
			</select>
			<select name="doctor" class="chosen">
				<option value="">所有医师</option>
				@foreach ( $doctors as $index => $item )
					<option value="{{$index}}">{{$item}}</option>
				@endforeach
			</select>
			<select name="star" class="chosen">
				<option value="">所有星级</option>
				@foreach ( $stars as $index => $item )
					<option value="{{$index}}">{{$item}}</option>
				@endforeach
			</select>
			<a href="/case/upload" role="button" class="btn btn-sm btn-outline-primary">上传</a>
			<a href="/case/batch-upload" role="button" class="btn btn-sm btn-outline-primary">批量上传</a>
			@if ( $flag )
				<a href="/case" role="button" class="btn btn-sm btn-outline-primary">首页</a>
			@else
				<a href="/case/arrangement" role="button" class="btn btn-sm btn-outline-primary">整理</a>
			@endif
		</div>
	</header>
	<div id="container"></div>

	<script type="text/x-handlebars-template" id="waterfall-tpl">
		@{{#data}}
            <div class="item">
                <img src="@{{file_thumbnail}}" layer-src="@{{file_original}}" alt="@{{title}}" width="200" />
                <h5>@{{title}}</h5>
                <p class="line">尺寸：@{{width}}x@{{height}}<button class="btn btn-sm btn-outline-success arrangement_button" style="float: right;" data-id="@{{id}}">整理</button></p>
                <p class="line">科室：@{{department.title}}</p>
                <p class="line">病种：@{{project.title}}</p>
                <p class="line">医师：@{{doctor.title}}</p>
                <p class="line">星级：@{{star.title}}</p>
            </div>
        @{{/data}}
	</script>
@endsection
@section('scripts')
	<script type="text/javascript" src="/vendor/jquery/layer-3.1.1/layer.js"></script>

	<script type="text/javascript">
		var flag = "{{$flag}}";

		$('#container').waterfall({
			itemCls: 'item', // 子项类名
			colWidth: 230, // 列宽
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

					layer.photos({
					    photos: '.item',
					    anim: 5
					});

					$('.arrangement_button').click(function(){
						layer.open({
						    type: 2,
						    title: '整理',
						    shadeClose: true,
						    shade: 0.8,
						    area: ['100%', '100%'],
						    content: '/case/' + $(this).data("id") + '/edit'
						}); 
					});
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
		        return '/api/project/cases/'+flag+'?page=' + page;
		    },
			debug: false
		});
		$(".chosen").chosen({
			disable_search_threshold: 10
		});
		$("select[name=department]").change(function(){
			var department_id = $(this).val();
			$.ajax({
				url: '/api/resource',
				method: 'GET',
				data: {
					department_id: department_id
				},
			});
		});
	</script>
@endsection
