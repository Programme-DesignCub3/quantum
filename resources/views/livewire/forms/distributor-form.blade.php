<div class="bg-white rounded-[20px] col-span-full h-max lg:col-span-6">
    <form x-data="{ status: @entangle('status') }" wire:submit="submit" class="flex flex-col gap-4 px-5 py-8">
        <x-displays.toast>
            Berhasil terkirim!
        </x-displays.toast>
        <h3 class="max-w-72 text-center mx-auto">{{ $page_settings->distributor_title_form }}</h3>
        <div class="flex flex-col gap-4">
            <div class="flex flex-col gap-4">
                {{-- Nama --}}
                <div x-data="{ input: @entangle('nama') }" class="floating-label-input relative space-y-1.5">
                    <label x-cloak for="nama" :class="input ? 'floating' : 'not-floating'">Nama</label>
                    <input wire:model="nama" x-model="input" type="text" id="nama" placeholder="Nama" autocomplete="off" required>
                    @error('nama') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
                </div>
                {{-- Email --}}
                <div x-data="{ input: @entangle('email') }" class="floating-label-input relative space-y-1.5">
                    <label x-cloak for="email" :class="input ? 'floating' : 'not-floating'">Email</label>
                    <input wire:model="email" x-model="input" type="email" id="email" placeholder="Email" autocomplete="off" inputmode="email" required>
                    @error('email') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
                </div>
                {{-- WhatsApp --}}
                <div x-data="{ input: @entangle('whatsapp') }" class="floating-label-input relative space-y-1.5">
                    <label x-cloak for="whatsapp" :class="input ? 'floating' : 'not-floating'">WhatsApp</label>
                    <input wire:model="whatsapp" x-model="input" type="tel" id="whatsapp" placeholder="WhatsApp" autocomplete="off" inputmode="numeric" required>
                    @error('whatsapp') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
                </div>
                {{-- Wilayah Distribusi --}}
                <div x-data="{ input: @entangle('wilayah_distribusi') }" class="floating-label-input relative space-y-1.5">
                    <label x-cloak for="wilayah_distribusi" :class="input ? 'floating' : 'not-floating'">Wilayah Distribusi yang Diminati</label>
                    <input wire:model="wilayah_distribusi" x-model="input" type="text" id="wilayah_distribusi" placeholder="Wilayah Distribusi yang Diminati" autocomplete="off" required>
                    @error('wilayah_distribusi') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
                </div>
                {{-- Alamat Lengkap --}}
                <div x-data="{ input: @entangle('alamat_lengkap') }" class="floating-label-input relative space-y-1.5">
                    <label x-cloak for="alamat_lengkap" :class="input ? 'floating' : 'not-floating'">Alamat Lengkap</label>
                    <textarea wire:model="alamat_lengkap" x-model="input" id="alamat_lengkap" placeholder="Alamat Lengkap" required></textarea>
                    @error('alamat_lengkap') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
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
                        <input wire:model="tnc" type="checkbox" id="tnc" class="shrink-0 mt-0.5">
                        <label for="tnc" class="text-sm leading-[143%]">Saya setuju dengan syarat dan ketentuan berlaku.</label>
                    </div>
                    @error('tnc') <span class="block capitalize-first text-[#D6301E]">Syarat & ketentuan harus disetujui.</span> @enderror
                </div>
            </div>
            <div class="flex justify-center items-center">
                <x-inputs.button type="submit" size="lg">
                    Gabung Sekarang
                </x-inputs.button>
            </div>
        </div>
    </form>
</div>

