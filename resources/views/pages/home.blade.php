@extends('app')

@section('meta_title', $meta_title ?? config('app.name'))
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image)

@section('content')
    <main id="homepage" class="bg-white">
        <section class="splide slideshow-home relative" role="group" aria-label="Quantum Home Slides">
            <div class="absolute z-10 flex flex-col justify-end size-full">
                <div class="w-full h-1/2 text-white space-y-4 text-center pt-16 px-4 min-[375px]:pt-20 min-[400px]:pt-28 min-[375px]:px-12">
                    <h1>{{ $page_settings->home_title_banner }}</h1>
                    <p class="large">{{ $page_settings->home_description_banner }}</p>
                    <x-inputs.button type="hyperlink" href="{{ route('product') }}" size="lg" color="white">
                        LAGI CARI APA?
                    </x-inputs.button>
                </div>
            </div>
            <div class="splide__track">
                <ul class="splide__list">
                    @if(count($page_settings->home_banner) > 0)
                        @foreach($page_settings->home_banner as $banner)
                            <li class="splide__slide">
                                <img class="brightness-90" src="{{ asset('storage/' . $banner) }}" alt="">
                            </li>
                        @endforeach
                    @else
                        <li class="splide__slide">
                            <img class="brightness-90" src="{{ asset('images/home-mobile-placeholder.jpg') }}" alt="">
                        </li>
                    @endif
                </ul>
            </div>
            <ul class="splide__pagination slide-home"></ul>
        </section>
        <section class="flex flex-col gap-8 py-[92px] bg-[#F4F4F4]">
            <div class="px-4 text-center space-y-4 max-w-sm mx-auto">
                <h2>{{ $page_settings->home_title_product }}</h2>
                <p class="large text-[#6D6D6D]">{{ $page_settings->home_description_product }}</p>
            </div>
            <livewire:displays.product-best-seller />
        </section>
        <section class="flex flex-col gap-[42px] py-[92px] bg-white">
            <div class="max-w-sm px-4 mx-auto text-center space-y-4">
                <h2>{{ $page_settings->home_title_why }}</h2>
                <p class="text-[#6D6D6D]">{{ $page_settings->home_description_why }}</p>
            </div>
            <div class="flex flex-col gap-8">
                @if(isset($page_settings->home_why_choose_us_formatted[0]))
                    <div class="px-4">
                        <x-displays.inside-card :image="$page_settings->home_why_choose_us_formatted[0]['image'] ? 'storage/' . $page_settings->home_why_choose_us_formatted[0]['image'] : 'images/og-image.jpg'">
                            <h4>{{ $page_settings->home_why_choose_us_formatted[0]['title'] }}</h4>
                            @if(isset($page_settings->home_why_choose_us_formatted[0]['description']))
                                <p class="small">{{ $page_settings->home_why_choose_us_formatted[0]['description'] }}</p>
                            @endif
                        </x-displays.inside-card>
                    </div>
                @else
                    <div class="min-h-[100px] flex justify-center items-center">
                        <p class="text-center text-gray-500">Tidak ada data untuk ditampilkan</p>
                    </div>
                @endif
                @if(count($page_settings->home_why_choose_us_formatted) > 1)
                    <div class="splide why-choose-home" role="group" aria-label="Why Choose Quantum Slides">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach($page_settings->home_why_choose_us_formatted->skip(1) as $item)
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
        </section>
        <section class="relative">
            <img class="w-full object-cover object-top h-[600px]" src="{{ asset('images/testimonial-mobile.jpg') }}" alt="">
            <div class="absolute w-full h-[400px] bottom-0 left-0 bg-gradient-qt-green"></div>
            <div class="absolute flex flex-col gap-[55px] bottom-0 left-0 size-full pt-22">
                <div class="flex justify-center items-center p-6">
                    <button x-data="{ video: @js($video) }" type="button" @click="$store.videoModal.openVideo(video)" class="flex justify-center items-center size-[60px] bg-white text-[#106B75] rounded-full cursor-pointer">
                        <span class="icon-[ph--play-bold] text-3xl"></span>
                    </button>
                </div>
                <div class="space-y-6">
                    <h2 class="text-white px-6 text-center max-w-sm mx-auto">{{ $page_settings->home_title_testimonial }}</h2>
                    <div class="splide testimonial-home" role="group" aria-label="Testimonial Home Slides">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach($page_settings->home_testimonials as $testimonial)
                                    <li class="splide__slide">
                                        <x-displays.testimonial-card :payload="$testimonial" />
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <ul class="splide__pagination slide-testimonial"></ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="flex flex-col gap-9 py-[76px] bg-[#F4F4F4]">
            <div class="px-4 max-w-72 mx-auto text-center">
                <h3>{{ $page_settings->home_title_article }}</h3>
            </div>
            <div class="flex flex-col gap-9">
                @if(!$articles->isEmpty())
                    <div class="splide articles-home" role="group" aria-label="Products Home Slides">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach($articles as $article)
                                    <li class="splide__slide w-[260px]">
                                        <x-displays.article-card :payload="$article" />
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="min-h-[100px] flex justify-center items-center">
                        <p class="text-center text-gray-500">Tidak ada data untuk ditampilkan</p>
                    </div>
                @endif
                <div class="flex justify-center items-center px-4">
                    <x-inputs.button type="hyperlink" href="{{ route('updates.news') }}" size="lg" variant="secondary" color="white" class="w-max">
                        Lihat Lebih Banyak
                    </x-inputs.button>
                </div>
            </div>
        </section>
        <section class="relative">
            <img src="{{ asset('images/conversion-mobile.jpg') }}" alt="">
            <div class="absolute w-full top-[50px] px-8">
                <div class="max-w-xs mx-auto space-y-6 text-center text-white">
                    <div class="space-y-4">
                        <h2>{{ $page_settings->home_title_banner_bottom }}</h2>
                        <p>{{ $page_settings->home_description_banner_bottom }}</p>
                    </div>
                    <x-inputs.button type="hyperlink" href="{{ route('product') }}" size="lg" color="white">
                        Beli Sekarang
                    </x-inputs.button>
                </div>
            </div>
        </section>
    </main>
@endsection
