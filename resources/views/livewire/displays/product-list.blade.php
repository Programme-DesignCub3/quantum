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
            @foreach ($categories as $category)
                <a href="{{ route('product.category', $category->slug) }}" @class([
                    'bg-[#0B474D]' => Route::currentRouteName() === 'product.category' && Route::current()->parameter('category') === $category->slug,
                    'hover:bg-[#0B474D]/30' => !(Route::currentRouteName() === 'product.category' && Route::current()->parameter('category') === $category->slug),
                    'flex flex-col gap-3 justify-start items-center rounded-2xl text-white w-[90px] text-center cursor-pointer px-2 py-2.5'
                ])>
                    <img class="size-[30px]" src="{{ $category->icon_white }}" alt="">
                    <span class="font-semibold leading-[133%]">{{ $category->name }}</span>
                </a>
            @endforeach
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
                <div class="flex border border-[#F4F4F4] rounded-xl overflow-hidden">
                    <button type="button" @click="changeLayout('square')" class="p-2.5 border-[#E9E9E9] rounded-l-xl cursor-pointer" :class="layout === 'square' && 'bg-[#F4F4F4]'">
                        <x-icons.grid-square-icon class="stroke-[#6D6D6D] fill-none" />
                    </button>
                    <button type="button" @click="changeLayout('row')" class="border-x p-2.5 border-[#E9E9E9] cursor-pointer" :class="layout === 'row' && 'bg-[#F4F4F4]'">
                        <x-icons.grid-row-icon class="stroke-[#6D6D6D] fill-none" />
                    </button>
                    <button type="button" @click="changeLayout('col')" class="p-2.5 border-[#E9E9E9] rounded-r-xl cursor-pointer" :class="layout === 'col' && 'bg-[#F4F4F4]'">
                        <x-icons.grid-col-icon class="stroke-[#6D6D6D] fill-none" />
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="list-products" class="scroll-mt-[300px] bg-[#F4F4F4] px-4 pt-1 pb-8">
        <p class="text-[#6D6D6D] p-2">8 Produk</p>
        <div :class="{
            'grid-cols-2': layout === 'row',
            'grid-cols-1': layout !== 'row'
        }" class="grid grid-cols-2 gap-4 pt-4 pb-6">
            @foreach($products as $key => $product)
                <div wire:key="product-{{ $product['id'] ?? $key }}">
                    <x-displays.product-card :payload="$product" />
                </div>
            @endforeach
        </div>
        {{-- <div class="flex justify-center items-center">
            {{ $products->links(data: ['scrollTo' => '#list-products']) }}
        </div> --}}
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
