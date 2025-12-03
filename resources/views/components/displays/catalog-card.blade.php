<div class="flex justify-between rounded-2xl gap-5 bg-white p-4">
    <div class="flex flex-col gap-2.5 justify-between px-1 pt-1.5">
        <div class="space-y-1">
            <span class="inline-block px-2 py-0.5 text-qt-green-normal bg-[#F3F8F9] rounded-full">{{ $payload['category'] }}</span>
            <h4>{{ $payload['name'] }}</h4>
        </div>
        <div class="flex justify-start">
            <x-inputs.button type="button" event="$store.brochureCatalogDrawer.openDrawer()">
                Download
            </x-inputs.button>
        </div>
    </div>
    <div class="shrink-0 rounded-2xl overflow-hidden">
        <img class="aspect-3/4 size-full w-[120px] object-cover" src="{{ $payload['image'] }}" alt="">
    </div>
</div>
