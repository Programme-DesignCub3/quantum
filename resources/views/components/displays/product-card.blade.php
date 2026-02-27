<div wire:key="card-{{ $payload->id ?? $payload->slug }}" x-data="{ data: @js($data_drawer) }" @class([
    'gap-2 p-2' => $direction === 'row',
    'flex flex-col rounded-2xl overflow-hidden justify-between size-full bg-white'
]) @if(Route::currentRouteName() === 'product' || Route::currentRouteName() === 'product.category')
    :class="{
        'gap-2 p-2': direction === 'row'
    }"
@endif>
    <div @class([
        'flex-row gap-4' => $direction === 'row',
        'flex-col' => $direction === 'col',
        'flex'
    ]) @if(Route::currentRouteName() === 'product' || Route::currentRouteName() === 'product.category')
        :class="{
            'flex-row gap-4': direction === 'row',
            'flex-col': direction === 'col'
        }"
    @endif>
        <div class="flex-1 relative bg-white w-full">
            <img @class([
                'rounded-2xl' => $direction === 'row',
                'aspect-41/35 size-full object-contain mx-auto sm:aspect-6/5',
            ]) src="{{ $payload->media->first()->getUrl() }}" alt="{{ $payload->variant->name . ' ' . $payload->name }}">
            @if($payload->is_best_seller)
                <div class="absolute flex items-center justify-center top-0 right-0 py-1 px-3 rounded-bl-lg bg-[#FBCD26]">
                    <span>Best Seller</span>
                </div>
            @endif
        </div>
        <div @class([
            'py-4 pr-2 ' => $direction === 'row',
            'p-2 md:p-4' => $direction === 'col',
            'flex flex-col flex-1 justify-between h-full gap-4 bg-white'
        ]) @if(Route::currentRouteName() === 'product' || Route::currentRouteName() === 'product.category')
            :class="{
                'py-4 pr-2 ': direction === 'row',
                'p-2 md:p-4': direction === 'col'
            }"
        @endif>
            <div class="flex flex-col gap-2">
                <div class="space-y-0">
                    <span class="text-xs text-[#9A9A9A] md:text-sm">{{ $payload->variant->name ?? $payload->category->name }}</span>
                    <h5 class="text-qt-green-normal">{{ $payload->name }}</h5>
                </div>
                @if(isset($payload->specs) && !$disableSpecs)
                    <div class="flex flex-wrap gap-2">
                        @if(in_array('furnace_type', array_column($payload->specs, 'type')))
                            <div class="flex justify-center items-center gap-1">
                                <x-icons.target-icon class="size-2 md:size-2.5" />
                                <span class="text-[10px] text-[#868686] md:text-[11px]">{{ $payload->specs[array_search('furnace_type', array_column($payload->specs, 'type'))]['data']['types']['name'] }}</span>
                            </div>
                        @endif
                        @if(in_array('power_type', array_column($payload->specs, 'type')))
                            <div class="flex justify-center items-center gap-1">
                                <span class="icon-[pajamas--power] text-[8px] md:text-[10px]"></span>
                                <span class="text-[10px] text-[#868686] md:text-[11px]">{{ $payload->specs[array_search('power_type', array_column($payload->specs, 'type'))]['data']['types']['name'] }}</span>
                            </div>
                        @endif
                        @if(in_array('fuel_type', array_column($payload->specs, 'type')))
                            <div class="flex justify-center items-center gap-1">
                                <span class="icon-[el--fire] text-[8px] md:text-[10px]"></span>
                                <span class="text-[10px] text-[#868686] md:text-[11px]">{{ $payload->specs[array_search('fuel_type', array_column($payload->specs, 'type'))]['data']['types']['name'] }}</span>
                            </div>
                        @endif
                        @if(in_array('length_type', array_column($payload->specs, 'type')))
                            <div class="flex justify-center items-center gap-1">
                                <x-icons.spiral-icon class="size-2 md:size-2.5" />
                                <span class="text-[10px] text-[#868686] md:text-[11px]">{{ $payload->specs[array_search('length_type', array_column($payload->specs, 'type'))]['data']['types']['name'] }}</span>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
            {{-- <div class="flex flex-col gap-4">
                <div class="flex items-start gap-1">
                    <span class="extrasmall">Rp</span>
                    <p class="small">{{ $payload['price'] }}</p>
                </div>
            </div> --}}
        </div>
    </div>
    <div @class([
        'gap-3' => $direction === 'row' || $direction === 'col',
        'px-4 pb-4' => $direction === 'col',
        'flex-col px-2 pb-2 min-[460px]:flex-row md:px-4 md:pb-4' => $direction === 'col',
        'flex justify-between text-center'
    ]) @if(Route::currentRouteName() === 'product' || Route::currentRouteName() === 'product.category')
        :class="{
            'gap-3': direction === 'row' || direction === 'col',
            'px-4 pb-4': direction === 'col',
            'flex-col px-2 pb-2 min-[460px]:flex-row md:px-4 md:pb-4': direction === 'col'
        }"
    @endif>
        @if(!$disableView)
            <a href="{{ route('product.detail', [$payload->category->slug, $payload->slug]) }}" class="transition-all duration-300 ease-in-out inline-block w-full cursor-pointer border disabled:cursor-not-allowed py-3 px-6 rounded-xl font-semibold tracking-[0.5px] leading-[114%] text-sm border-transparent bg-white text-qt-green-normal hover:bg-qt-green-normal hover:text-white disabled:bg-[#F4F4F4] disabled:text-[#DBDBDB]">
                Lihat
            </a>
        @endif
        <button type="button" @click="$store.productDrawer.openDrawer(data)" class="transition-all duration-300 ease-in-out w-full cursor-pointer border disabled:cursor-not-allowed py-3 px-6 rounded-xl font-semibold tracking-[0.5px] leading-[114%] text-sm border-transparent bg-qt-green-normal text-white hover:bg-qt-green-hover disabled:bg-[#E9E9E9] disabled:text-[#C7C7C7]">
            Beli
        </button>
    </div>
</div>
