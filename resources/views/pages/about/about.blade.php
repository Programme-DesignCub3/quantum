@extends('app')

@section('meta_title', $meta_title ?? 'Tentang Kami')
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image)

@section('breadcrumbs')
    {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endsection

@section('content')
    <main x-data id="about" class="bg-white">
        <section class="relative">
            <img class="w-full h-[560px] object-cover object-top" src="{{ asset('images/about-mobile.jpg') }}" alt="">
            <div class="absolute bottom-0 space-y-4 text-white text-center px-6 pb-[76px]">
                <h1>{{ $page_settings->about_title }}</h1>
                <p class="large">{{ $page_settings->about_description }}</p>
            </div>
        </section>
        <section class="space-y-0">
            <div id="tabs-anchor" :class="$store.scrollStack.isTop ? 'top-[68px] duration-150 delay-200' : 'top-0 duration-50'" class="sticky border-b z-30 px-5 py-3.5 transition-all ease-in-out bg-white border-[#DBDBDB] overflow-x-auto">
                <div class="flex justify-between gap-0.5 w-max min-[420px]:w-full">
                    <a href="#sejarah" class="tab active">Sejarah</a>
                    <a href="#visi-misi" class="tab">Visi & Misi</a>
                    <a href="#award" class="tab">Award</a>
                    <a href="#marketplace" class="tab">Marketplace</a>
                </div>
            </div>
            <div id="sejarah" class="scrollspy space-y-4 text-center scroll-mt-20 px-6 pt-[76px] pb-12">
                <h2 class="max-w-sm mx-auto">{{ $page_settings->about_title_explain }}</h2>
                <div class="space-y-4 text-[#6D6D6D]">
                    <p>{!! $page_settings->about_description_explain_formatted !!}</p>
                </div>
            </div>
            <div class="relative">
                <img src="{{ asset('images/bg-about.jpg') }}" alt="">
            </div>
            <div class="flex flex-col gap-8 py-[92px] bg-[#F4F4F4]">
                <div class="space-y-4 text-center max-w-xs mx-auto">
                    <h2>{{ $page_settings->about_title_history }}</h2>
                    <p class="text-[#6D6D6D]">{{ $page_settings->about_description_history }}</p>
                </div>
                <div class="flex flex-col gap-8">
                    @if(isset($page_settings->about_history_formatted[0]))
                        <div class="px-4">
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
            <div id="visi-misi" class="scrollspy text-center scroll-mt-20 px-4 py-8">
                <div class="space-y-4 py-[60px]">
                    <h2 class="max-w-56 mx-auto">{{ $page_settings->about_title_vision_mission }}</h2>
                    <p class="max-w-sm mx-auto text-[#6D6D6D]">{{ $page_settings->about_description_vision_mission }}</p>
                </div>
            </div>
            <div class="relative">
                <img class="w-full h-[600px] object-cover min-[450px]:h-[700px]" src="{{ asset('images/visi.jpg') }}" alt="">
                <div class="absolute top-0 px-6 pt-[66px] text-center">
                    <div class="space-y-4">
                        <h2>{{ $page_settings->about_title_vision }}</h2>
                        <p>{{ $page_settings->about_description_vision }}</p>
                    </div>
                </div>
            </div>
            <div class="relative">
                <img class="w-full h-[600px] object-cover min-[450px]:h-[700px]" src="{{ asset('images/misi.jpg') }}" alt="">
                <div class="absolute top-0 px-6 pt-[66px] text-center">
                    <div class="space-y-4">
                        <h2>{{ $page_settings->about_title_mission }}</h2>
                        <p>{{ $page_settings->about_description_mission }}</p>
                    </div>
                </div>
            </div>
            <livewire:displays.about-award-list />
            <div id="marketplace" class="scrollspy py-14 px-4 scroll-mt-24">
                <div class="space-y-4 text-center max-w-xs mx-auto">
                    <h2>{{ $page_settings->about_title_marketplace }}</h2>
                    <p class="text-[#6D6D6D]">{{ $page_settings->about_description_marketplace }}</p>
                </div>
                <div class="flex flex-col gap-6">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mx-auto px-5 py-8">
                            <img src="{{ asset('images/shopee-text.png') }}" alt="">
                        </div>
                        <div class="mx-auto px-5 py-8">
                            <img src="{{ asset('images/tokopedia-text.png') }}" alt="">
                        </div>
                        <div class="mx-auto px-5 py-8">
                            <img src="{{ asset('images/blibli-text.png') }}" alt="">
                        </div>
                        <div class="mx-auto px-5 py-8">
                            <img src="{{ asset('images/lazada-text.png') }}" alt="">
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
