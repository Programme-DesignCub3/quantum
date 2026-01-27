<div @class([
    'border border-[#F4F4F4]' => $border,
    'flex flex-col rounded-2xl overflow-hidden h-full'
])>
    <div class="relative bg-white aspect-49/30">
        <img class="aspect-49/30 object-cover" src="{{ $payload->media->first()->getUrl() }}" alt="{{ $payload->title }}">
        <span class="absolute bottom-2 right-2 small bg-[#60A3AB] py-0.5 px-2 rounded-full text-white">{{ $payload->category->name }}</span>
    </div>
    <div class="flex flex-col justify-between gap-4 p-4 bg-white h-full">
        <div class="space-y-2">
            <h4>{{ $payload->title }}</h4>
            @if(isset($payload->excerpt))
                <p class="text-[#9A9A9A]">{{ $payload->excerpt }}</p>
            @endif
            @if(isset($payload->description))
                <p class="text-[#9A9A9A]">{{ $payload->description }}</p>
            @endif
        </div>
        <div @class([
            'justify-between gap-2' => isset($payload->is_premium) && $payload->is_premium == true,
            'justify-center' => isset($payload->is_premium) && $payload->is_premium == false || !isset($payload->is_premium),
            'flex items-center'
        ])>
            @if (isset($payload->is_premium) && $payload->is_premium == true)
                <div class="flex items-center gap-1 px-2 py-1 bg-[#FBD752] rounded-full">
                    <x-icons.premium-icon class="fill-qt-green-normal size-5" />
                    <span class="small text-qt-green-normal">Premium</span>
                </div>
            @endif
            <x-inputs.button type="hyperlink" href="{{ route($routeName, $payload->slug) }}" size="md" color="white" @class([
                'p-3!' => isset($payload->is_premium) && $payload->is_premium == true,
            ])>
                Selengkapnya
            </x-inputs.button>
        </div>
    </div>
</div>
