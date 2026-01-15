<main class="bg-white">
    <section class="px-8 py-[126px]">
        <div class="flex flex-col gap-[42px]">
            <div class="max-w-xs mx-auto space-y-4 text-center">
                <h1>Lagi Cari Produk Apa?</h1>
                <p class="large">Jelajahi koleksi Quantum atau cari produk, artikel, dan halaman favoritmu.</p>
            </div>
            <div x-data="{ search: @entangle('search') }" class="relative w-full">
                <span class="icon-[iconamoon--search] absolute top-1/2 -translate-y-1/2 left-4 text-[30px] text-qt-green-normal"></span>
                <input type="text" x-model="search" wire:model.live.debounce.150ms="search" placeholder="Cari sesuatu" class="w-full bg-[#F4F4F4] rounded-3xl text-lg outline-none font-medium px-16 py-[18px] placeholder:font-medium placeholder:text-[#868686]">
                <button type="button" x-cloak x-show="search" @click="search = ''" wire:click="$set('search', '')" class="absolute top-1/2 -translate-y-1/2 right-4 bg-[#B6D5D8] size-9 rounded-full flex justify-center items-center cursor-pointer">
                    <span class="icon-[material-symbols--close-rounded] text-2xl text-white"></span>
                </button>
            </div>
        </div>
    </section>
    <section class="flex flex-col gap-[42px] bg-[#F4F4F4] px-4 pt-[76px] pb-4">
        @if(count($result) > 0)
            @foreach($result as $key => $items)
                @switch($key)
                    @case('products')
                        <div class="flex flex-col gap-4">
                            <h4>Rekomendasi Produk</h4>
                            <div class="grid grid-cols-1">
                                @foreach ($items as $key => $item)
                                    <a href="{{ route('product.detail', [$item->category->slug, $item->slug]) }}" class="flex gap-4">
                                        <div class="rounded-2xl overflow-hidden bg-white">
                                            <img class="aspect-square size-[100px] object-cover" src="{{ $item->media->first()->getUrl() }}" alt="">
                                        </div>
                                        <div class="flex flex-col justify-center gap-2.5">
                                            <div class="space-y-0">
                                                <span class="text-[#9A9A9A]">{{ $item->variant->name ?? $item->category->name }}</span>
                                                <h4 class="text-qt-green-normal">{{ $item->name }}</h4>
                                            </div>
                                        </div>
                                    </a>
                                    @if ($key <  count($items) - 1)
                                        <div class="w-full h-px bg-black/10 my-4"></div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        @break
                    @case('news')
                        <div class="flex flex-col gap-4">
                            <h4>Artikel</h4>
                            <div class="grid grid-cols-1">
                                @foreach ($items as $key => $item)
                                    <a href="{{ route('updates.news.detail', $item->slug) }}" class="flex justify-between gap-4">
                                        <p class="large">{{ $item->title }}</p>
                                        <span class="icon-[lucide--arrow-up-right] shrink-0 text-3xl text-qt-green-normal"></span>
                                    </a>
                                    @if ($key < count($items) - 1)
                                        <div class="w-full h-px bg-black/10 my-4"></div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        @break
                    @case('guidances')
                        <div class="flex flex-col gap-4">
                            <h4>Bantuan</h4>
                            <div class="grid grid-cols-1">
                                @foreach ($items as $key => $item)
                                    <a href="{{ route('support.guidance.detail', $item->slug) }}" class="flex justify-between gap-4">
                                        <p class="large">{{ $item->title }}</p>
                                        <span class="icon-[lucide--arrow-up-right] shrink-0 text-3xl text-qt-green-normal"></span>
                                    </a>
                                    @if ($key < count($items) - 1)
                                        <div class="w-full h-px bg-black/10 my-4"></div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        @break
                @endswitch
            @endforeach
        @else
            <div class="min-h-[100px] flex justify-center items-center">
                <p class="text-center text-gray-500">Tidak ada data untuk ditampilkan</p>
            </div>
        @endif
    </section>
</main>
