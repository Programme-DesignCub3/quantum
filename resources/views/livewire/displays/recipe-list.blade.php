<div class="flex flex-col gap-8 px-4 sm:px-6">
    <div class="flex flex-col gap-12">
        <div class="px-2 w-full mx-auto max-w-max">
            {{-- Tabs --}}
            <div class="flex gap-0.5 bg-white p-1 rounded-full overflow-x-auto">
                <button type="button" wire:click="recipeFilter('')" class="tab {{ $category === '' ? 'active' : '' }}">
                    Semua
                </button>
                @foreach($categories as $item)
                    <button type="button" wire:click="recipeFilter('{{ $item->slug }}')" class="tab {{ $item->slug === $category ? 'active' : '' }}">
                        {{ $item->name }}
                    </button>
                @endforeach
            </div>
        </div>
        {{-- Recipe List --}}
        @if(!$recipes->isEmpty())
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-5 lg:grid-cols-3 xl:grid-cols-4">
                @foreach($recipes as $item)
                    <div wire:key="recipe-item-{{ $item->id }}">
                        <x-displays.article-card for="recipe" :payload="$item" />
                    </div>
                @endforeach
            </div>
        @else
            <div class="min-h-[100px] flex justify-center items-center md:min-h-[200px]">
                <p class="text-center text-gray-500">Tidak ada data untuk ditampilkan</p>
            </div>
        @endif
    </div>
    <div class="flex justify-center">
        @if($recipes->count() < $total_count)
            <div wire:click="loadMore">
                <x-inputs.button type="button" size="lg" color="white">
                    Lebih banyak
                </x-inputs.button>
            </div>
        @endif
    </div>
</div>
