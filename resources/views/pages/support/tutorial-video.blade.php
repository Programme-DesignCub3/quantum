@extends('app')

@section('meta_title', $meta_title ?? 'Tutorial Video')
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image ?? asset('images/og-image.png'))

@section('content')
    <main x-data class="bg-[#F4F4F4]">
        <section class="flex flex-col gap-[62px] px-4 pt-[116px] pb-6">
            <div class="space-y-4 text-center max-w-xs mx-auto">
                <h1>Tutorial Penggunaan Produk</h1>
                <p class="large">Rasakan performa produk Quantum yang optimal dengan video tutorial resmi.</p>
            </div>
            <livewire:displays.tutorial-list />
        </section>
    </main>
@endsection
