<div class="flex flex-col gap-8 px-4">
    <div class="flex flex-col gap-12">
        <div class="px-2">
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
        @if(!$catalogs->isEmpty())
            <div class="grid grid-cols-1 gap-4">
                @foreach($catalogs as $catalog)
                    <x-displays.catalog-card :payload="$catalog" />
                @endforeach
                <x-displays.drawer store="catalogDrawer">
                    <livewire:forms.catalog-form />
                </x-displays.drawer>
            </div>
        @else
            <div class="min-h-[100px] flex justify-center items-center">
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
