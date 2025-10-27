<div x-show="currentMenu === 'product'" class="flex flex-col gap-1">
    <button type="button" @click="closeMenu" class="flex items-center py-4 font-medium text-lg gap-2.5 cursor-pointer">
        <span class="icon-[lucide--chevron-left] text-3xl text-qt-green-normal"></span>
        Produk
    </button>
    <a href="#" class="flex items-center gap-2.5 p-4">
        <x-icons.stove-icon class="fill-qt-green-normal" />
        Kompor
    </a>
    <a href="#" class="flex items-center gap-2.5 p-4">
        <x-icons.regulator-icon class="fill-qt-green-normal" />
        Regulator & Selang Gas
    </a>
    <a href="#" class="flex items-center gap-2.5 p-4">
        <x-icons.target-icon class="fill-qt-green-normal" />
        Suku Cadang
    </a>
</div>
