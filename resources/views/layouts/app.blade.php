<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'ChangGE') - ChangGE</title>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('zoom/zoom.css') }}" rel="stylesheet">
    @yield('style')

</head>

<body>
    @yield('full_page')
    <div id="app" class="{{ route_class() }}-page">

        @include('layouts._header')
        <div class="container">
            @include('shared._messages')
        </div>
        @yield('full_content')
        <div class="container">
            @yield('content')
        </div>
        <div style="height:40px">
        </div>
        @yield('onfooter')
        @include('layouts._footer')

    </div>
    @yield('full_page_end')
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('zoom/zoom.js') }}"></script>
    @yield('script')
</body>

</html>
