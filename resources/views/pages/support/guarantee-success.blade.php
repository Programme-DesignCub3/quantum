@extends('app')

@section('meta_title', $meta_title ?? 'Informasi Garansi')
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image)

@section('breadcrumbs')
    {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endsection

@section('content')
    <main class="bg-white">
        <div class="flex flex-col gap-8 px-6 pt-[116px] pb-[66px]">
            <div class="max-w-xs mx-auto space-y-4 text-center">
                <h1>Registrasi Selesai! Garansi dalam Proses Aktivasi</h1>
                <p class="large">Kami sedang memproses aktivasi garansi perlindungan produk Quantum Anda.</p>
            </div>
            <div class="flex flex-col gap-2 justify-center items-center">
                <x-inputs.button type="hyperlink" href="{{ route('support.contact') }}" size="lg">
                    Hubungi Kami
                </x-inputs.button>
                <x-inputs.button type="hyperlink" href="{{ route('support.guidance') }}" size="lg" color="white">
                    Edukasi Produk
                </x-inputs.button>
            </div>
        </div>
        <div class="px-6">
            <div class="w-full h-px bg-black/10"></div>
        </div>
        <div class="pt-12 pb-[100px] px-6 space-y-4">
            <h4>Informasi Lanjutan</h4>
            <ul class="list-disc ml-5">
                <li>Aktivasi garansi berlaku dalam 1x24 jam setelah registrasi.</li>
                <li>Simpan struk pembelian & kartu garansi untuk klaim.</li>
            </ul>
        </div>
    </main>
@endsection
