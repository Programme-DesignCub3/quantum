@extends('app')

@section('meta_title', $meta_title ?? 'Kebijakan Privasi')
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image)

@section('breadcrumbs')
    {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endsection

@section('content')
    <main class="container flex flex-col gap-8 py-[60px] px-6 md:py-20 lg:py-[100px]">
        {{-- Heading --}}
        <div class="space-y-2 md:text-center md:max-w-5xl md:mx-auto">
            <h1 class="text-2xl md:text-3xl md:max-w-5xl md:mx-auto lg:text-4xl">Kebijakan Privasi</h1>
            <p>Terakhir diperbarui: {{ $page_settings->pp_updated_date_formatted }}</p>
        </div>
        {{-- Content --}}
        <div class="rules-content">
            {!! $page_settings->pp_content !!}
        </div>
    </main>
@endsection
