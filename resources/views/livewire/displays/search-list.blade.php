<div class="flex flex-col gap-6">
    @if($this->search != '')
        <div class="w-full flex flex-col gap-4 justify-center items-center">
            <span class="max-w-56 mx-auto text-center">Kesulitan menemukan yang dicari silahkan hubungi Customer Care Kami</span>
            <x-inputs.button type="hyperlink" href="{{ route('support.contact') }}" variant="secondary" color="white" class="w-max">
                Kontak Kami
            </x-inputs.button>
        </div>
        @if(count($result) > 0)
            <div class="max-w-sm w-full mx-auto flex flex-col gap-4 py-2.5 max-h-80 overflow-y-auto">
                @foreach($result as $key => $items)
                    @switch($key)
                        @case('products')
                            <div class="flex flex-col gap-3">
                                <h4>Rekomendasi Produk</h4>
                                <div class="flex flex-col gap-3">
                                    @foreach($items as $key => $item)
                                        <a href="{{ route('product.detail', [$item->category->slug, $item->slug]) }}" class="flex items-center gap-4">
                                            <div class="shrink-0 bg-white rounded-2xl overflow-hidden">
                                                <img class="size-[100px] object-cover object-center" src="{{ $item->media->first()->getUrl() }}" alt="">
                                            </div>
                                            <div class="flex flex-col gap-2.5">
                                                <div class="space-y-0">
                                                    <span class="text-[#9A9A9A]">{{ $item->variant->name ?? $item->category->name }}</span>
                                                    <h4 class="text-qt-green-normal">{{ $item->name }}</h4>
                                                </div>
                                            </div>
                                        </a>
                                        @if ($key < count($items) - 1)
                                            <div class="w-full h-px bg-black/10 my-1"></div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            @break
                        @case('news')
                            <div class="flex flex-col gap-3">
                                <h4>Artikel</h4>
                                <div class="flex flex-col gap-3">
                                    @foreach($items as $key => $item)
                                        <a href="{{ route('updates.news.detail', $item->slug) }}" class="flex gap-6">
                                            <p class="large">{{ $item->title }}</p>
                                            <div class="flex shrink-0 justify-center items-center size-10 rounded-full bg-white">
                                                <span class="icon-[lucide--arrow-up-right] text-3xl text-qt-green-normal"></span>
                                            </div>
                                        </a>
                                        @if ($key < count($items) - 1)
                                            <div class="w-full h-px bg-black/10 my-1"></div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            @break
                        @case('guidances')
                            <div class="flex flex-col gap-3">
                                <h4>Bantuan</h4>
                                <div class="flex flex-col gap-3">
                                    @foreach($items as $key => $item)
                                        <a href="{{ route('support.guidance.detail', $item->slug) }}" class="flex gap-6">
                                            <p class="large">{{ $item->title }}</p>
                                            <div class="flex shrink-0 justify-center items-center size-10 rounded-full bg-white">
                                                <span class="icon-[lucide--arrow-up-right] text-3xl text-qt-green-normal"></span>
                                            </div>
                                        </a>
                                        @if ($key < count($items) - 1)
                                            <div class="w-full h-px bg-black/10 my-1"></div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                            @break
                    @endswitch
                @endforeach
            </div>
        @else
            <div class="min-h-[100px] flex justify-center items-center">
                <p class="text-center text-gray-500">Pencarian tidak ditemukan</p>
            </div>
        @endif
    @endif
    <div class="space-y-4 text-center">
        <h4>Temukan Sesuatu</h4>
        <form wire:submit="searchForm" x-data="{ search: '' }" class="relative">
            <button type="submit" class="absolute top-1/2 -translate-y-1/2 left-4 cursor-pointer flex justify-center items-center">
                <span class="icon-[iconamoon--search] text-[30px] text-qt-green-normal"></span>
            </button>
            <input type="text" x-model="search" wire:model.live.debounce.150ms="search" placeholder="Cari sesuatu" id="search-all" class="w-full bg-[#F4F4F4] rounded-3xl text-lg outline-none font-medium px-16 py-[18px] placeholder:font-medium placeholder:text-[#868686]" autocomplete="off">
            <button type="button" x-cloak x-show="search" @click="search = ''" wire:click="$set('search', '')" class="absolute top-1/2 -translate-y-1/2 right-4 bg-[#B6D5D8] size-9 rounded-full flex justify-center items-center cursor-pointer">
                <span class="icon-[material-symbols--close-rounded] text-2xl text-white"></span>
            </button>
        </form>
    </div>
</div>
