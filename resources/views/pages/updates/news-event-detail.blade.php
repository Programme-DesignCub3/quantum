@extends('app')

@section('content')
    <main x-data id="news-event-detail" class="bg-[#FFFFFF]">
        <section class="flex flex-col">
            <div class="flex flex-col gap-4 px-6 pt-[60px] pb-8">
                <div class="space-y-2">
                    <h2>5 Cara Hemat Energi dengan Kompor Quantum</h2>
                    <div class="flex gap-4">
                        <span class="inline-block bg-[#E7F1F2] rounded-full px-2.5 py-1">Tips</span>
                        <button type="button" @click="$store.shareDrawer.openDrawer()" class="flex gap-2 items-center text-xs cursor-pointer bg-[#E7F1F2] rounded-full px-2.5 py-1">
                            <span class="icon-[tdesign--share] text-qt-green-normal text-base"></span>
                            Bagikan
                        </button>
                    </div>
                </div>
                <div class="flex gap-2.5">
                    <div class="flex items-center gap-2">
                        <span class="icon-[lucide--calendar] text-base"></span>
                        <span>23 Juli 2025</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="icon-[lucide--clock-4] text-base"></span>
                        <span>Waktu baca 2 menit</span>
                    </div>
                </div>
            </div>
            <div class="aspect-49/30">
                <img class="aspect-49/30 object-cover" src="{{ asset('images/news-1.jpg') }}" alt="">
            </div>
            <div class="flex flex-col gap-12 px-6 pt-[42px] pb-24">
                <div class="flex flex-col gap-9">
                    <p class="large">Menghemat energi di dapur bukan hanya soal menekan biaya bulanan, tapi juga bagian dari gaya hidup cerdas dan ramah lingkungan. Dengan kompor Quantum yang dirancang hemat gas dan berkualitas, kamu bisa semakin mudah mengatur pemakaian energi sehari-hari. Berikut adalah lima cara mudah untuk memaksimalkan kompor Quantum kamu, agar setiap hidangan tidak hanya lezat, tetapi juga hemat energi.</p>
                    <div class="space-y-4">
                        <img class="aspect-49/30 object-cover rounded-xl" src="{{ asset('images/detail-news-1.jpg') }}" alt="">
                        <p class="large"><b>1. Gunakan Api Biru dengan Stabil</b><br> Kompor Quantum sudah dirancang menghasilkan api biru yang merata. Pastikan knob kompor diputar pada tingkat api sesuai kebutuhan masakan. Api terlalu besar hanya akan membuang gas tanpa mempercepat proses masak.</p>
                    </div>
                    <div class="space-y-4">
                        <img class="aspect-49/30 object-cover rounded-xl" src="{{ asset('images/detail-news-2.jpg') }}" alt="">
                        <p class="large"><b>2. Pilih Peralatan Masak yang Tepat</b><br> Wajan atau panci dengan alas rata akan lebih cepat menyerap panas dari tungku kompor. Dengan begitu, energi gas yang dikeluarkan tidak terbuang sia-sia. Kompor Quantum dengan burner efisien akan bekerja maksimal bila dipasangkan dengan peralatan masak yang sesuai.</p>
                    </div>
                    <div class="space-y-4">
                        <img class="aspect-49/30 object-cover rounded-xl" src="{{ asset('images/detail-news-3.jpg') }}" alt="">
                        <p class="large"><b>3. Tutup Panci Saat Memasak</b><br> Salah satu trik hemat energi paling sederhana adalah menutup panci saat memasak. Panas akan lebih terjaga, sehingga masakan matang lebih cepat. Kompor Quantum mendukung cara masak ini dengan distribusi api yang stabil.</p>
                    </div>
                    <div class="space-y-4">
                        <img class="aspect-49/30 object-cover rounded-xl" src="{{ asset('images/detail-news-4.jpg') }}" alt="">
                        <p class="large"><b>4. Rutin Merawat Kompor dan Regulator</b><br> Kompor gas yang kotor atau tersumbat bisa membuat pembakaran tidak sempurna dan boros gas. Pastikan membersihkan tungku, selang, dan regulator gas secara berkala. Selain hemat energi, dapur juga lebih aman dan nyaman.</p>
                    </div>
                    <div class="space-y-4">
                        <img class="aspect-49/30 object-cover rounded-xl" src="{{ asset('images/detail-news-5.jpg') }}" alt="">
                        <p class="large"><b>5. Masak Sekaligus untuk Kebutuhan Harian</b><br> Daripada bolak-balik menyalakan kompor, lebih hemat jika kamu memasak untuk stok harian sekaligus. Dengan kompor Quantum yang tangguh dan api stabil, memasak dalam jumlah banyak tetap praktis dan efisien.</p>
                    </div>
                    <p class="large">Menggunakan Kompor Quantum bukan hanya tentang memasak, tapi juga tentang mengadopsi gaya hidup yang cerdas, efisien, dan berkelas. Setiap langkah kecil yang kamu ambil dalam menghemat energi adalah investasi untuk masa depan yang lebih baik. Jadilah bagian dari perubahan, mulai dari dapurmu sendiri.</p>
                </div>
                <div class="flex flex-col gap-2.5">
                    <div class="flex items-center gap-1">
                        <span class="icon-[lucide--tag] text-base"></span>
                        <span>Tags:</span>
                    </div>
                    <div class="flex flex-wrap gap-1">
                        <span class="inline-block border border-[#DBDBDB] rounded-full text-qt-green-normal bg-white px-2.5 py-1">Tips</span>
                        <span class="inline-block border border-[#DBDBDB] rounded-full text-qt-green-normal bg-white px-2.5 py-1">Info</span>
                        <span class="inline-block border border-[#DBDBDB] rounded-full text-qt-green-normal bg-white px-2.5 py-1">Kompor</span>
                        <span class="inline-block border border-[#DBDBDB] rounded-full text-qt-green-normal bg-white px-2.5 py-1">Hemat</span>
                    </div>
                </div>
            </div>
        </section>
        <section class="flex flex-col gap-8 bg-[#F4F4F4] pt-[46px] pb-[77px]">
            <h3 class="px-6">Lihat juga Rekomendasi Produk</h3>
            <div class="splide recommendation-products-news-event" role="group" aria-label="Recommendation Product Slides">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($recommendationProducts as $item)
                            <li class="splide__slide w-[260px]">
                                <x-displays.product-card direction="row" :payload="$item" />
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
        <section class="flex flex-col gap-8 pt-[77px] pb-[100px]">
            <h3 class="px-6">Lihat Juga Berita atau Event Lainnya</h3>
            <div class="splide other-news-event" role="group" aria-label="Other News Event Slides">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($otherNews as $item)
                            <li class="splide__slide w-[260px]">
                                <x-displays.article-card :border="true" :payload="$item" />
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    </main>
@endsection
