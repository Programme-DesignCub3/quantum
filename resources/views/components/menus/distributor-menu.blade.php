<div x-show="currentMenu === 'distributor'" class="flex flex-col gap-1">
    <button type="button" @click="closeMenu" class="flex items-center py-4 font-medium text-lg gap-2.5 cursor-pointer">
        <span class="icon-[lucide--chevron-left] text-3xl text-qt-green-normal"></span>
        Distributor
    </button>
    <a href="#" class="flex items-center gap-2.5 p-4">
        <x-icons.store-icon class="fill-qt-green-normal" />
        Daftar Distributor
    </a>
    <a href="#" class="flex items-center gap-2.5 p-4">
        <span class="icon-[proicons--book] text-3xl text-qt-green-normal"></span>
        Katalog
    </a>
</div>
