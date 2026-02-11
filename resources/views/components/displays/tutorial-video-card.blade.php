<div class="flex flex-col gap-3">
    <div class="relative rounded-3xl overflow-hidden">
        <img class="aspect-17/10 object-cover" src="{{ $payload->media->first()->getUrl() }}" alt="{{ $payload->title }}">
        <div class="absolute top-0 left-0 size-full flex justify-center items-center">
            <button x-data="{ video: @js($video) }" type="button" @click="$store.videoModal.openVideo(video)" class="flex justify-center items-center size-20 bg-white text-[#106B75] rounded-full cursor-pointer">
                <span class="icon-[ph--play-bold] text-4xl"></span>
            </button>
        </div>
    </div>
    <div class="space-y-1 p-3">
        <span class="block text-qt-green-normal">{{ $payload->category->name }}</span>
        <h4 class="md:text-xl">{{ $payload->title }}</h4>
    </div>
</div>
