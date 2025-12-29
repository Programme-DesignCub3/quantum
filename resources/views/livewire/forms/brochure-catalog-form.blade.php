<div class="flex flex-col gap-4 px-4">
    <h3 class="max-w-72 text-center mx-auto">Formulir Download Brosur/Flyer</h3>
    <form wire:submit="submit" class="flex flex-col gap-4">
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
                Unduh Brosur
            </x-inputs.button>
        </div>
    </form>
</div>
