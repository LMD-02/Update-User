<!doctype html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ url('favicon.ico?v=2') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="copyright" content="Copyright © {{date('Y')}} by 123job.vn">
    <meta name="author" content="123job">
    <meta name="revisit-after" content="1 days">
    <meta name="rating" content="general">
    <meta name="distribution" content="Global">
    @yield('title')
    @yield('css')
</head>
<body>
@yield('content')
@yield('modal')
@yield('script')
</body>
</html>
