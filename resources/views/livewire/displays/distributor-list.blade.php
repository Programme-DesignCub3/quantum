<section class="container flex flex-col gap-10 px-4 pt-[58px] pb-[52px] md:pb-[100px]">
    <div class="flex flex-col gap-8">
        <div class="flex flex-col gap-7">
            {{-- Heading --}}
            <div class="max-w-sm mx-auto space-y-4 text-center sm:max-w-5xl">
                <h2>{{ $page_settings->distributor_title_location }}</h2>
                <p class="large">{{ $page_settings->distributor_description_location }}</p>
            </div>
            <div x-data class="flex flex-col gap-8">
                {{-- Area (Province) Filter --}}
                <button type="button" @click="$store.distributorProvinceDrawer.openDrawer()" class="flex justify-between items-center w-full p-3 rounded-xl capitalize text-sm border border-[#E9E9E9] text-[#6D6D6D]/60 outline-none cursor-pointer focus:border-[#6D6D6D] md:max-w-xl md:mx-auto">
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
                <div class="flex flex-col gap-8 lg:flex-row">
                    <div id="map-embed" class="flex flex-col gap-4 scroll-mt-24 lg:w-full">
                        {{-- Map Embed --}}
                        <template x-if="$store.placeDetailDrawer.embed_map?.maps">
                            <div class="map-iframe" x-html="$store.placeDetailDrawer.embed_map?.maps"></div>
                        </template>
                        {{-- Map Embed (Default) --}}
                        <template x-if="!$store.placeDetailDrawer.embed_map?.maps">
                            <div class="map-iframe">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7932.436417586856!2d106.79015419423138!3d-6.234941809609014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1a04d5ff145%3A0xcbae36e958f80d6a!2sOffice%208%20%40%20Senopati!5e0!3m2!1sid!2sid!4v1770177018993!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                        </template>
                        {{-- Map Embed (Detail) --}}
                        <template x-if="$store.placeDetailDrawer?.embed_map">
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
                        </template>
                    </div>
                    {{-- Divider --}}
                    <template x-if="$store.placeDetailDrawer?.embed_map">
                        <div class="flex items-center justify-center lg:hidden">
                            <div class="flex-1 w-full h-px bg-black/10"></div>
                            <span class="flex-1 text-center mx-3 text-xs text-[#6D6D6D]">Daftar Distributor</span>
                            <div class="flex-1 w-full h-px bg-black/10"></div>
                        </div>
                    </template>
                    {{-- Distributor List --}}
                    <div class="flex flex-col gap-4 lg:w-[60%]">
                        @if(!$distributors->isEmpty())
                            @foreach ($distributors as $distributor)
                                <div wire:key="distributor-{{ $distributor->id }}">
                                    <x-displays.place-card :payload="$distributor" />
                                </div>
                            @endforeach
                            @if($total_count > 3 && $distributors->count() < $total_count)
                                <div wire:click="loadMore" class="hidden mt-4 lg:block">
                                    <x-inputs.button type="button" size="lg" color="white" variant="secondary">
                                        Lebih banyak
                                    </x-inputs.button>
                                </div>
                            @endif
                        @else
                            <div class="min-h-[100px] flex justify-center items-center md:min-h-[200px]">
                                <p class="text-center text-gray-500">Tidak ada data untuk ditampilkan</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- Load More Button (Mobile) --}}
    <div class="flex justify-center lg:hidden">
        @if($total_count > 3 && $distributors->count() < $total_count)
            <div wire:click="loadMore">
                <x-inputs.button type="button" size="lg" color="white" variant="secondary">
                    Lebih banyak
                </x-inputs.button>
            </div>
        @endif
    </div>
</section>
