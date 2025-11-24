<div @class([
    'border border-[#F4F4F4]' => $border,
    'flex flex-col rounded-2xl overflow-hidden h-full'
])>
    <div class="relative bg-white aspect-49/30">
        <img class="aspect-49/30 object-cover" src="{{ $payload['image'] }}" alt="">
        @if(isset($payload['category']))
            <span class="absolute bottom-2 right-2 small bg-[#60A3AB] py-0.5 px-2 rounded-full text-white">{{ $payload['category'] }}</span>
        @endif
    </div>
    <div class="flex flex-col justify-between gap-4 p-4 bg-white h-full">
        <div class="space-y-2">
            <h4>{{ $payload['title'] }}</h4>
            @if(isset($payload['excerpt']))
                <p class="text-[#9A9A9A]">{{ $payload['excerpt'] }}</p>
            @endif
        </div>
        <div class="flex justify-center items-center">
            @if ($for === 'guidance')
                <x-inputs.button type="hyperlink" href="{{ route('support.guidance.detail', $payload['slug']) }}" size="md" color="white">
                    Selengkapnya
                </x-inputs.button>
            @else
                <x-inputs.button type="hyperlink" href="{{ route('updates.news.detail', $payload['slug']) }}" size="md" color="white">
                    Selengkapnya
                </x-inputs.button>
            @endif
        </div>
    </div>
</div>
