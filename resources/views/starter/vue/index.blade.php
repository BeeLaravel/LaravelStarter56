<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel Vue</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ mix('starter/vue/css/app.css') }}">
</head>
<body>
    <div id="app"></div>

    <script src="{{ mix('starter/vue/js/app.js') }}"></script>
</body>
</html>