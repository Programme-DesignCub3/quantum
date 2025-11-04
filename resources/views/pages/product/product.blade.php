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
        <livewire:components.displays.product-list :category="Route::current()->parameters('category')" />
        <section class="flex flex-col gap-[42px] py-[92px]">
            <div class="space-y-4 text-center max-w-xs mx-auto">
                <h2>Kenapa Kompor Quantum Jadi Andalan?</h2>
                <p class="text-[#6D6D6D]">Kompor Quantum hadir dengan teknologi andal untuk hasil masakan yang sempurna</p>
            </div>
            <div class="flex flex-col gap-8">
                <div class="px-4">
                    <div class="relative rounded-3xl overflow-hidden">
                        <img class="w-full h-[300px] object-cover object-top" src="{{ asset('images/superior-1.jpg') }}" alt="">
                        <div class="absolute bottom-0 left-0 w-full h-3/4 flex items-end bg-gradient-black-transparent">
                            <div class="space-y-3 py-6 px-4 text-white">
                                <h4>Apinya Stabil dan Merata</h4>
                                <p class="small">Kontrol panas lebih mudah dengan masak pakai kompor Quantum</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="splide superior-product" role="group" aria-label="Superior Product">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <div class="flex flex-col gap-2 w-60">
                                    <img class="w-60 h-[140px] rounded-2xl object-cover object-center" src="{{ asset('images/superior-2.jpg') }}" alt="">
                                    <div class="p-2 space-y-3">
                                        <h4>Hemat Gas</h4>
                                    </div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="flex flex-col gap-2 w-60">
                                    <img class="w-60 h-[140px] rounded-2xl object-cover object-center" src="{{ asset('images/superior-3.jpg') }}" alt="">
                                    <div class="p-2 space-y-3">
                                        <h4>Desain Modern dan Fungsional</h4>
                                    </div>
                                </div>
                            </li>
                            <li class="splide__slide">
                                <div class="flex flex-col gap-2 w-60">
                                    <img class="w-60 h-[140px] rounded-2xl object-cover object-center" src="{{ asset('images/superior-4.jpg') }}" alt="">
                                    <div class="p-2 space-y-3">
                                        <h4>Fitur Aman, Masak Nyaman</h4>
                                    </div>
                                </div>
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
                            <div class="relative rounded-3xl overflow-hidden max-w-60 h-[300px]">
                                <img class="size-full object-cover object-center" src="{{ asset('images/guide-1.jpg') }}" alt="">
                                <div class="absolute bottom-0 left-0 w-full h-3/4 flex items-end bg-gradient-black-transparent">
                                    <div class="space-y-3 py-6 px-4 text-white">
                                        <h4>Panduan Membersihkan Kompor Gas 1 Tungku</h4>
                                        <x-inputs.button type="button" size="md" color="white">
                                            Selengkapnya
                                        </x-inputs.button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide">
                            <div class="relative rounded-3xl overflow-hidden max-w-60 h-[300px]">
                                <img class="size-full object-cover object-center" src="{{ asset('images/guide-2.jpg') }}" alt="">
                                <div class="absolute bottom-0 left-0 w-full h-3/4 flex items-end bg-gradient-black-transparent">
                                    <div class="space-y-3 py-6 px-4 text-white">
                                        <h4>Tutorial Memasang Selang Regulator ke Kompor Gas</h4>
                                        <x-inputs.button type="button" size="md" color="white">
                                            Selengkapnya
                                        </x-inputs.button>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="splide__slide">
                            <div class="relative rounded-3xl overflow-hidden max-w-60 h-[300px]">
                                <img class="size-full object-cover object-center" src="{{ asset('images/guide-3.jpg') }}" alt="">
                                <div class="absolute bottom-0 left-0 w-full h-3/4 flex items-end bg-gradient-black-transparent">
                                    <div class="space-y-3 py-6 px-4 text-white">
                                        <h4>Solusi Cepat Kalau Kompor Gas Susah Menyala</h4>
                                        <x-inputs.button type="button" size="md" color="white">
                                            Selengkapnya
                                        </x-inputs.button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="py-[60px] px-4">
            <h2 class="mb-4">Info Lainnya</h2>
            <div class="flex flex-col gap-4">
                <div class="flex flex-col gap-4 border border-[#DBDBDB] rounded-3xl py-6 px-4">
                    <div class="flex gap-2.5">
                        <div class="space-y-1">
                            <h3>Tips dan Edukasi</h3>
                            <p>Simak Tips dan Edukasi Penting Seputar Produk Quantum</p>
                        </div>
                        <div class="shrink-0 flex justify-center items-center size-[60px] bg-[#F3F8F9] rounded-2xl">
                            <x-icons.tips-idea-icon class="fill-qt-green-normal stroke-qt-green-normal size-8" />
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <x-inputs.button type="button" size="lg">
                            Lihat
                        </x-inputs.button>
                    </div>
                </div>
                <div class="flex flex-col gap-4 border border-[#DBDBDB] rounded-3xl py-6 px-4">
                    <div class="flex gap-2.5">
                        <div class="space-y-1">
                            <h3>Tutorial Video</h3>
                            <p>Simak berbagai video tutorial praktis seputar produk Quantum</p>
                        </div>
                        <div class="shrink-0 flex justify-center items-center size-[60px] bg-[#F3F8F9] rounded-2xl">
                            <x-icons.video-lesson-icon class="fill-qt-green-normal stroke-qt-green-normal size-8" />
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <x-inputs.button type="button" size="lg">
                            Lihat
                        </x-inputs.button>
                    </div>
                </div>
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
