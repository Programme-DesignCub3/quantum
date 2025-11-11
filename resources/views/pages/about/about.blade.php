@extends('app')

@section('content')
    <main x-data="about" id="about" class="bg-white">
        <section class="relative">
            <img class="w-full h-[560px] object-cover object-top" src="{{ asset('images/about-mobile.jpg') }}" alt="">
            <div class="absolute bottom-0 space-y-4 text-white text-center px-6 pb-[76px]">
                <h1>Tentang Quantum: Visi, Misi, dan Dedikasi Kami</h1>
                <p class="large">Quantum telah menjadi pilihan utama jutaan keluarga di Indonesia dalam menghadirkan kompor dan peralatan dapur berkualitas tinggi.</p>
            </div>
        </section>
        <section>
            <div :class="isTop ? 'top-[88px] border-y duration-300 delay-150' : 'top-0 border-b duration-100'" class="sticky z-40 px-5 py-3.5 transition-all ease-in-out bg-white border-y border-[#DBDBDB] overflow-auto">
                <div class="flex justify-between gap-0.5 w-max min-[420px]:w-full">
                    <a href="#sejarah" class="tab active">
                        Sejarah
                    </a>
                    <a href="#visi-misi" class="tab">
                        Visi & Misi
                    </a>
                    <a href="#award" class="tab">
                        Award
                    </a>
                    <a href="#marketplace" class="tab">
                        Marketplace
                    </a>
                </div>
            </div>
            <div id="sejarah" class="space-y-4 text-center scroll-mt-20 px-6 pt-[76px] pb-12">
                <h2 class="max-w-xs mx-auto">Inovasi Tiada Henti Quantum untuk Setiap Generasi</h2>
                <div class="space-y-4 text-[#6D6D6D]">
                    <p>Sejak 1993, Quantum telah berdedikasi menjadi produsen peralatan dapur terkemuka dan terpercaya di Indonesia. Kami bangga menghadirkan kompor, selang dan regulator gas 100% buatan Indonesia yang telah menjadi pilihan jutaan keluarga.</p>
                    <p>Komitmen kami terhadap inovasi tak pernah pudar. Kami terus mengembangkan produk unggulan, seperti kompor gas yang mampu menghemat energi, dirancang dengan daya tahan tinggi dan kualitas terbaik. Penghargaan atas inovasi teknologi yang kami kembangkan adalah bukti nyata dedikasi untuk terus menyediakan produk berkualitas terbaik yang aman dan efisien untuk setiap dapur keluarga Indonesia.</p>
                </div>
            </div>
            <div>
                <img src="{{ asset('images/bg-about.jpg') }}" alt="">
            </div>
            <div class="flex flex-col gap-8 px-4 py-[92px] bg-[#F4F4F4]">
                <div class="space-y-4 text-center max-w-xs mx-auto">
                    <h2>Jejak Dedikasi Quantum dalam Berinovasi</h2>
                    <p class="text-[#6D6D6D]">Inilah jejak Quantum mengukir inovasi dan prestasi dari masa ke masa.</p>
                </div>
                <div class="flex flex-col gap-6">
                    <div class="flex justify-center items-center px-4">
                        <div class="flex gap-0.5 bg-white p-1 rounded-full">
                            <button type="button" class="py-2.5 px-5 font-semibold text-qt-green-hover bg-[#E7F1F2] rounded-full cursor-pointer text-xs">
                                1993
                            </button>
                            <button type="button" class="py-2.5 px-5 font-semibold text-qt-green-normal rounded-full cursor-pointer text-xs hover:bg-[#E7F1F2] hover:text-qt-green-hover">
                                2000
                            </button>
                            <button type="button" class="py-2.5 px-5 font-semibold text-qt-green-normal rounded-full cursor-pointer text-xs hover:bg-[#E7F1F2] hover:text-qt-green-hover">
                                2015
                            </button>
                            <button type="button" class="py-2.5 px-5 font-semibold text-qt-green-normal rounded-full cursor-pointer text-xs hover:bg-[#E7F1F2] hover:text-qt-green-hover">
                                2025
                            </button>
                        </div>
                    </div>
                    <x-displays.inside-card image="images/history-1.jpg">
                        <h4>Awal Berdiri</h4>
                        <p class="small">Awal berdirinya Quantum sebagai perusahaan kompor Indonesia</p>
                    </x-displays.inside-card>
                </div>
            </div>
            <div id="visi-misi" class="text-center scroll-mt-20 px-4 py-8">
                <div class="space-y-4 py-[60px]">
                    <h2 class="max-w-56 mx-auto">Visi & Misi Quantum Indonesia</h2>
                    <p class="max-w-sm mx-auto text-[#6D6D6D]">Inilah komitmen Quantum hadirkan produk dengan presisi dan kualitas teruji untuk negeri</p>
                </div>
            </div>
            <div class="relative">
                <img class="w-full h-[600px] object-cover min-[450px]:h-[700px]" src="{{ asset('images/visi.jpg') }}" alt="">
                <div class="absolute top-0 px-6 pt-[66px] text-center">
                    <div class="space-y-4">
                        <h2>Visi</h2>
                        <p>Bisnis yang berkelanjutan dan menjadi brand yang diandalkan oleh masyarakat</p>
                    </div>
                </div>
            </div>
            <div class="relative">
                <img class="w-full h-[600px] object-cover min-[450px]:h-[700px]" src="{{ asset('images/misi.jpg') }}" alt="">
                <div class="absolute top-0 px-6 pt-[66px] text-center">
                    <div class="space-y-4">
                        <h2>Misi</h2>
                        <p>Memenuhi kebutuhan peralatan rumah tangga dengan cara melakukan inovasi yang berkesinambungan untuk menghasilkan peralatan rumah tangga yang semakin aman, efisien dan ramah lingkungan</p>
                    </div>
                </div>
            </div>
            <div id="award" class="flex flex-col gap-8 scroll-mt-20 py-[92px] bg-[#F4F4F4]">
                <div class="space-y-4 text-center max-w-xs mx-auto">
                    <h2>Penghargaan</h2>
                    <p class="text-[#6D6D6D]">Telah dipercaya jutaan masyarakat, Quantum raih berbagai penghargaan dalam menghadirkan produk dengan kualitas unggul.</p>
                </div>
                <div class="flex flex-col gap-6">
                    <div class="flex justify-center items-center px-4">
                        <div class="flex gap-0.5 bg-white p-1 rounded-full">
                            <button type="button" class="py-2.5 px-5 font-semibold text-qt-green-hover bg-[#E7F1F2] rounded-full cursor-pointer text-xs">
                                2017
                            </button>
                            <button type="button" class="py-2.5 px-5 font-semibold text-qt-green-normal rounded-full cursor-pointer text-xs hover:bg-[#E7F1F2] hover:text-qt-green-hover">
                                2016
                            </button>
                            <button type="button" class="py-2.5 px-5 font-semibold text-qt-green-normal rounded-full cursor-pointer text-xs hover:bg-[#E7F1F2] hover:text-qt-green-hover">
                                2015
                            </button>
                        </div>
                    </div>
                    <div class="splide award-about" role="group" aria-label="Awards About Slides">
                        <div class="splide__track">
                            <ul class="splide__list">
                                @foreach($awards as $award)
                                    <li class="splide__slide">
                                        <x-displays.swipe-card image="{{ $award['image'] }}">
                                            <h4>{{ $award['name'] }}</h4>
                                            @if(isset($award['description']))
                                                <span class="block small text-[#9a9a9a]">{{ $award['description'] }}</span>
                                            @endif
                                        </x-displays.swipe-card>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div id="marketplace" class="py-14 px-4 scroll-mt-24">
                <div class="space-y-4 text-center max-w-xs mx-auto">
                    <h2>Dapatkan Promo Spesial di Official Store Quantum</h2>
                    <p class="text-[#6D6D6D]">Temukan produk terbaik Quantum di toko online resmi kami dan nikmati penawaran eksklusifnya</p>
                </div>
                <div class="flex flex-col gap-6">
                    <div class="grid grid-cols-2 gap-4">
                        <div class="mx-auto px-5 py-8">
                            <img src="{{ asset('images/shopee-text.png') }}" alt="">
                        </div>
                        <div class="mx-auto px-5 py-8">
                            <img src="{{ asset('images/tokopedia-text.png') }}" alt="">
                        </div>
                        <div class="mx-auto px-5 py-8">
                            <img src="{{ asset('images/blibli-text.png') }}" alt="">
                        </div>
                        <div class="mx-auto px-5 py-8">
                            <img src="{{ asset('images/lazada-text.png') }}" alt="">
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <x-inputs.button type="button" size="lg">
                            Beli Sekarang
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
        Alpine.data('about', () => ({
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
