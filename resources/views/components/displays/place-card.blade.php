<div class="flex flex-col gap-4 rounded-2xl border border-[#E9E9E9] p-4">
    <div class="space-y-0">
        <span class="block text-[#6D6D6D]">Distributor {{ $payload['province'] }}</span>
        <h4>{{ $payload['name'] }}</h4>
    </div>
    <div class="flex gap-4">
        <span class="icon-[lucide--map-pin] shrink-0 text-lg text-qt-green-normal"></span>
        <div class="flex flex-col gap-4">
            <span class="block text-[#6D6D6D]">{{ $payload['address'] }}</span>
            <div x-data class="flex flex-wrap gap-2">
                <x-inputs.button-icon type="button" event="$store.distributorDetailDrawer.openDrawer()" class="rounded-2xl!" icon="icon-[material-symbols--info-outline-rounded]" />
                <x-inputs.button-icon type="button" class="rounded-2xl!" icon="icon-[lucide--phone]" />
                <x-inputs.button-icon type="button" class="rounded-2xl!" icon="icon-[ic--baseline-whatsapp]" />
                <x-inputs.button-icon type="button" class="rounded-2xl!" icon="icon-[lucide--map-pin]" />
            </div>
        </div>
    </div>
</div>
