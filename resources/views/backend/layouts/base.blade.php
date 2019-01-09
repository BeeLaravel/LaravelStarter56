<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title></title>
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <meta name="keyword" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <link href="/template/coreui/css/font-awesome.min.css" rel="stylesheet">
    <link href="/template/coreui/css/simple-line-icons.css" rel="stylesheet">

    <link href="/template/coreui/css/style.css" rel="stylesheet">
    @yield('styles')
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden {{ $style['body-class'] ?? '' }}">
    @yield('body')

    @section('scripts')
        <script src="/template/coreui/assets/js/libs/jquery.min.js"></script>
        <script src="/template/coreui/assets/js/libs/tether.min.js"></script>
        <script src="/template/coreui/assets/js/libs/bootstrap.min.js"></script>
    @show
</body>
</html>
