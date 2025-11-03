<nav x-data="navbar" x-init="init()"
    :class="{
        'bg-white': isWhite,
        'top-0': position,
        '-top-full': !position,
        'sticky': sticky,
        'fixed': !sticky
    }" @class([
        'bg-white!' => !$transparent,
        'z-50 px-3 py-5 transition-all duration-300 ease-in-out flex justify-between items-center w-full max-w-md'
    ])>
    <a href="{{ route('home') }}">
        <img class="w-24" src="{{ asset('images/logo.png') }}" alt="">
    </a>
    <div class="flex gap-3">
        <button type="button" @click="$store.searchDrawer.openDrawer()" class="circle-menu-search">
            <span class="icon-[iconamoon--search] text-[28px]"></span>
        </button>
        <button type="button" @click="$store.menuDrawer.openDrawer()" class="circle-menu-search">
            <span class="icon-[gg--menu] text-[28px]"></span>
        </button>
        <x-displays.drawer store="menuDrawer">
            <div class="relative space-y-9">
                <div x-show="isMenuOpen" class="flex flex-col gap-1">
                    <button type="button" @click="openMenu('about')" class="menu-nav-link">
                        Tentang
                        <span class="icon-[lucide--chevron-right]"></span>
                    </button>
                    <button type="button" @click="openMenu('product')" class="menu-nav-link">
                        Produk
                        <span class="icon-[lucide--chevron-right]"></span>
                    </button>
                    <button type="button" @click="openMenu('distributor')" class="menu-nav-link">
                        Distributor
                        <span class="icon-[lucide--chevron-right]"></span>
                    </button>
                    <button type="button" @click="openMenu('updates')" class="menu-nav-link">
                        Updates
                        <span class="icon-[lucide--chevron-right]"></span>
                    </button>
                    <button type="button" @click="openMenu('support')" class="menu-nav-link">
                        Bantuan
                        <span class="icon-[lucide--chevron-right]"></span>
                    </button>
                </div>
                <div x-show="currentMenu === 'about'" class="flex flex-col gap-1">
                    <button type="button" @click="closeMenu" class="menu-nav-back">
                        <span class="icon-[lucide--chevron-left]"></span>
                        Tentang
                    </button>
                    <a href="{{ route('about') }}" class="menu-nav-sublink">
                        <span class="icon-[lucide--user]"></span>
                        Tentang Kami
                    </a>
                    <a href="{{ route('about') }}#award" class="menu-nav-sublink">
                        <span class="icon-[tabler--award]"></span>
                        Award
                    </a>
                    <a href="{{ route('about') }}#marketplace" class="menu-nav-sublink">
                        <span class="icon-[akar-icons--shopping-bag]"></span>
                        Marketplace
                    </a>
                </div>
                <div x-show="currentMenu === 'product'" class="flex flex-col gap-1">
                    <button type="button" @click="closeMenu" class="menu-nav-back">
                        <span class="icon-[lucide--chevron-left]"></span>
                        Produk
                    </button>
                    <a href="{{ route('product.category', 'kompor') }}" class="menu-nav-sublink">
                        <x-icons.stove-icon class="fill-qt-green-normal stroke-qt-green-normal" />
                        Kompor
                    </a>
                    <a href="{{ route('product.category', 'regulator-dan-selang-gas') }}" class="menu-nav-sublink">
                        <x-icons.regulator-icon class="fill-qt-green-normal" />
                        Regulator & Selang Gas
                    </a>
                    <a href="{{ route('product.category', 'suku-cadang') }}" class="menu-nav-sublink">
                        <x-icons.target-icon class="fill-qt-green-normal" />
                        Suku Cadang
                    </a>
                </div>
                <div x-show="currentMenu === 'distributor'" class="flex flex-col gap-1">
                    <button type="button" @click="closeMenu" class="menu-nav-back">
                        <span class="icon-[lucide--chevron-left]"></span>
                        Distributor
                    </button>
                    <a href="#" class="menu-nav-sublink">
                        <x-icons.store-icon class="fill-qt-green-normal" />
                        Daftar Distributor
                    </a>
                    <a href="#" class="menu-nav-sublink">
                        <span class="icon-[proicons--book]"></span>
                        Katalog
                    </a>
                </div>
                <div x-show="currentMenu === 'updates'" class="flex flex-col gap-1">
                    <button type="button" @click="closeMenu" class="menu-nav-back">
                        <span class="icon-[lucide--chevron-left]"></span>
                        Updates
                    </button>
                    <a href="#" class="menu-nav-sublink">
                        <x-icons.newspaper-folded-icon class="fill-qt-green-normal" />
                        Artikel
                    </a>
                    <a href="#" class="menu-nav-sublink">
                        <span class="icon-[lucide--calendar-check]"></span>
                        Event
                    </a>
                    <a href="#" class="menu-nav-sublink">
                        <x-icons.recipe-book-icon class="fill-qt-green-normal" />
                        Resep
                    </a>
                </div>
                <div x-show="currentMenu === 'support'" class="flex flex-col gap-1">
                    <button type="button" @click="closeMenu" class="menu-nav-back">
                        <span class="icon-[lucide--chevron-left]"></span>
                        Bantuan
                    </button>
                    <a href="#" class="menu-nav-sublink">
                        <x-icons.customer-care-icon class="fill-qt-green-normal size-7" />
                        Layanan Pelanggan
                    </a>
                    <a href="#" class="menu-nav-sublink">
                        <span class="icon-[humbleicons--document]"></span>
                        Informasi Garansi
                    </a>
                    <a href="#" class="menu-nav-sublink">
                        <span class="icon-[lucide--map-pin]"></span>
                        Service Center
                    </a>
                    <a href="#" class="menu-nav-sublink">
                        <x-icons.chat-icon class="stroke-qt-green-normal stroke-[2.5] size-7 fill-transparent" />
                        FAQ
                    </a>
                    <a href="#" class="menu-nav-sublink">
                        <span class="icon-[lucide--mail]"></span>
                        Kontak
                    </a>
                </div>
                <div class="relative">
                    <div @click="$store.searchDrawer.openDrawer()" class="absolute z-10 size-full rounded-3xl cursor-pointer"></div>
                    <input type="text" placeholder="Cari sesuatu" class="w-full bg-[#F4F4F4] rounded-3xl text-lg outline-none font-medium pl-16 pr-8 py-[18px] placeholder:font-medium placeholder:text-[#868686]">
                    <span class="icon-[iconamoon--search] absolute top-1/2 -translate-y-1/2 left-4 text-[30px] text-qt-green-normal"></span>
                </div>
            </div>
        </x-displays.drawer>
        <x-displays.drawer store="searchDrawer">
            <div class="space-y-4 text-center">
                <h4>Temukan Sesuatu</h4>
                <div class="relative">
                    <input type="text" placeholder="Cari sesuatu" class="w-full bg-[#F4F4F4] rounded-3xl text-lg outline-none font-medium pl-16 pr-8 py-[18px] placeholder:font-medium placeholder:text-[#868686]">
                    <span class="icon-[iconamoon--search] absolute top-1/2 -translate-y-1/2 left-4 text-[30px] text-qt-green-normal"></span>
                </div>
            </div>
        </x-displays.drawer>
    </div>
</nav>

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('navbar', () => ({
            isWhite: false,
            isMenuOpen: true,
            sticky: @json($sticky),
            position: true,
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
