<div class="relative rounded-3xl overflow-hidden w-full">
    <img class="w-full h-[300px] object-cover md:h-[450px]" src="{{ asset($image) }}" alt="{{ $alt }}">
    <div class="absolute bottom-0 left-0 w-full h-3/4 flex items-end bg-gradient-black-transparent">
        <div class="space-y-3 py-6 px-4 text-white">
            {{ $slot }}
        </div>
    </div>
</div>
