@extends('app')

@section('content')
    <section class="splide slideshow-home relative" id="homepage" role="group" aria-label="Quantum Home Slides">
        <div class="absolute z-10 flex flex-col justify-end size-full">
            <div class="w-full h-1/2 text-white space-y-4 text-center pt-28 px-12">
                <h1>Pilihan Andalan Buat Dapur Impian</h1>
                <p class="large">Wujudkan dapur idaman dengan performa teruji kompor Quantum.</p>
                <x-inputs.button type="button" size="lg" color="white">
                    LAGI CARI APA?
                </x-inputs.button>
            </div>
        </div>
        <div class="splide__track">
            <ul class="splide__list">
                <li class="splide__slide">
                    <img class="brightness-90" src="{{ asset('images/home-mobile.jpg') }}" alt="">
                </li>
                <li class="splide__slide">
                    <img class="brightness-90" src="{{ asset('images/home-mobile.jpg') }}" alt="">
                </li>
                <li class="splide__slide">
                    <img class="brightness-90" src="{{ asset('images/home-mobile.jpg') }}" alt="">
                </li>
            </ul>
        </div>
        <ul class="splide__pagination slide-home"></ul>
    </section>
    <section class="flex flex-col gap-8 py-[60px] bg-[#F4F4F4]">
        <div class="px-4 text-center space-y-4 max-w-[340px] mx-auto">
            <h2>Pilihan Produk Quantum Solusi Efisien Dapur Anda</h2>
            <p class="large text-[#6D6D6D]">Quantum hadirkan kompor, selang, dan regulator gas dengan desain modern dan telah teruji performanya.</p>
        </div>
        <div class="flex flex-col gap-6">
            <div class="flex justify-center items-center px-4">
                <div class="flex gap-0.5 bg-white p-1 rounded-full">
                    <button type="button" class="py-2.5 px-5 font-semibold text-qt-green-hover bg-[#E7F1F2] rounded-full cursor-pointer text-xs">
                        Semua
                    </button>
                    <button type="button" class="py-2.5 px-5 font-semibold text-qt-green-normal rounded-full cursor-pointer text-xs hover:bg-[#E7F1F2] hover:text-qt-green-hover">
                        Best Seller
                    </button>
                </div>
            </div>
            <div class="splide products-home" role="group" aria-label="Products Home Slides">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <x-displays.product-card />
                        </li>
                        <li class="splide__slide">
                            <x-displays.product-card />
                        </li>
                        <li class="splide__slide">
                            <x-displays.product-card />
                        </li>
                        <li class="splide__slide">
                            <x-displays.product-card />
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex justify-center items-center px-4">
                <x-inputs.button type="button" size="lg" variant="secondary" color="white" class="w-max">
                    Lihat Semua Produk
                </x-inputs.button>
            </div>
        </div>
    </section>
    <section class="flex flex-col gap-[42px] py-[60px] bg-white">
        <div class="max-w-72 mx-auto text-center space-y-4">
            <h2>Kenapa Memilih Quantum?</h2>
            <p class="text-[#6D6D6D]">Inovasi Quantum hadir jadi andalan untuk tiap kebutuhan dapur Anda</p>
        </div>
        <div class="flex flex-col gap-8">
            <div class="px-4">
                <div class="relative rounded-3xl overflow-hidden">
                    <img class="w-full h-[300px] object-cover object-top" src="{{ asset('images/hemat-gas-thumbnail.jpg') }}" alt="">
                    <div class="absolute bottom-0 left-0 size-full flex items-end bg-gradient-black-transparent">
                        <div class="space-y-3 py-6 px-4 text-white">
                            <h4>Hemat dan Efisien</h4>
                            <p class="small">Teknologi inovatif Quantum membantu mengurangi konsumsi gas, sehingga lebih efisien dan ramah di kantong.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="splide why-choose-home" role="group" aria-label="Why Choose Quantum Slides">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <div class="flex flex-col gap-2 w-60">
                                <img class="w-60 h-[140px] rounded-2xl" src="{{ asset('images/harga-terjangkau-thumbnail.jpg') }}" alt="">
                                <div class="p-2 space-y-3">
                                    <h4>Harga Terjangkau</h4>
                                    <p class="small text-[#9A9A9A]">Kualitas tinggi tidak harus mahal. Produk Quantum hadir dengan harga yang pas untuk semua kalangan.</p>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide">
                            <div class="flex flex-col gap-2 w-60">
                                <img class="w-60 h-[140px] rounded-2xl" src="{{ asset('images/harga-terjangkau-thumbnail.jpg') }}" alt="">
                                <div class="p-2 space-y-3">
                                    <h4>Harga Terjangkau</h4>
                                    <p class="small text-[#9A9A9A]">Kualitas tinggi tidak harus mahal. Produk Quantum hadir dengan harga yang pas untuk semua kalangan.</p>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide">
                            <div class="flex flex-col gap-2 w-60">
                                <img class="w-60 h-[140px] rounded-2xl" src="{{ asset('images/harga-terjangkau-thumbnail.jpg') }}" alt="">
                                <div class="p-2 space-y-3">
                                    <h4>Harga Terjangkau</h4>
                                    <p class="small text-[#9A9A9A]">Kualitas tinggi tidak harus mahal. Produk Quantum hadir dengan harga yang pas untuk semua kalangan.</p>
                                </div>
                            </div>
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
                <button type="button" class="flex justify-center items-center size-[60px] bg-white text-[#106B75] rounded-full cursor-pointer">
                    <span class="icon-[ph--play-bold] text-3xl"></span>
                </button>
            </div>
            <div class="space-y-6">
                <h2 class="text-white px-6 text-center max-w-xs mx-auto">Kata Mereka tentang Quantum</h2>
                <div class="splide testimonial-home" role="group" aria-label="Testimonial Home Slides">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <x-displays.testimonial-card />
                            </li>
                            <li class="splide__slide">
                                <x-displays.testimonial-card />
                            </li>
                        </ul>
                    </div>
                    <ul class="splide__pagination slide-testimonial"></ul>
                </div>
            </div>
        </div>
    </section>
    <section class="flex flex-col gap-9 py-[60px] bg-[#F4F4F4]">
        <div class="px-4 text-center">
            <h3 class="max-w-48 mx-auto">Artikel Terbaru untuk Dapur Anda</h3>
        </div>
        <div class="flex flex-col gap-9">
            <div class="splide articles-home" role="group" aria-label="Products Home Slides">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <x-displays.article-card />
                        </li>
                        <li class="splide__slide">
                            <x-displays.article-card />
                        </li>
                        <li class="splide__slide">
                            <x-displays.article-card />
                        </li>
                        <li class="splide__slide">
                            <x-displays.article-card />
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex justify-center items-center px-4">
                <x-inputs.button type="button" size="lg" variant="secondary" color="white" class="w-max">
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
                <x-inputs.button type="button" size="lg" color="white">
                    Beli Sekarang
                </x-inputs.button>
            </div>
        </div>
    </section>
@endsection
