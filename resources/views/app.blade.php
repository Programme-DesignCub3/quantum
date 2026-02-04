<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Primary Meta Tags -->
    <title>@yield('meta_title')</title>
    <meta name="title" content="@yield('meta_title')" />
    <meta name="description" content="@yield('meta_description')" />
    <meta name="keywords" content="@yield('meta_keywords')" />
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ URL::current() }}" />
    <meta property="og:title" content="@yield('meta_title')" />
    <meta property="og:description" content="@yield('meta_description')" />
    <meta property="og:image" content="@yield('meta_image')" />
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:url" content="{{ URL::current() }}" />
    <meta property="twitter:title" content="@yield('meta_title')" />
    <meta property="twitter:description" content="@yield('meta_description')" />
    <meta property="twitter:image" content="@yield('meta_image')" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="canonical" href="{{ URL::current() }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="antialiased font-sans bg-white">
    <x-navigation.navbar
        :transparent="Route::currentRouteName() === 'home'"
        :sticky="Route::currentRouteName() !== 'home'"
    />
    @if(Route::currentRouteName() !== 'home')
        @yield('breadcrumbs')
    @endif
    @yield('content')
    <x-global-drawer />
    <x-global-video-popup />
    <x-navigation.floating />
    <x-navigation.footer />
    @livewireScripts
    @stack('scripts')
</body>
</html>
