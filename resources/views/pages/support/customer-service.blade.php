@extends('app')

@section('meta_title', $meta_title ?? 'Layanan Pelanggan')
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image)

@section('breadcrumbs')
    {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endsection

@section('content')
    <main id="customer-service" class="bg-white">
        <section class="bg-[#F4F4F4]">
            <div class="container flex flex-col gap-10 px-4 pb-[84px] pt-[116px] sm:px-6">
                <div class="text-center space-y-4 max-w-sm mx-auto sm:max-w-5xl">
                    <h1>{{ $page_settings->cs_title }}</h1>
                    <p class="large">{{ $page_settings->cs_description }}</p>
                </div>
                <div class="grid grid-cols-1 gap-4 lg:grid-cols-3">
                    <div class="flex justify-between gap-4 pl-6 pr-3 py-3 bg-white rounded-2xl">
                        <div class="flex items-center gap-4">
                            <x-icons.service-center-icon class="shrink-0 size-10 fill-qt-green-normal" />
                            <h3 class="md:text-xl">Service Center</h3>
                        </div>
                        <x-inputs.button type="hyperlink" href="{{ route('support.service-center') }}" size="lg">
                            Lihat
                        </x-inputs.button>
                    </div>
                    <div class="flex justify-between gap-4 pl-6 pr-3 py-3 bg-white rounded-2xl">
                        <div class="flex items-center gap-4">
                            <x-icons.faq-icon class="shrink-0 size-10 fill-qt-green-normal" />
                            <h3 class="md:text-xl">FAQ</h3>
                        </div>
                        <x-inputs.button type="hyperlink" href="{{ route('support.faq') }}" size="lg">
                            Lihat
                        </x-inputs.button>
                    </div>
                    <div class="flex justify-between gap-4 pl-6 pr-3 py-3 bg-white rounded-2xl">
                        <div class="flex items-center gap-4">
                            <x-icons.guarantee-icon class="shrink-0 size-10 fill-qt-green-normal" />
                            <h3 class="md:text-xl">Informasi Garansi</h3>
                        </div>
                        <x-inputs.button type="hyperlink" href="{{ route('support.guarantee-information') }}" size="lg">
                            Lihat
                        </x-inputs.button>
                    </div>
                </div>
            </div>
        </section>
        <section class="bg-[#F4F4F4]">
            <div class="container flex flex-col gap-8 pt-10 pb-[68px]">
                <div class="text-center space-y-4 max-w-sm mx-auto px-4 sm:max-w-5xl">
                    <h2>{{ $page_settings->cs_title_support }}</h2>
                    <p class="large text-[#6D6D6D]">{{ $page_settings->cs_description_support }}</p>
                </div>
                <div class="splide solution-cs" role="group" aria-label="Solution Customer Service Slides">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach($page_settings->cs_support as $support)
                                <li class="splide__slide">
                                    <x-displays.swipe-card :image="$support['image'] ? 'storage/' . $support['image'] : 'images/og-image.jpg'" :alt="$support['title']">
                                        <h4 class="md:text-xl">{{ $support['title'] }}</h4>
                                        @if(isset($support['description']))
                                            <p class="small text-[#9A9A9A]">{{ $support['description'] }}</p>
                                        @endif
                                    </x-displays.swipe-card>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="container flex flex-col gap-[42px] py-[92px]">
            <div class="flex justify-between items-center px-4 sm:px-6">
                <div class="space-y-4 text-center max-w-xs mx-auto sm:max-w-5xl md:mx-0 md:text-left">
                    <h2>{{ $page_settings->cs_title_guidance }}</h2>
                    <p class="text-[#6D6D6D]">{{ $page_settings->cs_description_guidance }}</p>
                </div>
                <x-inputs.button type="hyperlink" href="{{ route('support.guidance') }}" size="lg" class="hidden! md:block!">
                    Lebih banyak
                </x-inputs.button>
            </div>
            @if(!$guidances->isEmpty())
                <div class="splide education-cs" role="group" aria-label="Guide Customer Service Slides">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach($guidances as $guidance)
                                <li class="splide__slide">
                                    <x-displays.swipe-card :image="$guidance->media->first()->getUrl()" :alt="'Panduan ' . $guidance->variant->name . ' ' . $guidance->name">
                                        <div class="flex items-center gap-2 md:gap-4">
                                            <h4 class="md:text-base">{{ $guidance->variant->name ?? $guidance->variant->name }} {{ $guidance->name }}</h4>
                                            <x-inputs.button-icon type="hyperlink" href="{{ route('product.download-guidance', $guidance->slug) }}" icon="icon-[material-symbols--download-rounded]" size="md" class="size-14 rounded-2xl!" />
                                        </div>
                                    </x-displays.swipe-card>
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
            <div class="flex justify-center items-center px-4 md:hidden">
                <x-inputs.button type="hyperlink" href="{{ route('support.guidance') }}" size="lg">
                    Lebih banyak
                </x-inputs.button>
            </div>
        </section>
        <section class="container flex flex-col gap-[42px] pt-6 pb-[92px]">
            <div class="flex justify-between items-center px-4 sm:px-6">
                <div class="space-y-4 text-center max-w-sm mx-auto px-4 sm:max-w-5xl md:mx-0 md:text-left">
                    <h2>{{ $page_settings->cs_title_video }}</h2>
                    <p class="text-[#6D6D6D]">{{ $page_settings->cs_description_video }}</p>
                </div>
                <x-inputs.button type="hyperlink" href="{{ route('support.tutorial-video') }}" size="lg" class="hidden! md:block!">
                    Lebih banyak
                </x-inputs.button>
            </div>
            @if(!$tutorials->isEmpty())
                <div class="splide guide-cs" role="group" aria-label="Guide Customer Service Slides">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach($tutorials as $tutorial)
                                <li class="splide__slide">
                                    <x-displays.swipe-card :image="$tutorial->getMedia('tutorial-video')->first()->getUrl()" :video="$tutorial->video" :alt="'Tutorial Video ' . $tutorial->title">
                                        <h4>{{ $tutorial->title }}</h4>
                                    </x-displays.swipe-card>
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
            <div class="flex justify-center items-center px-4 md:hidden">
                <x-inputs.button type="hyperlink" href="{{ route('support.tutorial-video') }}" size="lg">
                    Lebih banyak
                </x-inputs.button>
            </div>
        </section>
    </main>
@endsection
