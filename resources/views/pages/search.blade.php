@extends('app')

@section('meta_title', $meta_title ?? config('app.name'))
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image ?? asset('images/og-image.png'))

@section('content')
    <main class="bg-white">
        <section class="px-8 py-[126px]">
            <div class="flex flex-col gap-[42px]">
                <div class="max-w-xs mx-auto space-y-4 text-center">
                    <h1>Lagi Cari Produk Apa?</h1>
                    <p class="large">Jelajahi koleksi Quantum atau cari produk, artikel, dan halaman favoritmu.</p>
                </div>
                <div class="relative w-full">
                    <input type="text" placeholder="Cari sesuatu" class="w-full bg-[#F4F4F4] rounded-3xl text-lg outline-none font-medium pl-16 pr-8 py-[18px] placeholder:font-medium placeholder:text-[#868686]">
                    <span class="icon-[iconamoon--search] absolute top-1/2 -translate-y-1/2 left-4 text-[30px] text-qt-green-normal"></span>
                </div>
            </div>
        </section>
        <section class="flex flex-col gap-[42px] bg-[#F4F4F4] px-4 pt-[76px] pb-4">
            <div class="flex flex-col gap-4">
                <h4>Rekomendasi Produk</h4>
                <div class="grid grid-cols-1">
                    @foreach ($products as $index => $product)
                        <a href="{{ route('product.detail', [$product['category_slug'], $product['slug']]) }}" class="flex gap-4">
                            <div class="rounded-2xl overflow-hidden bg-white">
                                <img class="aspect-square size-[100px] object-cover" src="{{ $product['image'] }}" alt="">
                            </div>
                            <div class="flex flex-col justify-center gap-2.5">
                                <div class="space-y-0">
                                    <span class="text-[#9A9A9A]">{{ $product['category'] }}</span>
                                    <h4 class="text-qt-green-normal">{{ $product['name'] }}</h4>
                                </div>
                                <div class="flex gap-1">
                                    <span>Rp</span>
                                    <p>{{ $product['price'] }}</p>
                                </div>
                            </div>
                        </a>
                        @if ($index <  count($products) - 1)
                            <div class="w-full h-px bg-black/10 my-4"></div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <h4>Artikel</h4>
                <div class="grid grid-cols-1">
                    @foreach ($articles as $index => $article)
                        <a href="{{ route('updates.news.detail', $article['slug']) }}" class="flex justify-between gap-4">
                            <p class="large">{{ $article['title'] }}</p>
                            <span class="icon-[lucide--arrow-up-right] shrink-0 text-3xl text-qt-green-normal"></span>
                        </a>
                        @if ($index < count($articles) - 1)
                            <div class="w-full h-px bg-black/10 my-4"></div>
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="flex flex-col gap-4">
                <h4>Bantuan</h4>
                <div class="grid grid-cols-1">
                    @foreach ($guidances as $index => $guidance)
                        <a href="{{ route('support.guidance.detail', $guidance['slug']) }}" class="flex justify-between gap-4">
                            <p class="large">{{ $guidance['title'] }}</p>
                            <span class="icon-[lucide--arrow-up-right] shrink-0 text-3xl text-qt-green-normal"></span>
                        </a>
                        @if ($index < count($guidances) - 1)
                            <div class="w-full h-px bg-black/10 my-4"></div>
                        @endif
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
