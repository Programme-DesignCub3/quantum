@extends('app')

@section('meta_title', $meta_title ?? 'FAQ')
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image)

@section('breadcrumbs')
    {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endsection

@section('content')
    <main x-data>
        <div class="container pt-[116px] pb-[46px] px-6 md:pt-20 md:pb-16 lg:pt-[100px]">
            <div class="space-y-4 text-center md:max-w-5xl md:mx-auto">
                <h1>{{ $page_settings->faq_title }}</h1>
                <p class="large">{{ $page_settings->faq_description }}</p>
            </div>
        </div>
        <div id="tabs-border-anchor" :class="$store.scrollStack.isTop ? 'top-[68px] duration-150 delay-200 md:top-[72px] lg:top-20' : 'top-0 duration-50'" class="sticky z-30 transition-all ease-in-out w-full bg-[#F4F4F4]">
            <div class="container flex gap-8 overflow-x-auto px-8 md:justify-center">
                <a href="#produk" class="tab-border active">Produk</a>
                <a href="#pembelian" class="tab-border">Pembelian</a>
                <a href="#garansi" class="tab-border">Garansi</a>
            </div>
        </div>
        <section class="container flex flex-col gap-[42px] py-20 px-4 sm:px-6 lg:py-[100px]">
            <div id="produk" class="scrollspy flex flex-col gap-8 scroll-mt-24">
                <h2 class="md:text-[28px]">{{ $page_settings->faq_sub_title_product }}</h2>
                <div class="flex flex-col gap-4">
                    @foreach($page_settings->faq_product as $faq)
                        <x-displays.accordion title="{{ $faq['question'] }}" type="tertiary">
                            <div class="mt-6">
                                <p class="max-md:large">{{ $faq['answer'] }}</p>
                            </div>
                        </x-displays.accordion>
                    @endforeach
                </div>
            </div>
            <div id="pembelian" class="scrollspy flex flex-col gap-8 scroll-mt-24">
                <h2 class="md:text-[28px]">{{ $page_settings->faq_sub_title_purchase }}</h2>
                <div class="flex flex-col gap-4">
                    @foreach($page_settings->faq_purchase as $faq)
                        <x-displays.accordion title="{{ $faq['question'] }}" type="tertiary">
                            <div class="mt-6">
                                <p class="max-md:large">{{ $faq['answer'] }}</p>
                            </div>
                        </x-displays.accordion>
                    @endforeach
                </div>
            </div>
            <div id="garansi" class="scrollspy flex flex-col gap-8 scroll-mt-24">
                <h2 class="md:text-[28px]">{{ $page_settings->faq_sub_title_guarantee }}</h2>
                <div class="flex flex-col gap-4">
                    @foreach($page_settings->faq_guarantee as $faq)
                        <x-displays.accordion title="{{ $faq['question'] }}" type="tertiary">
                            <div class="mt-6">
                                <p class="max-md:large">{{ $faq['answer'] }}</p>
                            </div>
                        </x-displays.accordion>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
