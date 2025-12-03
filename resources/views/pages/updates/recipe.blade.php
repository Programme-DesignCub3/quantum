@extends('app')

@section('content')
    <main id="recipe" class="bg-[#F4F4F4]">
        <section class="flex flex-col gap-14 pt-[116px] pb-6">
            <div class="flex flex-col gap-[62px]">
                <div class="space-y-4 max-w-sm mx-auto text-center px-4">
                    <h1>Kreasi Resep Quantum</h1>
                    <p class="large">Hadirkan kehangatan untuk keluarga di setiap sajian.</p>
                </div>
                <div class="splide recipe-articles" role="group" aria-label="Recipe Article Slides">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach($recipes->take(4) as $item)
                                <li class="splide__slide w-[260px]">
                                    <x-displays.article-card for="recipe" :payload="$item" />
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-8 px-4">
                <div class="flex flex-col gap-12">
                    <div class="px-2">
                        <div class="flex gap-0.5 bg-white p-1 rounded-full overflow-x-auto">
                            <button type="button" class="tab active">
                                Semua
                            </button>
                            <button type="button" class="tab">
                                Nusantara
                            </button>
                            <button type="button" class="tab">
                                Korean
                            </button>
                            <button type="button" class="tab">
                                Timur Tengah
                            </button>
                            <button type="button" class="tab">
                                Western
                            </button>
                            <button type="button" class="tab">
                                Chinese
                            </button>
                            <button type="button" class="tab">
                                Thailand
                            </button>
                            <button type="button" class="tab">
                                India
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4">
                        @foreach($recipes->skip(4) as $item)
                            <x-displays.article-card for="recipe" :payload="$item" />
                        @endforeach
                    </div>
                </div>
                <div class="flex justify-center">
                    <x-inputs.button type="button" size="lg" color="white">
                        Lebih banyak
                    </x-inputs.button>
                </div>
            </div>
        </section>
    </main>
@endsection
