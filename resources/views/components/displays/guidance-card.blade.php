<div class="relative flex justify-between items-center gap-4 p-2 bg-[#F4F4F4] rounded-2xl overflow-hidden md:pr-4">
    <a href="{{ $payload->getMedia('guidance_product')->first()->getUrl() }}" target="_blank" class="absolute size-full top-0 left-0"></a>
    <div class="flex items-center gap-4">
        <div class="rounded-2xl shrink-0 bg-white overflow-hidden">
            <img class="w-[120px] h-[100px] object-cover object-bottom" src="{{ $payload->getMedia('thumbnail_guidance')->first() ? $payload->getMedia('thumbnail_guidance')->first()->getUrl() : $payload->getMedia('products')->first()->getUrl() }}" alt="{{ 'Panduan ' . $payload->variant->name . ' ' . $payload->name }}">
        </div>
        <h5 class="md:max-w-52">{{ $payload->variant->name ?? $payload->variant->name }} {{ $payload->name }}</h5>
    </div>
    @if(isset($payload->slug))
        <div class="relative">
            <x-inputs.button-icon type="hyperlink" href="{{ route('product.download-guidance', $payload->slug) }}" icon="icon-[material-symbols--download-rounded]" size="md" class="block size-14 rounded-2xl!" />
        </div>
    @endif
</div>
