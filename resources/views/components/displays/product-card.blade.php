<div wire:key="card-{{ $payload->id ?? $payload->slug }}" x-data="{ data: @js($data_drawer) }" @class([
    'gap-2 p-2' => $direction === 'row',
    'flex flex-col rounded-2xl overflow-hidden justify-between size-full bg-white'
]) @if(Route::currentRouteName() === 'product' || Route::currentRouteName() === 'product.category') :class="{
    'gap-2 p-2': direction === 'row'
}" @endif>
    <div @class([
        'flex-row gap-4' => $direction === 'row',
        'flex-col' => $direction === 'col',
        'flex'
    ]) @if(Route::currentRouteName() === 'product' || Route::currentRouteName() === 'product.category') :class="{
        'flex-row gap-4': direction === 'row',
        'flex-col': direction === 'col'
    }" @endif>
        <div class="flex-1 relative bg-white">
            <img @class([
                'rounded-2xl' => $direction === 'row',
                'aspect-17/13 size-full object-cover' => $size === 'lg',
                'aspect-6/5 size-full object-cover' => $size === 'md',
                'aspect-41/35 object-contain' => $size === 'sm',
            ]) @if(Route::currentRouteName() === 'product' || Route::currentRouteName() === 'product.category') :class="{
                'rounded-2xl': direction === 'row',
                'aspect-17/13 size-full object-cover': size === 'lg',
                'aspect-6/5 size-full object-cover': size === 'md',
                'aspect-41/35 object-contain': size === 'sm',
            }" @endif src="{{ $payload->media->first()->getUrl() }}" alt="">
            @if($payload->is_best_seller)
                <div class="absolute flex items-center justify-center top-0 right-0 py-1 px-3 rounded-bl-lg bg-[#FBCD26]">
                    <span>Best Seller</span>
                </div>
            @endif
        </div>
        <div @class([
            'py-4 pr-2 ' => $direction === 'row',
            'p-2' => $size === 'sm' && $direction === 'col',
            'p-4' => $size !== 'sm' && $direction === 'col',
            'flex flex-col flex-1 justify-between h-full gap-4 bg-white'
        ]) @if(Route::currentRouteName() === 'product' || Route::currentRouteName() === 'product.category') :class="{
            'py-4 pr-2 ': direction === 'row',
            'p-2': size === 'sm' && direction === 'col',
            'p-4': size !== 'sm' && direction === 'col'
        }" @endif>
            <div class="flex flex-col gap-2">
                <div class="space-y-0">
                    @switch($size)
                        @case('lg')
                            <p class="text-[#9A9A9A]">{{ $payload->variant->name ?? $payload->category->name }}</p>
                            <h3 class="text-qt-green-normal">{{ $payload->name }}</h3>
                            @break
                        @case('md')
                            <span class="text-[#9A9A9A]">{{ $payload->variant->name ?? $payload->category->name }}</span>
                            <h4 class="text-qt-green-normal">{{ $payload->name }}</h4>
                            @break
                        @case('sm')
                            <span class="extrasmall text-[#9A9A9A]">{{ $payload->variant->name ?? $payload->category->name }}</span>
                            <h5 class="text-qt-green-normal">{{ $payload->name }}</h5>
                            @break
                    @endswitch
                </div>
                @if(isset($payload->specs) && !$disableSpecs)
                    <div @class([
                        'gap-3' => $size !== 'sm',
                        'gap-2' => $size === 'sm',
                        'flex flex-wrap'
                    ]) @if(Route::currentRouteName() === 'product' || Route::currentRouteName() === 'product.category') :class="{
                        'gap-3': size !== 'sm',
                        'gap-2': size === 'sm'
                    }" @endif>
                        @foreach($payload->specs as $spec)
                            @switch($spec['type'])
                                @case('furnace_type')
                                    <div class="flex justify-center items-center gap-1">
                                        <x-icons.target-icon @class([
                                            'size-3' => $size === 'lg',
                                            'size-2.5' => $size === 'md',
                                            'size-2' => $size === 'sm',
                                        ]) />
                                        @switch($size)
                                            @case('lg')
                                                <p class="small text-[#868686]">{{ $spec['data']['types']['name'] }}</p>
                                                @break
                                            @case('md')
                                                <span class="extrasmall text-[#868686]">{{ $spec['data']['types']['name'] }}</span>
                                                @break
                                            @case('sm')
                                                <span class="extrasmall text-[8px]! text-[#868686]">{{ $spec['data']['types']['name'] }}</span>
                                                @break
                                        @endswitch
                                    </div>
                                    @break
                                @case('power_type')
                                    <div class="flex justify-center items-center gap-1">
                                        <span @class([
                                            'text-xs' => $size === 'lg',
                                            'text-[10px]' => $size === 'md',
                                            'text-[8px]' => $size === 'sm',
                                            'icon-[pajamas--power]'
                                        ]) @if(Route::currentRouteName() === 'product' || Route::currentRouteName() === 'product.category') :class="{
                                            'text-xs': size === 'lg',
                                            'text-[10px]': size === 'md',
                                            'text-[8px]': size === 'sm'
                                        }" @endif></span>
                                        @switch($size)
                                            @case('lg')
                                                <p class="small text-[#868686]">{{ $spec['data']['types']['name'] }}</p>
                                                @break
                                            @case('md')
                                                <span class="extrasmall text-[#868686]">{{ $spec['data']['types']['name'] }}</span>
                                                @break
                                            @case('sm')
                                                <span class="extrasmall text-[8px]! text-[#868686]">{{ $spec['data']['types']['name'] }}</span>
                                                @break
                                        @endswitch
                                    </div>
                                    @break
                                @case('fuel_type')
                                    <div class="flex justify-center items-center gap-1">
                                        <span @class([
                                            'text-xs' => $size === 'lg',
                                            'text-[10px]' => $size === 'md',
                                            'text-[8px]' => $size === 'sm',
                                            'icon-[el--fire]'
                                        ]) @if(Route::currentRouteName() === 'product' || Route::currentRouteName() === 'product.category') :class="{
                                            'text-xs': size === 'lg',
                                            'text-[10px]': size === 'md',
                                            'text-[8px]': size === 'sm'
                                        }" @endif></span>
                                        @switch($size)
                                            @case('lg')
                                                <p class="small text-[#868686]">{{ $spec['data']['types']['name'] }}</p>
                                                @break
                                            @case('md')
                                                <span class="extrasmall text-[#868686]">{{ $spec['data']['types']['name'] }}</span>
                                                @break
                                            @case('sm')
                                                <span class="extrasmall text-[8px]! text-[#868686]">{{ $spec['data']['types']['name'] }}</span>
                                                @break
                                        @endswitch
                                    </div>
                                    @break
                                @case('length_type')
                                    <div class="flex justify-center items-center gap-1">
                                        <x-icons.spiral-icon @class([
                                            'size-3' => $size === 'lg',
                                            'size-2.5' => $size === 'md',
                                            'size-2' => $size === 'sm',
                                        ]) />
                                        @switch($size)
                                            @case('lg')
                                                <p class="small text-[#868686]">{{ $spec['data']['types']['name'] }}</p>
                                                @break
                                            @case('md')
                                                <span class="extrasmall text-[#868686]">{{ $spec['data']['types']['name'] }}</span>
                                                @break
                                            @case('sm')
                                                <span class="extrasmall text-[8px]! text-[#868686]">{{ $spec['data']['types']['name'] }}</span>
                                                @break
                                        @endswitch
                                    </div>
                                    @break
                            @endswitch
                        @endforeach
                    </div>
                @endif
            </div>
            {{-- <div class="flex flex-col gap-4">
                <div class="flex items-start gap-1">
                    <span @class([
                        'extrasmall' => $size === 'sm',
                    ]) @if(Route::currentRouteName() === 'product' || Route::currentRouteName() === 'product.category') :class="{
                        'extrasmall': size === 'sm'
                    }" @endif>Rp</span>
                    <p @class([
                        'large' => $size === 'lg',
                        'small' => $size === 'sm',
                    ]) @if(Route::currentRouteName() === 'product' || Route::currentRouteName() === 'product.category') :class="{
                        'large': size === 'lg',
                        'small': size === 'sm'
                    }" @endif>{{ $payload['price'] }}</p>
                </div>
            </div> --}}
        </div>
    </div>
    <div @class([
        'gap-3' => $direction === 'row' || $direction === 'col',
        'px-4 pb-4' => $size !== 'sm' && $direction === 'col',
        'flex-col px-2 pb-2 min-[420px]:flex-row' => $size === 'sm' && $direction === 'col',
        'flex justify-between text-center'
    ]) @if(Route::currentRouteName() === 'product' || Route::currentRouteName() === 'product.category') :class="{
        'gap-3': direction === 'row' || direction === 'col',
        'px-4 pb-4': size !== 'sm' && direction === 'col',
        'flex-col px-2 pb-2 min-[420px]:flex-row': size === 'sm' && direction === 'col'
    }" @endif>
        @if(!$disableView)
            <a href="{{ route('product.detail', [$payload->category->slug, $payload->slug]) }}" class="transition-all duration-300 ease-in-out inline-block w-full cursor-pointer border disabled:cursor-not-allowed py-3 px-6 rounded-xl font-semibold tracking-[0.5px] leading-[114%] text-sm border-transparent bg-white text-qt-green-normal hover:bg-qt-green-normal hover:text-white disabled:bg-[#F4F4F4] disabled:text-[#DBDBDB]">
                Lihat
            </a>
        @endif
        <button type="button" @click="$store.productDrawer.openDrawer(data)" class="transition-all duration-300 ease-in-out w-full cursor-pointer border disabled:cursor-not-allowed py-3 px-6 rounded-xl font-semibold tracking-[0.5px] leading-[114%] text-sm border-transparent bg-qt-green-normal text-white hover:bg-qt-green-hover disabled:bg-[#E9E9E9] disabled:text-[#C7C7C7]">
            Beli
        </button>
    </div>
</@div>
