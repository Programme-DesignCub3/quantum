<form wire:submit="submit" id="daftarkan-produk" class="flex flex-col gap-4 my-8 px-5 scroll-mt-32 md:max-w-[560px] md:mx-auto">
    <h3 class="text-center">Daftarkan Produk Quantum Anda Sekarang dan Nikmati Perlindungan Garansi Resmi!</h3>
    <div class="flex flex-col gap-5">
        <div class="flex flex-col gap-4">
            <p>Data Pribadi</p>
            {{-- Nama Lengkap --}}
            <div x-data="{ input: @entangle('nama_lengkap') }" class="floating-label-input relative space-y-1.5">
                <label x-cloak for="nama_lengkap" :class="input ? 'floating' : 'not-floating'">Nama Lengkap</label>
                <input wire:model="nama_lengkap" x-model="input" type="text" id="nama_lengkap" placeholder="Nama Lengkap" autocomplete="off" required>
                @error('nama_lengkap') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
            </div>
            {{-- Nomor Handphone --}}
            <div x-data="{ input: @entangle('nomor_handphone') }" class="floating-label-input relative space-y-1.5">
                <label x-cloak for="nomor_handphone" :class="input ? 'floating' : 'not-floating'">Nomor Handphone</label>
                <input wire:model="nomor_handphone" x-model="input" type="tel" id="nomor_handphone" placeholder="Nomor Handphone" autocomplete="off" inputmode="numeric" required>
                @error('nomor_handphone') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
            </div>
            {{-- Email --}}
            <div x-data="{ input: @entangle('email') }" class="floating-label-input relative space-y-1.5">
                <label x-cloak for="email" :class="input ? 'floating' : 'not-floating'">Email</label>
                <input wire:model="email" x-model="input" type="email" id="email" placeholder="Email" autocomplete="off" inputmode="email" required>
                @error('email') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
            </div>
            {{-- Alamat Lengkap --}}
            <div x-data="{ input: @entangle('alamat_lengkap') }" class="floating-label-input relative space-y-1.5">
                <label x-cloak for="alamat_lengkap" :class="input ? 'floating' : 'not-floating'">Alamat Lengkap</label>
                <textarea wire:model="alamat_lengkap" x-model="input" id="alamat_lengkap" placeholder="Alamat Lengkap" required></textarea>
                @error('alamat_lengkap') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="flex flex-col gap-4">
            <p>Data Produk</p>
            {{-- Nomor Seri Produk --}}
            <div class="space-y-1.5">
                <div x-data="{ input: @entangle('nomor_seri_produk') }" class="floating-label-input relative space-y-0">
                    <label x-cloak for="nomor_seri_produk" :class="input ? 'floating' : 'not-floating'">Nomor Seri Produk</label>
                    <span class="icon-[lucide--info] absolute top-3.5 right-3.5 text-xl text-[#6D6D6D]"></span>
                    <input wire:model="nomor_seri_produk" x-model="input" type="text" id="nomor_seri_produk" placeholder="Nomor Seri Produk" class="pr-10" autocomplete="off" inputmode="numeric" required>
                    <button type="button" @click="$store.numberModelDrawer.openDrawer()" class="w-max text-[#6D6D6D] underline text-xs cursor-pointer">Cara menemukan Nomor Seri dan Model?</button>
                </div>
                @error('nomor_seri_produk') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
            </div>
            {{-- Kategori Produk --}}
            <div x-data="{ input: @entangle('kategori_produk') }" class="floating-label-input space-y-1.5">
                <label x-cloak for="kategori_produk" :class="input ? 'floating' : 'not-floating'">Kategori Produk</label>
                <button type="button" id="kategori_produk" @click="$store.guaranteeCategoryProductDrawer.openDrawer()" :class="input ? 'filled' : 'not-filled'" class="select-form gap-2 text-left">
                    <span id="select-form" x-text="input ? input : 'Kategori Produk'"></span>
                    <span class="icon-[lucide--chevron-down] text-xl text-[#6D6D6D] shrink-0" :class="{ 'md:rotate-180': $store.guaranteeCategoryProductDrawer.open }"></span>
                </button>
                <x-displays.drawer store="guaranteeCategoryProductDrawer">
                    <div class="flex flex-col gap-1 py-4">
                        @foreach($product_categories as $category)
                            <button type="button" @click="$store.guaranteeCategoryProductDrawer.closeDrawer()" wire:click="$set('kategori_produk', '{{ $category->name }}')" class="w-full text-left p-4 cursor-pointer">{{ $category->name }}</button>
                        @endforeach
                    </div>
                </x-displays.drawer>
                <div x-cloak x-show="$store.guaranteeCategoryProductDrawer.open" @click.outside="$store.guaranteeCategoryProductDrawer.closeDrawer()" class="dropdown-select drop-shadow-float">
                    @foreach($product_categories as $category)
                        <button type="button" @click="$store.guaranteeCategoryProductDrawer.closeDrawer()" wire:click="$set('kategori_produk', '{{ $category->name }}')">{{ $category->name }}</button>
                    @endforeach
                </div>
                <input wire:model="kategori_produk" type="hidden">
                @error('kategori_produk') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
            </div>
            {{-- Model Produk --}}
            <div x-data="{ input: @entangle('model_produk') }" class="floating-label-input space-y-1.5">
                <label x-cloak for="model_produk" :class="input ? 'floating' : 'not-floating'">Model Produk</label>
                <button type="button" id="model_produk" @click="$store.guaranteeModelProductDrawer.openDrawer()" :class="input ? 'filled' : 'not-filled'" class="select-form gap-2 text-left">
                    <span id="select-form" x-text="input ? input : 'Model Produk'"></span>
                    <span class="icon-[lucide--chevron-down] text-xl text-[#6D6D6D] shrink-0" :class="{ 'md:rotate-180': $store.guaranteeModelProductDrawer.open }"></span>
                </button>
                <x-displays.drawer store="guaranteeModelProductDrawer">
                    <div class="flex flex-col gap-1 py-4">
                        <button type="button" @click="$store.guaranteeModelProductDrawer.closeDrawer()" wire:click="$set('model_produk', 'Model #1')" class="w-full text-left p-4 cursor-pointer">Model #1</button>
                        <button type="button" @click="$store.guaranteeModelProductDrawer.closeDrawer()" wire:click="$set('model_produk', 'Model #2')" class="w-full text-left p-4 cursor-pointer">Model #2</button>
                        <button type="button" @click="$store.guaranteeModelProductDrawer.closeDrawer()" wire:click="$set('model_produk', 'Model #3')" class="w-full text-left p-4 cursor-pointer">Model #3</button>
                    </div>
                </x-displays.drawer>
                <div x-cloak x-show="$store.guaranteeModelProductDrawer.open" @click.outside="$store.guaranteeModelProductDrawer.closeDrawer()" class="dropdown-select drop-shadow-float">
                    <button type="button" @click="$store.guaranteeModelProductDrawer.closeDrawer()" wire:click="$set('model_produk', 'Model #1')">Model #1</button>
                    <button type="button" @click="$store.guaranteeModelProductDrawer.closeDrawer()" wire:click="$set('model_produk', 'Model #2')">Model #2</button>
                    <button type="button" @click="$store.guaranteeModelProductDrawer.closeDrawer()" wire:click="$set('model_produk', 'Model #3')">Model #3</button>
                </div>
                <input wire:model="model_produk" type="hidden">
                @error('model_produk') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
            </div>
            {{-- Tanggal Pembelian --}}
            <div x-data="{ input: @entangle('tanggal_pembelian') }" class="floating-label-input space-y-1.5">
                <label x-cloak for="tanggal_pembelian" :class="input ? 'floating' : 'not-floating'">Tanggal Pembelian</label>
                <button type="button" id="tanggal_pembelian" @click="$store.guaranteePurchaseDateDrawer.openDrawer()" :class="input ? 'filled' : 'not-filled'" class="select-form gap-2 text-left">
                    <span id="select-form" x-text="input ? input : 'Tanggal Pembelian'"></span>
                    <span class="icon-[lucide--calendar] text-xl text-[#6D6D6D] shrink-0"></span>
                </button>
                <x-displays.drawer store="guaranteePurchaseDateDrawer">
                    <div wire:ignore id="purchase-date-picker" class="px-2"></div>
                </x-displays.drawer>
                <div x-cloak x-show="$store.guaranteePurchaseDateDrawer.open" @click.outside="$store.guaranteePurchaseDateDrawer.closeDrawer()" class="dropdown-select drop-shadow-float max-w-xs left-auto right-0 max-h-max">
                    <div wire:ignore id="purchase-date-picker" class="px-2"></div>
                </div>
                <input wire:model="tanggal_pembelian" type="hidden">
                @error('tanggal_pembelian') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
            </div>
            {{-- Tempat Pembelian --}}
            <div x-data="{ input: @entangle('tempat_pembelian') }" class="floating-label-input space-y-1.5">
                <label x-cloak for="tempat_pembelian" :class="input ? 'floating' : 'not-floating'">Tempat Pembelian</label>
                <button type="button" id="tempat_pembelian" @click="$store.guaranteePlacePurchaseDrawer.openDrawer()" :class="input ? 'filled' : 'not-filled'" class="select-form gap-2 text-left">
                    <span id="select-form" x-text="input ? input : 'Tempat Pembelian'"></span>
                    <span class="icon-[lucide--chevron-down] text-xl text-[#6D6D6D] shrink-0" :class="{ 'md:rotate-180': $store.guaranteePlacePurchaseDrawer.open }"></span>
                </button>
                <x-displays.drawer store="guaranteePlacePurchaseDrawer">
                    <div class="flex flex-col gap-1 py-4">
                        <button type="button" @click="$store.guaranteePlacePurchaseDrawer.closeDrawer()" wire:click="$set('tempat_pembelian', 'Toko Elektronik')" class="w-full text-left p-4 cursor-pointer">Toko Elektronik</button>
                        <button type="button" @click="$store.guaranteePlacePurchaseDrawer.closeDrawer()" wire:click="$set('tempat_pembelian', 'Supermarket')" class="w-full text-left p-4 cursor-pointer">Supermarket</button>
                        <button type="button" @click="$store.guaranteePlacePurchaseDrawer.closeDrawer()" wire:click="$set('tempat_pembelian', 'Pasar')" class="w-full text-left p-4 cursor-pointer">Pasar</button>
                        <button type="button" @click="$store.guaranteePlacePurchaseDrawer.closeDrawer()" wire:click="$set('tempat_pembelian', 'Agen')" class="w-full text-left p-4 cursor-pointer">Agen</button>
                        <button type="button" @click="$store.guaranteePlacePurchaseDrawer.closeDrawer()" wire:click="$set('tempat_pembelian', 'Online')" class="w-full text-left p-4 cursor-pointer">Online</button>
                        <button type="button" @click="$store.guaranteePlacePurchaseDrawer.closeDrawer()" wire:click="$set('tempat_pembelian', 'Lainnya')" class="w-full text-left p-4 cursor-pointer">Lainnya</button>
                    </div>
                </x-displays.drawer>
                <div x-cloak x-show="$store.guaranteePlacePurchaseDrawer.open" @click.outside="$store.guaranteePlacePurchaseDrawer.closeDrawer()" class="dropdown-select drop-shadow-float">
                    <button type="button" @click="$store.guaranteePlacePurchaseDrawer.closeDrawer()" wire:click="$set('tempat_pembelian', 'Toko Elektronik')">Toko Elektronik</button>
                    <button type="button" @click="$store.guaranteePlacePurchaseDrawer.closeDrawer()" wire:click="$set('tempat_pembelian', 'Supermarket')">Supermarket</button>
                    <button type="button" @click="$store.guaranteePlacePurchaseDrawer.closeDrawer()" wire:click="$set('tempat_pembelian', 'Pasar')">Pasar</button>
                    <button type="button" @click="$store.guaranteePlacePurchaseDrawer.closeDrawer()" wire:click="$set('tempat_pembelian', 'Agen')">Agen</button>
                    <button type="button" @click="$store.guaranteePlacePurchaseDrawer.closeDrawer()" wire:click="$set('tempat_pembelian', 'Online')">Online</button>
                    <button type="button" @click="$store.guaranteePlacePurchaseDrawer.closeDrawer()" wire:click="$set('tempat_pembelian', 'Lainnya')">Lainnya</button>
                </div>
                <input wire:model="tempat_pembelian" type="hidden">
                @error('tempat_pembelian') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
            </div>
            {{-- Pesan --}}
            <div x-data="{ input: @entangle('pesan') }" class="floating-label-input relative space-y-1.5">
                <label x-cloak for="pesan" :class="input ? 'floating' : 'not-floating'">Pesan</label>
                <textarea wire:model="pesan" x-model="input" id="pesan" placeholder="Pesan" required></textarea>
                @error('pesan') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
            </div>
            {{-- Syarat & Ketentuan --}}
            <div class="space-y-1.5">
                <div class="flex justify-start gap-3">
                    <input wire:model="tnc" type="checkbox" id="tnc" class="shrink-0 mt-1 md:mt-0.5">
                    <label for="tnc" class="text-sm leading-[143%]">Saya menyetujui syarat & ketentuan garansi Quantum Indonesia.</label>
                </div>
                @error('tnc') <span class="block capitalize-first text-[#D6301E]">Syarat & ketentuan harus disetujui.</span> @enderror
            </div>
        </div>
    </div>
    <div class="justify-center items-center md:flex">
        <x-inputs.button type="submit" size="lg" class="w-full md:w-auto">
            Daftarkan Garansi Sekarang
        </x-inputs.button>
    </div>
</form>
