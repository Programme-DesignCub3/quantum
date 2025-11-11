<div class="flex flex-col gap-2 max-w-60 min-w-60 h-full">
    <div class="bg-white rounded-2xl overflow-hidden">
        <img class="w-full h-[140px] object-cover object-center" src="{{ asset($image) }}" alt="">
    </div>
    <div class="p-2 space-y-3">
        {{ $slot }}
    </div>
</div>
