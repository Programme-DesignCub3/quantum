<div x-show="currentTab === 'mitra-service'" class="flex flex-col gap-[42px] px-4 pt-10 pb-[52px]">
    <div class="flex flex-col gap-[52px]">
        <div class="flex flex-col gap-8">
            <div class="flex flex-col gap-4 justify-center items-center px-2">
                <h3>Temukan Mitra Service</h3>
                <div x-data="{ search: @entangle('search') }" class="relative w-full">
                    <span class="icon-[iconamoon--search] absolute top-1/2 -translate-y-1/2 left-4 text-[30px] text-qt-green-normal"></span>
                    <input type="text" x-model="search" wire:model.live.debounce.150ms="search" placeholder="Cari lokasi mitra service" class="w-full bg-[#F4F4F4] rounded-3xl text-lg outline-none font-medium pl-16 pr-8 py-[18px] placeholder:font-medium placeholder:text-[#868686]">
                    <button type="button" x-cloak x-show="search" @click="search = ''" wire:click="$set('search', '')" class="absolute top-1/2 -translate-y-1/2 right-4 bg-[#B6D5D8] size-9 rounded-full flex justify-center items-center cursor-pointer">
                        <span class="icon-[material-symbols--close-rounded] text-2xl text-white"></span>
                    </button>
                </div>
            </div>
            <template x-if="$store.placeDetailDrawer?.embed_map">
                <div id="map-embed" class="flex flex-col gap-4 scroll-mt-24">
                    <div class="map-iframe" x-html="$store.placeDetailDrawer.embed_map?.maps"></div>
                    <div class="flex flex-col gap-4 rounded-2xl border border-[#E9E9E9] p-4">
                        <div class="space-y-0">
                            <span class="block text-[#6D6D6D]" x-text="$store.placeDetailDrawer.embed_map?.area"></span>
                            <h4 x-text="$store.placeDetailDrawer.embed_map?.name"></h4>
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="flex gap-4">
                                <span class="icon-[lucide--map-pin] shrink-0 text-lg text-qt-green-normal"></span>
                                <div class="flex flex-col gap-4">
                                    <span class="block text-[#6D6D6D]" x-text="$store.placeDetailDrawer.embed_map?.address"></span>
                                </div>
                            </div>
                            <x-inputs.button type="button" size="sm" event="$store.placeDetailDrawer.closeEmbedMap()">
                                Tutup Peta
                            </x-inputs.button>
                        </div>
                    </div>
                </div>
            </template>
        </div>
        <template x-if="$store.placeDetailDrawer?.embed_map">
            <div class="flex items-center justify-center">
                <div class="flex-1 w-full h-px bg-black/10"></div>
                <span class="flex-1 text-center mx-3 text-xs text-[#6D6D6D]">Daftar Mitra Service</span>
                <div class="flex-1 w-full h-px bg-black/10"></div>
            </div>
        </template>
        <div class="grid grid-cols-1 gap-4">
            @if(!$service_partners->isEmpty())
                @foreach ($service_partners as $service_partner)
                    <x-displays.place-card for="service_center" :payload="$service_partner" />
                @endforeach
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
        </div>
    </div>
    <div class="flex justify-center">
        @if($total_count > 3 && $service_partners->count() < $total_count)
            <div wire:click="loadMore">
                <x-inputs.button type="button" size="lg">
                    Lebih banyak
                </x-inputs.button>
            </div>
        @endif
    </div>
</div>
