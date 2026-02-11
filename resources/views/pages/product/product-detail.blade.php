@extends('app')

@section('meta_title', $meta_title ?? config('app.name'))
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image)

@section('breadcrumbs')
    {{ Breadcrumbs::render(Route::currentRouteName(), $detail, $detail) }}
@endsection

@section('content')
    <main x-data="productDetail" id="product-detail" class="bg-white">
        <section class="container grid grid-cols-1 gap-8 pt-4 px-4 sm:px-6 md:gap-24 md:grid-cols-2 md:pb-10 md:pt-16">
            <div class="flex flex-col gap-8">
                <div class="splide main-product-detail" role="group" aria-label="Main Product Detail Slides">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach($detail->images as $image)
                                <li class="splide__slide">
                                    <img class="w-full h-[300px] object-cover" src="{{ $image }}" alt="{{ $detail->variant->name . ' ' . $detail->name }}">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="splide thumbnail-product-detail flex flex-row-reverse justify-between items-center" role="group" aria-label="Thumbnail Product Detail Slides">
                    <div class="splide__arrows thumbnail-arrows">
                        <button type="button" class="splide__arrow splide__arrow--prev">
                            <span class="icon-[lucide--chevron-left] text-3xl"></span>
                        </button>
                        <button type="button" class="splide__arrow splide__arrow--next">
                            <span class="icon-[lucide--chevron-right] text-3xl"></span>
                        </button>
                    </div>
                    <div class="splide__track w-[150px] min-[350px]:w-auto">
                        <ul class="splide__list">
                            @foreach($detail->images as $image)
                                <li class="splide__slide">
                                    <img class="w-[70] h-[60px] object-cover" src="{{ $image }}" alt="{{ $detail->variant->name . ' ' . $detail->name . ' - Foto ' . $loop->iteration }}">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-2 pb-8 md:gap-5 md:pb-0">
                <div class="space-y-0">
                    <p class="large text-[#9A9A9A]">{{ $detail->variant->name ?? $detail->category->name }}</p>
                    <h2 class="text-qt-green-normal">{{ $detail->name }}</h2>
                </div>
                <div class="flex flex-col gap-3">
                    @if(in_array('furnace_type', array_column($detail->specs, 'type')))
                        <div class="flex items-center gap-1.5">
                            <x-icons.target-icon class="size-3 shrink-0" />
                            <p class="small text-[#868686]">{{ $detail->specs[array_search('furnace_type', array_column($detail->specs, 'type'))]['data']['types']['name'] }}</p>
                        </div>
                    @endif
                    @if(in_array('power_type', array_column($detail->specs, 'type')))
                        <div class="flex items-center gap-1.5">
                            <span class="icon-[pajamas--power] text-xs shrink-0"></span>
                            <p class="small text-[#868686]">{{ $detail->specs[array_search('power_type', array_column($detail->specs, 'type'))]['data']['types']['name'] }}</p>
                        </div>
                    @endif
                    @if(in_array('fuel_type', array_column($detail->specs, 'type')))
                        <div class="flex items-center gap-1.5">
                            <span class="icon-[el--fire] text-xs shrink-0"></span>
                            <p class="small text-[#868686]">{{ $detail->specs[array_search('fuel_type', array_column($detail->specs, 'type'))]['data']['types']['name'] }}</p>
                        </div>
                    @endif
                    @if(in_array('length_type', array_column($detail->specs, 'type')))
                        <div class="flex items-center gap-1.5">
                            <x-icons.spiral-icon class="size-3 shrink-0" />
                            <p class="small text-[#868686]">{{ $detail->specs[array_search('length_type', array_column($detail->specs, 'type'))]['data']['types']['name'] }}</p>
                        </div>
                    @endif
                </div>
                <x-inputs.button type="button" size="lg" event="$store.productDrawer.openDrawer(data)" class="w-max hidden md:block">
                    Beli Sekarang
                </x-inputs.button>
            </div>
            <div x-cloak x-data="{ data: {{ json_encode($data_drawer) }} }" :class="isVisible ? 'bottom-0' : '-bottom-full'" class="fixed z-40 transition-all duration-300 ease-in-out left-1/2 -translate-x-1/2 bg-white p-4 max-w-full w-full rounded-t-2xl drop-shadow-float-lg md:hidden">
                {{-- <div class="space-y-0">
                    <span>Harga</span>
                    <div class="flex space-x-1">
                        <p>Rp</p>
                        <p class="large">350.000</p>
                    </div>
                </div> --}}
                <x-inputs.button type="button" size="lg" event="$store.productDrawer.openDrawer(data)" class="drop-shadow-float w-full">
                    Beli Sekarang
                </x-inputs.button>
            </div>
        </section>
        <section>
            <div id="tabs-border-anchor" :class="$store.scrollStack.isTop ? 'top-[68px] duration-150 delay-200 md:top-[72px] lg:top-20' : 'top-0 duration-50'" class="sticky z-30 transition-all ease-in-out w-full bg-[#F4F4F4]">
                <div class="container overflow-x-auto px-8 md:px-6 md:flex md:justify-between">
                    <div class="flex gap-8">
                        <a href="#fitur" class="tab-border active">Fitur</a>
                        <a href="#spesifikasi" class="tab-border">Spesifikasi</a>
                        @if(!empty($detail->gallery))
                            <a href="#galeri" class="tab-border">Galeri</a>
                        @endif
                        <a href="#bandingkan" class="tab-border">Bandingkan</a>
                        <a href="#bantuan" class="tab-border">Bantuan</a>
                    </div>
                    <div class="hidden items-center-safe gap-10 lg:flex">
                        <div class="space-y-0">
                            <p class="small text-[#9A9A9A]">{{ $detail->variant->name ?? $detail->category->name . ' Quantum' }}</p>
                            <h5>{{ $detail->name }}</h5>
                        </div>
                        <x-inputs.button type="button" size="lg" color="white" event="$store.productDrawer.openDrawer(data)" class="w-max">
                            Beli Sekarang
                        </x-inputs.button>
                    </div>
                </div>
            </div>
            <div id="fitur" class="container scrollspy flex flex-col gap-[42px] py-[60px] px-4 scroll-mt-24 sm:px-6 md:pt-[100px]">
                <div class="space-y-4 text-center max-w-sm mx-auto sm:max-w-5xl md:mx-0 md:text-left">
                    <h2>Apa Keunggulan {{ $detail->category->name . ' Quantum ' . $detail->name . '?' }}</h2>
                    <p class="text-[#6D6D6D]">Pilihan tepat untuk dapur Anda, Quantum hadirkan efisiensi dan kepraktisan dalam setiap masakan.</p>
                </div>
                <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($detail->superiorities as $superiority)
                        <x-displays.simple-card :simetric="true">
                            <h4>{{ $superiority->title }}</h4>
                            <p class="small text-[#9A9A9A]">{{ $superiority->description }}</p>
                            <x-slot:icon>
                                @if($superiority->getFirstMediaUrl('icon_green'))
                                    <img src="{{ $superiority->getFirstMediaUrl('icon_green') }}" class="size-8" alt="">
                                @else
                                    <x-icons.elegant-icon class="fill-qt-green-normal size-8" />
                                @endif
                            </x-slot:icon>
                        </x-displays.simple-card>
                    @endforeach
                </div>
            </div>
            <div class="container flex flex-col gap-[42px] py-[92px]">
                <div class="space-y-4 text-center max-w-sm mx-auto px-4 sm:px-6 sm:max-w-5xl md:mx-0 md:text-left">
                    <h2>Fitur Utama {{ $detail->category->name . ' Quantum ' . $detail->name }}</h2>
                    <p class="text-[#6D6D6D]">Kompor dengan Kombinasi Sempurna Performa dan Estetika untuk Dapur Anda</p>
                </div>
                <div class="flex flex-col gap-8">
                    <div class="px-4 sm:px-6">
                        <x-displays.inside-card :image="$detail->features[0]->getFirstMediaUrl('feature_image') ? $detail->features[0]->getFirstMediaUrl('feature_image') : asset('images/og-image.jpg')" :alt="$detail->features[0]->name">
                            <h4>{{ $detail->features[0]->name }}</h4>
                            @if($detail->features[0]->description)
                                <p class="small">{{ $detail->features[0]->description }}</p>
                            @endif
                        </x-displays.inside-card>
                    </div>
                    @if($detail->features->count() > 1)
                        <div class="splide feature-product" role="group" aria-label="Feature Product Slides">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    @foreach($detail->features->skip(1) as $feature)
                                        <li class="splide__slide">
                                            <x-displays.swipe-card :image="$feature->getFirstMediaUrl('feature_image') ? $feature->getFirstMediaUrl('feature_image') : asset('images/og-image.jpg')" :alt="$feature->name">
                                                <h4>{{ $feature->name }}</h4>
                                                @if($feature->description)
                                                    <p class="small text-[#9A9A9A]">{{ $feature->description }}</p>
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
            <div class="w-full h-px bg-[#CECECE] md:hidden"></div>
            <div id="spesifikasi" class="container scrollspy py-[60px] px-4 scroll-mt-24">
                <div class="space-y-8">
                    <h2>Spesifikasi</h2>
                    <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                        @if(in_array('dimension_image', array_column($detail->specs_detail, 'type')) || in_array('dimension_text', array_column($detail->specs_detail, 'type')))
                            <x-displays.accordion type="secondary" title="Dimensi" :open="true">
                                <div class="flex flex-col gap-4">
                                    @if(in_array('dimension_image', array_column($detail->specs_detail, 'type')))
                                        <div class="mt-2 mx-auto">
                                            <img class="w-full object-cover object-center max-w-[350px]" src="{{ $detail->specs_detail[array_search('dimension_image', array_column($detail->specs_detail, 'type'))]['data']['value'] }}" alt="Dimensi {{ $detail->variant->name . ' ' . $detail->name }}">
                                        </div>
                                    @endif
                                    @if(in_array('dimension_text', array_column($detail->specs_detail, 'type')))
                                        <div class="grid grid-cols-2 gap-4 lg:grid-cols-3">
                                            @foreach($detail->specs_detail[array_search('dimension_text', array_column($detail->specs_detail, 'type'))]['data']['value'] as $label => $dimension)
                                                <x-displays.specs :label="$label">
                                                    <p>{{ $dimension }}</p>
                                                </x-displays.specs>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </x-displays.accordion>
                        @endif
                        @if(in_array('detail', array_column($detail->specs_detail, 'type')))
                            <x-displays.accordion type="secondary" title="Spesifikasi Detil" :open="true">
                                <div class="mt-8 grid grid-cols-2 gap-4 lg:grid-cols-3">
                                    @foreach($detail->specs_detail[array_search('detail', array_column($detail->specs_detail, 'type'))]['data']['value'] as $label => $spec)
                                        <x-displays.specs :label="$label">
                                            <p>{{ $spec }}</p>
                                        </x-displays.specs>
                                    @endforeach
                                </div>
                            </x-displays.accordion>
                        @endif
                    </div>
                </div>
            </div>
            <div class="w-full h-px bg-[#CECECE]"></div>
            @if(!empty($detail->gallery))
                <div id="galeri" class="container scrollspy border-b border-[#CECECE] flex flex-col gap-8 py-[60px] px-4 scroll-mt-24">
                    <h2>Galeri</h2>
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        @foreach($detail->gallery as $item)
                            @switch($item['type'])
                                @case('image')
                                    <div class="rounded-2xl overflow-hidden">
                                        <img class="w-full h-[230px] object-cover object-center md:h-[420px]" src="{{ asset('storage/' . $item['data']['value']) }}" alt="{{ $detail->variant->name . ' ' . $detail->name . ' - Foto Galeri ' . $loop->iteration }}">
                                    </div>
                                    @break
                                @case('video_upload')
                                    <div class="relative rounded-2xl overflow-hidden">
                                        <img class="w-full h-[420px] object-cover object-center" src="{{ asset('storage/' . $item['data']['thumbnail']) }}" alt="{{ $detail->variant->name . ' ' . $detail->name . ' - Video Galeri ' . $loop->iteration }}">
                                        <div class="absolute top-0 left-0 size-full flex justify-center items-center">
                                            @php
                                                $video = [
                                                    'type' => 'local',
                                                    'src' => asset('storage/' . $item['data']['value']),
                                                ];
                                            @endphp
                                            <button x-data="{ video: @js($video) }" type="button" @click="$store.videoModal.openVideo(video)" class="flex justify-center items-center size-[60px] bg-white text-[#106B75] rounded-full cursor-pointer">
                                                <span class="icon-[ph--play-bold] text-3xl"></span>
                                            </button>
                                        </div>
                                    </div>
                                    @break
                                @case('video_youtube')
                                    <div class="relative rounded-2xl overflow-hidden">
                                        <img class="w-full h-[420px] object-cover object-center" src="{{ asset('storage/' . $item['data']['thumbnail']) }}" alt="{{ $detail->variant->name . ' ' . $detail->name . ' - Video Galeri ' . $loop->iteration }}">
                                        <div class="absolute top-0 left-0 size-full flex justify-center items-center">
                                            @php
                                                $video = [
                                                    'type' => 'youtube',
                                                    'src' => $item['data']['video_id'],
                                                ];
                                            @endphp
                                            <button x-data="{ video: @js($video) }" type="button" @click="$store.videoModal.openVideo(video)" class="flex justify-center items-center size-[60px] bg-white text-[#106B75] rounded-full cursor-pointer">
                                                <span class="icon-[ph--play-bold] text-3xl"></span>
                                            </button>
                                        </div>
                                    </div>
                                    @break
                            @endswitch
                        @endforeach
                    </div>
                </div>
            @endif
            <div id="bandingkan" class="container scrollspy flex flex-col gap-8 py-[60px] px-4 scroll-mt-24">
                <h2>Bandingkan</h2>
                <div class="flex flex-col gap-4">
                    <div class="border-b border-[#CECECE] py-3">
                        <h4>Produk</h4>
                    </div>
                    <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
                        <div>
                            <x-displays.product-card size="sm" :disableView="true" :disableSpecs="true" :payload="$detail" />
                        </div>
                        @if($compare_product)
                            <div>
                                <x-displays.product-card size="sm" :disableSpecs="true" :payload="$compare_product" />
                            </div>
                        @endif
                    </div>
                </div>
                <div class="flex flex-col gap-8">
                    <div class="border-b border-[#CECECE] py-3">
                        <h4>Spesifikasi Detil</h4>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex flex-col gap-4">
                            @foreach($detail->specs_detail[array_search('detail', array_column($detail->specs_detail, 'type'))]['data']['value'] as $label => $spec)
                                <x-displays.specs :label="$label">
                                    <p>{{ $spec }}</p>
                                </x-displays.specs>
                            @endforeach
                        </div>
                        @if($compare_product)
                            <div class="flex flex-col gap-4">
                                @foreach($compare_product->specs_detail[array_search('detail', array_column($compare_product->specs_detail, 'type'))]['data']['value'] as $label => $spec)
                                    <x-displays.specs :label="$label">
                                        <p>{{ $spec }}</p>
                                    </x-displays.specs>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-[#F4F4F4]">
            <div class="container flex flex-col gap-8 py-[60px]">
                <h2 class="max-w-60 px-4 sm:max-w-5xl">Rekomendasi Produk Lainnya</h2>
                @if(!$recommendation_products->isEmpty())
                    <div class="splide recommendation-product" role="group" aria-label="Recommendation Products Slides">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach($recommendation_products as $product)
                                    <li class="splide__slide">
                                        <x-displays.product-card :payload="$product" />
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @else
                    <div class="min-h-[100px] flex justify-center items-center md:min-h-[200px]">
                        <p class="text-center text-gray-500">Tidak ada data untuk ditampilkan</p>
                    </div>
                @endif
            </div>
        </section>
        <section id="bantuan" class="container flex flex-col gap-[42px] py-[60px] px-4">
            <div class="flex flex-col gap-4 max-w-[676px]">
                <h2>Panduan</h2>
                @if($detail->getFirstMedia('guidance_product'))
                    <x-displays.guidance-card :payload="$detail" />
                @else
                    <div class="min-h-20 flex justify-center items-center md:min-h-40">
                        <p class="text-center text-gray-500">Panduan belum tersedia</p>
                    </div>
                @endif
            </div>
            <div class="flex flex-col gap-4 md:gap-8">
                <h2>Info Lainnya</h2>
                <div class="flex flex-col gap-4 md:flex-row">
                    <x-displays.simple-card>
                        <h3 class="md:text-2xl">Tips dan Edukasi</h3>
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
                        <h3 class="md:text-2xl">Tutorial Video</h3>
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
            </div>
        </section>
    </main>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('productDetail', () => ({
            isVisible: true,

            init() {
                window.onscroll = (ev) => {
                    if ((window.innerHeight + Math.round(window.scrollY)) >= document.body.offsetHeight - 300) {
                        this.isVisible = false
                    } else {
                        this.isVisible = true
                    }
                };
            },
        }));
    });
</script>
@endpush
