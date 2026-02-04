<div class="w-60 flex flex-col rounded-lg overflow-hidden h-full md:w-full md:rounded-xl">
    <div class="bg-white">
        <img class="aspect-12/7 object-cover" src="{{ '/storage/' . $payload['image'] }}" alt="{{ $payload['subtitle'] }}">
    </div>
    <div class="space-y-3 p-4 bg-white h-full">
        <h5>{{ $payload['subtitle'] }}</h5>
        <p class="text-[#9A9A9A]">{{ $payload['description'] }}</p>
    </div>
</div>
