@extends('app')

@section('meta_title', $meta_title ?? config('app.name'))
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image ?? asset('images/og-image.png'))

@section('content')
    <main id="guidance-detail" class="bg-white">
        <section class="flex flex-col">
            <div class="px-6 pt-[60px] pb-8">
                <h2>{{ $detail->title }}</h2>
            </div>
            <div class="relative">
                <img class="aspect-49/30 object-cover" src="{{ $detail->media->first()->getUrl() }}" alt="">
            </div>
            @foreach($detail->content as $item)
                @switch($item['type'])
                    @case('paragraph')
                        <div class="px-6 py-9 article-content">
                            {!! $item['data']['value'] !!}
                        </div>
                        @break
                    @case('steps')
                        <div class="flex flex-col gap-6 py-8 bg-[#F4F4F4]">
                            <h4 class="px-6">Ikuti step di bawah ini</h4>
                            <div class="splide guidance-step" role="group" aria-label="Guidance Steps Slides">
                                <div class="splide__track">
                                    <ul class="splide__list">
                                        @foreach($item['data']['value'] as $i)
                                            <li class="splide__slide">
                                                <x-displays.guidance-step-card :payload="$i" />
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @break
                @endswitch
            @endforeach
        </section>
        <section class="flex flex-col gap-8 bg-[#F4F4F4] pt-[46px] pb-[77px]">
            <h3 class="px-6">Lihat Juga Tips dan Edukasi Lainnya</h3>
            @if(!$other_guidance->isEmpty())
                <div class="splide other-guidance" role="group" aria-label="Other Guidance Slides">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach($other_guidance as $item)
                                <li class="splide__slide w-[260px]">
                                    <x-displays.article-card for="guidance" :payload="$item" />
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
    </main>
@endsection
