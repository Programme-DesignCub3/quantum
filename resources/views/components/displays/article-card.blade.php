<div @class([
    'border border-[#F4F4F4]' => $border,
    'flex flex-col rounded-2xl overflow-hidden h-full'
])>
    <div class="relative bg-white aspect-49/30">
        @if(isset($payload->media))
            <img class="aspect-49/30 object-cover" src="{{ $payload->media->first()->getUrl() }}" alt="">
        @else
            {{-- Need to delete --}}
            <img class="aspect-49/30 object-cover" src="{{ $payload['image'] }}" alt="">
        @endif
        @if(isset($payload->category->name))
            <span class="absolute bottom-2 right-2 small bg-[#60A3AB] py-0.5 px-2 rounded-full text-white">{{ $payload->category->name }}</span>
        @elseif(isset($payload['category']))
            {{-- Need to delete --}}
            <span class="absolute bottom-2 right-2 small bg-[#60A3AB] py-0.5 px-2 rounded-full text-white">{{ $payload['category'] }}</span>
        @endif
    </div>
    <div class="flex flex-col justify-between gap-4 p-4 bg-white h-full">
        <div class="space-y-2">
            @if(isset($payload->title))
                <h4>{{ $payload->title }}</h4>
            @elseif(isset($payload['title']))
                {{-- Need to delete --}}
                <h4>{{ $payload['title'] }}</h4>
            @endif
            @if(isset($payload->excerpt))
                <p class="text-[#9A9A9A]">{{ $payload->excerpt }}</p>
            @elseif(isset($payload['excerpt']))
                {{-- Need to delete --}}
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
            {{-- Nedd to delete --}}
            <x-inputs.button type="hyperlink" href="{{ route($routeName, (isset($payload->slug)) ? $payload->slug : $payload['slug']) }}" size="md" color="white" @class([
                'p-3!' => isset($payload['premium']) && $payload['premium'],
            ])>
                Selengkapnya
            </x-inputs.button>
        </div>
    </div>
</div>
