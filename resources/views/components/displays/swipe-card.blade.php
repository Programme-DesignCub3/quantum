<div class="flex flex-col gap-2 max-w-60 min-w-60 h-full">
    <div class="relative bg-white rounded-2xl overflow-hidden">
        @if ($video)
            <div class="absolute flex justify-center items-center size-full">
                <button type="button" class="flex justify-center items-center size-[60px] bg-white text-[#106B75] rounded-full cursor-pointer">
                    <span class="icon-[ph--play-bold] text-3xl"></span>
                </button>
            </div>
        @endif
        <img class="w-full h-[140px] object-cover object-center" src="{{ asset($image) }}" alt="">
    </div>
    <div class="p-2 space-y-3">
        {{ $slot }}
    </div>
</div>
