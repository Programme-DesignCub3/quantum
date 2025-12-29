@extends('app')

@section('content')
    <main x-data="productDetail" id="product-detail" class="bg-white">
        <section class="flex flex-col gap-8 pt-4 px-4">
            <div class="flex flex-col gap-8">
                <div class="splide main-product-detail" role="group" aria-label="Main Product Detail Slides">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <img class="w-full h-[300px] object-cover" src="{{ asset('images/product-1.jpg') }}" alt="">
                            </li>
                            <li class="splide__slide">
                                <img class="w-full h-[300px] object-cover" src="{{ asset('images/var-product-1.1.jpg') }}" alt="">
                            </li>
                            <li class="splide__slide">
                                <img class="w-full h-[300px] object-cover" src="{{ asset('images/var-product-1.2.jpg') }}" alt="">
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="splide thumbnail-product-detail flex flex-row-reverse justify-between items-center" role="group" aria-label="Thumbnail Product Detail Slides">
                    <div class="splide__arrows thumbnail-arrows">
                        <button type="button" class="splide__arrow splide__arrow--prev">
                            <span class="icon-[lucide--chevron-left] text-3xl"></span>
                        </button>
                        <button type="button" class="splide__arrow splide__arrow--next">
                            <span class="icon-[lucide--chevron-right] text-3xl"></span>
                        </button>
                    </div>
                    <div class="splide__track w-[150px] min-[350px]:w-auto">
                        <ul class="splide__list">
                            <li class="splide__slide">
                                <img class="w-[70] h-[60px] object-cover" src="{{ asset('images/product-1.jpg') }}" alt="">
                            </li>
                            <li class="splide__slide">
                                <img class="w-[70] h-[60px] object-cover" src="{{ asset('images/var-product-1.1.jpg') }}" alt="">
                            </li>
                            <li class="splide__slide">
                                <img class="w-[70] h-[60px] object-cover" src="{{ asset('images/var-product-1.2.jpg') }}" alt="">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-2 pb-8">
                <div class="space-y-0">
                    <p class="large text-[#9A9A9A]">Kompor Gas Quantum</p>
                    <h2 class="text-qt-green-normal">QGC - 101 AB</h2>
                </div>
                <div class="flex flex-col gap-3">
                    <div class="flex items-center gap-1.5">
                        <x-icons.target-icon class="size-3 shrink-0" />
                        <p class="small text-[#868686]">1 Tungku</p>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <span class="icon-[pajamas--power] text-xs shrink-0"></span>
                        <p class="small text-[#868686]">Elektrik</p>
                    </div>
                    <div class="flex items-center gap-1.5">
                        <span class="icon-[el--fire] text-xs shrink-0"></span>
                        <p class="small text-[#868686]">LPG</p>
                    </div>
                </div>
            </div>
            <div x-cloak x-data="{ data: {{ json_encode($dataDrawer) }} }" :class="isVisible ? 'bottom-0' : '-bottom-full'" class="fixed z-40 transition-all duration-300 ease-in-out left-1/2 -translate-x-1/2 flex justify-between items-center bg-white p-4 max-w-[416px] w-full rounded-t-2xl drop-shadow-float-lg">
                <div class="space-y-0">
                    <span>Harga</span>
                    <div class="flex space-x-1">
                        <p>Rp</p>
                        <p class="large">350.000</p>
                    </div>
                </div>
                <x-inputs.button type="button" size="lg" event="$store.productDrawer.openDrawer(data)" class="drop-shadow-float">
                    Beli Sekarang
                </x-inputs.button>
            </div>
        </section>
        <section>
            <div id="tabs-border-anchor" :class="$store.scrollStack.isTop ? 'top-[68px] duration-150 delay-200' : 'top-0 duration-50'" class="sticky z-30 transition-all ease-in-out flex gap-8 w-full overflow-x-auto px-8 bg-[#F4F4F4]">
                <a href="#fitur" class="tab-border active">Fitur</a>
                <a href="#spesifikasi" class="tab-border">Spesifikasi</a>
                <a href="#galeri" class="tab-border">Galeri</a>
                <a href="#bandingkan" class="tab-border">Bandingkan</a>
                <a href="#bantuan" class="tab-border">Bantuan</a>
            </div>
            <div id="fitur" class="scrollspy flex flex-col gap-[42px] py-[60px] px-4 scroll-mt-24">
                <div class="space-y-4 text-center max-w-sm mx-auto">
                    <h2>Apa Keunggulan Kompor Quantum QGC - 101 RB?</h2>
                    <p class="text-[#6D6D6D]">Pilihan tepat untuk dapur Anda, Quantum hadirkan efisiensi dan kepraktisan dalam setiap masakan.</p>
                </div>
                <div class="flex flex-col gap-4">
                    <x-displays.simple-card :simetric="true">
                        <h4>Teknologi Terkini</h4>
                        <p class="small text-[#9A9A9A]">Memastikan proses memasak lebih efisien dan hasil masakan optimal.</p>
                        <x-slot:icon>
                            <x-icons.tech-icon class="fill-qt-green-normal size-8" />
                        </x-slot:icon>
                    </x-displays.simple-card>
                    <x-displays.simple-card :simetric="true">
                        <h4>Desain Elegan & Fungsional</h4>
                        <p class="small text-[#9A9A9A]">Pas untuk dapur modern, hemat ruang, dan mudah ditempatkan di mana saja.</p>
                        <x-slot:icon>
                            <x-icons.elegant-icon class="fill-qt-green-normal size-8" />
                        </x-slot:icon>
                    </x-displays.simple-card>
                    <x-displays.simple-card :simetric="true">
                        <h4>Cepat & Efisien</h4>
                        <p class="small text-[#9A9A9A]">Nikmati kemudahan dalam menyajikan hidangan lezat dengan waktu yang lebih singkat.</p>
                        <x-slot:icon>
                            <x-icons.fast-icon class="fill-qt-green-normal size-8" />
                        </x-slot:icon>
                    </x-displays.simple-card>
                    <x-displays.simple-card :simetric="true">
                        <h4>Kualitas Terjamin</h4>
                        <p class="small text-[#9A9A9A]">Dibuat dengan standar tinggi untuk durabilitas dan keamanan penggunaan sehari-hari.</p>
                        <x-slot:icon>
                            <x-icons.medal-icon class="fill-qt-green-normal size-8" />
                        </x-slot:icon>
                    </x-displays.simple-card>
                </div>
            </div>
            <div class="flex flex-col gap-[42px] border-b border-[#CECECE] py-[92px]">
                <div class="space-y-4 text-center max-w-xs mx-auto px-4">
                    <h2>Fitur Utama Kompor Quantum QGC - 101 AB</h2>
                    <p class="text-[#6D6D6D]">Kompor dengan Kombinasi Sempurna Performa dan Estetika untuk Dapur Anda</p>
                </div>
                <div class="flex flex-col gap-8">
                    <div class="px-4">
                        <x-displays.inside-card image="images/feature-1.jpg">
                            <h4>Brass Burner</h4>
                            <p class="small">Material kuningan pada burner menjamin performa memasak yang konsisten dan daya tahan optimal</p>
                        </x-displays.inside-card>
                    </div>
                    <div class="splide feature-product" role="group" aria-label="Feature Product Slides">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                    <x-displays.swipe-card image="images/feature-2.jpg">
                                        <h4>Deep Drawing Technology</h4>
                                    </x-displays.swipe-card>
                                </li>
                                <li class="splide__slide">
                                    <x-displays.swipe-card image="images/feature-3.jpg">
                                        <h4>Pipa Gas Berdesain Khusus</h4>
                                    </x-displays.swipe-card>
                                </li>
                                <li class="splide__slide">
                                    <x-displays.swipe-card image="images/feature-4.jpg">
                                        <h4>Kenop Kontrol yang Awet</h4>
                                    </x-displays.swipe-card>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="spesifikasi" class="scrollspy border-b border-[#CECECE] py-[60px] px-4 scroll-mt-24">
                <div class="flex flex-col gap-8">
                    <h2>Spesifikasi</h2>
                    <x-displays.accordion type="secondary" title="Dimensi" :open="true">
                        <div class="mt-2">
                            <img class="w-full object-cover object-center" src="{{ asset('images/dimension-image.jpg') }}" alt="">
                        </div>
                    </x-displays.accordion>
                    <x-displays.accordion type="secondary" title="Spesifikasi Detil" :open="true">
                        <div class="mt-8 grid grid-cols-2 gap-4">
                            <x-displays.specs label="Dimensi Produk (PxLxT, mm)">
                                <p>300 x 405 x 122</p>
                            </x-displays.specs>
                            <x-displays.specs label="Jumlah tungku">
                                <p>1 tungku</p>
                            </x-displays.specs>
                            <x-displays.specs label="Asupan Panas">
                                <p>2.48kW*</p>
                            </x-displays.specs>
                            <x-displays.specs label="Efisiensi">
                                <p>67.98%*</p>
                            </x-displays.specs>
                            <x-displays.specs label="Pematik">
                                <p>Elektrik</p>
                            </x-displays.specs>
                            <x-displays.specs label="Burner">
                                <p>Brass ⌀ 80</p>
                            </x-displays.specs>
                            <x-displays.specs label="Berat">
                                <p>2,3 kg</p>
                            </x-displays.specs>
                            <x-displays.specs label="Body">
                                <p>Deep Drawing Powder Cream</p>
                            </x-displays.specs>
                            <x-displays.specs label="Jenis Gas">
                                <p>LPG</p>
                            </x-displays.specs>
                            <x-displays.specs label="Burner">
                                <p>Kuningan</p>
                            </x-displays.specs>
                            <x-displays.specs label="Garansi">
                                <p>1 tahun</p>
                            </x-displays.specs>
                            <x-displays.specs label="Equipment">
                                <p>Control Black Knob</p>
                            </x-displays.specs>
                        </div>
                    </x-displays.accordion>
                </div>
            </div>
            <div id="galeri" class="scrollspy border-b border-[#CECECE] flex flex-col gap-8 py-[60px] px-4 scroll-mt-24">
                <h2>Galeri</h2>
                <div class="flex flex-col gap-4">
                    <div class="relative rounded-2xl overflow-hidden">
                        <img class="w-full h-[420px] object-cover object-center" src="{{ asset('images/gallery-1.jpg') }}" alt="">
                        <div class="absolute top-0 left-0 size-full flex justify-center items-center">
                            <button x-data type="button" @click="$store.videoModal.openVideo()" class="flex justify-center items-center size-[60px] bg-white text-[#106B75] rounded-full cursor-pointer">
                                <span class="icon-[ph--play-bold] text-3xl"></span>
                            </button>
                        </div>
                    </div>
                    <div class="rounded-2xl overflow-hidden">
                        <img class="w-full h-[232px] object-cover object-center" src="{{ asset('images/gallery-2.jpg') }}" alt="">
                    </div>
                    <div class="rounded-2xl overflow-hidden">
                        <img class="w-full h-[232px] object-cover object-center" src="{{ asset('images/gallery-3.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <div id="bandingkan" class="scrollspy flex flex-col gap-8 py-[60px] px-4 scroll-mt-24">
                <h2>Bandingkan</h2>
                <div class="flex flex-col gap-4">
                    <div class="border-b border-[#CECECE] py-3">
                        <h4>Produk</h4>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <x-displays.product-card size="sm" :disableView="true" :disableSpecs="true" :payload="$currentProduct" />
                        <x-displays.product-card size="sm" :disableSpecs="true" :payload="$compareProduct" />
                    </div>
                </div>
                <div class="flex flex-col gap-8">
                    <div class="border-b border-[#CECECE] py-3">
                        <h4>Spesifikasi Detil</h4>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex flex-col gap-4">
                            <x-displays.specs label="Dimensi Produk (PxLxT, mm)">
                                <p>725 x 430 x 150</p>
                            </x-displays.specs>
                            <x-displays.specs label="Jumlah tungku">
                                <p>1 stove</p>
                            </x-displays.specs>
                            <x-displays.specs label="Asupan Panas">
                                <p>2.48kW*</p>
                            </x-displays.specs>
                            <x-displays.specs label="Efisiensi">
                                <p>65.79% / 65.79%*</p>
                            </x-displays.specs>
                            <x-displays.specs label="Pematik">
                                <p>Elektrik</p>
                            </x-displays.specs>
                            <x-displays.specs label="Body">
                                <p>Deep Drawing Powder Cream</p>
                            </x-displays.specs>
                            <x-displays.specs label="Berat">
                                <p>4,7 kg</p>
                            </x-displays.specs>
                            <x-displays.specs label="Jenis Gas">
                                <p>LPG</p>
                            </x-displays.specs>
                            <x-displays.specs label="Garansi">
                                <p>1 tahun</p>
                            </x-displays.specs>
                            <x-displays.specs label="Equipment">
                                <ul class="list-disc ml-5">
                                    <li><p>Ignition Knob</p></li>
                                    <li><p>Plastic Bumber</p></li>
                                    <li><p>Control Cream Knob</p></li>
                                </ul>
                            </x-displays.specs>
                        </div>
                        <div class="flex flex-col gap-4">
                            <x-displays.specs label="Dimensi Produk (PxLxT, mm)">
                                300 x 405 x 122
                            </x-displays.specs>
                            <x-displays.specs label="Jumlah tungku">
                                1 stove
                            </x-displays.specs>
                            <x-displays.specs label="Asupan Panas">
                                2.48kW*
                            </x-displays.specs>
                            <x-displays.specs label="Efisiensi">
                                67.98%*
                            </x-displays.specs>
                            <x-displays.specs label="Pematik">
                                Mekanik
                            </x-displays.specs>
                            <x-displays.specs label="Body">
                                Deep Drawing Powder Cream
                            </x-displays.specs>
                            <x-displays.specs label="Berat">
                                2,3 kg
                            </x-displays.specs>
                            <x-displays.specs label="Jenis Gas">
                                LPG
                            </x-displays.specs>
                            <x-displays.specs label="Garansi">
                                1 tahun
                            </x-displays.specs>
                            <x-displays.specs label="Equipment">
                                Control Black Knob
                            </x-displays.specs>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="flex flex-col gap-8 bg-[#F4F4F4] py-[60px]">
            <h2 class="max-w-60 px-4">Rekomendasi Produk Lainnya</h2>
            <div class="splide recommendation-product" role="group" aria-label="Recommendation Products Slides">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($recommendationProducts as $product)
                            <li class="splide__slide">
                                <x-displays.product-card :payload="$product" />
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
        <section id="bantuan" class="flex flex-col gap-[42px] py-[60px] px-4">
            <div class="flex flex-col gap-4">
                <h2>Panduan</h2>
                <x-displays.guidance-card :payload="$guidance" />
            </div>
            <div class="flex flex-col gap-4">
                <h2>Info Lainnya</h2>
                <div class="flex gap-4">
                    <div class="w-full space-y-4 py-6 px-4 rounded-3xl border border-[#DBDBDB]">
                        <h3>Tips dan Edukasi</h3>
                        <x-inputs.button type="hyperlink" href="{{ route('support.guidance') }}" size="lg" variant="secondary" color="white">
                            Lihat
                        </x-inputs.button>
                    </div>
                    <div class="w-full space-y-4 py-6 px-4 rounded-3xl border border-[#DBDBDB]">
                        <h3>Tutorial Video</h3>
                        <x-inputs.button type="hyperlink" href="{{ route('support.tutorial-video') }}" size="lg" variant="secondary" color="white">
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
        Alpine.data('productDetail', () => ({
            isTop: true,
            isVisible: true,

            init() {
                let yprev;

                document.addEventListener('scroll', () => {
                    let y = window.pageYOffset;
                    this.isTop = y > yprev ? false : true;
                    yprev = y;
                });
                window.onscroll = (ev) => {
                    if ((window.innerHeight + Math.round(window.scrollY)) >= document.body.offsetHeight - 300) {
                        this.isVisible = false
                    } else {
                        this.isVisible = true
                    }
                };
            },
        }));
    });
</script>
@endpush
