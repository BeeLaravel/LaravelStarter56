<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

	<title>Links</title>

	<link rel="stylesheet" href="/css/link.css">
</head>
<body>
	<header class="header">
		<div class="container">
			BeeSoft.ink Links
			<div class="auth right">
				@auth
					<a href="/login">{{ auth()->user->name }}</a> <a href="/logout">退出</a>
				@else
					<a href="/login">登录</a> | <a href="/register">注册</a>
				@endauth
			</div>
		</div>
	</header>
	<div class="main">
		<div class="container">
			<ul class="links">
				@foreach ( $categories as $category_first )
					<li>
						<header>{{ $category_first->title }}</header>
						<ul>
							@foreach ( $category_first->children as $category_second )
								<li>
									<header>{{ $category_second->title }}</header>
									<ul>
										@foreach ( $category_second->children as $category_third )
											<li>
												<header>{{ $category_third->title }}</header>
												<ul>
													@foreach ( $category_third->links as $item )
														<li><a href="{{ url($item->url) }}" title="{{ $item->description }}">{{ $item->title }}</a></li>
													@endforeach
												</ul>
											</li>
										@endforeach
									</ul>
								</li>
							@endforeach
						</ul>
					</li>
				@endforeach
			</ul>
		</div>
	</div>
	<footer class="footer">
		<div class="container">
			<div class="copyright"><a href="http://www.beesoft.ink">BeeSoft.ink</a> @ {{ date('Y') }}</div>
		</div>
	</footer>
</body>
</html>