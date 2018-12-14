<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>Cases View</title>

	<link rel="stylesheet" href="/vendor/jquery/bootstrap-4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/vendor/jquery/layer-3.1.1/theme/default/layer.css">
</head>
<body>
	<div class="container">
		<form>
			<div class="form-group">
				<label for="title">标题</label>
				<input type="text" name="title" class="form-control" id="title" placeholder="请输入标题">
			</div>
			<div class="form-group">
				<label for="department">科室</label>
				<select name="department" class="form-control" id="department">
					<option value="">==请选择科室==</option>
					@foreach ( $departments as $index => $item )
						<option value="{{$index}}">{{$item}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="project">项目</label>
				<select name="project" class="form-control" id="project">
					<option value="">==请选择项目==</option>
				</select>
			</div>
			<div class="form-group">
				<label for="doctor">医师</label>
				<select name="doctor" class="form-control" id="doctor">
					<option value="">==请选择医师==</option>
					@foreach ( $doctors as $index => $item )
						<option value="{{$index}}">{{$item}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="star">星级</label>
				<select name="star" class="form-control" id="star">
					<option value="">==请选择星级==</option>
					@foreach ( $stars as $index => $item )
						<option value="{{$index}}">{{$item}}</option>
					@endforeach
				</select>
			</div>
			<button type="submit" class="btn btn-primary">完成</button>
			<input type="hidden" name="csrf-token" value="{{csrf_token()}}" id="csrf-token">
		</form>
	</div>

	<script type="text/javascript" src="/vendor/jquery/jquery-3.2.1/jquery.min.js"></script>
	<script src="/vendor/jquery/bootstrap-4.0.0/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/vendor/jquery/layer-3.1.1/layer.js"></script>

	<script type="text/javascript">
		$(function(){
			$("select[name=department]").change(function(){
				$.ajax({
					url: '/api/structure/category_items/' + $(this).val(),
					method: 'get',
					dataType: 'json',
					success: function(result){
						var html = '';
						console.log(result.data)

						$.each(result.data, function(index, item){
							html += "<option value='" + item.id + "'>" + item.title + "</option>"
						});

						$("#project").append(html);
					}
				});
			});
			$("button[type=submit]").click(function(){
				var title = $("input[name=title]").val();
				var department = $("select[name=department]").val();
				var project = $("select[name=project]").val();
				var doctor = $("select[name=doctor]").val();
				var csrf_token = $("input[name=csrf-token]").val();

				if ( !title || !department || !project ) {
					layer.msg('信息填写不完整');
				} else {
					$.ajax({
						url: '/api/project/case',
						method: 'POST',
						data: {
							title: title,
							department: department,
							project: project,
							doctor: doctor
						},
						success: function(result){

						}
					});
				}

				return false;
			});
		});
	</script>
</body>
</html>