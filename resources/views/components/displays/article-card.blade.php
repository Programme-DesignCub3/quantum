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
        <div @class([
            'justify-between gap-2' => isset($payload['premium']) && $payload['premium'],
            'justify-center' => !isset($payload['premium']) || !$payload['premium'],
            'flex items-center'
        ])>
            @if (isset($payload['premium']))
                <div class="flex items-center gap-1 px-2 py-1 bg-[#FBD752] rounded-full">
                    <x-icons.premium-icon class="fill-qt-green-normal size-5" />
                    <span class="small text-qt-green-normal">Premium</span>
                </div>
            @endif
            <x-inputs.button type="hyperlink" href="{{ route($routeName, $payload['slug']) }}" size="md" color="white" @class([
                'p-3!' => isset($payload['premium']) && $payload['premium'],
            ])>
                Selengkapnya
            </x-inputs.button>
        </div>
    </div>
</div>
