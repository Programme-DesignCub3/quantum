<nav x-data="navbar" x-init="currentMenuInit(@js($route_group))"
    :class="{
        'bg-white': isWhite,
        'top-0': position,
        '-top-full': !position,
        'sticky': sticky,
        'fixed': !sticky
    }" @class([
        'bg-white!' => !$transparent,
        'transition-all duration-300 ease-in-out z-50'
    ])>
    <div class="container px-3 py-3 flex justify-between items-center w-full sm:px-6 md:py-0">
        <a href="{{ route('home') }}">
            <img class="w-24 md:w-28 lg:w-[134px]" src="{{ asset('images/logo.png') }}" alt="">
        </a>
        {{-- Mobile --}}
        <div class="flex gap-3 md:hidden">
            <button type="button" @click="$store.searchDrawer.openDrawer()" class="circle-menu-search">
                <span class="icon-[iconamoon--search] text-[28px]"></span>
            </button>
            <button type="button" @click="$store.menuDrawer.openDrawer()" class="circle-menu-search">
                <span class="icon-[gg--menu] text-[28px]"></span>
            </button>
            <x-displays.drawer store="menuDrawer">
                <div class="relative space-y-9">
                    <div x-show="$store.menuDrawer.isMenuOpen" class="flex flex-col gap-1">
                        <button type="button" @click="$store.menuDrawer.openMenu('about')" class="menu-nav-link">
                            Tentang
                            <span class="icon-[lucide--chevron-right]"></span>
                        </button>
                        <button type="button" @click="$store.menuDrawer.openMenu('product')" class="menu-nav-link">
                            Produk
                            <span class="icon-[lucide--chevron-right]"></span>
                        </button>
                        <button type="button" @click="$store.menuDrawer.openMenu('distributor')" class="menu-nav-link">
                            Distributor
                            <span class="icon-[lucide--chevron-right]"></span>
                        </button>
                        <button type="button" @click="$store.menuDrawer.openMenu('updates')" class="menu-nav-link">
                            Updates
                            <span class="icon-[lucide--chevron-right]"></span>
                        </button>
                        <button type="button" @click="$store.menuDrawer.openMenu('support')" class="menu-nav-link">
                            Bantuan
                            <span class="icon-[lucide--chevron-right]"></span>
                        </button>
                    </div>
                    <div x-show="$store.menuDrawer.currentMenu === 'about'" class="flex flex-col gap-1">
                        <button type="button" @click="$store.menuDrawer.closeMenu()" class="menu-nav-back">
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
                    <div x-show="$store.menuDrawer.currentMenu === 'product'" class="flex flex-col gap-1">
                        <button type="button" @click="$store.menuDrawer.closeMenu()" class="menu-nav-back">
                            <span class="icon-[lucide--chevron-left]"></span>
                            Produk
                        </button>
                        @foreach ($product_categories as $category)
                            <a href="{{ route('product.category', $category->slug) }}" class="menu-nav-sublink">
                                <img class="size-[30px]" src="{{ $category->icon_green }}" alt="">
                                {{ $category->name }}
                            </a>
                        @endforeach
                    </div>
                    <div x-show="$store.menuDrawer.currentMenu === 'distributor'" class="flex flex-col gap-1">
                        <button type="button" @click="$store.menuDrawer.closeMenu()" class="menu-nav-back">
                            <span class="icon-[lucide--chevron-left]"></span>
                            Distributor
                        </button>
                        <a href="{{ route('distributor.list-distributor') }}" class="menu-nav-sublink">
                            <x-icons.store-icon class="fill-qt-green-normal" />
                            Daftar Distributor
                        </a>
                        <a href="{{ route('distributor.catalog') }}" class="menu-nav-sublink">
                            <span class="icon-[proicons--book]"></span>
                            Katalog
                        </a>
                    </div>
                    <div x-show="$store.menuDrawer.currentMenu === 'updates'" class="flex flex-col gap-1">
                        <button type="button" @click="$store.menuDrawer.closeMenu()" class="menu-nav-back">
                            <span class="icon-[lucide--chevron-left]"></span>
                            Updates
                        </button>
                        <a href="{{ route('updates.news') }}" class="menu-nav-sublink">
                            <x-icons.newspaper-folded-icon class="fill-qt-green-normal" />
                            Artikel
                        </a>
                        <a href="{{ route('updates.news', ['kategori' => 'event']) }}" class="menu-nav-sublink">
                            <span class="icon-[lucide--calendar-check]"></span>
                            Event
                        </a>
                        <a href="{{ route('updates.recipe') }}" class="menu-nav-sublink">
                            <x-icons.recipe-book-icon class="fill-qt-green-normal" />
                            Resep
                        </a>
                    </div>
                    <div x-show="$store.menuDrawer.currentMenu === 'support'" class="flex flex-col gap-1">
                        <button type="button" @click="$store.menuDrawer.closeMenu()" class="menu-nav-back">
                            <span class="icon-[lucide--chevron-left]"></span>
                            Bantuan
                        </button>
                        <a href="{{ route('support.customer-service') }}" class="menu-nav-sublink">
                            <x-icons.customer-care-icon id="navbar-customer-care" class="fill-qt-green-normal size-7" />
                            Layanan Pelanggan
                        </a>
                        <a href="{{ route('support.guarantee-information') }}" class="menu-nav-sublink">
                            <span class="icon-[humbleicons--document]"></span>
                            Informasi Garansi
                        </a>
                        <a href="{{ route('support.service-center') }}" class="menu-nav-sublink">
                            <span class="icon-[lucide--map-pin]"></span>
                            Service Center
                        </a>
                        <a href="{{ route('support.faq') }}" class="menu-nav-sublink">
                            <x-icons.chat-icon class="stroke-qt-green-normal stroke-[2.5] size-7 fill-transparent" />
                            FAQ
                        </a>
                        <a href="{{ route('support.contact') }}" class="menu-nav-sublink">
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
                <livewire:displays.search-list />
            </x-displays.drawer>
        </div>
        {{-- Desktop --}}
        <div class="hidden items-center gap-3 md:flex lg:gap-5">
            <div class="flex">
                <button type="button" @mouseenter="$store.menuDrawer.openMenu('about')" @mouseleave="$store.menuDrawer.closeMenu()" :class="$store.menuDrawer.currentMenu === 'about' ? 'active' : ''" class="desktop-menu-nav">Tentang</button>
                <button type="button" @mouseenter="$store.menuDrawer.openMenu('product')" @mouseleave="$store.menuDrawer.closeMenu()" :class="$store.menuDrawer.currentMenu === 'product' ? 'active' : ''" class="desktop-menu-nav">Produk</button>
                <button type="button" @mouseenter="$store.menuDrawer.openMenu('distributor')" @mouseleave="$store.menuDrawer.closeMenu()" :class="$store.menuDrawer.currentMenu === 'distributor' ? 'active' : ''" class="desktop-menu-nav">Distributor</button>
                <button type="button" @mouseenter="$store.menuDrawer.openMenu('updates')" @mouseleave="$store.menuDrawer.closeMenu()" :class="$store.menuDrawer.currentMenu === 'updates' ? 'active' : ''" class="desktop-menu-nav">Updates</button>
                <button type="button" @mouseenter="$store.menuDrawer.openMenu('support')" @mouseleave="$store.menuDrawer.closeMenu()" :class="$store.menuDrawer.currentMenu === 'support' ? 'active' : ''" class="desktop-menu-nav">Bantuan</button>
            </div>
            <div class="flex items-center gap-2 lg:gap-6">
                <button type="button" @click="$store.searchDrawer.openDrawer()" class="circle-menu-search">
                    <span class="icon-[iconamoon--search] text-[28px]"></span>
                </button>
                <x-inputs.button type="hyperlink" href="{{ route('product') }}" size="lg" class="max-lg:py-3 max-lg:px-6 max-lg:rounded-xl max-lg:text-sm">
                    Beli Sekarang
                </x-inputs.button>
            </div>
        </div>
    </div>
    <div x-cloak x-show="$store.menuDrawer.currentMenu || $store.searchDrawer.open" class="fixed left-0 w-full min-h-dvh bg-black/40 hidden md:block"></div>
    <div x-cloak x-show="$store.menuDrawer.currentMenu === 'about'" @mouseenter="$store.menuDrawer.openMenu('about')" @mouseleave="$store.menuDrawer.closeMenu()" class="absolute left-0 w-full bg-[#E7F1F2] hidden md:block">
        <div class="container px-6 py-12 lg:px-16">
            <p class="large font-bold mb-8">Tentang</p>
            <div class="flex flex-col gap-8">
                <a href="{{ route('about') }}" class="desktop-menu-nav-link">Tentang Kami</a>
                <a href="{{ route('about') }}#award" class="desktop-menu-nav-link">Award</a>
                <a href="{{ route('about') }}#marketplace" class="desktop-menu-nav-link">Marketplace</a>
            </div>
        </div>
    </div>
    <div x-cloak x-show="$store.menuDrawer.currentMenu === 'product'" @mouseenter="$store.menuDrawer.openMenu('product')" @mouseleave="$store.menuDrawer.closeMenu()" class="absolute left-0 w-full bg-[#E7F1F2] hidden md:block">
        <div class="container grid grid-cols-12 px-6 py-12 lg:px-16">
            <div class="col-span-5 flex flex-col gap-8">
                <p class="large font-bold">Produk</p>
                <div class="flex flex-col gap-8">
                    @foreach ($product_categories as $category)
                        <a href="{{ route('product.category', $category->slug) }}" class="desktop-menu-nav-link">{{ $category->name }}</a>
                    @endforeach
                </div>
            </div>
            <div class="col-span-7 grid grid-cols-2 gap-5 rtl">
                <a href="{{ route('product.category', 'kompor') }}" class="relative order-last flex-1 rounded-3xl overflow-hidden">
                    <img class="aspect-19/11 size-full object-cover object-top" src="{{ asset('images/nav-product-stove.jpg') }}" alt="">
                    <div class="absolute bottom-0 flex flex-row-reverse items-end gap-3 p-5">
                        <h5 class="text-white text-left">Kompor Gas QGC 101 simpel, kuat, andal</h5>
                        <div class="shrink-0 hidden justify-center items-center size-14 bg-white rounded-full xl:flex">
                            <span class="icon-[lucide--chevron-right] text-4xl text-qt-green-normal"></span>
                        </div>
                    </div>
                </a>
                <a href="{{ route('product.category', 'regulator-selang-gas') }}" class="relative order-first flex-1 rounded-3xl overflow-hidden">
                    <img class="aspect-19/11 size-full object-cover object-top brightness-85" src="{{ asset('images/nav-product-regulator.jpg') }}" alt="">
                    <div class="absolute bottom-0 flex flex-row-reverse items-end gap-3 p-5">
                        <h5 class="text-white text-left">Quantum Regulator & Selang Gas, aman ber-SNI</h5>
                        <div class="shrink-0 hidden justify-center items-center size-14 bg-white rounded-full xl:flex">
                            <span class="icon-[lucide--chevron-right] text-4xl text-qt-green-normal"></span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div x-cloak x-show="$store.menuDrawer.currentMenu === 'distributor'" @mouseenter="$store.menuDrawer.openMenu('distributor')" @mouseleave="$store.menuDrawer.closeMenu()" class="absolute left-0 w-full bg-[#E7F1F2] hidden md:block">
        <div class="container px-6 py-12 lg:px-16">
            <p class="large font-bold mb-8">Distributor</p>
            <div class="flex flex-col gap-8">
                <a href="{{ route('distributor.list-distributor') }}" class="desktop-menu-nav-link">Daftar Distributor</a>
                <a href="{{ route('distributor.catalog') }}" class="desktop-menu-nav-link">Katalog</a>
            </div>
        </div>
    </div>
    <div x-cloak x-show="$store.menuDrawer.currentMenu === 'updates'" @mouseenter="$store.menuDrawer.openMenu('updates')" @mouseleave="$store.menuDrawer.closeMenu()" class="absolute left-0 w-full bg-[#E7F1F2] hidden md:block">
        <div class="container grid grid-cols-12 px-6 py-12 lg:px-16">
            <div class="col-span-5 flex flex-col gap-8">
                <p class="large font-bold">Updates</p>
                <div class="flex flex-col gap-8">
                    <a href="{{ route('updates.news') }}" class="desktop-menu-nav-link">Artikel</a>
                    <a href="{{ route('updates.news', ['kategori' => 'event']) }}" class="desktop-menu-nav-link">Event</a>
                    <a href="{{ route('updates.recipe') }}" class="desktop-menu-nav-link">Resep</a>
                </div>
            </div>
            <div class="col-span-7 grid grid-cols-2 gap-5 rtl">
                <a href="{{ route('product.category', 'regulator-selang-gas') }}" class="relative order-first flex-1 rounded-3xl overflow-hidden">
                    <img class="aspect-19/11 size-full object-cover object-top brightness-85" src="{{ asset('images/nav-product-regulator.jpg') }}" alt="">
                    <div class="absolute bottom-0 flex flex-row-reverse items-end gap-3 p-5">
                        <h5 class="text-white text-left">Quantum Regulator & Selang Gas, aman ber-SNI</h5>
                        <div class="shrink-0 hidden justify-center items-center size-14 bg-white rounded-full xl:flex">
                            <span class="icon-[lucide--chevron-right] text-4xl text-qt-green-normal"></span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div x-cloak x-show="$store.menuDrawer.currentMenu === 'support'" @mouseenter="$store.menuDrawer.openMenu('support')" @mouseleave="$store.menuDrawer.closeMenu()" class="absolute left-0 w-full bg-[#E7F1F2] hidden md:block">
        <div class="container px-6 py-12 lg:px-16">
            <p class="large font-bold mb-8">Bantuan</p>
            <div class="flex flex-col gap-8">
                <a href="{{ route('support.customer-service') }}" class="desktop-menu-nav-link">Layanan Pelanggan</a>
                <a href="{{ route('support.guarantee-information') }}" class="desktop-menu-nav-link">Informasi Garansi</a>
                <a href="{{ route('support.service-center') }}" class="desktop-menu-nav-link">Service Center</a>
                <a href="{{ route('support.faq') }}" class="desktop-menu-nav-link">FAQ</a>
                <a href="{{ route('support.contact') }}" class="desktop-menu-nav-link">Kontak</a>
            </div>
        </div>
    </div>
    <div x-cloak x-show="$store.searchDrawer.open" @mouseenter="$store.searchDrawer.openDrawer('support')" @click.outside="$store.searchDrawer.closeDrawer()" class="absolute left-0 top-0 w-full bg-white hidden md:block">
        <div class="container px-6 py-12 lg:py-[60px]">
            <livewire:displays.search-list />
        </div>
    </div>
</nav>

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('navbar', () => ({
            isWhite: false,
            sticky: @json($sticky),
            position: true,

            init() {
                let yprev;

                document.addEventListener('scroll', () => {
                    this.isWhite = window.scrollY > 0;

                    let y = window.pageYOffset;
                    this.position = y > yprev ? false : true;
                    yprev = y;
                });
            },
            currentMenuInit(routeGroup) {
                if (routeGroup) {
                    this.$store.menuDrawer.isMenuOpen = false;
                    this.$store.menuDrawer.currentMenu = routeGroup;
                }
            }
        }))
    })
</script>
@endpush
