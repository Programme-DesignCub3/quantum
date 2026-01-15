@extends('app')

@section('meta_title', $meta_title ?? 'Artikel')
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image ?? asset('images/og-image.png'))

@section('content')
    <main id="news-event" class="bg-[#F4F4F4]">
        <section class="flex flex-col gap-14 pt-[116px] pb-6">
            <div class="flex flex-col gap-[62px]">
                <div class="space-y-4 max-w-sm mx-auto text-center px-4">
                    <h1>Inspirasi Dapur Quantum</h1>
                    <p class="large">Jelajahi berbagai artikel menarik Quantum dan dapatkan inspirasi setiap hari.</p>
                </div>
                @if(!$latest_news->isEmpty())
                    <div class="splide news-event" role="group" aria-label="News Event Slides">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach($latest_news as $news)
                                    <li class="splide__slide w-[260px]">
                                        <x-displays.article-card :payload="$news" />
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
            <livewire:displays.news-list />
        </section>
    </main>
@endsection
