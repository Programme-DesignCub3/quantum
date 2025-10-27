<nav x-data="navbar" x-init="init()"
    :class="{
        'bg-white': isWhite,
        'top-0': position,
        '-top-full': !position
    }" class="fixed z-50 px-3 py-5 transition-all duration-300 ease-in-out flex justify-between items-center w-full max-w-md">
    <a href="{{ route('home') }}">
        <img class="w-24" src="{{ asset('images/logo.png') }}" alt="">
    </a>
    <div class="flex gap-3">
        <button type="button" class="flex justify-center items-center p-2 size-12 rounded-full bg-white cursor-pointer">
            <span class="icon-[iconamoon--search] text-[28px]"></span>
        </button>
        <button type="button" @click="openDrawer" class="flex justify-center items-center p-2 size-12 rounded-full bg-white cursor-pointer">
            <span class="icon-[gg--menu] text-[28px]"></span>
        </button>
    </div>
    <x-displays.drawer>
        <div class="relative space-y-9 mb-4">
            <div x-show="isMenuOpen" class="flex flex-col gap-1">
                <button type="button" @click="openMenu('about')" class="flex justify-between items-center p-4 cursor-pointer">
                    Tentang
                    <span class="icon-[lucide--chevron-right] text-3xl text-qt-green-normal"></span>
                </button>
                <button type="button" @click="openMenu('product')" class="flex justify-between items-center p-4 cursor-pointer">
                    Produk
                    <span class="icon-[lucide--chevron-right] text-3xl text-qt-green-normal"></span>
                </button>
                <button type="button" @click="openMenu('distributor')" class="flex justify-between items-center p-4 cursor-pointer">
                    Distributor
                    <span class="icon-[lucide--chevron-right] text-3xl text-qt-green-normal"></span>
                </button>
                <button type="button" @click="openMenu('updates')" class="flex justify-between items-center p-4 cursor-pointer">
                    Updates
                    <span class="icon-[lucide--chevron-right] text-3xl text-qt-green-normal"></span>
                </button>
                <button type="button" @click="openMenu('support')" class="flex justify-between items-center p-4 cursor-pointer">
                    Bantuan
                    <span class="icon-[lucide--chevron-right] text-3xl text-qt-green-normal"></span>
                </button>
            </div>
            <x-menus.about-menu />
            <x-menus.product-menu />
            <x-menus.distributor-menu />
            <x-menus.updates-menu />
            <x-menus.support-menu />
            <div class="relative">
                <input type="text" placeholder="Cari sesuatu" class="w-full bg-[#F4F4F4] rounded-3xl text-lg outline-none font-medium pl-16 pr-8 py-[18px] placeholder:font-medium placeholder:text-[#868686]">
                <span class="icon-[iconamoon--search] absolute top-1/2 -translate-y-1/2 left-4 text-[30px] text-qt-green-normal"></span>
            </div>
        </div>
    </x-displays.drawer>
</nav>

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('navbar', () => ({
            isWhite: false,
            position: true,

            isDrawerOpen: false,
            isMenuOpen: false,
            currentMenu: null,

            init() {
                let yprev;

                document.addEventListener('scroll', () => {
                    this.isWhite = window.scrollY > 0;

                    let y = window.pageYOffset;
                    this.position = y > yprev ? false : true;
                    yprev = y;
                });
            },

            openDrawer() {
                this.isDrawerOpen = true;
                this.isMenuOpen = true;
            },
            closeDrawer() {
                this.isDrawerOpen = false;
                this.isMenuOpen = false;
                this.currentMenu = null;
            },
            openMenu(menu) {
                this.isMenuOpen = false;
                this.currentMenu = menu;
            },
            closeMenu() {
                this.isMenuOpen = true;
                this.currentMenu = null;
            }
        }))
    })
</script>
@endpush
