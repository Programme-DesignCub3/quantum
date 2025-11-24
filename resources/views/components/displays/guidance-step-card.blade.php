<div class="w-60 flex flex-col rounded-lg overflow-hidden h-full">
    <div class="bg-white">
        <img class="aspect-12/7 object-cover" src="{{ $payload['image'] }}" alt="">
    </div>
    <div class="space-y-3 p-4 bg-white h-full">
        <h5>{{ $payload['title'] }}</h5>
        <p class="text-[#9A9A9A]">{{ $payload['description'] }}</p>
    </div>
</div>
