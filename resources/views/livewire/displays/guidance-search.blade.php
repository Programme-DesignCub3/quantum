<section class="flex flex-col gap-8 px-4 py-[116px]">
    <div class="flex flex-col gap-14">
        <div class="space-y-4 text-center max-w-sm mx-auto">
            <h1>Edukasi & Panduan Produk Quantum</h1>
            <p class="large">Temukan tips terbaik memakai produk Quantum untuk pengalaman memasak yang lebih efisien</p>
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
    @if(!$guidances->isEmpty())
        <div class="flex flex-col gap-4">
            @foreach($guidances as $guidance)
                <x-displays.guidance-card :payload="$guidance" />
            @endforeach
        </div>
    @else
        <div class="min-h-[100px] flex justify-center items-center">
            <p class="text-center text-gray-500">Pencarian tidak ditemukan</p>
        </div>
    @endif
</section>
