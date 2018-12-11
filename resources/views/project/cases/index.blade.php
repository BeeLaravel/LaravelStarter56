@extends('project.cases.layout')
@section('metas')
@endsection
@section('title', '案例库 - 主页')
@section('stylesheets')
@endsection
@section('inportant_scripts') 
@endsection
@section('content')
	<header>
		<select name="department">
			<option value="">所有科室</option>
			@foreach ( $departments as $index => $item )
				<option value="{{$index}}">{{$item}}</option>
			@endforeach
		</select>
		<select name="project">
			<option value="">所有项目</option>
		</select>
		<select name="doctor">
			<option value="">所有医师</option>
			@foreach ( $doctors as $index => $item )
				<option value="{{$index}}">{{$item}}</option>
			@endforeach
		</select>
		<select name="star">
			<option value="">所有星级</option>
			@foreach ( $stars as $index => $item )
				<option value="{{$index}}">{{$item}}</option>
			@endforeach
		</select>
	</header>
	<div id="container">
		
	</div>

	<script type="text/x-handlebars-template" id="waterfall-tpl">
	</script>
@endsection
@section('scripts')
	<script type="text/javascript">
		$('#container').waterfall({
			itemCls: 'waterfall-item', 
			prefix: 'waterfall',
			fitWidth: true, 
			colWidth: 240, 
			gutterWidth: 10,
			gutterHeight: 10,
			align: 'center',
			minCol: 1, 
			maxCol: undefined, 
			maxPage: undefined, 
			bufferPixel: -50, 
			containerStyle: {
				position: 'relative'
			},
			resizable: true, 
			isFadeIn: false,
			isAnimated: false,
			animationOptions: { 
			},
			isAutoPrefill: true,
			checkImagesLoaded: true,
			path: function(page) {
		        return '/api/project/cases?page=' + page;
		    },
			dataType: 'json', 
			params: {}, 
			loadingMsg: '<div style="text-align:center;padding:10px 0; color:#999;"><img src="data:image/gif;base64,R0lGODlhEAALAPQAAP///zMzM+Li4tra2u7u7jk5OTMzM1hYWJubm4CAgMjIyE9PT29vb6KiooODg8vLy1JSUjc3N3Jycuvr6+Dg4Pb29mBgYOPj4/X19cXFxbOzs9XV1fHx8TMzMzMzMzMzMyH5BAkLAAAAIf4aQ3JlYXRlZCB3aXRoIGFqYXhsb2FkLmluZm8AIf8LTkVUU0NBUEUyLjADAQAAACwAAAAAEAALAAAFLSAgjmRpnqSgCuLKAq5AEIM4zDVw03ve27ifDgfkEYe04kDIDC5zrtYKRa2WQgAh+QQJCwAAACwAAAAAEAALAAAFJGBhGAVgnqhpHIeRvsDawqns0qeN5+y967tYLyicBYE7EYkYAgAh+QQJCwAAACwAAAAAEAALAAAFNiAgjothLOOIJAkiGgxjpGKiKMkbz7SN6zIawJcDwIK9W/HISxGBzdHTuBNOmcJVCyoUlk7CEAAh+QQJCwAAACwAAAAAEAALAAAFNSAgjqQIRRFUAo3jNGIkSdHqPI8Tz3V55zuaDacDyIQ+YrBH+hWPzJFzOQQaeavWi7oqnVIhACH5BAkLAAAALAAAAAAQAAsAAAUyICCOZGme1rJY5kRRk7hI0mJSVUXJtF3iOl7tltsBZsNfUegjAY3I5sgFY55KqdX1GgIAIfkECQsAAAAsAAAAABAACwAABTcgII5kaZ4kcV2EqLJipmnZhWGXaOOitm2aXQ4g7P2Ct2ER4AMul00kj5g0Al8tADY2y6C+4FIIACH5BAkLAAAALAAAAAAQAAsAAAUvICCOZGme5ERRk6iy7qpyHCVStA3gNa/7txxwlwv2isSacYUc+l4tADQGQ1mvpBAAIfkECQsAAAAsAAAAABAACwAABS8gII5kaZ7kRFGTqLLuqnIcJVK0DeA1r/u3HHCXC/aKxJpxhRz6Xi0ANAZDWa+kEAA7" alt=""><br />Loading...</div>',
			state: { 
				isDuringAjax: false, 
				isProcessingData: false, 
				isResizing: false,
				curPage: 1 
			},
			callbacks: {
				loadingStart: function($loading) {
					$loading.show();
				},
				loadingFinished: function($loading, isBeyondMaxPage) {
					if ( !isBeyondMaxPage ) {
						$loading.fadeOut();
					} else {
						$loading.remove();
					}
				},
				loadingError: function($message, xhr) {
					$message.html('Data load faild, please try again later.');
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
			debug: false
		});
	</script>
@endsection
