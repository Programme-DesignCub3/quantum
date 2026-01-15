<a href="{{ route('support.guidance.detail', $payload->slug) }}" class="flex gap-4 bg-white rounded-2xl py-3 pl-4 pr-2">
    <div class="space-y-1">
        <span class="block text-qt-green-normal">{{ $payload->category->name }}</span>
        <h5>{{ $payload->title }}</h5>
    </div>
    <div class="max-w-[120px] shrink-0 aspect-6/5 rounded-2xl overflow-hidden">
        <img class="aspect-6/5 object-cover" src="{{ $payload->media->first()->getUrl() }}" alt="">
    </div>
</a>
