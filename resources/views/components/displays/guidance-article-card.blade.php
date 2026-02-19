<div class="bg-white rounded-2xl overflow-hidden">
    {{-- Mobile --}}
    <a href="{{ route('support.guidance.detail', $payload->slug) }}" class="flex justify-between gap-4 py-3 pl-4 pr-2 md:p-5 md:hidden">
        <div class="space-y-1">
            <span class="block text-qt-green-normal">{{ $payload->category->name }}</span>
            <h5>{{ $payload->title }}</h5>
        </div>
        <div class="max-w-[120px] shrink-0 aspect-6/5 md:aspect-75/64">
            <img class="aspect-6/5 object-cover rounded-2xl overflow-hidden md:aspect-75/64" src="{{ $payload->media->first()->getUrl() }}" alt="{{ $payload->title }}">
        </div>
    </a>
    {{-- Desktop --}}
    <div class="hidden justify-between gap-4 py-3 pl-4 pr-2 md:p-5 md:flex">
        <div class="space-y-2">
            <span class="block text-qt-green-normal">{{ $payload->category->name }}</span>
            <h5>{{ $payload->title }}</h5>
            <x-inputs.button type="hyperlink" href="{{ route('support.guidance.detail', $payload->slug) }}" color="white" variant="secondary">
                Selengkapnya
            </x-inputs.button>
        </div>
        <div class="max-w-[120px] shrink-0 aspect-6/5 md:aspect-75/64">
            <img class="aspect-6/5 object-cover rounded-2xl overflow-hidden md:aspect-75/64" src="{{ $payload->media->first()->getUrl() }}" alt="{{ $payload->title }}">
        </div>
    </div>
</div>
