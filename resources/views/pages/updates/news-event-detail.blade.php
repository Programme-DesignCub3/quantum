@extends('app')

@section('meta_title', $meta_title ?? config('app.name'))
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image)

@section('breadcrumbs')
    {{ Breadcrumbs::render(Route::currentRouteName(), $detail) }}
@endsection

@section('content')
    <main x-data id="news-event-detail" class="bg-[#FFFFFF]">
        <section class="flex flex-col">
            <div class="flex flex-col gap-4 px-6 pt-[60px] pb-8">
                <div class="space-y-2">
                    <h2>{{ $detail->title }}</h2>
                    <div class="flex gap-4">
                        <span class="inline-block bg-[#E7F1F2] rounded-full px-2.5 py-1">{{ $detail->category->name }}</span>
                        <button type="button" @click="$store.shareDrawer.openDrawer()" class="flex gap-2 items-center text-xs cursor-pointer bg-[#E7F1F2] rounded-full px-2.5 py-1">
                            <span class="icon-[tdesign--share] text-qt-green-normal text-base"></span>
                            Bagikan
                        </button>
                    </div>
                </div>
                <div class="flex gap-2.5">
                    <div class="flex items-center gap-2">
                        <span class="icon-[lucide--calendar] text-base"></span>
                        <span>{{ $detail->created_at->translatedFormat('d F Y') }}</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="icon-[lucide--clock-4] text-base"></span>
                        <span>Waktu baca {{ $detail->read_time }} menit</span>
                    </div>
                </div>
            </div>
            <div class="aspect-49/30">
                <img class="aspect-49/30 object-cover" src="{{ $detail->media->first()->getUrl() }}" alt="">
            </div>
            <div class="flex flex-col gap-12 px-6 pt-[42px] pb-24">
                <div class="article-content">
                    {!! $detail->content !!}
                </div>
                <div class="flex flex-col gap-2.5">
                    <div class="flex items-center gap-1">
                        <span class="icon-[lucide--tag] text-base"></span>
                        <span>Tags:</span>
                    </div>
                    <div class="flex flex-wrap gap-1">
                        @foreach($detail->tags as $tag)
                            <span class="inline-block border border-[#DBDBDB] rounded-full text-qt-green-normal capitalize bg-white px-2.5 py-1">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="flex flex-col gap-8 bg-[#F4F4F4] pt-[46px] pb-[77px]">
            <h3 class="px-6">Lihat juga Rekomendasi Produk</h3>
            @if(!$recommendation_products->isEmpty())
                <div class="splide recommendation-products-news-event" role="group" aria-label="Recommendation Product Slides">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach($recommendation_products as $product)
                                <li class="splide__slide w-[260px]">
                                    <x-displays.product-card direction="row" :payload="$product" />
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
        <section class="flex flex-col gap-8 pt-[77px] pb-[100px]">
            <h3 class="px-6">Lihat Juga Berita atau Event Lainnya</h3>
            @if(!$other_news->isEmpty())
                <div class="splide other-news-event" role="group" aria-label="Other News Event Slides">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach($other_news as $news)
                                <li class="splide__slide w-[260px]">
                                    <x-displays.article-card :border="true" :payload="$news" />
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
