<div class="flex flex-col gap-4 px-4 md:p-10">
    <h3 class="md:text-2xl md:font-medium">Temukan nomor model produk saya</h3>
    <div x-show="$store.numberModelDrawer.isMenuOpen" class="flex flex-col gap-4">
        <h6 class="md:font-medium">Kategori Produk</h6>
        <div class="flex gap-4">
            <button type="button" @click="$store.numberModelDrawer.openMenu('stove')" class="group flex flex-col items-center gap-1 border border-[#E9E9E9] rounded-2xl transition-all duration-300 ease-in-out cursor-pointer w-full p-3 hover:bg-qt-green-normal hover:border-qt-green-normal">
                <x-icons.stove-icon class="transition-all duration-300 ease-in-out fill-qt-green-normal stroke-qt-green-normal size-10 group-hover:stroke-white group-hover:fill-white" />
                <span class="transition-all duration-300 ease-in-out font-semibold text-xs group-hover:text-white">Kompor</span>
            </button>
            <button type="button" @click="$store.numberModelDrawer.openMenu('regulator')" class="group flex flex-col items-center gap-1 border border-[#E9E9E9] rounded-2xl transition-all duration-300 ease-in-out cursor-pointer w-full p-3 hover:bg-qt-green-normal hover:border-qt-green-normal">
                <x-icons.regulator-icon class="transition-all duration-300 ease-in-out fill-qt-green-normal stroke-qt-green-normal size-10 group-hover:stroke-white group-hover:fill-white" />
                <span class="transition-all duration-300 ease-in-out font-semibold text-xs group-hover:text-white">Regulator & Selang Gas</span>
            </button>
            <button type="button" @click="$store.numberModelDrawer.openMenu('sparepart')" class="group flex flex-col items-center gap-1 border border-[#E9E9E9] rounded-2xl transition-all duration-300 ease-in-out cursor-pointer w-full p-3 hover:bg-qt-green-normal hover:border-qt-green-normal">
                <x-icons.target-icon class="transition-all duration-300 ease-in-out fill-qt-green-normal stroke-qt-green-normal p-1 size-10 group-hover:stroke-white group-hover:fill-white" />
                <span class="transition-all duration-300 ease-in-out font-semibold text-xs group-hover:text-white">Sparepart</span>
            </button>
        </div>
    </div>
    <div x-show="$store.numberModelDrawer.currentMenu === 'stove'" class="flex flex-col gap-4">
        <div class="flex justify-between items-center">
            <h6>Kompor</h6>
            <x-inputs.button type="button" size="sm" event="$store.numberModelDrawer.closeMenu()">
                Kembali
            </x-inputs.button>
        </div>
        <div class="flex justify-center items-center">
            <img src="{{ asset('images/barcode.jpg') }}" alt="">
        </div>
        <div class="space-y-1">
            <h6>Lokasi barcode dan nomor model</h6>
            <p class="small">Temukan barcode dan nomor model di sisi kanan kompor atau di sisi kiri.</p>
        </div>
    </div>
    <div x-show="$store.numberModelDrawer.currentMenu === 'regulator'" class="flex flex-col gap-4">
        <div class="flex justify-between items-center">
            <h6>Regulator & Selang Gas</h6>
            <x-inputs.button type="button" size="sm" event="$store.numberModelDrawer.closeMenu()">
                Kembali
            </x-inputs.button>
        </div>
        <div class="flex justify-center items-center">
            <img src="{{ asset('images/barcode.jpg') }}" alt="">
        </div>
        <div class="space-y-1">
            <h6>Lokasi barcode dan nomor model</h6>
            <p class="small">Temukan barcode dan nomor model di sisi kanan kompor atau di sisi kiri.</p>
        </div>
    </div>
    <div x-show="$store.numberModelDrawer.currentMenu === 'sparepart'" class="flex flex-col gap-4">
        <div class="flex justify-between items-center">
            <h6>Sparepart</h6>
            <x-inputs.button type="button" size="sm" event="$store.numberModelDrawer.closeMenu()">
                Kembali
            </x-inputs.button>
        </div>
        <div class="flex justify-center items-center">
            <img src="{{ asset('images/barcode.jpg') }}" alt="">
        </div>
        <div class="space-y-1">
            <h6>Lokasi barcode dan nomor model</h6>
            <p class="small">Temukan barcode dan nomor model di sisi kanan kompor atau di sisi kiri.</p>
        </div>
    </div>
</div>