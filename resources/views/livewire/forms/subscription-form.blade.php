<form wire:submit="submit" class="space-y-4">
    <div class="space-y-2">
        <input wire:model="email" type="email" id="email" name="email" placeholder="Email" autocomplete="off" class="w-full p-3 rounded-xl border outline-offset-2 text-sm focus:outline-1 border-[#92C0C5] text-white placeholder:text-[#92C0C5] focus:outline-[#92C0C5]/40" required>
        @error('email') <span class="block capitalize-first text-white">{{ $message }}</span> @enderror
    </div>
    <x-inputs.button type="submit" size="md" color="white" class="w-[200px]!">
        Infokan Saya
    </x-inputs.button>
</form>
