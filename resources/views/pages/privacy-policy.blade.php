@extends('app')

@section('meta_title', $meta_title ?? 'Kebijakan Privasi')
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image)

@section('breadcrumbs')
    {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endsection

@section('content')
    <main x-data>
        <div class="container pt-[60px] pb-8 px-6 md:text-center md:pt-20 md:pb-16 lg:pt-[100px]">
            <h2>Kebijakan Privasi</h2>
        </div>
        <div id="tabs-border-anchor" :class="$store.scrollStack.isTop ? 'top-[68px] duration-150 delay-200 md:top-[72px] lg:top-20' : 'top-0 duration-50'" class="sticky z-30 transition-all ease-in-out w-full bg-[#F4F4F4]">
            <div class="container flex gap-8 overflow-x-auto px-8 md:justify-center">
                <a href="#{{ Str::slug($page_settings->pp_title) }}" class="tab-border active">{{ $page_settings->pp_title }}</a>
                <a href="#{{ Str::slug($page_settings->pp_title_cookie) }}" class="tab-border">{{ $page_settings->pp_title_cookie }}</a>
            </div>
        </div>
        <section id="{{ Str::slug($page_settings->pp_title) }}" class="container scrollspy flex flex-col gap-6 pt-[50px] pb-20 px-6 scroll-mt-28 md:scroll-mt-20 md:py-20 lg:py-[100px]">
            <div class="space-y-2.5">
                <h3>{{ $page_settings->pp_title }}</h3>
                <p>Terakhir diperbarui: {{ $page_settings->pp_updated_date_formatted }}</p>
            </div>
            <div class="rules-content">
                {!! $page_settings->pp_content !!}
            </div>
        </section>
        <div class="w-full h-0.5 bg-[#DBDBDB]"></div>
        <section id="{{ Str::slug($page_settings->pp_title_cookie) }}" class="container scrollspy flex flex-col gap-6 pt-[50px] pb-20 px-6 scroll-mt-24 md:scroll-mt-20 md:py-20 lg:py-[100px]">
            <div class="space-y-2.5">
                <h3>{{ $page_settings->pp_title_cookie }}</h3>
                <p>Terakhir diperbarui: {{ $page_settings->pp_updated_date_cookie_formatted }}</p>
            </div>
            <div class="rules-content">
                {!! $page_settings->pp_content_cookie !!}
            </div>
        </section>
    </main>
@endsection
