<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @vite(['resources/assets/libs/bootstrap/css/bootstrap.min.css','resources/assets/css/styles.css', 'resources/assets/css/icons.css', 'resources/assets/css/custom.css'])
    @yield('css')
</head>
<body class="{{ (!auth()->check()) ? 'authentication-background' : '' }}">
    <div id="app">
        @if (auth()->check())
            @include('core.switcher')
            <div id="loader" >
                <img src="{{ url('assets/images/media/loader.svg') }}" alt="" />
            </div>
            <div class="page">
                @include('core.header')
                @include('layouts.role.' . strtolower(auth()->user()->role))
                @yield('content')
                <footer class="footer mt-auto py-3 bg-white text-center">
                    <div class="container">
                        <span class="text-muted"> Copyright © 
                            <span id="year"></span>
                            <a href="javascript:void(0);" class="text-dark fw-medium">{{ config('app.name') }}</a>.
                            All rights reserved
                        </span>
                    </div>
                </footer>
            </div>
            <div class="scrollToTop">
                <span class="arrow"><i class="ti ti-arrow-narrow-up fs-20"></i></span>
            </div>
            <div id="responsive-overlay"></div>
        @else
            @yield('content')
        @endif
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    @if (auth()->check())
        <script src="{{ url('assets/libs/@popperjs/core/umd/popper.min.js') }}"></script>
        <script src="{{ url('assets/libs/bootstrap/js/bootstrap.bundle.js') }}"></script>
        <script src="{{ url('assets/js/defaultmenu.min.js') }}"></script>
        <script src="{{ url('assets/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ url('assets/js/sticky.js') }}"></script>
        <script src="{{ url('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ url('assets/js/simplebar.js') }}"></script>
        <script src="{{ url('assets/js/custom.js') }}"></script>
        <script src="{{ url('assets/js/custom-switcher.min.js') }}"></script>
    @endif
    @stack('scripts')
</body>
</html>