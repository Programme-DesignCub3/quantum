<div x-data="{ data: @js($data_drawer), embed: @js($payload->maps) }" class="flex flex-col gap-4 rounded-2xl border border-[#E9E9E9] p-4 h-max">
    <div class="space-y-0">
        <span class="block text-[#6D6D6D]">
            @if($for === 'distributor')
                Distributor {{ $payload->area->area }}
            @else
                {{ $payload->areaService->area }}
            @endif
        </span>
        <h4 class="md:text-xl">{{ $payload->name }}</h4>
    </div>
    <div class="flex gap-4">
        <span class="icon-[lucide--map-pin] shrink-0 text-lg text-qt-green-normal"></span>
        <div class="flex flex-col gap-4">
            <span class="block text-[#6D6D6D]">{{ $payload->address }}</span>
            <div x-data class="flex flex-wrap gap-2">
                <x-inputs.button-icon type="button" size="sm" event="$store.placeDetailDrawer.openDrawer(data)" class="rounded-xl! p-2.5!" icon="icon-[material-symbols--info-outline-rounded]" />
                <x-inputs.button-icon type="hyperlink" size="sm" href="{{ 'tel:' . $payload->phone_formatted }}" class="rounded-xl! p-2.5!" icon="icon-[lucide--phone]" />
                <x-inputs.button-icon type="hyperlink" size="sm" :newTab="true" href="{{ 'https://wa.me/' . $payload->whatsapp_formatted }}" class="rounded-xl! p-2.5!" icon="icon-[ic--baseline-whatsapp]" />
                @if($for === 'distributor')
                    <x-inputs.button-icon type="hyperlink" size="sm" href="#map-embed" event="$store.placeDetailDrawer.embedMap(data)" class="rounded-xl! p-2.5!" icon="icon-[lucide--map-pin]" />
                @else
                    <x-inputs.button-icon type="hyperlink" size="sm" href="#map-embed" event="$store.placeDetailDrawer.embedMap(data)" class="rounded-xl! p-2.5!" icon="icon-[lucide--map-pin]" />
                @endif
            </div>
        </div>
    </div>
</div>
