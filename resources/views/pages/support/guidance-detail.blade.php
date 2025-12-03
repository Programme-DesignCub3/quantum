@extends('app')

@section('content')
    <main id="guidance-detail" class="bg-white">
        <section class="flex flex-col">
            <div class="px-6 pt-[60px] pb-8">
                <h2>5 Cara Hemat Energi dengan Kompor Quantum</h2>
            </div>
            <div class="relative">
                <img class="aspect-49/30 object-cover" src="{{ asset('images/guidance-1.jpg') }}" alt="">
            </div>
            <div class="px-6 pt-[42px] pb-9">
                <p class="large">Siapa bilang dapur mungil nggak bisa tampil bersih maksimal? Kompor satu tungku Quantum QGC - 101 RB adalah penyelamat bagi dapur berukuran terbatas. Tapi, seperti perangkat dapur lainnya, kompor juga butuh perawatan ekstra supaya awet dan kinclong terus. Nah, buat kamu pengguna kompor satu tungku ini, yuk simak panduan lengkap membersihkannya di artikel ini!</p>
            </div>
            <div class="flex flex-col gap-6 py-8 bg-[#F4F4F4]">
                <h4 class="px-6">Ikuti step di bawah ini</h4>
                <div class="splide guidance-step" role="group" aria-label="Guidance Steps Slides">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach($steps as $step)
                                <li class="splide__slide">
                                    <x-displays.guidance-step-card :payload="$step" />
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="px-6 pt-[42px] pb-20">
                <p class="large">Dengan rutin membersihkan kompor QGC - 101 RB menggunakan cara yang benar, bukan cuma tampilan dapur jadi lebih rapi, tapi juga performa kompor tetap prima dan tahan lama. Selamat mencoba, dan semoga dapurmu selalu bersih berkilau!</p>
            </div>
        </section>
        <section class="flex flex-col gap-8 bg-[#F4F4F4] pt-[46px] pb-[77px]">
            <h3 class="px-6">Lihat Juga Tips dan Edukasi Lainnya</h3>
            <div class="splide other-guidance" role="group" aria-label="Other Guidance Slides">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($otherGuidance as $item)
                            <li class="splide__slide w-[260px]">
                                <x-displays.article-card for="guidance" :payload="$item" />
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </section>
    </main>
@endsection
