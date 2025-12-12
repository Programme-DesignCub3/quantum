<div wire:key="card-{{ $payload['id'] ?? $payload['slug'] }}" x-data="{ data: @js($data_drawer) }" @class([
    'gap-2 p-2' => $direction === 'row',
    'flex flex-col rounded-2xl overflow-hidden justify-between size-full bg-white'
]) :class="{
    'gap-2 p-2': direction === 'row'
}">
    <div @class([
        'flex-row gap-4' => $direction === 'row',
        'flex-col' => $direction === 'col',
        'flex'
    ]) :class="{
        'flex-row gap-4': direction === 'row',
        'flex-col': direction === 'col'
    }">
        <div class="flex-1 relative bg-white">
            <img @class([
                'rounded-2xl' => $direction === 'row',
                'aspect-17/13 size-full object-cover' => $size === 'lg',
                'aspect-6/5 size-full object-cover' => $size === 'md',
                'aspect-41/35 object-contain' => $size === 'sm',
            ]) :class="{
                'rounded-2xl': direction === 'row',
                'aspect-17/13 size-full object-cover': size === 'lg',
                'aspect-6/5 size-full object-cover': size === 'md',
                'aspect-41/35 object-contain': size === 'sm',
            }" src="{{ asset($payload['image']) }}" alt="">
            @if(isset($payload['label']))
                <div class="absolute flex items-center justify-center top-0 right-0 py-1 px-3 rounded-bl-lg bg-[#FBCD26]">
                    <span>{{ $payload['label'] }}</span>
                </div>
            @endif
        </div>
        <div @class([
            'py-4 pr-2 ' => $direction === 'row',
            'p-2' => $size === 'sm' && $direction === 'col',
            'p-4' => $size !== 'sm' && $direction === 'col',
            'flex flex-col flex-1 justify-between h-full gap-4 bg-white'
        ]) :class="{
            'py-4 pr-2 ': direction === 'row',
            'p-2': size === 'sm' && direction === 'col',
            'p-4': size !== 'sm' && direction === 'col'
        }">
            <div class="flex flex-col gap-2">
                <div class="space-y-0">
                    @switch($size)
                        @case('lg')
                            <p class="text-[#9A9A9A]">{{ $payload['variant'] ?? $payload['category'] }}</p>
                            <h3 class="text-qt-green-normal">{{ $payload['name'] }}</h3>
                            @break
                        @case('md')
                            <span class="text-[#9A9A9A]">{{ $payload['variant'] ?? $payload['category'] }}</span>
                            <h4 class="text-qt-green-normal">{{ $payload['name'] }}</h4>
                            @break
                        @case('sm')
                            <span class="extrasmall text-[#9A9A9A]">{{ $payload['variant'] ?? $payload['category'] }}</span>
                            <h5 class="text-qt-green-normal">{{ $payload['name'] }}</h5>
                            @break
                    @endswitch
                </div>
                @if(isset($payload['specs']) && !$disableSpecs)
                    <div @class([
                        'gap-3' => $size !== 'sm',
                        'gap-2' => $size === 'sm',
                        'flex flex-wrap'
                    ]) :class="{
                        'gap-3': size !== 'sm',
                        'gap-2': size === 'sm'
                    }">
                        @if(isset($payload['specs']['furnace_type']))
                            <div class="flex justify-center items-center gap-1">
                                <x-icons.target-icon @class([
                                    'size-3' => $size === 'lg',
                                    'size-2.5' => $size === 'md',
                                    'size-2' => $size === 'sm',
                                ]) />
                                @switch($size)
                                    @case('lg')
                                        <p class="small text-[#868686]">{{ $payload['specs']['furnace_type'] }}</p>
                                        @break
                                    @case('md')
                                        <span class="extrasmall text-[#868686]">{{ $payload['specs']['furnace_type'] }}</span>
                                        @break
                                    @case('sm')
                                        <span class="extrasmall text-[8px]! text-[#868686]">{{ $payload['specs']['furnace_type'] }}</span>
                                        @break
                                @endswitch
                            </div>
                        @endif
                        @if(isset($payload['specs']['power_type']))
                            <div class="flex justify-center items-center gap-1">
                                <span @class([
                                    'text-xs' => $size === 'lg',
                                    'text-[10px]' => $size === 'md',
                                    'text-[8px]' => $size === 'sm',
                                    'icon-[pajamas--power]'
                                ]) :class="{
                                    'text-xs': size === 'lg',
                                    'text-[10px]': size === 'md',
                                    'text-[8px]': size === 'sm'
                                }"></span>
                                @switch($size)
                                    @case('lg')
                                        <p class="small text-[#868686]">{{ $payload['specs']['power_type'] }}</p>
                                        @break
                                    @case('md')
                                        <span class="extrasmall text-[#868686]">{{ $payload['specs']['power_type'] }}</span>
                                        @break
                                    @case('sm')
                                        <span class="extrasmall text-[8px]! text-[#868686]">{{ $payload['specs']['power_type'] }}</span>
                                        @break
                                @endswitch
                            </div>
                        @endif
                        @if(isset($payload['specs']['fuel_type']))
                            <div class="flex justify-center items-center gap-1">
                                <span @class([
                                    'text-xs' => $size === 'lg',
                                    'text-[10px]' => $size === 'md',
                                    'text-[8px]' => $size === 'sm',
                                    'icon-[el--fire]'
                                ]) :class="{
                                    'text-xs': size === 'lg',
                                    'text-[10px]': size === 'md',
                                    'text-[8px]': size === 'sm'
                                }"></span>
                                @switch($size)
                                    @case('lg')
                                        <p class="small text-[#868686]">{{ $payload['specs']['fuel_type'] }}</p>
                                        @break
                                    @case('md')
                                        <span class="extrasmall text-[#868686]">{{ $payload['specs']['fuel_type'] }}</span>
                                        @break
                                    @case('sm')
                                        <span class="extrasmall text-[8px]! text-[#868686]">{{ $payload['specs']['fuel_type'] }}</span>
                                        @break
                                @endswitch
                            </div>
                        @endif
                        @if(isset($payload['specs']['length_type']))
                            <div class="flex justify-center items-center gap-1">
                                <x-icons.spiral-icon @class([
                                    'size-3' => $size === 'lg',
                                    'size-2.5' => $size === 'md',
                                    'size-2' => $size === 'sm',
                                ]) />
                                @switch($size)
                                    @case('lg')
                                        <p class="small text-[#868686]">{{ $payload['specs']['length_type'] }}</p>
                                        @break
                                    @case('md')
                                        <span class="extrasmall text-[#868686]">{{ $payload['specs']['length_type'] }}</span>
                                        @break
                                    @case('sm')
                                        <span class="extrasmall text-[8px]! text-[#868686]">{{ $payload['specs']['length_type'] }}</span>
                                        @break
                                @endswitch
                            </div>
                        @endif
                    </div>
                @endif
            </div>
            <div class="flex flex-col gap-4">
                <div class="flex items-start gap-1">
                    <span @class([
                        'extrasmall' => $size === 'sm',
                    ]) :class="{
                        'extrasmall': size === 'sm'
                    }">Rp</span>
                    <p @class([
                        'large' => $size === 'lg',
                        'small' => $size === 'sm',
                    ]) :class="{
                        'large': size === 'lg',
                        'small': size === 'sm'
                    }">{{ $payload['price'] }}</p>
                </div>
            </div>
        </div>
    </div>
    <div @class([
        'gap-3' => $direction === 'row' || $direction === 'col',
        'px-4 pb-4' => $size !== 'sm' && $direction === 'col',
        'flex-col px-2 pb-2 min-[420px]:flex-row' => $size === 'sm' && $direction === 'col',
        'flex justify-between text-center'
    ]) :class="{
        'gap-3': direction === 'row' || direction === 'col',
        'px-4 pb-4': size !== 'sm' && direction === 'col',
        'flex-col px-2 pb-2 min-[420px]:flex-row': size === 'sm' && direction === 'col'
    }">
        @if(!$disableView)
            <x-inputs.button type="hyperlink" href="{{ route('product.detail', [$payload['category_slug'], $payload['slug']]) }}" size="md" color="white" @class([
                'w-full' => $direction === 'row',
            ])>
                Lihat
            </x-inputs.button>
        @endif
        <x-inputs.button type="button" size="md" event="$store.productDrawer.openDrawer(data)" @class([
            'w-full' => $disableView || $direction === 'row',
        ])>
            Beli
        </x-inputs.button>
    </div>
</div>
