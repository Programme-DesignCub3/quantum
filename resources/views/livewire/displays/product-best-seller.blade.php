<div class="flex flex-col gap-6">
    <div class="flex justify-center items-center px-4 md:justify-between md:px-6">
        {{-- Tabs --}}
        <div class="flex gap-0.5 bg-white p-1 rounded-full">
            <button type="button" wire:click="productsFilter(false)" class="tab {{ $bestSellerOnly ? '' : 'active' }}">
                Semua
            </button>
            <button type="button" wire:click="productsFilter(true)" class="tab {{ $bestSellerOnly ? 'active' : '' }}">
                Best Seller
            </button>
        </div>
        {{-- Read More Button (Desktop) --}}
        <div class="hidden justify-center items-center px-4 md:flex">
            <x-inputs.button type="hyperlink" href="{{ route('product') }}" size="lg" variant="secondary" color="white">
                Lihat Semua Produk
            </x-inputs.button>
        </div>
    </div>
    {{-- Products (Best Seller) List --}}
    @if(!$products->isEmpty())
        <div class="splide products-home" role="group" aria-label="Products Home Slides">
            <div class="splide__track">
                <ul class="splide__list">
                    @foreach($products as $product)
                        <li wire:key="product-{{ $product->id }}" class="splide__slide">
                            <x-displays.product-card :payload="$product" />
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    @else
        <div class="min-h-[100px] flex justify-center items-center md:min-h-[200px]">
            <p class="text-center text-gray-500">Tidak ada data untuk ditampilkan</p>
        </div>
    @endif
    {{-- Read More Button (Mobile) --}}
    <div class="flex justify-center items-center px-4 md:hidden">
        <x-inputs.button type="hyperlink" href="{{ route('product') }}" size="lg" variant="secondary" color="white">
            Lihat Semua Produk
        </x-inputs.button>
    </div>
</div>
