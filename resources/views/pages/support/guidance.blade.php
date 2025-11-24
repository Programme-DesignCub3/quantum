@extends('app')

@section('content')
    <main x-data class="bg-white">
        <section class="flex flex-col gap-8 px-4 py-[116px]">
            <div class="flex flex-col gap-14">
                <div class="space-y-4 text-center max-w-sm mx-auto">
                    <h1>Edukasi & Panduan Produk Quantum</h1>
                    <p class="large">Temukan tips terbaik memakai produk Quantum untuk pengalaman memasak yang lebih efisien</p>
                </div>
                <div class="flex flex-col gap-4 justify-center items-center">
                    <p class="large">Cari Tahu Disini</p>
                    <div class="relative w-full">
                        <input type="text" placeholder="Ketik nama produk" class="w-full bg-[#F4F4F4] rounded-3xl text-lg outline-none font-medium pl-16 pr-8 py-[18px] placeholder:font-medium placeholder:text-[#868686]">
                        <span class="icon-[iconamoon--search] absolute top-1/2 -translate-y-1/2 left-4 text-[30px] text-qt-green-normal"></span>
                    </div>
                    <button type="button" @click="$store.numberModelDrawer.openDrawer()" class="w-max underline underline-offset-2 cursor-pointer">Cara menemukan nomor model?</button>
                    <x-displays.drawer store="numberModelDrawer">
                        <div class="flex flex-col gap-4 px-4">
                            <h3>Temukan nomor model produk saya</h3>
                            <div x-show="$store.numberModelDrawer.isMenuOpen" class="flex flex-col gap-4">
                                <h6>Kategori Produk</h6>
                                <div class="flex gap-4">
                                    <button type="button" @click="$store.numberModelDrawer.openMenu('stove')" class="group flex flex-col items-center gap-1 border border-[#E9E9E9] rounded-2xl transition-all duration-300 ease-in-out cursor-pointer w-full p-3 hover:bg-qt-green-normal hover:border-qt-green-normal">
                                        <x-icons.stove-icon class="transition-all duration-300 ease-in-out fill-qt-green-normal stroke-qt-green-normal size-10 group-hover:stroke-white group-hover:fill-white" />
                                        <span class="transition-all duration-300 ease-in-out font-semibold text-xs group-hover:text-white">Kompor</span>
                                    </button>
                                    <button type="button" @click="$store.numberModelDrawer.openMenu('regulator')" class="group flex flex-col items-center gap-1 border border-[#E9E9E9] rounded-2xl transition-all duration-300 ease-in-out cursor-pointer w-full p-3 hover:bg-qt-green-normal hover:border-qt-green-normal">
                                        <x-icons.regulator-icon class="transition-all duration-300 ease-in-out fill-qt-green-normal stroke-qt-green-normal size-10 group-hover:stroke-white group-hover:fill-white" />
                                        <span class="transition-all duration-300 ease-in-out font-semibold text-xs group-hover:text-white">Regulator & Selang Gas</span>
                                    </button>
                                    <button type="button" @click="$store.numberModelDrawer.openMenu('sparepart')" class="group flex flex-col items-center gap-1 border border-[#E9E9E9] rounded-2xl transition-all duration-300 ease-in-out cursor-pointer w-full p-3 hover:bg-qt-green-normal hover:border-qt-green-normal">
                                        <x-icons.target-icon class="transition-all duration-300 ease-in-out fill-qt-green-normal stroke-qt-green-normal p-1 size-10 group-hover:stroke-white group-hover:fill-white" />
                                        <span class="transition-all duration-300 ease-in-out font-semibold text-xs group-hover:text-white">Suku Cadang</span>
                                    </button>
                                </div>
                            </div>
                            <div x-show="$store.numberModelDrawer.currentMenu === 'stove'" class="flex flex-col gap-4">
                                <div class="flex justify-between items-center">
                                    <h6>Kompor</h6>
                                    <x-inputs.button type="button" size="sm" event="$store.numberModelDrawer.closeMenu()">
                                        Kembali
                                    </x-inputs.button>
                                </div>
                                <div class="flex justify-center items-center">
                                    <img src="{{ asset('images/stove-barcode.jpg') }}" alt="">
                                </div>
                                <div class="space-y-1">
                                    <h6>Lokasi barcode dan nomor model</h6>
                                    <p class="small">Temukan barcode dan nomor model di sisi kanan kompor atau di sisi kiri.</p>
                                </div>
                            </div>
                            <div x-show="$store.numberModelDrawer.currentMenu === 'regulator'" class="flex flex-col gap-4">
                                <div class="flex justify-between items-center">
                                    <h6>Regulator & Selang Gas</h6>
                                    <x-inputs.button type="button" size="sm" event="$store.numberModelDrawer.closeMenu()">
                                        Kembali
                                    </x-inputs.button>
                                </div>
                                <div class="flex justify-center items-center">
                                    <img src="{{ asset('images/stove-barcode.jpg') }}" alt="">
                                </div>
                                <div class="space-y-1">
                                    <h6>Lokasi barcode dan nomor model</h6>
                                    <p class="small">Temukan barcode dan nomor model di sisi kanan kompor atau di sisi kiri.</p>
                                </div>
                            </div>
                            <div x-show="$store.numberModelDrawer.currentMenu === 'sparepart'" class="flex flex-col gap-4">
                                <div class="flex justify-between items-center">
                                    <h6>Suku Cadang</h6>
                                    <x-inputs.button type="button" size="sm" event="$store.numberModelDrawer.closeMenu()">
                                        Kembali
                                    </x-inputs.button>
                                </div>
                                <div class="flex justify-center items-center">
                                    <img src="{{ asset('images/stove-barcode.jpg') }}" alt="">
                                </div>
                                <div class="space-y-1">
                                    <h6>Lokasi barcode dan nomor model</h6>
                                    <p class="small">Temukan barcode dan nomor model di sisi kanan kompor atau di sisi kiri.</p>
                                </div>
                            </div>
                        </div>
                    </x-displays.drawer>
                </div>
            </div>
            <div class="flex flex-col gap-4">
                @foreach($guidances as $guidance)
                    <x-displays.guidance-card :payload="$guidance" />
                @endforeach
            </div>
        </section>
        <section class="flex flex-col gap-8 pt-[76px] pb-[100px] px-4 bg-[#F5F5F5]">
            <div class="flex flex-col gap-12">
                <div class="space-y-4 text-center max-w-sm mx-auto">
                    <h2>Jelajahi Dunia Quantum: Edukasi & Panduan Produk</h2>
                    <p>Temukan tips seputar produk Quantum untuk pengalaman memasak lebih efisien</p>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col gap-3">
                        <div class="rounded-3xl overflow-hidden">
                            <img class="aspect-17/10 object-cover" src="{{ asset('images/guidance-1.jpg') }}" alt="">
                        </div>
                        <div class="space-y-1 p-3">
                            <span class="block text-qt-green-normal">Kompor</span>
                            <h4>Ini Dia Cara yang Benar Membersihkan Kompor 1 Tungku QGC - 101 AB</h4>
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <x-inputs.button type="hyperlink" href="{{ route('support.guidance.detail', 'ini-dia-cara-yang-benar-membersihkan-kompor-1-tungku-qgc-101-ab') }}" color="white">
                            Selengkapnya
                        </x-inputs.button>
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    @foreach($guidanceArticles as $article)
                        <x-displays.guidance-article-card :payload="$article" />
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
