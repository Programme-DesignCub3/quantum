@extends('app')

@section('meta_title', 'Halaman Tidak Ditemukan')
@section('meta_description', 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', asset('images/og-image.jpg'))

@section('breadcrumbs')
    {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endsection

@section('content')
    <section class="px-4 py-[60px] bg-white">
        <div class="flex flex-col items-center justify-center text-center gap-[42px] py-[62px]">
            <div class="space-y-4">
                <h1 class="max-w-xs mx-auto">Halaman Tidak Ditemukan</h1>
                <p class="large max-w-56 mx-auto">Halaman yang Anda tuju tidak dapat kami temukan. Silakan kembali ke beranda.</p>
            </div>
            <div>
                <x-inputs.button type="hyperlink" href="{{ route('home') }}" size="lg">
                    Kembali ke Beranda
                </x-inputs.button>
            </div>
        </div>
    </section>
@endsection
