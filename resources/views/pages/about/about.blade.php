@extends('app')

@section('meta_title', $meta_title ?? 'Tentang Kami')
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image)

@section('breadcrumbs')
    {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endsection

@section('content')
    <main x-data id="about">
        {{-- Banner --}}
        <section class="relative">
            <img class="w-full h-[560px] object-cover object-top md:hidden" src="{{ asset('images/mobile-about-banner.jpg') }}" alt="">
            <img class="w-full h-[600px] object-cover object-top hidden md:block" src="{{ asset('images/desktop-about-banner.jpg') }}" alt="">
            <div class="absolute container bottom-0 text-white text-center px-6 pb-[76px] md:left-1/2 md:-translate-x-1/2 md:p-6 md:text-left md:w-full md:h-full md:text-black md:flex md:flex-col md:justify-center">
                <div class="space-y-4 md:max-w-xl">
                    <h1>{{ $page_settings->about_title }}</h1>
                    <p class="large">{{ $page_settings->about_description }}</p>
                </div>
            </div>
        </section>
        <section class="space-y-0">
            {{-- Tabs --}}
            <div id="tabs-anchor" :class="$store.scrollStack.isTop ? 'top-[68px] duration-150 delay-200 md:top-[72px] lg:top-20' : 'top-0 duration-50'" class="sticky border-b z-30 transition-all ease-in-out bg-white border-[#DBDBDB] overflow-x-auto">
                <div class="container flex justify-between gap-0.5 w-max px-5 py-3.5 min-[420px]:w-full md:justify-center">
                    <a href="#sejarah" class="tab active">Sejarah</a>
                    <a href="#visi-misi" class="tab">Visi & Misi</a>
                    <a href="#award" class="tab">Award</a>
                    <a href="#marketplace" class="tab">Marketplace</a>
                </div>
            </div>
            {{-- History --}}
            <div id="sejarah" class="scrollspy space-y-4 text-center scroll-mt-20 md:text-left">
                <div class="grid grid-cols-1 gap-4 items-center lg:gap-16 lg:grid-cols-2">
                    <div class="space-y-4 px-6 pt-[76px] pb-12 lg:p-0 lg:py-10 lg:pr-16 lg:order-last">
                        <h2 class="w-full max-w-sm mx-auto md:max-w-lg md:mx-0">{{ $page_settings->about_title_explain }}</h2>
                        <div class="space-y-4 text-[#6D6D6D]">
                            <p>{!! $page_settings->about_description_explain_formatted !!}</p>
                        </div>
                    </div>
                    <div class="relative lg:order-first">
                        <img class="w-full min-[550px]:object-cover min-[550px]:object-top min-[550px]:h-[650px] min-[1200px]:hidden" src="{{ asset('images/mobile-about.jpg') }}" alt="">
                        <img class="hidden min-[1200px]:block" src="{{ asset('images/desktop-about.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="bg-[#F4F4F4]">
                <div class="container flex flex-col gap-8 py-[92px]">
                    <div class="space-y-4 text-center max-w-xs mx-auto sm:max-w-5xl">
                        <h2>{{ $page_settings->about_title_history }}</h2>
                        <p class="text-[#6D6D6D]">{{ $page_settings->about_description_history }}</p>
                    </div>
                    <div class="flex flex-col gap-8">
                        @if(isset($page_settings->about_history_formatted[0]))
                            <div class="px-4 sm:px-6">
                                <x-displays.inside-card :image="$page_settings->about_history_formatted[0]['image'] ? 'storage/' . $page_settings->about_history_formatted[0]['image'] : 'images/og-image.jpg'">
                                    <h4>{{ $page_settings->about_history_formatted[0]['title'] }}</h4>
                                    <p class="small">{{ $page_settings->about_history_formatted[0]['description'] }}</p>
                                </x-displays.inside-card>
                            </div>
                        @else
                            <div class="min-h-[100px] flex justify-center items-center">
                                <p class="text-center text-gray-500">Tidak ada data untuk ditampilkan</p>
                            </div>
                        @endif
                        @if(count($page_settings->about_history_formatted) > 1)
                            <div class="splide history-about" role="group" aria-label="History About Slides">
                                <div class="splide__track">
                                    <ul class="splide__list">
                                        @foreach($page_settings->about_history_formatted->skip(1) as $item)
                                            <li class="splide__slide">
                                                <x-displays.swipe-card :image="$item['image'] ? 'storage/' . $item['image'] : 'images/og-image.jpg'">
                                                    <h4>{{ $item['title'] }}</h4>
                                                    @if(isset($item['description']))
                                                        <p class="small text-[#9A9A9A]">{{ $item['description'] }}</p>
                                                    @endif
                                                </x-displays.swipe-card>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            {{-- Visi Misi --}}
            <div id="visi-misi" class="scrollspy text-center scroll-mt-20 px-4 py-8">
                <div class="space-y-4 py-[60px]">
                    <h2 class="max-w-56 mx-auto sm:max-w-5xl">{{ $page_settings->about_title_vision_mission }}</h2>
                    <p class="max-w-sm mx-auto text-[#6D6D6D] sm:max-w-5xl">{{ $page_settings->about_description_vision_mission }}</p>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2">
                <div class="relative">
                    <img class="w-full h-[600px] object-cover min-[450px]:h-[700px] md:hidden" src="{{ asset('images/mobile-visi.jpg') }}" alt="">
                    <img class="w-full h-[600px] object-cover min-[450px]:h-[700px] hidden md:block" src="{{ asset('images/desktop-visi.jpg') }}" alt="">
                    <div class="absolute top-0 px-6 pt-[66px] text-center md:max-w-xl md:text-left md:px-10">
                        <div class="space-y-4">
                            <h2>{{ $page_settings->about_title_vision }}</h2>
                            <p>{{ $page_settings->about_description_vision }}</p>
                        </div>
                    </div>
                </div>
                <div class="relative">
                    <img class="w-full h-[600px] object-cover min-[450px]:h-[700px] md:hidden" src="{{ asset('images/mobile-misi.jpg') }}" alt="">
                    <img class="w-full h-[600px] object-cover min-[450px]:h-[700px] hidden md:block" src="{{ asset('images/desktop-misi.jpg') }}" alt="">
                    <div class="absolute top-0 px-6 pt-[66px] text-center md:max-w-xl md:text-left md:px-10">
                        <div class="space-y-4">
                            <h2>{{ $page_settings->about_title_mission }}</h2>
                            <p>{{ $page_settings->about_description_mission }}</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- Award --}}
            <livewire:displays.about-award-list />
            {{-- Marketplace --}}
            <div id="marketplace" class="container scrollspy py-14 px-4 scroll-mt-24 sm:px-6 md:py-[100px]">
                <div class="space-y-4 text-center max-w-xs mx-auto sm:max-w-5xl">
                    <h2>{{ $page_settings->about_title_marketplace }}</h2>
                    <p class="text-[#6D6D6D]">{{ $page_settings->about_description_marketplace }}</p>
                </div>
                <div class="flex flex-col gap-6">
                    <div class="grid grid-cols-2 gap-4 md:flex md:justify-center md:items-center">
                        <div class="mx-auto px-5 py-8 md:mx-0">
                            <img src="{{ asset('images/shopee-text.png') }}" alt="Shopee Logo">
                        </div>
                        <div class="mx-auto px-5 py-8 md:mx-0">
                            <img src="{{ asset('images/tokopedia-text.png') }}" alt="Tokopedia Logo">
                        </div>
                        <div class="mx-auto px-5 py-8 md:mx-0">
                            <img src="{{ asset('images/blibli-text.png') }}" alt="Blibli Logo">
                        </div>
                        <div class="mx-auto px-5 py-8 md:mx-0">
                            <img src="{{ asset('images/lazada-text.png') }}" alt="Lazada Logo">
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <x-inputs.button type="hyperlink" href="{{ route('product') }}" size="lg">
                            Beli Sekarang
                        </x-inputs.button>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
