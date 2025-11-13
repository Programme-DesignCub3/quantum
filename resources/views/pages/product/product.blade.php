@extends('app')

@section('content')
    <main x-data="product" id="product" class="bg-white">
        <section class="relative">
            <img class="w-full h-[560px] object-cover" src="{{ asset('images/product-mobile.jpg') }}" alt="">
            <div class="absolute bottom-0 space-y-4 text-white text-center px-6 pb-[76px]">
                <h1>Kompor Andalan Buat Setiap Kreasi Masakan</h1>
                <p class="large">Andalkan kompor Quantum yang bikin setiap ide masak jadi sempurna</p>
            </div>
        </section>
        <livewire:components.displays.product-list />
        <section class="flex flex-col gap-[42px] py-[92px]">
            <div class="space-y-4 text-center max-w-xs mx-auto">
                <h2>Kenapa Kompor Quantum Jadi Andalan?</h2>
                <p class="text-[#6D6D6D]">Kompor Quantum hadir dengan teknologi andal untuk hasil masakan yang sempurna</p>
            </div>
            <div class="flex flex-col gap-8">
                <div class="px-4">
                    <x-displays.inside-card image="images/superior-1.jpg">
                        <h4>Apinya Stabil dan Merata</h4>
                        <p class="small">Kontrol panas lebih mudah dengan masak pakai kompor Quantum</p>
                    </x-displays.inside-card>
                </div>
                <div class="splide superior-product" role="group" aria-label="Superior Product Slides">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <x-displays.swipe-card image="images/superior-2.jpg">
                                    <h4>Hemat Gas</h4>
                                </x-displays.swipe-card>
                            </li>
                            <li class="splide__slide">
                                <x-displays.swipe-card image="images/superior-3.jpg">
                                    <h4>Desain Modern dan Fungsional</h4>
                                </x-displays.swipe-card>
                            </li>
                            <li class="splide__slide">
                                <x-displays.swipe-card image="images/superior-4.jpg">
                                    <h4>Fitur Aman, Masak Nyaman</h4>
                                </x-displays.swipe-card>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="flex flex-col gap-[42px] pt-9 pb-[92px]">
            <div class="space-y-4 text-center max-w-xs mx-auto">
                <h2>Panduan dan Tutorial</h2>
                <p class="text-[#6D6D6D]">Yuk, cek panduan dan tutorial praktis biar pengalaman masak kamu lebih nyaman</p>
            </div>
            <div class="splide guide-product" role="group" aria-label="Guide and Tutorial Product">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <div class="max-w-60">
                                <x-displays.inside-card image="images/guide-1.jpg">
                                    <h4>Panduan Membersihkan Kompor Gas 1 Tungku</h4>
                                    <x-inputs.button type="button" size="md" color="white">
                                        Selengkapnya
                                    </x-inputs.button>
                                </x-displays.inside-card>
                            </div>
                        </li>
                        <li class="splide__slide">
                            <div class="max-w-60">
                                <x-displays.inside-card image="images/guide-2.jpg">
                                    <h4>Tutorial Memasang Selang Regulator ke Kompor Gas</h4>
                                    <x-inputs.button type="button" size="md" color="white">
                                        Selengkapnya
                                    </x-inputs.button>
                                </x-displays.inside-card>
                            </div>
                        </li>
                        <li class="splide__slide">
                            <div class="max-w-60">
                                <x-displays.inside-card image="images/guide-3.jpg">
                                    <h4>Solusi Cepat Kalau Kompor Gas Susah Menyala</h4>
                                    <x-inputs.button type="button" size="md" color="white">
                                        Selengkapnya
                                    </x-inputs.button>
                                </x-displays.inside-card>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="py-[60px] px-4">
            <h2 class="mb-4">Info Lainnya</h2>
            <div class="flex flex-col gap-4">
                <x-displays.simple-card>
                    <h3>Tips dan Edukasi</h3>
                    <p>Simak Tips dan Edukasi Penting Seputar Produk Quantum</p>
                    <x-slot:icon>
                        <x-icons.tips-idea-icon class="fill-qt-green-normal stroke-qt-green-normal size-8" />
                    </x-slot:icon>
                    <x-slot:button>
                        <div class="flex justify-start">
                            <x-inputs.button type="button" size="lg">
                                Lihat
                            </x-inputs.button>
                        </div>
                    </x-slot:button>
                </x-displays.simple-card>
                <x-displays.simple-card>
                    <h3>Tutorial Video</h3>
                    <p>Simak berbagai video tutorial praktis seputar produk Quantum</p>
                    <x-slot:icon>
                        <x-icons.video-lesson-icon class="fill-qt-green-normal stroke-qt-green-normal size-8" />
                    </x-slot:icon>
                    <x-slot:button>
                        <div class="flex justify-start">
                            <x-inputs.button type="button" size="lg">
                                Lihat
                            </x-inputs.button>
                        </div>
                    </x-slot:button>
                </x-displays.simple-card>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('product', () => ({
            isTop: false,

            init() {
                let yprev;

                document.addEventListener('scroll', () => {
                    let y = window.pageYOffset;
                    this.isTop = y > yprev ? false : true;
                    yprev = y;
                });
            },
        }))
    })
</script>
@endpush
