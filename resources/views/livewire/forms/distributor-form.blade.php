<div class="bg-white rounded-[20px]">
    <form wire:submit="submit" class="flex flex-col gap-4 px-5 py-8">
        <h3 class="max-w-72 text-center mx-auto">Headline gabung jadi distributror</h3>
        <div class="flex flex-col gap-4">
            <div class="flex flex-col gap-3">
                <div x-data="{ input: null }" class="floating-label-input relative space-y-1.5">
                    <label x-cloak for="nama" :class="input ? 'floating' : 'not-floating'">Nama</label>
                    <input wire:model="nama" x-model="input" type="text" id="nama" placeholder="Nama" autocomplete="off" required>
                    @error('nama') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
                </div>
                <div x-data="{ input: null }" class="floating-label-input relative space-y-1.5">
                    <label x-cloak for="email" :class="input ? 'floating' : 'not-floating'">Email</label>
                    <input wire:model="email" x-model="input" type="email" id="email" placeholder="Email" autocomplete="off" required>
                    @error('email') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
                </div>
                <div x-data="{ input: null }" class="floating-label-input relative space-y-1.5">
                    <label x-cloak for="whatsapp" :class="input ? 'floating' : 'not-floating'">Whatsapp</label>
                    <input wire:model="whatsapp" x-model="input" type="tel" id="whatsapp" placeholder="Whatsapp" autocomplete="off" required>
                    @error('whatsapp') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
                </div>
                <div x-data="{ input: null }" class="floating-label-input relative space-y-1.5">
                    <label x-cloak for="wilayah_distribusi" :class="input ? 'floating' : 'not-floating'">Wilayah Distribusi yang Diminati</label>
                    <input wire:model="wilayah_distribusi" x-model="input" type="text" id="wilayah_distribusi" placeholder="Wilayah Distribusi yang Diminati" autocomplete="off" required>
                    @error('wilayah_distribusi') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
                </div>
                <div x-data="{ input: null }" class="floating-label-input relative space-y-1.5">
                    <label x-cloak for="alamat_lengkap" :class="input ? 'floating' : 'not-floating'">Alamat Lengkap</label>
                    <input wire:model="alamat_lengkap" x-model="input" type="text" id="alamat_lengkap" placeholder="Alamat Lengkap" autocomplete="off" required>
                    @error('alamat_lengkap') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
                </div>
                <div x-data="{ input: null }" class="floating-label-input relative space-y-1.5">
                    <label x-cloak for="pesan" :class="input ? 'floating' : 'not-floating'">Pesan</label>
                    <input wire:model="pesan" x-model="input" type="text" id="pesan" placeholder="Pesan" autocomplete="off" required>
                    @error('pesan') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
                </div>
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

