@extends('app')

@section('meta_title', $meta_title ?? config('app.name'))
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image ?? asset('images/og-image.png'))

@section('content')
    <main x-data="recipeDetail" x-ref="recipeContent" id="recipe-detail" class="relative bg-[#FFFFFF] h-[800px] overflow-hidden">
        <div x-cloak x-show="$store.premiumRecipeDrawer.formShown" class="absolute z-10 left-1/2 -translate-x-1/2 bottom-0 bg-linear-to-t flex flex-col gap-[70px] justify-end-safe items-center from-white to-transparent max-w-md mx-auto h-[375px] w-full px-4 pb-5">
            <x-inputs.button type="button" event="$store.premiumRecipeDrawer.openDrawer()" size="lg">
                Lihat Resep Premium
            </x-inputs.button>
            <div class="flex gap-2.5">
                <button type="button" @click="$store.shareDrawer.openDrawer()" class="flex justify-center items-center gap-1.5 bg-white px-5 py-3 rounded-full cursor-pointer drop-shadow-float active:shadow-none">
                    <span class="text-qt-green-normal font-semibold text-sm">Bagikan</span>
                    <span class="icon-[tdesign--share] text-lg text-black"></span>
                </button>
                <button type="button" @click="$store.scroll.scrollToTop()" class="transition-all duration-300 ease-in-out flex justify-center items-center size-10 bg-white drop-shadow-float rounded-full cursor-pointer active:shadow-none">
                    <span class="icon-[lucide--chevron-up] text-3xl text-qt-green-normal"></span>
                </button>
            </div>
        </div>
        <x-displays.drawer store="premiumRecipeDrawer">
            <livewire:forms.recipe-premium-form :payload="$detail" />
        </x-displays.drawer>
        <section class="flex flex-col">
            <div class="flex flex-col gap-4 px-6 pt-[60px] pb-8">
                <div class="space-y-2">
                    <h2>{{ $detail->title }}</h2>
                    <div class="flex gap-2">
                        @if($detail->is_premium == true)
                            <div class="flex items-center gap-1 px-2 py-1 bg-[#FBD752] rounded-full">
                                <x-icons.premium-icon class="fill-qt-green-normal size-5" />
                                <span class="text-qt-green-normal">Premium</span>
                            </div>
                        @endif
                        <span class="inline-block bg-[#E7F1F2] rounded-full px-2.5 py-1">{{ $detail->category->name }}</span>
                        <button type="button" @click="$store.shareDrawer.openDrawer()" class="flex gap-2 items-center text-xs cursor-pointer bg-[#E7F1F2] rounded-full px-2.5 py-1">
                            <span class="icon-[tdesign--share] text-qt-green-normal text-base"></span>
                            Bagikan
                        </button>
                    </div>
                </div>
                <div class="flex gap-2.5">
                    <div class="flex items-center gap-2">
                        <span class="icon-[lucide--clock-4] text-base"></span>
                        <span>± {{ $detail->cook_time }} Menit</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="icon-[lucide--user] text-base"></span>
                        <span>{{ $detail->portion }} Porsi</span>
                    </div>
                </div>
            </div>
            <div class="relative">
                <img class="aspect-49/30 object-cover" src="{{ $detail->media->first()->getUrl() }}" alt="">
            </div>
            <div class="flex flex-col gap-12 pt-[42px] pb-24">
                <div class="flex flex-col gap-[58px]">
                    <div class="flex flex-col gap-4 px-6">
                        <h3>Bahan-bahan:</h3>
                        <div class="flex flex-col gap-4 px-4 py-8 bg-[#F4F4F4] rounded-2xl">
                            <h4>Bahan untuk {{ $detail->portion }} porsi</h4>
                            <div class="recipe-list">
                                @foreach($detail->materials as $material)
                                    {!! $material['value'] !!}
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col gap-4">
                        <h3 class="px-6">Cara membuat:</h3>
                        <div class="splide how-to-step" role="group" aria-label="How to Step Slides">
                            <div class="splide__track">
                                <ul class="splide__list">
                                    @foreach($detail->steps as $index => $item)
                                        <li class="splide__slide w-[260px]">
                                            <x-displays.step-card number="{{ $index + 1 }}" :payload="$item" />
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col gap-2.5 px-6">
                    <div class="flex items-center gap-1">
                        <span class="icon-[lucide--tag] text-base"></span>
                        <span>Tags:</span>
                    </div>
                    <div class="flex flex-wrap gap-1">
                        @foreach($detail->tags as $tag)
                            <span class="inline-block border border-[#DBDBDB] rounded-full text-qt-green-normal capitalize bg-white px-2.5 py-1">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <section class="flex flex-col gap-8 bg-[#F4F4F4] pt-[46px] pb-[77px]">
            <h3 class="px-6">Lihat juga Rekomendasi Produk</h3>
            @if(!$recommendation_products->isEmpty())
                <div class="splide recommendation-products-recipe" role="group" aria-label="Recommendation Product Slides">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach($recommendation_products as $product)
                                <li class="splide__slide w-[260px]">
                                    <x-displays.product-card direction="row" :payload="$product" />
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <div class="min-h-[100px] flex justify-center items-center">
                    <p class="text-center text-gray-500">Tidak ada data untuk ditampilkan</p>
                </div>
            @endif
        </section>
        <section class="flex flex-col gap-8 pt-[77px] pb-[100px]">
            <h3 class="px-6">Lihat Juga Resep Masakan Lainnya</h3>
            @if(!$other_recipes->isEmpty())
                <div class="splide other-recipe" role="group" aria-label="Other Recipe Slides">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach($other_recipes as $item)
                                <li class="splide__slide w-[260px]">
                                    <x-displays.article-card for="recipe" :border="true" :payload="$item" />
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @else
                <div class="min-h-[100px] flex justify-center items-center">
                    <p class="text-center text-gray-500">Tidak ada data untuk ditampilkan</p>
                </div>
            @endif
        </section>
    </main>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('recipeDetail', () => ({
            isPremium: @json($detail->is_premium === 0 ? false : true),
            registeredPremium: @json(session()->get('registered_premium')),
            init() {
                if (this.isPremium) {
                    this.$store.premiumRecipeDrawer.isPremium = true;
                    this.$store.premiumRecipeDrawer.formShown = true;
                    this.$store.premiumRecipeDrawer.footerShown = false;
                    this.$refs.recipeContent.classList.add('h-[800px]')
                } else {
                    this.$store.premiumRecipeDrawer.isPremium = false;
                    this.$store.premiumRecipeDrawer.formShown = false;
                    this.$store.premiumRecipeDrawer.footerShown = true;
                    this.$refs.recipeContent.classList.remove('h-[800px]')
                }

                if (this.registeredPremium && this.isPremium) {
                    this.$store.premiumRecipeDrawer.registerPremium()
                    this.$refs.recipeContent.classList.remove('h-[800px]')
                }
            }
        }));
    });

    document.addEventListener('livewire:init', () => {
        Livewire.on('open-limit', () => {
            Alpine.store('premiumRecipeDrawer').registerPremium(true)
            document.getElementById('recipe-detail').classList.remove('h-[800px]')
        });
    });
</script>
@endpush
