@extends('app')

@section('meta_title', $meta_title ?? 'Resep')
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image)

@section('breadcrumbs')
    {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endsection

@section('content')
    <main id="recipe" class="bg-[#F4F4F4]">
        <section class="container flex flex-col gap-14 pt-[116px] pb-6">
            <div class="flex flex-col gap-[62px]">
                {{-- Heading --}}
                <div class="space-y-4 max-w-sm mx-auto text-center px-4 sm:max-w-5xl">
                    <h1>{{ $page_settings->recipe_title }}</h1>
                    <p class="large">{{ $page_settings->recipe_description }}</p>
                </div>
                {{-- Recipe (Latest) --}}
                @if(!$latest_recipes->isEmpty())
                    <div class="splide recipe-articles" role="group" aria-label="Recipe Article Slides">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach($latest_recipes->take(4) as $item)
                                    <li wire:key="recipe-{{ $item->id }}" class="splide__slide w-[260px]">
                                        <x-displays.article-card for="recipe" :payload="$item" />
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
            </div>
            <livewire:displays.recipe-list />
        </section>
    </main>
@endsection
