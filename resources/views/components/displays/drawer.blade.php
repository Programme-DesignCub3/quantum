<div x-cloak @click.self="closeDrawer" :class="isDrawerOpen ? 'visible bg-black/40' : 'invisible bg-black/0'" class="fixed top-0 transition-all duration-300 ease-in-out -ml-3 max-w-md w-full mx-auto min-h-dvh overflow-hidden">
    <div :class="isDrawerOpen ? 'bottom-0' : '-bottom-full'" class="absolute transition-all duration-300 ease-in-out w-full bg-white px-4 pt-[34px] pb-14 rounded-t-2xl">
        <div class="absolute top-2 left-1/2 -translate-x-1/2 w-11 h-0.5 bg-[#DBDBDB] rounded-full"></div>
        {{ $slot }}
    </div>
</div>
