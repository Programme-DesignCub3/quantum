<div class="flex flex-col rounded-2xl w-[260px] overflow-hidden h-full">
    <div class="relative bg-white h-40">
        <img class="h-40" src="{{ $payload['image'] }}" alt="">
        <span class="absolute bottom-2 right-2 small bg-[#60A3AB] py-0.5 px-2 rounded-full text-white">{{ $payload['category'] }}</span>
    </div>
    <div class="flex flex-col justify-between gap-4 p-4 bg-white h-full">
        <div class="space-y-2">
            <h4 class="text-qt-green-normal">{{ $payload['title'] }}</h4>
            <p class="text-[#9A9A9A]">{{ $payload['excerpt'] }}</p>
        </div>
        <div class="flex justify-center items-center">
            <x-inputs.button type="hyperlink" size="md" color="white">
                Selengkapnya
            </x-inputs.button>
        </div>
    </div>
</div>
