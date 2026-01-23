<section x-data="productList">
    <div wire:ignore :class="$store.scrollStack.isTop ? 'top-[68px] duration-150 delay-200' : 'top-0 duration-50'" class="sticky z-40 flex flex-col transition-all ease-in-out">
        <div class="flex justify-evenly gap-2 p-2 bg-[#106B75]">
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
                <button type="button" @click="$store.productFilterDrawer.openDrawer()" class="flex justify-center items-center size-9 cursor-pointer">
                    <span class="icon-[mage--filter] text-2xl"></span>
                </button>
                <div class="flex gap-2 overflow-auto w-full">
                    <button type="button" @click="$store.productVariantDrawer.openDrawer()" class="font-semibold text-xs py-2.5 px-5 rounded-full border border-[#E9E9E9] cursor-pointer whitespace-nowrap w-max min-[375px]:flex-auto focus:border-[#6D6D6D]">
                        Jenis
                    </button>
                    <button type="button" @click="$store.productTypeDrawer.openDrawer()" class="font-semibold text-xs py-2.5 px-5 rounded-full border border-[#E9E9E9] cursor-pointer whitespace-nowrap w-max min-[375px]:flex-auto focus:border-[#6D6D6D]">
                        Tipe Kategori
                    </button>
                </div>
            </div>
            <div class="flex justify-between gap-4 py-2 px-4">
                <button type="button" @click="$store.productSortDrawer.openDrawer()" class="w-[170px] flex justify-between items-center rounded-xl p-3 cursor-pointer border border-[#E9E9E9] focus:border-[#6D6D6D]">
                    <p class="text-[#6D6D6D]">
                        @if($sort === 'best_seller')
                            Paling populer
                        @else
                            Terbaru
                        @endif
                    </p>
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
    <div id="list-products" @class([
        'scroll-mt-[300px] bg-[#F4F4F4] px-4',
        'pt-1 pb-8' => $count_products > 0,
        'py-8' => $count_products == 0,
    ]) class="scroll-mt-[300px] bg-[#F4F4F4] px-4 pt-1 pb-8">
        @if(!$products->isEmpty())
            <p class="text-[#6D6D6D] p-2">{{ $count_products }} Produk</p>
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
            <div class="flex justify-center items-center">
                {{ $products->links(data: ['scrollTo' => '#list-products']) }}
            </div>
        @else
            <div class="min-h-[100px] flex justify-center items-center">
                <p class="text-center text-gray-500">Tidak ada data untuk ditampilkan</p>
            </div>
        @endif
    </div>
    <x-displays.drawer store="productFilterDrawer">
        <div wire:ignore class="flex flex-col gap-6">
            <h4 class="text-center">Filter</h4>
            <div class="flex flex-col gap-4">
                <x-displays.accordion title="Jenis" :open="true">
                    <div class="flex flex-col max-h-36 overflow-y-auto gap-2.5 pb-4 pt-2.5">
                        @if(!$variants->isEmpty())
                            @foreach($variants as $variant)
                                <div class="flex items-center gap-4">
                                    <input type="checkbox" wire:model="form_variant" value="{{ $variant->slug }}" id="{{ $variant->slug }}" class="shrink-0">
                                    <label for="{{ $variant->slug }}" class="size-full cursor-pointer">{{ $variant->name }}</label>
                                </div>
                            @endforeach
                        @else
                            <div class="min-h-[100px] flex justify-center items-center">
                                <p class="text-center text-gray-500">Tidak ada pilihan untuk ditampilkan</p>
                            </div>
                        @endif
                    </div>
                </x-displays.accordion>
                <x-displays.accordion title="Tipe Kategori" :open="true">
                    <div class="flex flex-col max-h-36 overflow-y-auto gap-2.5 pb-4 pt-2.5">
                        @if(!$types->isEmpty())
                            @foreach($types as $type)
                                <div class="flex items-center gap-4">
                                    <input type="checkbox" wire:model="form_type" value="{{ $type->slug }}" id="{{ $type->slug }}" class="shrink-0">
                                    <label for="{{ $type->slug }}" class="size-full cursor-pointer">{{ $type->name }}</label>
                                </div>
                            @endforeach
                        @else
                            <div class="min-h-[100px] flex justify-center items-center">
                                <p class="text-center text-gray-500">Tidak ada pilihan untuk ditampilkan</p>
                            </div>
                        @endif
                    </div>
                </x-displays.accordion>
            </div>
            <div class="flex mt-3 gap-4">
                <div wire:click="resetFilter" class="w-full">
                    <x-inputs.button type="button" size="lg" color="white" variant="secondary" class="w-full">
                        Atur Ulang
                    </x-inputs.button>
                </div>
                <div wire:click="applyFilter" class="w-full">
                    <x-inputs.button type="button" size="lg" class="w-full">
                        Terapkan
                    </x-inputs.button>
                </div>
            </div>
        </div>
    </x-displays.drawer>
    <x-displays.drawer store="productVariantDrawer">
        <div class="flex flex-col max-h-80 overflow-y-auto gap-1 py-4">
            @if(!$variants->isEmpty())
                @foreach($variants as $variant)
                    <div class="flex items-center gap-4 px-4">
                        <input type="checkbox" wire:click="refreshFilter" wire:model="variant" value="{{ $variant->slug }}" id="{{ $variant->slug }}-variant-filter" class="shrink-0">
                        <label for="{{ $variant->slug }}-variant-filter" class="size-full cursor-pointer py-4">{{ $variant->name }}</label>
                    </div>
                @endforeach
            @else
                <div class="min-h-[100px] flex justify-center items-center">
                    <p class="text-center text-gray-500">Tidak ada pilihan untuk ditampilkan</p>
                </div>
            @endif
        </div>
    </x-displays.drawer>
    <x-displays.drawer store="productTypeDrawer">
        <div class="flex flex-col max-h-80 overflow-y-auto gap-1 py-4">
            @if(!$types->isEmpty())
                @foreach($types as $type)
                    <div class="flex items-center gap-4 px-4">
                        <input type="checkbox" wire:click="refreshFilter" wire:model="type" value="{{ $type->slug }}" id="{{ $type->slug }}-type-filter" class="shrink-0">
                        <label for="{{ $type->slug }}-type-filter" class="size-full cursor-pointer py-4">{{ $type->name }}</label>
                    </div>
                @endforeach
            @else
                <div class="min-h-[100px] flex justify-center items-center">
                    <p class="text-center text-gray-500">Tidak ada pilihan untuk ditampilkan</p>
                </div>
            @endif
        </div>
    </x-displays.drawer>
    <x-displays.drawer store="productSortDrawer">
        <div class="flex flex-col gap-1 py-4">
            <button type="button" @click="$store.productSortDrawer.closeDrawer()" wire:click="$set('sort', '')" class="w-full text-left p-4 cursor-pointer">Terbaru</button>
            <button type="button" @click="$store.productSortDrawer.closeDrawer()" wire:click="$set('sort', 'best_seller')" class="w-full text-left p-4 cursor-pointer">Paling populer</button>
        </div>
    </x-displays.drawer>
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
