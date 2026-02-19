<div class="flex flex-col justify-center items-center gap-4 text-center">
    <div class="space-y-4 md:space-y-8">
        <div class="space-y-4">
            <h4 class="md:font-semibold">Butuh Bantuan ?</h4>
            <h5 class="md:max-w-60 md:mx-auto">Hubungi Kami melalui Channel Berikut</h5>
        </div>
        <div class="flex justify-center gap-4">
            <a href="#" class="flex justify-center items-center size-[60px] bg-[#F3F8F9] rounded-2xl">
                <span class="icon-[lucide--phone] text-qt-green-normal text-2xl"></span>
            </a>
            <a :href="'mailto:' + $store.contactDrawer.data?.email" class="flex justify-center items-center size-[60px] bg-[#F3F8F9] rounded-2xl">
                <span class="icon-[lucide--mail] text-qt-green-normal text-2xl"></span>
            </a>
            <a :href="'https://wa.me/' + $store.contactDrawer.data?.whatsapp" target="_blank" class="flex justify-center items-center size-[60px] bg-[#F3F8F9] rounded-2xl">
                <span class="icon-[ic--baseline-whatsapp] text-qt-green-normal text-2xl"></span>
            </a>
            <a :href="'tel:' + $store.contactDrawer.data?.call_center" class="flex justify-center items-center size-[60px] bg-[#F3F8F9] rounded-2xl">
                <x-icons.customer-care-icon id="popup-customer-care" class="fill-qt-green-normal size-6" />
            </a>
        </div>
        <div class="space-y-4">
            <span class="block max-w-44 mx-auto">atau untuk Informasi lengkap hubungi Customer Care Kami</span>
            <div class="flex gap-4 justify-center">
                <x-inputs.button type="hyperlink" href="{{ route('support.service-center') }}" size="sm" variant="secondary" color="white">
                    Service Center
                </x-inputs.button>
                <x-inputs.button type="hyperlink" href="{{ route('support.contact') }}" size="sm" variant="secondary" color="white">
                    Kontak Kami
                </x-inputs.button>
            </div>
        </div>
    </div>
</div>