@extends('app')

@section('meta_title', $meta_title ?? config('app.name'))
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image ?? asset('images/og-image.png'))

@section('content')
    <main id="customer-service" class="bg-white">
        <section class="flex flex-col gap-10 px-4 pb-[84px] pt-[116px] bg-[#F4F4F4]">
            <div class="text-center space-y-4 max-w-xs mx-auto">
                <h1>Layanan Pelanggan Quantum</h1>
                <p class="large">Dukungan menyeluruh untuk pengalaman Anda bersama Quantum yang optimal.</p>
            </div>
            <div class="grid grid-cols-1 gap-4">
                <div class="flex justify-between gap-4 pl-6 pr-3 py-3 bg-white rounded-2xl">
                    <div class="flex items-center gap-4">
                        <x-icons.service-center-icon class="shrink-0 size-10 fill-qt-green-normal" />
                        <h3>Service Center</h3>
                    </div>
                    <x-inputs.button type="hyperlink" href="{{ route('support.service-center') }}" size="lg">
                        Lihat
                    </x-inputs.button>
                </div>
                <div class="flex justify-between gap-4 pl-6 pr-3 py-3 bg-white rounded-2xl">
                    <div class="flex items-center gap-4">
                        <x-icons.faq-icon class="shrink-0 size-10 fill-qt-green-normal" />
                        <h3>FAQ</h3>
                    </div>
                    <x-inputs.button type="hyperlink" href="{{ route('support.faq') }}" size="lg">
                        Lihat
                    </x-inputs.button>
                </div>
                <div class="flex justify-between gap-4 pl-6 pr-3 py-3 bg-white rounded-2xl">
                    <div class="flex items-center gap-4">
                        <x-icons.guarantee-icon class="shrink-0 size-10 fill-qt-green-normal" />
                        <h3>Informasi Garansi</h3>
                    </div>
                    <x-inputs.button type="hyperlink" href="{{ route('support.guarantee-information') }}" size="lg">
                        Lihat
                    </x-inputs.button>
                </div>
            </div>
        </section>
        <section class="flex flex-col gap-8 pt-10 pb-[68px] bg-[#F4F4F4]">
            <div class="text-center space-y-4 max-w-xs mx-auto px-4">
                <h2>Semua Solusi dalam Satu Layanan</h2>
                <p class="large text-[#6D6D6D]">Dapatkan akses bantuan resmi untuk setiap kebutuhan Anda.</p>
            </div>
            <div class="splide solution-cs" role="group" aria-label="Solution Customer Service Slides">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <x-displays.swipe-card image="images/solution-1.jpg">
                                <h4>Respon Cepat & Tepat</h4>
                                <p class="small text-[#9A9A9A]">Kami siap menjawab pertanyaan dan menyelesaikan masalah terkait produk.</p>
                            </x-displays.swipe-card>
                        </li>
                        <li class="splide__slide">
                            <x-displays.swipe-card image="images/solution-2.jpg">
                                <h4>Dukungan Teknis Resmi</h4>
                                <p class="small text-[#9A9A9A]">Bantuan langsung dari tim ahli untuk memastikan keamanan dan kenyamanan Anda.</p>
                            </x-displays.swipe-card>
                        </li>
                        <li class="splide__slide">
                            <x-displays.swipe-card image="images/solution-3.jpg">
                                <h4>Akses Mudah ke Berbagai Channel</h4>
                                <p class="small text-[#9A9A9A]">Bisa hubungi lewat call center, WhatsApp, email, atau media sosial resmi.</p>
                            </x-displays.swipe-card>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
        <section class="flex flex-col gap-[42px] py-[92px]">
            <div class="space-y-4 text-center max-w-xs mx-auto px-4">
                <h2>Edukasi dan Panduan</h2>
                <p class="text-[#6D6D6D]">Temukan panduan penggunaan produk Quantum Anda di sini.</p>
            </div>
            <div class="splide education-cs" role="group" aria-label="Guide Customer Service Slides">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <x-displays.swipe-card image="images/edu-cs-1.jpg">
                                <div class="flex items-center gap-2">
                                    <h4>Kompor 1 tungku QGC-101 AB</h4>
                                    <x-inputs.button-icon type="hyperlink" icon="icon-[material-symbols--download-rounded]" size="md" class="size-14 rounded-2xl!" />
                                </div>
                            </x-displays.swipe-card>
                        </li>
                        <li class="splide__slide">
                            <x-displays.swipe-card image="images/edu-cs-2.jpg">
                                <div class="flex items-center gap-2">
                                    <h4>Kompor 1 tungku QGC-101 AB</h4>
                                    <x-inputs.button-icon type="hyperlink" icon="icon-[material-symbols--download-rounded]" size="md" class="size-14 rounded-2xl!" />
                                </div>
                            </x-displays.swipe-card>
                        </li>
                        <li class="splide__slide">
                            <x-displays.swipe-card image="images/edu-cs-3.jpg">
                                <div class="flex items-center gap-2">
                                    <h4>Kompor 1 tungku tipe RB</h4>
                                    <x-inputs.button-icon type="hyperlink" icon="icon-[material-symbols--download-rounded]" size="md" class="size-14 rounded-2xl!" />
                                </div>
                            </x-displays.swipe-card>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex justify-center items-center px-4">
                <x-inputs.button type="hyperlink" href="{{ route('support.guidance') }}" size="lg">
                    Lebih banyak
                </x-inputs.button>
            </div>
        </section>
        <section class="flex flex-col gap-[42px] pt-6 pb-[92px]">
            <div class="space-y-4 text-center max-w-sm mx-auto px-4">
                <h2>Tutorial Penggunaan Produk</h2>
                <p class="text-[#6D6D6D]">Semua yang perlu Anda tahu dalam penggunaan produk Quantum.</p>
            </div>
            <div class="splide guide-cs" role="group" aria-label="Guide Customer Service Slides">
                <div class="splide__track">
                    <ul class="splide__list">
                        <li class="splide__slide">
                            <x-displays.swipe-card image="images/guide-cs-1.jpg" video="videos/guide-cs-1.mp4">
                                <h4>Cara Memasang Kompor Gas 1 Tungku</h4>
                            </x-displays.swipe-card>
                        </li>
                        <li class="splide__slide">
                            <x-displays.swipe-card image="images/guide-cs-2.jpg" video="videos/guide-cs-1.mp4">
                                <h4>Tips Aman Penggantian Tabung Gas</h4>
                            </x-displays.swipe-card>
                        </li>
                        <li class="splide__slide">
                            <x-displays.swipe-card image="images/guide-cs-3.jpg" video="videos/guide-cs-1.mp4">
                                <h4>Cara Memasang Regulator Gas yang Benar</h4>
                            </x-displays.swipe-card>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex justify-center items-center px-4">
                <x-inputs.button type="hyperlink" href="{{ route('support.tutorial-video') }}" size="lg">
                    Lebih banyak
                </x-inputs.button>
            </div>
        </section>
    </main>
@endsection
