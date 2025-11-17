@extends('app')

@section('content')
    <main class="pt-[116px] px-4 bg-white">
        <section class="flex flex-col gap-14">
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
                <button type="button" class="w-max underline underline-offset-2 cursor-pointer">Cara menemukan nomor model?</button>
            </div>
        </section>
    </main>
@endsection
