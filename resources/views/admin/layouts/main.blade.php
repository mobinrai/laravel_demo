<!doctype html>
<html lang="en-US" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title')</title>
    @include('admin.layouts.styles')
</head>

<body>
    <main class="main" id="top">
        <div class="container-fluid px-0">
            {{-- site side navigation bar section --}}
            @include('admin.layouts.side_navigation')
            {{-- site top navigation bar section --}}
            @include('admin.layouts.top_navigation')
            {{-- div content --}}
            <div class="content pt-5">
                @yield('content')
                {{-- site footer section --}}
                @include('admin.layouts.footer')
                {{-- site scripts section --}}
                @include('admin.layouts.scripts')
            </div>
        </div>
    </main>
</body>

</html>
