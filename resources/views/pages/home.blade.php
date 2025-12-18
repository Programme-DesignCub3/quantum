@extends('app')

@section('content')
    <main id="homepage" class="bg-white">
        <section class="splide slideshow-home relative" role="group" aria-label="Quantum Home Slides">
            <div class="absolute z-10 flex flex-col justify-end size-full">
                <div class="w-full h-1/2 text-white space-y-4 text-center pt-16 px-4 min-[375px]:pt-28 min-[375px]:px-12">
                    <h1>Pilihan Andalan Buat Dapur Impian</h1>
                    <p class="large">Wujudkan dapur idaman dengan performa teruji kompor Quantum.</p>
                    <x-inputs.button type="button" size="lg" color="white">
                        LAGI CARI APA?
                    </x-inputs.button>
                </div>
            </div>
            <div class="splide__track">
                <ul class="splide__list">
                    @for($i = 1; $i <= 3; $i++)
                        <li class="splide__slide">
                            <img class="brightness-90" src="{{ asset('images/home-mobile.jpg') }}" alt="">
                        </li>
                    @endfor
                </ul>
            </div>
            <ul class="splide__pagination slide-home"></ul>
        </section>
        <section class="flex flex-col gap-8 py-[92px] bg-[#F4F4F4]">
            <div class="px-4 text-center space-y-4 max-w-[340px] mx-auto">
                <h2>Pilihan Produk Quantum Solusi Efisien Dapur Anda</h2>
                <p class="large text-[#6D6D6D]">Quantum hadirkan kompor, selang, dan regulator gas dengan desain modern dan telah teruji performanya.</p>
            </div>
            <livewire:displays.product-best-seller :$products />
        </section>
        <section class="flex flex-col gap-[42px] py-[92px] bg-white">
            <div class="max-w-72 mx-auto text-center space-y-4">
                <h2>Kenapa Memilih Quantum?</h2>
                <p class="text-[#6D6D6D]">Inovasi Quantum hadir jadi andalan untuk tiap kebutuhan dapur Anda</p>
            </div>
            <div class="flex flex-col gap-8">
                <div class="px-4">
                    <x-displays.inside-card image="images/hemat-gas-thumbnail.jpg">
                        <h4>Hemat dan Efisien</h4>
                        <p class="small">Teknologi inovatif Quantum membantu mengurangi konsumsi gas, sehingga lebih efisien dan ramah di kantong.</p>
                    </x-displays.inside-card>
                </div>
                <div class="splide why-choose-home" role="group" aria-label="Why Choose Quantum Slides">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <x-displays.swipe-card image="images/why-1.jpg">
                                    <h4>Harga Terjangkau</h4>
                                    <p class="small text-[#9A9A9A]">Kualitas tinggi tidak harus mahal. Produk Quantum hadir dengan harga yang pas untuk semua kalangan.</p>
                                </x-displays.swipe-card>
                            </li>
                            <li class="splide__slide">
                                <x-displays.swipe-card image="images/why-2.jpg">
                                    <h4>Aman Digunakan</h4>
                                    <p class="small text-[#9A9A9A]">Dilengkapi fitur keselamatan canggih yang dirancang khusus untuk melindungi Anda dan keluarga saat memasak.</p>
                                </x-displays.swipe-card>
                            </li>
                            <li class="splide__slide">
                                <x-displays.swipe-card image="images/why-3.jpg">
                                    <h4>Mudah & Praktis</h4>
                                    <p class="small text-[#9A9A9A]">Desain yang mudah digunakan  membuat pengalaman memasak jadi lebih simpel, nyaman, dan tanpa ribet.</p>
                                </x-displays.swipe-card>
                            </li>
                            <li class="splide__slide">
                                <x-displays.swipe-card image="images/why-4.jpg">
                                    <h4>Awet & Tahan Lama</h4>
                                    <p class="small text-[#9A9A9A]">Quantum terus berinovasi untuk selalu menghasilkan produk yang mampu menghemat konsumsi gas hingga 30%.</p>
                                </x-displays.swipe-card>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="relative">
            <img class="w-full object-cover object-top h-[600px]" src="{{ asset('images/testimonial-mobile.jpg') }}" alt="">
            <div class="absolute w-full h-[400px] bottom-0 left-0 bg-gradient-qt-green"></div>
            <div class="absolute flex flex-col gap-[55px] bottom-0 left-0 size-full pt-22">
                <div class="flex justify-center items-center p-6">
                    <button x-data type="button" @click="$store.videoModal.openVideo()" class="flex justify-center items-center size-[60px] bg-white text-[#106B75] rounded-full cursor-pointer">
                        <span class="icon-[ph--play-bold] text-3xl"></span>
                    </button>
                </div>
                <div class="space-y-6">
                    <h2 class="text-white px-6 text-center max-w-xs mx-auto">Kata Mereka tentang Quantum</h2>
                    <div class="splide testimonial-home" role="group" aria-label="Testimonial Home Slides">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach($testimonials as $testimonial)
                                    <li class="splide__slide">
                                        <x-displays.testimonial-card :payload="$testimonial" />
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <ul class="splide__pagination slide-testimonial"></ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="flex flex-col gap-9 py-[76px] bg-[#F4F4F4]">
            <div class="px-4 max-w-52 mx-auto text-center">
                <h3>Artikel Terbaru untuk Dapur Anda</h3>
            </div>
            <div class="flex flex-col gap-9">
                <div class="splide articles-home" role="group" aria-label="Products Home Slides">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach($articles as $article)
                                <li class="splide__slide w-[260px]">
                                    <x-displays.article-card :payload="$article" />
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="flex justify-center items-center px-4">
                    <x-inputs.button type="hyperlink" href="{{ route('updates.news') }}" size="lg" variant="secondary" color="white" class="w-max">
                        Lihat Lebih Banyak
                    </x-inputs.button>
                </div>
            </div>
        </section>
        <section class="relative">
            <img src="{{ asset('images/conversion-mobile.jpg') }}" alt="">
            <div class="absolute w-full top-[50px] px-8">
                <div class="max-w-xs mx-auto space-y-6 text-center text-white">
                    <div class="space-y-4">
                        <h2>Wujudkan Dapur Idaman Mulai dari Quantum</h2>
                        <p>Rasakan performa unggul produk Quantum di dapurmu</p>
                    </div>
                    <x-inputs.button type="hyperlink" href="{{ route('product') }}" size="lg" color="white">
                        Beli Sekarang
                    </x-inputs.button>
                </div>
            </div>
        </section>
    </main>
@endsection
