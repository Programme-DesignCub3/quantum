<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="antialiased max-w-md mx-auto font-sans bg-white">
    <x-navigation.navbar
        :transparent="Route::currentRouteName() === 'home'"
        :sticky="Route::currentRouteName() !== 'home'"
    />
    @if(Route::currentRouteName() !== 'home')
        @if(Route::current() && count(Route::current()->parameters()) > 0)
            {{ Breadcrumbs::render(Route::currentRouteName(),
                ...array_values(Route::current()->parameters())
            ) }}
        @else
            {{ Breadcrumbs::render(Route::currentRouteName()) }}
        @endif
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
