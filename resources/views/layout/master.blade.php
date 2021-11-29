<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/css/style.css">
    <title>learn laravel - @yield('title')</title>
</head>
<body>
    @include('layout.header')
    @yield('content')
    @include('layout.footer')

</body>
</html>
