<div x-data x-cloak :class="$store.videoModal.open ? 'visible bg-black/40' : 'invisible bg-black/0'" class="fixed z-50 left-1/2 top-0 -translate-x-1/2 transition-all duration-300 ease-in-out max-w-md w-full mx-auto min-h-dvh overflow-hidden flex justify-center items-center px-4">
    <div :class="$store.videoModal.open ? 'visible' : 'invisible'" class="flex grow flex-col gap-2">
        <div class="flex justify-end">
            <button type="button" @click="$store.videoModal.closeVideo()" class="size-6 cursor-pointer">
                <span class="icon-[material-symbols--close-rounded] text-2xl text-white"></span>
            </button>
        </div>
        {{-- @switch($type)
            @case('normal')
                <video class="w-full aspect-video rounded-2xl" controls>
                    <source src="http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                @break
            @case('youtube') --}}
                <iframe class="w-full aspect-video rounded-2xl" src="https://www.youtube.com/embed/FdhuwORtG48" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                {{-- @break
        @endswitch --}}
    </div>
</div>
