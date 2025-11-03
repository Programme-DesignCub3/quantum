<div class="flex flex-col rounded-2xl max-w-60 overflow-hidden h-full">
    <div class="bg-white">
        <img class="h-[200px] object-cover" src="{{ $payload['image'] }}" alt="">
    </div>
    <div class="flex flex-col justify-between h-full gap-4 p-4 bg-white">
        <div class="flex flex-col gap-2">
            <div>
                <span class="text-[#9A9A9A]">{{ $payload['category'] }}</span>
                <h4 class="text-qt-green-normal">{{ $payload['name'] }}</h4>
            </div>
            @if(isset($payload['specs']))
                <div class="flex gap-3">
                    @if(isset($payload['specs']['furnace_type']))
                        <div class="flex justify-center items-center gap-1">
                            <x-icons.target-icon class="size-2.5" />
                            <span class="extrasmall text-[#868686]">{{ $payload['specs']['furnace_type'] }}</span>
                        </div>
                    @endif
                    @if(isset($payload['specs']['power_type']))
                        <div class="flex justify-center items-center gap-1">
                            <span class="icon-[pajamas--power] text-[10px]"></span>
                            <span class="extrasmall text-[#868686]">{{ $payload['specs']['power_type'] }}</span>
                        </div>
                    @endif
                    @if(isset($payload['specs']['fuel_type']))
                        <div class="flex justify-center items-center gap-1">
                            <span class="icon-[el--fire] text-[10px]"></span>
                            <span class="extrasmall text-[#868686]">{{ $payload['specs']['fuel_type'] }}</span>
                        </div>
                    @endif
                    @if(isset($payload['specs']['length_type']))
                        <div class="flex justify-center items-center gap-1">
                            <x-icons.spiral-icon class="size-2.5" />
                            <span class="extrasmall text-[#868686]">{{ $payload['specs']['length_type'] }}</span>
                        </div>
                    @endif
                </div>
            @endif
        </div>
        <div class="flex flex-col gap-4">
            <div class="flex items-center gap-1">
                <span>Rp</span>
                <p>{{ $payload['price'] }}</p>
            </div>
            <div x-data="{ data: {{ json_encode($dataDrawer) }} }" class="flex justify-between">
                <x-inputs.button type="hyperlink" size="md" color="white">
                    Lihat
                </x-inputs.button>
                <x-inputs.button type="button" size="md" event="$store.productDrawer.openDrawer(data)">
                    Beli
                </x-inputs.button>
            </div>
        </div>
    </div>
</div>
