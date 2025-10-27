<div x-show="currentMenu === 'updates'" class="flex flex-col gap-1">
    <button type="button" @click="closeMenu" class="flex items-center py-4 font-medium text-lg gap-2.5 cursor-pointer">
        <span class="icon-[lucide--chevron-left] text-3xl text-qt-green-normal"></span>
        Updates
    </button>
    <a href="#" class="flex items-center gap-2.5 p-4">
        <x-icons.newspaper-folded-icon class="fill-qt-green-normal" />
        Artikel
    </a>
    <a href="#" class="flex items-center gap-2.5 p-4">
        <span class="icon-[lucide--calendar-check] text-3xl text-qt-green-normal"></span>
        Event
    </a>
    <a href="#" class="flex items-center gap-2.5 p-4">
        <x-icons.recipe-book-icon class="fill-qt-green-normal" />
        Resep
    </a>
</div>
