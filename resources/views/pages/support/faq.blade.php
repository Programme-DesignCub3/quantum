@extends('app')

@section('meta_title', $meta_title ?? 'FAQ')
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image)

@section('breadcrumbs')
    {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endsection

@section('content')
    <main x-data class="bg-white">
        <div class="space-y-4 text-center pt-[116px] pb-[46px] px-6">
            <h1>{{ $page_settings->faq_title }}</h1>
            <p class="large">{{ $page_settings->faq_description }}</p>
        </div>
        <div id="tabs-border-anchor" :class="$store.scrollStack.isTop ? 'top-[68px] duration-150 delay-200' : 'top-0 duration-50'" class="sticky z-30 transition-all ease-in-out flex gap-8 w-full overflow-x-auto px-8 bg-[#F4F4F4]">
            <a href="#produk" class="tab-border active">Produk</a>
            <a href="#pembelian" class="tab-border">Pembelian</a>
            <a href="#garansi" class="tab-border">Garansi</a>
        </div>
        <section class="flex flex-col gap-[42px] py-20 px-4">
            <div id="produk" class="scrollspy flex flex-col gap-8 scroll-mt-24">
                <h2>{{ $page_settings->faq_sub_title_product }}</h2>
                <div class="flex flex-col gap-4">
                    @foreach($page_settings->faq_product as $faq)
                        <x-displays.accordion title="{{ $faq['question'] }}" type="tertiary">
                            <div class="mt-6">
                                <p class="large">{{ $faq['answer'] }}</p>
                            </div>
                        </x-displays.accordion>
                    @endforeach
                </div>
            </div>
            <div id="pembelian" class="scrollspy flex flex-col gap-8 scroll-mt-24">
                <h2>{{ $page_settings->faq_sub_title_purchase }}</h2>
                <div class="flex flex-col gap-4">
                    @foreach($page_settings->faq_purchase as $faq)
                        <x-displays.accordion title="{{ $faq['question'] }}" type="tertiary">
                            <div class="mt-6">
                                <p class="large">{{ $faq['answer'] }}</p>
                            </div>
                        </x-displays.accordion>
                    @endforeach
                </div>
            </div>
            <div id="garansi" class="scrollspy flex flex-col gap-8 scroll-mt-24">
                <h2>{{ $page_settings->faq_sub_title_guarantee }}</h2>
                <div class="flex flex-col gap-4">
                    @foreach($page_settings->faq_guarantee as $faq)
                        <x-displays.accordion title="{{ $faq['question'] }}" type="tertiary">
                            <div class="mt-6">
                                <p class="large">{{ $faq['answer'] }}</p>
                            </div>
                        </x-displays.accordion>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
