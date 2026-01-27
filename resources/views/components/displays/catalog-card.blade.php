<div class="flex justify-between rounded-2xl gap-5 bg-white p-4">
    <div class="flex flex-col gap-2.5 justify-between px-1 pt-1.5">
        <div class="space-y-1">
            <span class="inline-block px-2 py-0.5 text-qt-green-normal bg-[#F3F8F9] rounded-full">{{ $payload->category->name }}</span>
            <h4>{{ $payload->variant->name . ' ' .  $payload->name }}</h4>
        </div>
        <div class="flex justify-start">
            <x-inputs.button type="button" event="$store.catalogDrawer.openDrawer({{ $payload->id }})">
                Download
            </x-inputs.button>
        </div>
    </div>
    <div class="shrink-0 rounded-2xl overflow-hidden">
        @if($payload->getMedia('thumbnail_catalog')->first() !== null)
            <img class="aspect-3/4 size-full w-[120px] object-cover" src="{{ $payload->getMedia('thumbnail_catalog')->first()->getUrl() }}" alt="Katalog {{ $payload->variant->name . ' ' .  $payload->name }}">
        @else
            <img class="aspect-3/4 size-full w-[120px] object-cover" src="{{ asset('images/og-image.jpg') }}" alt="Katalog {{ $payload->variant->name . ' ' .  $payload->name }}">
        @endif
    </div>
</div>
