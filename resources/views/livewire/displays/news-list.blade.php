<div class="flex flex-col gap-8 px-4">
    <div class="flex flex-col gap-12">
        <div class="px-2">
            <div class="flex gap-0.5 bg-white p-1 rounded-full overflow-x-auto">
                <button type="button" wire:click="newsEventFilter('')" class="tab {{ $category === '' ? 'active' : '' }}">
                    Semua
                </button>
                @foreach($categories as $item)
                    <button type="button" wire:click="newsEventFilter('{{ $item->slug }}')" class="tab {{ $item->slug === $category ? 'active' : '' }}">
                        {{ $item->name }}
                    </button>
                @endforeach
            </div>
        </div>
        @if(!$news->isEmpty())
            <div class="grid grid-cols-1 gap-4">
                @foreach($news as $item)
                    <x-displays.article-card :payload="$item" />
                @endforeach
            </div>
        @else
            <div class="min-h-[100px] flex justify-center items-center">
                <p class="text-center text-gray-500">Tidak ada data untuk ditampilkan</p>
            </div>
        @endif
    </div>
    <div class="flex justify-center">
        @if($news->count() >= $this->amount)
            <button type="button" wire:click="loadMore" class="transition-all duration-300 ease-in-out cursor-pointer border disabled:cursor-not-allowed py-4 px-8 rounded-2xl font-semibold tracking-[0.5px] leading-[125%] border-transparent bg-white text-qt-green-normal hover:bg-qt-green-normal hover:text-white disabled:bg-[#F4F4F4] disabled:text-[#DBDBDB] ">
                Lebih banyak
            </button>
        @endif
    </div>
</div>
