<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    @include('front.layouts.styles')
</head>
<body>
    @include('front.layouts.navigation')
    <div id="app">
        @yield('content')
    </div>
    @include('front.layouts.footer')
    @include('front.layouts.scripts')
</body>
</html>
