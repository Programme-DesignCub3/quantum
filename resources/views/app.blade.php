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
{{-- <body class="antialiased max-w-md mx-auto font-sans bg-white"> --}}
<body class="antialiased max-w-md mx-auto font-sans bg-pink-200/90">
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
    <x-displays.drawer store="productDrawer" color="green">
        <div class="flex flex-col gap-6 px-2">
            <div class="flex items-center gap-4">
                <div class="shrink-0 bg-white rounded-2xl overflow-hidden">
                    <img class="size-[100px] object-cover object-center" :src="$store.productDrawer.data?.image || ''" alt="">
                </div>
                <div class="flex flex-col gap-2.5">
                    <div class="space-y-0">
                        <span x-text="$store.productDrawer.data?.category || ''" class="text-[#9A9A9A]"></span>
                        <h4 x-text="$store.productDrawer.data?.name || ''" class="text-qt-green-normal"></h4>
                    </div>
                    <div class="flex items-center gap-1">
                        <span>Rp</span>
                        <p x-text="$store.productDrawer.data?.price || ''"></p>
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-center items-center gap-6">
                <h4>Beli Produk di Marketplace</h4>
                <div class="flex gap-2.5">
                    <a :href="$store.productDrawer.data?.marketplace.lazada" target="_blank" class="flex justify-center items-center size-[70px] bg-white rounded-full">
                        <img src="{{ asset('images/lazada.png') }}" alt="">
                    </a>
                    <a :href="$store.productDrawer.data?.marketplace.blibli" target="_blank" class="flex justify-center items-center size-[70px] bg-white rounded-full">
                        <img src="{{ asset('images/blibli.png') }}" alt="">
                    </a>
                    <a :href="$store.productDrawer.data?.marketplace.shopee" target="_blank" class="flex justify-center items-center size-[70px] bg-white rounded-full">
                        <img src="{{ asset('images/shopee.png') }}" alt="">
                    </a>
                    <a :href="$store.productDrawer.data?.marketplace.tokopedia" target="_blank" class="flex justify-center items-center size-[70px] bg-white rounded-full">
                        <img src="{{ asset('images/tokopedia.png') }}" alt="">
                    </a>
                </div>
            </div>
        </div>
    </x-displays.drawer>
    <x-navigation.floating />
    <x-navigation.footer />
    @livewireScripts
    @stack('scripts')
</body>
</html>
