<div class="flex flex-col gap-4 px-4 md:p-10">
    <div class="flex flex-col gap-4">
        <template x-if="$store.placeDetailDrawer.data?.image">
            <div class="relative md:hidden">
                <img class="w-full object-cover h-40 rounded-[20px] overflow-hidden sm:h-60" :src="$store.placeDetailDrawer.data?.image" :alt="$store.placeDetailDrawer.data?.name">
            </div>
        </template>
        <div class="space-y-0">
            <span class="block text-[#6D6D6D]" x-text="$store.placeDetailDrawer.data?.area"></span>
            <h5 x-text="$store.placeDetailDrawer.data?.name"></h5>
        </div>
        <div class="flex gap-4">
            <span class="icon-[lucide--map-pin] shrink-0 text-lg text-qt-green-normal"></span>
            <span class="text-[#6D6D6D]" x-text="$store.placeDetailDrawer.data?.address"></span>
        </div>
    </div>
    <div class="flex flex-col gap-1">
        <h6>Jam Operasional</h6>
        <div class="grid grid-cols-2 gap-2">
            <template x-for="operational in $store.placeDetailDrawer.data?.operational">
                <div class="space-y-1">
                    <span class="extrasmall" x-text="operational.day"></span>
                    <p x-text="operational.from_hour + ' - ' + operational.to_hour + ' ' + operational.timezone"></p>
                </div>
            </template>
        </div>
    </div>
    <template x-if="$store.placeDetailDrawer.data?.for === 'distributor'">
        <div class="space-y-1">
            <h6 class="md:font-medium">Produk Penjualan</h6>
            <template x-for="item in $store.placeDetailDrawer.data?.provide">
                <p class="small md:text-sm" x-text="item"></p>
            </template>
        </div>
    </template>
    <template x-if="$store.placeDetailDrawer.data?.for === 'service_center'">
        <div class="grid grid-cols-2 gap-2">
            <div class="space-y-1">
                <h6 class="md:font-medium">Produk Perbaikan</h6>
                <template x-for="service in $store.placeDetailDrawer.data?.provide_service">
                    <p class="small md:text-sm" x-text="service"></p>
                </template>
            </div>
            <template x-if="$store.placeDetailDrawer.data?.provide_sell?.length > 0">
                <div class="space-y-1">
                    <h6 class="md:font-medium">Penjualan</h6>
                    <template x-for="sell in $store.placeDetailDrawer.data?.provide_sell">
                        <p class="small md:text-sm" x-text="sell"></p>
                    </template>
                </div>
            </template>
        </div>
    </template>
    <div class="flex gap-2 justify-center py-4 md:justify-start md:pt-4 md:pb-0">
        <a :href="'tel:' + $store.placeDetailDrawer.data?.phone">
            <x-inputs.button-icon type="button" class="rounded-2xl!" icon="icon-[lucide--phone]" />
        </a>
        <a :href="'https://wa.me/' + $store.placeDetailDrawer.data?.whatsapp" target="_blank">
            <x-inputs.button-icon type="button" class="rounded-2xl!" icon="icon-[ic--baseline-whatsapp]" />
        </a>
        <a :href="$store.placeDetailDrawer.data?.type === 'service_center' ? '#map-embed' : '#map-embed-partner'" @click="$store.placeDetailDrawer.embedMapDrawer($store.placeDetailDrawer.data)">
            <x-inputs.button-icon type="button" class="rounded-2xl!" icon="icon-[lucide--map-pin]" />
        </a>
    </div>
</div>
