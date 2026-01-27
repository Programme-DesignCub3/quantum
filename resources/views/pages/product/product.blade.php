@extends('app')

@section('meta_title', $meta_title ?? 'Produk')
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image)

@section('breadcrumbs')
    @if(Route::currentRouteName() == 'product.category')
        {{ Breadcrumbs::render(Route::currentRouteName(), $categories->firstWhere('slug', $current_category)) }}
    @else
        {{ Breadcrumbs::render(Route::currentRouteName()) }}
    @endif
@endsection

@section('content')
    <main x-data id="product" class="bg-white">
        <section class="relative">
            <img class="w-full h-[560px] object-cover" src="{{ $product_banner }}" alt="">
            <div class="absolute bottom-0 space-y-4 text-white text-center px-6 pb-[76px]">
                <h1>{{ $page_settings->product_title }}</h1>
                <p class="large">{{ $page_settings->product_description }}</p>
            </div>
        </section>
        <livewire:displays.product-list :current_category="$current_category" />
        <section class="flex flex-col gap-[42px] py-[92px]">
            <div class="space-y-4 text-center max-w-xs mx-auto">
                <h2>{{ $page_settings->product_title_why }}</h2>
                <p class="text-[#6D6D6D]">{{ $page_settings->product_description_why }}</p>
            </div>
            <div class="flex flex-col gap-8">
                @if(isset($page_settings->product_why_choose_us_formatted[0]))
                    <div class="px-4">
                        <x-displays.inside-card :image="$page_settings->product_why_choose_us_formatted[0]['image'] ? 'storage/' . $page_settings->product_why_choose_us_formatted[0]['image'] : 'images/og-image.jpg'" :alt="$page_settings->product_why_choose_us_formatted[0]['title']">
                            <h4>{{ $page_settings->product_why_choose_us_formatted[0]['title'] }}</h4>
                            @if(isset($page_settings->product_why_choose_us_formatted[0]['description']))
                                <p class="small">{{ $page_settings->product_why_choose_us_formatted[0]['description'] }}</p>
                            @endif
                        </x-displays.inside-card>
                    </div>
                @else
                    <div class="min-h-[100px] flex justify-center items-center">
                        <p class="text-center text-gray-500">Tidak ada data untuk ditampilkan</p>
                    </div>
                @endif
                @if(count($page_settings->product_why_choose_us_formatted) > 1)
                    <div class="splide superior-product" role="group" aria-label="Superior Product Slides">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach($page_settings->product_why_choose_us_formatted->skip(1) as $item)
                                    <li class="splide__slide">
                                        <x-displays.swipe-card :image="$item['image'] ? 'storage/' . $item['image'] : 'images/og-image.jpg'" :alt="$item['title']">
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
        <section class="flex flex-col gap-[42px] pt-9 pb-[92px]">
            <div class="space-y-4 text-center max-w-xs mx-auto">
                <h2>{{ $page_settings->product_title_guidance }}</h2>
                <p class="text-[#6D6D6D]">{{ $page_settings->product_description_guidance }}</p>
            </div>
            @if(!$guidances->isEmpty())
                <div class="splide guide-product" role="group" aria-label="Guide and Tutorial Product">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach($guidances as $guidance)
                                <li class="splide__slide">
                                    <div class="max-w-60">
                                        <x-displays.inside-card :image="$guidance->media->first()->getUrl()" :alt="$guidance->title">
                                            <h4>{{ $guidance->title }}</h4>
                                            <x-inputs.button type="hyperlink" href="{{ route('support.guidance.detail', $guidance->slug) }}" size="md" color="white">
                                                Selengkapnya
                                            </x-inputs.button>
                                        </x-displays.inside-card>
                                    </div>
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
        </section>
        <section class="py-[60px] px-4">
            <h2 class="mb-4">Info Lainnya</h2>
            <div class="flex flex-col gap-4">
                <x-displays.simple-card>
                    <h3>Tips dan Edukasi</h3>
                    <p>Simak Tips dan Edukasi Penting Seputar Produk Quantum</p>
                    <x-slot:icon>
                        <x-icons.tips-idea-icon class="fill-qt-green-normal stroke-qt-green-normal size-8" />
                    </x-slot:icon>
                    <x-slot:button>
                        <div class="flex justify-start">
                            <x-inputs.button type="hyperlink" href="{{ route('support.guidance') }}" size="lg">
                                Lihat
                            </x-inputs.button>
                        </div>
                    </x-slot:button>
                </x-displays.simple-card>
                <x-displays.simple-card>
                    <h3>Tutorial Video</h3>
                    <p>Simak berbagai video tutorial praktis seputar produk Quantum</p>
                    <x-slot:icon>
                        <x-icons.video-lesson-icon class="fill-qt-green-normal stroke-qt-green-normal size-8" />
                    </x-slot:icon>
                    <x-slot:button>
                        <div class="flex justify-start">
                            <x-inputs.button type="hyperlink" href="{{ route('support.tutorial-video') }}" size="lg">
                                Lihat
                            </x-inputs.button>
                        </div>
                    </x-slot:button>
                </x-displays.simple-card>
            </div>
        </section>
    </main>
@endsection
