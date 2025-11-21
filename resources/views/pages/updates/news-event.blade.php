@extends('app')

@section('content')
    <main id="news-event" class="bg-[#F4F4F4]">
        <section class="flex flex-col gap-[62px] pt-[116px] pb-10">
            <div class="space-y-4 max-w-sm mx-auto text-center px-4">
                <h1>Inspirasi Dapur Quantum</h1>
                <p class="large">Jelajahi berbagai artikel menarik Quantum dan dapatkan inspirasi setiap hari.</p>
            </div>
            <div class="splide news-event" role="group" aria-label="News Event Slides">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($news->take(4) as $item)
                            <li class="splide__slide w-[260px]">
                                <x-displays.article-card :payload="$item" />
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
        <section class="flex flex-col gap-8 px-4 pt-4 pb-6">
            <div class="flex flex-col gap-12">
                <div class="px-2">
                    <div class="flex gap-0.5 bg-white p-1 rounded-full overflow-x-auto">
                        <button type="button" class="tab active">
                            Semua
                        </button>
                        <button type="button" class="tab">
                            Event
                        </button>
                        <button type="button" class="tab">
                            Berita
                        </button>
                        <button type="button" class="tab">
                            Tips
                        </button>
                        <button type="button" class="tab">
                            Inspirasi
                        </button>
                        <button type="button" class="tab">
                            Review
                        </button>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    @foreach($news->skip(4) as $item)
                        <x-displays.article-card :payload="$item" />
                    @endforeach
                </div>
            </div>
            <div class="flex justify-center">
                <x-inputs.button type="button" size="lg" color="white">
                    Lebih banyak
                </x-inputs.button>
            </div>
        </section>
    </main>
@endsection
