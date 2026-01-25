<section class="flex flex-col gap-10 px-4 pt-[58px] pb-[52px]">
    <div class="flex flex-col gap-8">
        <div class="flex flex-col gap-7">
            <div class="max-w-sm mx-auto space-y-4 text-center">
                <h2>{{ $page_settings->distributor_title_location }}</h2>
                <p class="large">{{ $page_settings->distributor_description_location }}</p>
            </div>
            <div x-data class="flex flex-col gap-8">
                <button type="button" @click="$store.distributorProvinceDrawer.openDrawer()" class="flex justify-between items-center w-full p-3 rounded-xl capitalize text-sm border border-[#E9E9E9] text-[#6D6D6D]/60 outline-none cursor-pointer focus:border-[#6D6D6D]">
                    {{ $province ? str_replace('-', ' ', $province) : 'Pilih Provinsi' }}
                    <span class="icon-[lucide--chevron-down] shrink-0 text-xl text-[#6D6D6D]"></span>
                </button>
                <x-displays.drawer store="distributorProvinceDrawer">
                    <div class="flex flex-col max-h-80 overflow-y-auto gap-1 py-4">
                        @if(!$areas->isEmpty())
                            <button type="button" @click="$store.distributorProvinceDrawer.closeDrawer()" wire:click="areaFilter('')" class="w-full text-left p-4 cursor-pointer">Semua</button>
                            @foreach($areas as $area)
                                <button type="button" @click="$store.distributorProvinceDrawer.closeDrawer()" wire:click="areaFilter('{{ $area['slug'] }}')" class="w-full text-left p-4 cursor-pointer">{{ $area['area'] }}</button>
                            @endforeach
                        @else
                            <div class="min-h-[100px] flex justify-center items-center">
                                <p class="text-center text-gray-500">Tidak ada pilihan untuk ditampilkan</p>
                            </div>
                        @endif
                    </div>
                </x-displays.drawer>
                <template x-if="$store.placeDetailDrawer?.embed_map">
                    <div id="map-embed" class="flex flex-col gap-4 scroll-mt-24">
                        <div class="map-iframe" x-html="$store.placeDetailDrawer.embed_map?.maps"></div>
                        <div class="flex flex-col gap-4 rounded-2xl border border-[#E9E9E9] p-4">
                            <div class="space-y-0">
                                <span class="block text-[#6D6D6D]" x-text="'Distributor ' + $store.placeDetailDrawer.embed_map?.area"></span>
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
        </div>
        <template x-if="$store.placeDetailDrawer?.embed_map">
            <div class="flex items-center justify-center">
                <div class="flex-1 w-full h-px bg-black/10"></div>
                <span class="flex-1 text-center mx-3 text-xs text-[#6D6D6D]">Daftar Distributor</span>
                <div class="flex-1 w-full h-px bg-black/10"></div>
            </div>
        </template>
        <div class="grid grid-cols-1 gap-4">
            @if(!$distributors->isEmpty())
                @foreach ($distributors as $distributor)
                    <x-displays.place-card :payload="$distributor" />
                @endforeach
            @else
                <div class="min-h-[100px] flex justify-center items-center">
                    <p class="text-center text-gray-500">Tidak ada data untuk ditampilkan</p>
                </div>
            @endif
        </div>
    </div>
    <div class="flex justify-center">
        @if($total_count > 3 && $distributors->count() < $total_count)
            <div wire:click="loadMore">
                <x-inputs.button type="button" size="lg" color="white" variant="secondary">
                    Lebih banyak
                </x-inputs.button>
            </div>
        @endif
    </div>
</section>
