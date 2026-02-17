<div class="flex flex-col gap-6 px-2 md:bg-[#F4F4F4] md:p-10 md:justify-between">
    <div class="flex items-center gap-4">
        <div class="shrink-0 bg-white rounded-2xl overflow-hidden md:hidden">
            <img class="size-[100px] object-cover object-center" :src="$store.productDrawer.data?.image" :alt="($store.productDrawer.data?.category ?? '') + ' ' + ($store.productDrawer.data?.name ?? '')">
        </div>
        <div class="flex flex-col gap-2.5">
            <div class="space-y-0">
                <span x-text="$store.productDrawer.data?.category" class="text-[#9A9A9A] md:text-lg"></span>
                <h4 x-text="$store.productDrawer.data?.name" class="text-qt-green-normal md:text-black md:text-[28px] md:font-semibold"></h4>
            </div>
            {{-- <div class="flex items-center gap-1">
                <span>Rp</span>d
                <p x-text="$store.productDrawer.data?.price"></p>
            </div> --}}
        </div>
    </div>
    <div class="flex flex-col justify-center items-center gap-6 md:items-start md:gap-4">
        <h4 class="md:text-base">Beli Produk di Marketplace</h4>
        <div class="flex gap-2.5 flex-wrap justify-center">
            <a x-show="$store.productDrawer.data?.marketplace.lazada" :href="$store.productDrawer.data?.marketplace.lazada" target="_blank" class="flex justify-center items-center size-[70px] bg-white rounded-full md:p-3 md:size-[60px] lg:p-0 lg:size-[70px]">
                <img src="{{ asset('images/lazada.png') }}" alt="Lazada Logo">
            </a>
            <a x-show="$store.productDrawer.data?.marketplace.blibli" :href="$store.productDrawer.data?.marketplace.blibli" target="_blank" class="flex justify-center items-center size-[70px] bg-white rounded-full md:p-3 md:size-[60px] lg:p-0 lg:size-[70px]">
                <img src="{{ asset('images/blibli.png') }}" alt="Blibli Logo">
            </a>
            <a x-show="$store.productDrawer.data?.marketplace.shopee" :href="$store.productDrawer.data?.marketplace.shopee" target="_blank" class="flex justify-center items-center size-[70px] bg-white rounded-full md:p-3 md:size-[60px] lg:p-0 lg:size-[70px]">
                <img src="{{ asset('images/shopee.png') }}" alt="Shopee Logo">
            </a>
            <a x-show="$store.productDrawer.data?.marketplace.tokopedia" :href="$store.productDrawer.data?.marketplace.tokopedia" target="_blank" class="flex justify-center items-center size-[70px] bg-white rounded-full md:p-3 md:size-[60px] lg:p-0 lg:size-[70px]">
                <img src="{{ asset('images/tokopedia.png') }}" alt="Tokopedia Logo">
            </a>
        </div>
    </div>
</div>
