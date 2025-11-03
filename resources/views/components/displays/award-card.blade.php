<div class="flex flex-col gap-2 w-60 h-full">
    <div class="bg-white rounded-2xl overflow-hidden">
        <img class="w-full h-[140px] object-cover" src="{{ $payload['image'] }}" alt="">
    </div>
    <div class="space-y-3 p-2">
        <h4>{{ $payload['name'] }}</h4>
        @if(isset($payload['description']))
            <span class="block small text-[#9a9a9a]">{{ $payload['description'] }}</span>
        @endif
    </div>
</div>
