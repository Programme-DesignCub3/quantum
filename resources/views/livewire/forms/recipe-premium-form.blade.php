<div class="flex flex-col gap-4 px-4">
    <div class="flex items-center justify-center gap-4">
        <x-icons.premium-icon class="size-8 fill-[#FAC70B]" />
        <h3 class="text-qt-green-normal">Resep Premium</h3>
    </div>
    <form x-data="{ status: @entangle('status') }" wire:submit="submitDownload" class="flex flex-col gap-4">
        <x-displays.toast>
            Berhasil disimpan!
        </x-displays.toast>
        <div class="flex flex-col gap-4">
            <div x-data="{ input: @entangle('nama') }" class="floating-label-input relative space-y-1.5">
                <label x-cloak for="nama" :class="input ? 'floating' : 'not-floating'">Nama</label>
                <input wire:model="nama" wire:loading.attr="disabled" wire:target="submitDownload, submitView" x-model="input" type="text" id="nama" placeholder="Nama" autocomplete="off" required>
                @error('nama') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
            </div>
            <div x-data="{ input: @entangle('email') }" class="floating-label-input relative space-y-1.5">
                <label x-cloak for="email" :class="input ? 'floating' : 'not-floating'">Email</label>
                <input wire:model="email" wire:loading.attr="disabled" wire:target="submitDownload, submitView" x-model="input" type="email" id="email" placeholder="Email" autocomplete="off" inputmode="email" required>
                @error('email') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
            </div>
            <div x-data="{ input: @entangle('whatsapp') }" class="floating-label-input relative space-y-1.5">
                <label x-cloak for="whatsapp" :class="input ? 'floating' : 'not-floating'">WhatsApp</label>
                <input wire:model="whatsapp" wire:loading.attr="disabled" wire:target="submitDownload, submitView" x-model="input" type="tel" id="whatsapp" placeholder="WhatsApp" autocomplete="off" inputmode="numeric" required>
                @error('whatsapp') <span class="block capitalize-first text-[#D6301E]">{{ $message }}</span> @enderror
            </div>
            <div class="space-y-1.5">
                <div class="flex justify-start gap-3">
                    <input wire:model="tnc" wire:loading.attr="disabled" wire:target="submitDownload, submitView" type="checkbox" id="tnc" class="shrink-0 mt-0.5">
                    <label for="tnc" class="text-sm leading-[143%]">Saya setuju dengan syarat dan ketentuan berlaku.</label>
                </div>
                @error('tnc') <span class="block capitalize-first text-[#D6301E]">Syarat & ketentuan harus disetujui.</span> @enderror
            </div>
        </div>
        <div class="flex flex-col justify-center items-center gap-4">
            <button wire:loading.attr="disabled" wire:target="submitDownload, submitView" type="submit" class="transition-all duration-300 ease-in-out cursor-pointer border disabled:cursor-not-allowed py-4 px-8 rounded-2xl font-semibold tracking-[0.5px] leading-[125%] border-transparent bg-qt-green-normal text-white hover:bg-qt-green-hover disabled:bg-[#F4F4F4] disabled:text-[#DBDBDB]" @if($payload->getFirstMedia('recipe-files') == null) disabled @endif>
                Unduh Resep Premium
            </button>
            <button wire:click="submitView" wire:loading.attr="disabled" wire:target="submitDownload, submitView" type="button" class="transition-all duration-300 ease-in-out cursor-pointer border disabled:cursor-not-allowed py-4 px-8 rounded-2xl font-semibold tracking-[0.5px] leading-[125%] border-[#B6D5D8] hover:border-[#B6D5D8]/0 disabled:border-[#E9E9E9] disabled:text-[#C7C7C7] bg-transparent text-qt-green-normal hover:text-white hover:bg-qt-green-hover disabled:bg-transparent">
                Lihat Selengkapnya
            </button>
        </div>
        @if($payload->getFirstMedia('recipe-files') == null)
            <div class="space-y-0">
                <p>Note:</p>
                <p class="italic">*File resep belum tersedia</p>
            </div>
        @endif
    </form>
</div>
