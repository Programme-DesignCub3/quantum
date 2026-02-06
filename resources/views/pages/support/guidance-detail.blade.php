@extends('app')

@section('meta_title', $meta_title ?? config('app.name'))
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image)

@section('breadcrumbs')
    {{ Breadcrumbs::render(Route::currentRouteName(), $detail) }}
@endsection

@section('content')
    <main id="guidance-detail">
        <section class="flex flex-col">
            <div class="container px-6 pt-[60px] pb-8 md:pb-[60px] md:pt-[100px]">
                <h2>{{ $detail->title }}</h2>
            </div>
            <div class="relative">
                <img class="aspect-49/30 object-cover md:h-[500px] md:w-full" src="{{ $detail->media->first()->getUrl() }}" alt="{{ $detail->title }}">
            </div>
            @foreach($detail->content as $item)
                @switch($item['type'])
                    @case('paragraph')
                        <div class="container px-6 py-9 article-content md:py-[60px]">
                            {!! $item['data']['value'] !!}
                        </div>
                        @break
                    @case('steps')
                        <div class="bg-[#F4F4F4]">
                            <div class="container flex flex-col gap-6 py-8 md:py-12">
                                <h4 class="px-6">Ikuti step di bawah ini</h4>
                                <div class="splide guidance-step md:hidden" role="group" aria-label="Guidance Steps Slides">
                                    <div class="splide__track">
                                        <ul class="splide__list">
                                            @foreach($item['data']['value'] as $i)
                                                <li wire:key="guidance-step-{{ $i['id'] }}" class="splide__slide">
                                                    <x-displays.guidance-step-card :payload="$i" />
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="hidden grid-cols-3 gap-5 px-6 md:grid">
                                    @foreach($item['data']['value'] as $i)
                                        <div wire:key="guidance-step-{{ $i['id'] }}">
                                            <x-displays.guidance-step-card :payload="$i" />
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @break
                @endswitch
            @endforeach
        </section>
        <section class="bg-[#F4F4F4]">
            <div class="container flex flex-col gap-8 pt-[46px] pb-[77px] md:py-20">
                <h3 class="px-6">Lihat Juga Tips dan Edukasi Lainnya</h3>
                @if(!$other_guidance->isEmpty())
                    <div class="splide other-guidance" role="group" aria-label="Other Guidance Slides">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach($other_guidance as $item)
                                    <li wire:key="other-guidance-{{ $item->id }}" class="splide__slide w-[260px]">
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
            </div>
        </section>
    </main>
@endsection
