<div class="flex flex-col gap-4 px-4">
    <h3 class="max-w-72 text-center mx-auto">Formulir Download Brosur/Flyer</h3>
    <div class="flex flex-col gap-4">
        <div class="flex flex-col gap-2">
            <input type="text" placeholder="Nama" autocomplete="off" class="w-full p-3 rounded-xl border outline-offset-2 text-sm border-[#E9E9E9] text-[#6D6D6D] outline-none focus:border-[#6D6D6D] placeholder:text-[#6D6D6D]/60">
            <input type="email" placeholder="Email" autocomplete="off" class="w-full p-3 rounded-xl border outline-offset-2 text-sm border-[#E9E9E9] text-[#6D6D6D] outline-none focus:border-[#6D6D6D] placeholder:text-[#6D6D6D]/60">
            <input type="tel" placeholder="Whatsapp" autocomplete="off" class="w-full p-3 rounded-xl border outline-offset-2 text-sm border-[#E9E9E9] text-[#6D6D6D] outline-none focus:border-[#6D6D6D] placeholder:text-[#6D6D6D]/60">
            <div class="flex justify-start gap-3">
                <input type="checkbox" id="tnc" class="shrink-0">
                <label for="tnc" class="text-sm leading-4">Saya setuju dengan syarat dan ketentuan berlaku.</label>
            </div>
        </div>
        <div class="flex justify-center items-center">
            <x-inputs.button type="button" size="lg">
                Unduh Brosur
            </x-inputs.button>
        </div>
    </div>
</div>
