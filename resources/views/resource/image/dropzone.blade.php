<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dropzone 批量文件上传</title>

    <link rel="stylesheet" href="/vendor/jquery/bootstrap-3.3.5/css/bootstrap.min.css">

    <link rel="stylesheet" href="/resource/dropzone/style.css">

    @yield('header')
</head>
<body>
    <div class="container">
        <div class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">文件上传</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="/upload">Upload</a></li>
                    <li><a href="/upload2">Upload2</a></li>
                    <li><a href="/upload3">Upload3</a></li>
                </ul>
            </div>
        </div>
        <br><br>
        @yield('content')
    </div>

    @yield('footer')
</body>
</html>
