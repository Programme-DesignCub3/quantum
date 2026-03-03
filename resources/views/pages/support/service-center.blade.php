@extends('app')

@section('meta_title', $meta_title ?? 'Service Center')
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image)

@section('breadcrumbs')
    {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endsection

@section('content')
    <main>
        <section class="flex flex-col">
            {{-- Heading --}}
            <div class="container space-y-4 max-w-md mx-auto text-center pt-[116px] pb-[46px] px-6 sm:max-w-5xl">
                <h1>{{ $page_settings->sc_title }}</h1>
                <p class="large">{{ $page_settings->sc_description }}</p>
            </div>
            {{-- Content --}}
            <livewire:displays.service-center-list />
        </section>
    </main>
@endsection
