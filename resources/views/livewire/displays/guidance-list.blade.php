<main x-data class="bg-white">
    <section class="flex flex-col gap-8 px-4 py-[116px]">
        <div class="flex flex-col gap-14">
            <div class="space-y-4 text-center max-w-sm mx-auto">
                <h1>{{ $page_settings->guidance_title }}</h1>
                <p class="large">{{ $page_settings->guidance_description }}</p>
            </div>
            <div x-data="{ search: @entangle('search') }" class="flex flex-col gap-4 justify-center items-center">
                <p class="large">Cari Tahu Disini</p>
                <div class="relative w-full">
                    <span class="icon-[iconamoon--search] absolute top-1/2 -translate-y-1/2 left-4 text-[30px] text-qt-green-normal"></span>
                    <input type="text" x-model="search" wire:model.live.debounce.150ms="search" placeholder="Ketik nama produk" class="w-full bg-[#F4F4F4] rounded-3xl text-lg outline-none font-medium py-[18px] px-16 placeholder:font-medium placeholder:text-[#868686]">
                    <button type="button" x-cloak x-show="search" @click="search = ''" wire:click="$set('search', '')" class="absolute top-1/2 -translate-y-1/2 right-4 bg-[#B6D5D8] size-9 rounded-full flex justify-center items-center cursor-pointer">
                        <span class="icon-[material-symbols--close-rounded] text-2xl text-white"></span>
                    </button>
                </div>
                <button type="button" @click="$store.numberModelDrawer.openDrawer()" class="w-max underline underline-offset-2 cursor-pointer">Cara menemukan nomor model?</button>
            </div>
        </div>
        @if(!$guidances_file->isEmpty())
            <div class="flex flex-col gap-4">
                @foreach($guidances_file as $guidance)
                    <x-displays.guidance-card :payload="$guidance" />
                @endforeach
            </div>
        @else
            <div class="min-h-[100px] flex justify-center items-center">
                <p class="text-center text-gray-500">
                    @if($search !== '')
                        Pencarian tidak ditemukan
                    @else
                        Tidak ada data untuk ditampilkan
                    @endif
                </p>
            </div>
        @endif
    </section>
    <section class="flex flex-col gap-8 pt-[76px] pb-[100px] px-4 bg-[#F5F5F5]">
        <div class="flex flex-col gap-12">
            <div class="space-y-4 text-center max-w-sm mx-auto">
                <h2>{{ $page_settings->guidance_title_article }}</h2>
                <p>{{ $page_settings->guidance_description_article }}</p>
            </div>
            <div class="flex flex-col gap-4">
                @if(!$latest->isEmpty())
                    <div class="flex flex-col gap-3">
                        <div class="rounded-3xl overflow-hidden">
                            <img class="aspect-17/10 object-cover" src="{{ $latest[0]->media->first()->getUrl() }}" alt="{{ $latest[0]->title }}">
                        </div>
                        <div class="space-y-1 p-3">
                            <span class="block text-qt-green-normal">{{ $latest[0]->category->name }}</span>
                            <h4>{{ $latest[0]->title }}</h4>
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <x-inputs.button type="hyperlink" href="{{ route('support.guidance.detail', $latest[0]->slug) }}" color="white">
                            Selengkapnya
                        </x-inputs.button>
                    </div>
                @else
                    <div class="min-h-[100px] flex justify-center items-center">
                        <p class="text-center text-gray-500">Tidak ada data untuk ditampilkan</p>
                    </div>
                @endif
            </div>
            <div class="flex flex-col gap-4">
                @foreach($guidances as $item)
                    <x-displays.guidance-article-card :payload="$item" />
                @endforeach
            </div>
        </div>
        <div class="flex justify-center">
            @if($guidances->count() < $total_count)
                <div wire:click="loadMore">
                    <x-inputs.button type="button" size="lg" color="white">
                        Lebih banyak
                    </x-inputs.button>
                </div>
            @endif
        </div>
    </section>
</main>
