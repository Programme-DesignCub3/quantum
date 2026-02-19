@extends('app')

@section('meta_title', $meta_title ?? 'Distributor')
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image)

@section('breadcrumbs')
    {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endsection

@section('content')
    <main>
        <section class="bg-[#F4F4F4]">
            {{-- Mobile --}}
            <div class="max-w-md mx-auto text-center space-y-4 px-6 pt-[68px] pb-4 md:hidden">
                <h1>{{ $page_settings->distributor_title }}</h1>
                <p class="large text-[#6D6D6D]">{{ $page_settings->distributor_description }}</p>
            </div>
            {{-- Desktop --}}
            <div class="relative">
                <img class="aspect-square md:hidden" src="{{ asset('images/mobile-distributor.jpg') }}" alt="">
                <img class="hidden w-full object-cover object-top-right h-[600px] md:block" src="{{ asset('images/desktop-distributor.jpg') }}" alt="">
                <div class="absolute container top-0 left-1/2 -translate-x-1/2 w-full h-full items-center p-6 hidden md:flex">
                    <div class="space-y-4 text-white max-w-xl">
                        <h1>{{ $page_settings->distributor_title }}</h1>
                        <p class="large">{{ $page_settings->distributor_description }}</p>
                    </div>
                </div>
            </div>
            <div class="container grid grid-cols-1 gap-20 py-20 px-4 sm:px-6 lg:grid-cols-12">
                <div class="flex flex-col gap-12 col-span-full lg:col-span-6">
                    <div class="space-y-4">
                        <h2>{{ $page_settings->distributor_title_benefit }}</h2>
                        <p>{{ $page_settings->distributor_description_benefit }}</p>
                    </div>
                    <div class="grid grid-cols-1">
                        @foreach($page_settings->distributor_benefit as $key => $benefit)
                            <div class="space-y-4">
                                <h4>{{ $benefit['title'] }}</h4>
                                <p>{{ $benefit['description'] }}</p>
                            </div>
                            @if ($key < count($page_settings->distributor_benefit) - 1)
                                <div class="w-full h-px bg-black/10 my-4"></div>
                            @endif
                        @endforeach
                    </div>
                </div>
                <livewire:forms.distributor-form />
            </div>
        </section>
        <livewire:displays.distributor-list />
    </main>
@endsection
