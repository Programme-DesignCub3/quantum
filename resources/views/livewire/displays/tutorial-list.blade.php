<div class="flex flex-col gap-8">
    <div class="flex flex-col gap-12">
        <div class="px-2">
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
        <div class="flex flex-col gap-6">
            @if(!$tutorials->isEmpty())
                @foreach($tutorials as $tutorial)
                    <x-displays.tutorial-video-card :payload="$tutorial" />
                @endforeach
            @else
                <div class="min-h-[100px] flex justify-center items-center">
                    <p class="text-center text-gray-500">Tidak ada data untuk ditampilkan</p>
                </div>
            @endif
        </div>
    </div>
    <div class="flex justify-center">
        @if($tutorials->count() < $total_count)
            <div wire:click="loadMore">
                <x-inputs.button type="button" size="lg" color="white">
                    Lebih banyak
                </x-inputs.button>
            </div>
        @endif
    </div>
</div>
