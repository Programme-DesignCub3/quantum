@extends('app')

@section('meta_title', $meta_title ?? 'Kebijakan Privasi')
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image)

@section('breadcrumbs')
    {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endsection

@section('content')
    <main x-data class="bg-white">
        <div class="pt-[60px] pb-8 px-6">
            <h2>Kebijakan Privasi</h2>
        </div>
        <div id="tabs-border-anchor" :class="$store.scrollStack.isTop ? 'top-[68px] duration-150 delay-200' : 'top-0 duration-50'" class="sticky z-30 transition-all ease-in-out flex gap-8 w-full overflow-x-auto px-8 bg-[#F4F4F4]">
            <a href="#{{ Str::slug($page_settings->pp_title) }}" class="tab-border active">{{ $page_settings->pp_title }}</a>
            <a href="#{{ Str::slug($page_settings->pp_title_cookie) }}" class="tab-border">{{ $page_settings->pp_title_cookie }}</a>
        </div>
        <section id="{{ Str::slug($page_settings->pp_title) }}" class="scrollspy flex flex-col gap-6 pt-[50px] pb-20 px-6 scroll-mt-28 border-b border-[#DBDBDB]">
            <div class="space-y-2.5">
                <h3>{{ $page_settings->pp_title }}</h3>
                <p>Terakhir diperbarui: {{ $page_settings->pp_updated_date_formatted }}</p>
            </div>
            <div class="rules-content">
                {!! $page_settings->pp_content !!}
            </div>
        </section>
        <section id="{{ Str::slug($page_settings->pp_title_cookie) }}" class="scrollspy flex flex-col gap-6 pt-[50px] pb-20 px-6 scroll-mt-24">
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
