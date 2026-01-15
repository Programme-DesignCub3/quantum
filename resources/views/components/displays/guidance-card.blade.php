<div class="flex justify-between items-center gap-4 p-2 bg-[#F4F4F4] rounded-2xl">
    <div class="rounded-2xl shrink-0 bg-white overflow-hidden">
        <img class="w-[120px] h-[100px] object-cover object-bottom" src="{{ $payload->media->first()->getUrl() }}" alt="">
    </div>
    <h5>{{ $payload->variant->name ?? $payload->variant->name }} {{ $payload->name }}</h5>
    @if(isset($payload['slug']))
        <x-inputs.button-icon type="hyperlink" href="{{ route('product.download-guidance', $payload['slug']) }}" icon="icon-[material-symbols--download-rounded]" size="md" class="size-14 rounded-2xl!" />
    @else
        <x-inputs.button-icon type="hyperlink" href="#" icon="icon-[material-symbols--download-rounded]" size="md" class="size-14 rounded-2xl!" />
    @endif
</div>
