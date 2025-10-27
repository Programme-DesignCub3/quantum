<div x-show="currentMenu === 'about'" class="flex flex-col gap-1">
    <button type="button" @click="closeMenu" class="flex items-center py-4 font-medium text-lg gap-2.5 cursor-pointer">
        <span class="icon-[lucide--chevron-left] text-3xl text-qt-green-normal"></span>
        Tentang
    </button>
    <a href="#" class="flex items-center gap-2.5 p-4">
        <span class="icon-[lucide--user] text-3xl text-qt-green-normal"></span>
        Tentang Kami
    </a>
    <a href="#" class="flex items-center gap-2.5 p-4">
        <span class="icon-[tabler--award] text-3xl text-qt-green-normal"></span>
        Award
    </a>
    <a href="#" class="flex items-center gap-2.5 p-4">
        <span class="icon-[akar-icons--shopping-bag] text-3xl text-qt-green-normal"></span>
        Marketplace
    </a>
</div>
