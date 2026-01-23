<section class="flex flex-col gap-[42px] px-4 pt-[58px] pb-[52px]">
    <div class="flex flex-col gap-[52px]">
        <div class="flex flex-col gap-[26px]">
            <div class="max-w-sm mx-auto space-y-4 text-center">
                <h2>{{ $page_settings->distributor_title_location }}</h2>
                <p class="large">{{ $page_settings->distributor_description_location }}</p>
            </div>
            <div x-data class="flex flex-col gap-8">
                <button type="button" @click="$store.distributorProvinceDrawer.openDrawer()" class="flex justify-between items-center w-full p-3 rounded-xl border text-sm border-[#E9E9E9] text-[#6D6D6D]/60 outline-none cursor-pointer focus:border-[#6D6D6D]">
                    Pilih Provinsi
                    <span class="icon-[lucide--chevron-down] text-xl text-[#6D6D6D]"></span>
                </button>
                <x-displays.drawer store="distributorProvinceDrawer">
                    <div class="flex flex-col gap-1 py-4">
                        @foreach ($provinces as $province)
                            <div class="flex items-center gap-4 px-4">
                                <input type="checkbox" id="{{ $province['slug'] }}" class="shrink-0">
                                <label for="{{ $province['slug'] }}" class="size-full cursor-pointer py-4">{{ $province['name'] }}</label>
                            </div>
                        @endforeach
                    </div>
                </x-displays.drawer>
                <div class="rounded-2xl overflow-hidden">
                    <iframe class="aspect-17/21 size-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.9738101235635!2d106.80351287321153!3d-6.227937672823461!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1a04d5ff145%3A0xcbae36e958f80d6a!2sOffice%208%20%40%20Senopati!5e0!3m2!1sid!2sid!4v1764743736932!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div class="grid grid-cols-1 gap-4">
            @foreach ($distributors as $distributor)
                <x-displays.place-card :payload="$distributor" />
            @endforeach
        </div>
    </div>
    <div class="flex justify-center">
        <x-inputs.button type="button" size="lg" color="white" variant="secondary">
            Lebih banyak
        </x-inputs.button>
    </div>
</section>
