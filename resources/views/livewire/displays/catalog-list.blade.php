<div class="flex flex-col gap-8 px-4">
    <div class="flex flex-col gap-12">
        <div class="px-2 w-full mx-auto max-w-max">
            {{-- Tabs --}}
            <div class="flex gap-0.5 bg-white p-1 rounded-full overflow-x-auto">
                <button type="button" wire:click="catalogFilter('')" class="tab {{ $category === '' ? 'active' : '' }}">
                    Semua
                </button>
                @foreach($categories as $item)
                    <button type="button" wire:click="catalogFilter('{{ $item->slug }}')" class="tab {{ $item->slug === $category ? 'active' : '' }}">
                        {{ $item->name }}
                    </button>
                @endforeach
            </div>
        </div>
        {{-- Catalog List --}}
        @if(!$catalogs->isEmpty())
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                @foreach($catalogs as $catalog)
                    <div wire:key="catalog-{{ $catalog->id }}">
                        <x-displays.catalog-card :payload="$catalog" />
                    </div>
                @endforeach
                <div x-data="{ status: $store.catalogDrawer.success }" x-effect="status = $store.catalogDrawer.success">
                    <x-displays.toast>
                        Berhasil unduh!
                    </x-displays.toast>
                    <x-displays.drawer store="catalogDrawer">
                        <livewire:forms.catalog-form />
                    </x-displays.drawer>
                    <x-displays.modal store="catalogDrawer">
                        <div :class="{
                            'grid-cols-2 min-[830px]:w-4xl': $store.catalogDrawer.data?.image,
                            'grid-cols-1 min-[830px]:w-xl': !$store.catalogDrawer.data?.image
                        }" class="relative w-full grid bg-white drop-shadow-float-lg rounded-3xl overflow-hidden">
                            <div class="absolute top-3 right-3">
                                <button type="button" @click="$store.catalogDrawer.closeDrawer()" class="rounded-full cursor-pointer size-10 flex justify-center items-center">
                                    <span class="icon-[material-symbols--close-rounded] text-2xl"></span>
                                </button>
                            </div>
                            <template x-if="$store.catalogDrawer.data?.image">
                                <div class="relative overflow-hidden">
                                    <img class="aspect-square size-full object-cover" :src="$store.catalogDrawer.data?.image" alt="">
                                </div>
                            </template>
                            <livewire:forms.catalog-form />
                        </div>
                    </x-displays.modal>
                </div>
            </div>
        @else
            <div class="min-h-[100px] flex justify-center items-center md:min-h-[200px]">
                <p class="text-center text-gray-500">Tidak ada data untuk ditampilkan</p>
            </div>
        @endif
    </div>
    <div class="flex justify-center">
        @if($total_count > 4 && $catalogs->count() < $total_count)
            <div wire:click="loadMore">
                <x-inputs.button type="button" size="lg" color="white">
                    Lebih banyak
                </x-inputs.button>
            </div>
        @endif
    </div>
</div>
