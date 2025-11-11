<div x-data="{ scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' });
} }" :class="$store.contactDrawer.open ? 'z-50' : 'z-40'" @class([
    'bottom-24' => Route::currentRouteName() === 'product.detail',
    'bottom-5' => Route::currentRouteName() !== 'product.detail',
    'fixed ml-[82%] min-[375px]:ml-[84%] min-[410px]:ml-[86%] min-[450px]:ml-[390px]'
])>
    <div class="flex flex-col gap-2">
        @if(Route::currentRouteName() !== 'product.detail')
            <button type="button" @click="$store.contactDrawer.openDrawer()" class="transition-all duration-300 ease-in-out flex justify-center items-center size-10 bg-white drop-shadow-float rounded-full cursor-pointer active:shadow-none">
                <x-icons.chat-icon class="stroke-qt-green-normal stroke-[2.5] size-5 fill-transparent" />
            </button>
        @endif
        <button type="button" @click="scrollToTop()" class="transition-all duration-300 ease-in-out flex justify-center items-center size-10 bg-white drop-shadow-float rounded-full cursor-pointer active:shadow-none">
            <span class="icon-[lucide--chevron-up] text-3xl text-qt-green-normal"></span>
        </button>
    </div>
    <x-displays.drawer store="contactDrawer">
        <div class="flex flex-col justify-center items-center gap-4 text-center">
            <h4>Butuh Bantuan ?</h4>
            <div class="space-y-4">
                <h5>Hubungi Kami melalui Channel Berikut</h5>
                <div class="flex gap-4">
                    <a href="#" target="_blank" class="flex justify-center items-center size-[60px] bg-[#F3F8F9] rounded-2xl">
                        <span class="icon-[lucide--phone] text-qt-green-normal text-2xl"></span>
                    </a>
                    <a href="#" target="_blank" class="flex justify-center items-center size-[60px] bg-[#F3F8F9] rounded-2xl">
                        <span class="icon-[lucide--mail] text-qt-green-normal text-2xl"></span>
                    </a>
                    <a href="#" target="_blank" class="flex justify-center items-center size-[60px] bg-[#F3F8F9] rounded-2xl">
                        <span class="icon-[ic--baseline-whatsapp] text-qt-green-normal text-2xl"></span>
                    </a>
                    <a href="#" target="_blank" class="flex justify-center items-center size-[60px] bg-[#F3F8F9] rounded-2xl">
                        <x-icons.customer-care-icon class="fill-qt-green-normal size-6" />
                    </a>
                </div>
            </div>
            <div class="space-y-4">
                <span class="block max-w-44 mx-auto">atau untuk Informasi lengkap hubungi Customer Care Kami</span>
                <div class="flex gap-4 justify-center">
                    <x-inputs.button type="button" size="sm" variant="secondary" color="white">
                        Service Center
                    </x-inputs.button>
                    <x-inputs.button type="button" size="sm" variant="secondary" color="white">
                        Kontak Kami
                    </x-inputs.button>
                </div>
            </div>
        </div>
    </x-displays.drawer>
</div>
