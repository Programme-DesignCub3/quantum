<div class="flex justify-between items-center gap-4 p-2 bg-[#F4F4F4] rounded-2xl">
    <div class="rounded-2xl shrink-0 bg-white overflow-hidden">
        <img class="w-[120px] h-[100px] object-cover object-bottom" src="{{ $payload['image'] }}" alt="">
    </div>
    <h5>{{ $payload['category'] . ' ' . $payload['name'] }}</h5>
    <x-inputs.button-icon type="hyperlink" icon="icon-[material-symbols--download-rounded]" size="md" class="size-14 rounded-2xl!" />
</div>
