<x-displays.drawer store="productDrawer" color="green">
    <div class="flex flex-col gap-6 px-2">
        <div class="flex items-center gap-4">
            <div class="shrink-0 bg-white rounded-2xl overflow-hidden">
                <img class="size-[100px] object-cover object-center" :src="$store.productDrawer.data?.image" alt="">
            </div>
            <div class="flex flex-col gap-2.5">
                <div class="space-y-0">
                    <span x-text="$store.productDrawer.data?.category" class="text-[#9A9A9A]"></span>
                    <h4 x-text="$store.productDrawer.data?.name" class="text-qt-green-normal"></h4>
                </div>
                {{-- <div class="flex items-center gap-1">
                    <span>Rp</span>
                    <p x-text="$store.productDrawer.data?.price"></p>
                </div> --}}
            </div>
        </div>
        <div class="flex flex-col justify-center items-center gap-6">
            <h4>Beli Produk di Marketplace</h4>
            <div class="flex gap-2.5 flex-wrap justify-center">
                <a x-show="$store.productDrawer.data?.marketplace.lazada" :href="$store.productDrawer.data?.marketplace.lazada" target="_blank" class="flex justify-center items-center size-[70px] bg-white rounded-full">
                    <img src="{{ asset('images/lazada.png') }}" alt="">
                </a>
                <a x-show="$store.productDrawer.data?.marketplace.blibli" :href="$store.productDrawer.data?.marketplace.blibli" target="_blank" class="flex justify-center items-center size-[70px] bg-white rounded-full">
                    <img src="{{ asset('images/blibli.png') }}" alt="">
                </a>
                <a x-show="$store.productDrawer.data?.marketplace.shopee" :href="$store.productDrawer.data?.marketplace.shopee" target="_blank" class="flex justify-center items-center size-[70px] bg-white rounded-full">
                    <img src="{{ asset('images/shopee.png') }}" alt="">
                </a>
                <a x-show="$store.productDrawer.data?.marketplace.tokopedia" :href="$store.productDrawer.data?.marketplace.tokopedia" target="_blank" class="flex justify-center items-center size-[70px] bg-white rounded-full">
                    <img src="{{ asset('images/tokopedia.png') }}" alt="">
                </a>
            </div>
        </div>
    </div>
</x-displays.drawer>
<x-displays.drawer store="shareDrawer">
    <div class="flex flex-col gap-4 justify-center items-center px-4">
        <h3>Bagikan Artikel</h3>
        <div class="flex gap-2 py-4">
            <x-inputs.button-icon type="hyperlink" :newTab="true" href="https://www.linkedin.com/sharing/share-offsite/?url={{ URL::current() }}" class="rounded-2xl!" icon="icon-[jam--linkedin]" />
            <x-inputs.button-icon type="hyperlink" :newTab="true" href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}" class="rounded-2xl!" icon="icon-[ri--facebook-fill]" />
            <x-inputs.button-icon type="hyperlink" :newTab="true" href="https://wa.me/?text={{ URL::current() }}" class="rounded-2xl!" icon="icon-[ic--baseline-whatsapp]" />
            <x-inputs.button-icon type="hyperlink" href="mailto:?body={{ URL::current() }}" class="rounded-2xl!" icon="icon-[lucide--mail]" />
        </div>
    </div>
</x-displays.drawer>
<x-displays.drawer store="placeDetailDrawer">
    <div class="flex flex-col gap-5 px-4">
        <div class="flex flex-col gap-4">
            <div class="flex flex-col gap-4">
                <div class="relative">
                    <img class="w-full object-cover object-bottom h-[150px] rounded-[20px] overflow-hidden" src="{{ asset('images/toko-distributor.jpg') }}" alt="">
                </div>
                <div class="space-y-0">
                    <span class="block text-[#6D6D6D]">Banten</span>
                    <h5>Nama Toko Distributor/Service Center</h5>
                </div>
                <div class="flex gap-4">
                    <span class="icon-[lucide--map-pin] shrink-0 text-lg text-qt-green-normal"></span>
                    <span class="text-[#6D6D6D]">Alamat detil toko distributor/service center</span>
                </div>
            </div>
            <div class="flex flex-col gap-1">
                <h6>Jam Operasional</h6>
                <div class="flex justify-between">
                    <div class="space-y-1">
                        <span class="extrasmall">Senin - Jumat</span>
                        <p>07.00-20.00 WIB</p>
                    </div>
                    <div class="space-y-1">
                        <span class="extrasmall">Sabtu-Minggu & Hari Libur</span>
                        <p>07.00-18.00 WIB</p>
                    </div>
                </div>
            </div>
            <div class="space-y-1">
                <h6>Produk Penjualan</h6>
                <p class="small">Kompor</p>
                <p class="small">Regulator</p>
                <p class="small">Suku Cadang</p>
            </div>
            <div class="flex gap-2 justify-center py-4">
                <x-inputs.button-icon type="hyperlink" class="rounded-2xl!" icon="icon-[lucide--phone]" />
                <x-inputs.button-icon type="hyperlink" class="rounded-2xl!" icon="icon-[ic--baseline-whatsapp]" />
                <x-inputs.button-icon type="hyperlink" class="rounded-2xl!" icon="icon-[lucide--map-pin]" />
            </div>
        </div>
    </div>
</x-displays.drawer>
<x-displays.drawer store="numberModelDrawer">
    <div class="flex flex-col gap-4 px-4">
        <h3>Temukan nomor model produk saya</h3>
        <div x-show="$store.numberModelDrawer.isMenuOpen" class="flex flex-col gap-4">
            <h6>Kategori Produk</h6>
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
                    <span class="transition-all duration-300 ease-in-out font-semibold text-xs group-hover:text-white">Suku Cadang</span>
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
                <img src="{{ asset('images/stove-barcode.jpg') }}" alt="">
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
                <img src="{{ asset('images/stove-barcode.jpg') }}" alt="">
            </div>
            <div class="space-y-1">
                <h6>Lokasi barcode dan nomor model</h6>
                <p class="small">Temukan barcode dan nomor model di sisi kanan kompor atau di sisi kiri.</p>
            </div>
        </div>
        <div x-show="$store.numberModelDrawer.currentMenu === 'sparepart'" class="flex flex-col gap-4">
            <div class="flex justify-between items-center">
                <h6>Suku Cadang</h6>
                <x-inputs.button type="button" size="sm" event="$store.numberModelDrawer.closeMenu()">
                    Kembali
                </x-inputs.button>
            </div>
            <div class="flex justify-center items-center">
                <img src="{{ asset('images/stove-barcode.jpg') }}" alt="">
            </div>
            <div class="space-y-1">
                <h6>Lokasi barcode dan nomor model</h6>
                <p class="small">Temukan barcode dan nomor model di sisi kanan kompor atau di sisi kiri.</p>
            </div>
        </div>
    </div>
</x-displays.drawer>
