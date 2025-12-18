<div class="flex flex-col gap-6">
    <div class="flex justify-center items-center px-4">
        <div class="flex gap-0.5 bg-white p-1 rounded-full">
            <button type="button" class="tab active">
                Semua
            </button>
            <button type="button" class="tab">
                Best Seller
            </button>
        </div>
    </div>
    <div class="splide products-home" role="group" aria-label="Products Home Slides">
        <div class="splide__track">
            <ul class="splide__list">
                @foreach($products as $product)
                    <li class="splide__slide">
                        <x-displays.product-card :payload="$product" />
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="flex justify-center items-center px-4">
        <x-inputs.button type="hyperlink" href="{{ route('product') }}" size="lg" variant="secondary" color="white">
            Lihat Semua Produk
        </x-inputs.button>
    </div>
</div>
