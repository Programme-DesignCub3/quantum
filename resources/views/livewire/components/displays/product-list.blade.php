<section x-data="productList">
    <div :class="isTop ? 'top-[68px] duration-150 delay-200' : 'top-0 duration-50'" class="sticky z-40 flex flex-col transition-all ease-in-out">
        <div wire:ignore class="flex justify-evenly gap-2 p-2 bg-[#106B75]">
            <a href="{{ route('product') }}" @class([
                'bg-[#0B474D]' => Route::currentRouteName() === 'product',
                'hover:bg-[#0B474D]/30' => Route::currentRouteName() !== 'product',
                'flex flex-col gap-3 justify-start items-center rounded-2xl text-white w-[90px] text-center cursor-pointer px-2 py-2.5'
            ])>
                <span class="icon-[mingcute--grid-line] text-[28px]"></span>
                <span class="font-semibold leading-[133%]">Semua</span>
            </a>
            <a href="{{ route('product.category', 'kompor') }}" @class([
                'bg-[#0B474D]' => Route::currentRouteName() === 'product.category' && Route::current()->parameter('category') === 'kompor',
                'hover:bg-[#0B474D]/30' => !(Route::currentRouteName() === 'product.category' && Route::current()->parameter('category') === 'kompor'),
                'flex flex-col gap-3 justify-start items-center rounded-2xl text-white w-[90px] text-center cursor-pointer px-2 py-2.5'
            ])>
                <x-icons.stove-icon class="fill-white stroke-white" />
                <span class="font-semibold leading-[133%]">Kompor</span>
            </a>
            <a href="{{ route('product.category', 'regulator-dan-selang-gas') }}" @class([
                'bg-[#0B474D]' => Route::currentRouteName() === 'product.category' && Route::current()->parameter('category') === 'regulator-dan-selang-gas',
                'hover:bg-[#0B474D]/30' => !(Route::currentRouteName() === 'product.category' && Route::current()->parameter('category') === 'regulator-dan-selang-gas'),
                'flex flex-col gap-3 justify-start items-center rounded-2xl text-white w-[90px] text-center cursor-pointer px-2 py-2.5'
            ])>
                <x-icons.regulator-icon class="fill-white stroke-white" />
                <span class="font-semibold leading-[133%]">Regulator & Selang Gas</span>
            </a>
            <a href="{{ route('product.category', 'suku-cadang') }}" @class([
                'bg-[#0B474D]' => Route::currentRouteName() === 'product.category' && Route::current()->parameter('category') === 'suku-cadang',
                'hover:bg-[#0B474D]/30' => !(Route::currentRouteName() === 'product.category' && Route::current()->parameter('category') === 'suku-cadang'),
                'flex flex-col gap-3 justify-start items-center rounded-2xl text-white w-[90px] text-center cursor-pointer px-2 py-2.5'
            ])>
                <x-icons.target-icon class="fill-white stroke-white" />
                <span class="font-semibold leading-[133%]">Suku Cadang</span>
            </a>
        </div>
        <div class="flex flex-col bg-white">
            <div class="flex gap-2 py-2 px-4">
                <button type="button" class="flex justify-center items-center size-9 cursor-pointer">
                    <span class="icon-[mage--filter] text-2xl"></span>
                </button>
                <div class="flex gap-2 overflow-auto w-full">
                    <button type="button" class="font-semibold text-xs py-2.5 px-5 rounded-full border border-[#E9E9E9] cursor-pointer whitespace-nowrap w-max min-[375px]:flex-auto">
                        Jenis
                    </button>
                    <button type="button" class="font-semibold text-xs py-2.5 px-5 rounded-full border border-[#E9E9E9] cursor-pointer whitespace-nowrap w-max min-[375px]:flex-auto">
                        Tipe Kategori
                    </button>
                    <button type="button" class="font-semibold text-xs py-2.5 px-5 rounded-full border border-[#E9E9E9] cursor-pointer whitespace-nowrap w-max min-[375px]:flex-auto">
                        Harga
                    </button>
                </div>
            </div>
            <div class="flex justify-between gap-4 py-2 px-4">
                <button type="button" class="w-[170px] flex justify-between items-center rounded-xl p-3 cursor-pointer border border-[#E9E9E9]">
                    <p class="text-[#6D6D6D]">Terbaru</p>
                    <span class="icon-[lucide--chevron-down] text-xl"></span>
                </button>
                <div class="flex border border-[#F4F4F4] rounded-xl">
                    <button type="button" class="p-2.5 cursor-pointer">
                        <x-icons.grid-square-icon class="stroke-[#6D6D6D] fill-none" />
                    </button>
                    <button type="button" class="border-x border-[#E9E9E9] p-2.5 cursor-pointer bg-[#F4F4F4]">
                        <x-icons.grid-row-icon class="stroke-[#6D6D6D] fill-none" />
                    </button>
                    <button type="button" class="p-2.5 cursor-pointer">
                        <x-icons.grid-col-icon class="stroke-[#6D6D6D] fill-none" />
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-[#F4F4F4] px-4 pt-1 pb-8">
        <p class="text-[#6D6D6D] p-2">12 Produk</p>
        <div :class="{
            'grid-cols-2': layout === 'row',
            'grid-cols-1': layout !== 'row'
        }" class="grid grid-cols-2 gap-4 pt-4 pb-6">
            @foreach($products as $product)
                <x-displays.product-card size="sm" direction="col" :payload="$product" />
            @endforeach
        </div>
        <div class="flex justify-center items-center">
            <div class="flex rounded-xl overflow-hidden border border-[#E9E9E9]">
                <button type="button" class="flex justify-center items-center cursor-pointer size-11 p-2.5">
                    <span class="icon-[lucide--chevron-left] text-2xl text-[#6D6D6D]"></span>
                </button>
                <button type="button" class="size-11 p-2.5 cursor-pointer font-bold bg-[#E9E9E9] text-[#6D6D6D] text-lg not-last:border-r not-last:border-[#E9E9E9]">1</button>
                <button type="button" class="size-11 p-2.5 cursor-pointer font-bold text-[#6D6D6D] text-lg not-last:border-r not-last:border-[#E9E9E9]">2</button>
                <button type="button" class="size-11 p-2.5 cursor-pointer font-bold text-[#6D6D6D] text-lg not-last:border-r not-last:border-[#E9E9E9]">3</button>
                <button type="button" class="flex justify-center items-center cursor-pointer size-11 p-2.5">
                    <span class="icon-[lucide--chevron-right] text-2xl text-[#6D6D6D]"></span>
                </button>
            </div>
        </div>
    </div>
</section>

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('productList', () => ({
            layout: 'row',
            size: 'sm',
            direction: 'col',

            changeLayout(layout) {
                this.layout = layout;

                switch (layout) {
                    case 'square':
                        this.size = 'lg';
                        this.direction = 'col';
                        break;
                    case 'row':
                        this.size = 'sm';
                        this.direction = 'col';
                        break;
                    case 'col':
                        this.size = 'md';
                        this.direction = 'row';
                        break;
                }
            },
        }))
    })
</script>
@endpush
