<div class="flex flex-col gap-4 mt-7">
    <div class="relative">
        <div class="absolute left-1/2 -translate-x-1/2 -top-7 flex items-center justify-center size-14 bg-qt-green-normal rounded-full">
            <span class="font-bold text-white text-2xl">{{ $number }}</span>
        </div>
        <img class="aspect-27/16 object-cover rounded-2xl overflow-hidden" src="{{ asset('storage/' . $payload['image']) }}" alt="{{ 'Langkah ' . $number . ' membuat ' . $name }}">
    </div>
    <div>
        <p class="large">{{ $payload['explanation'] }}</p>
    </div>
</div>
