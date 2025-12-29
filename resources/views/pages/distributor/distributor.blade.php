@extends('app')

@section('content')
    <main class="bg-white">
        <section class="bg-[#F4F4F4]">
            <div class="max-w-sm mx-auto text-center space-y-4 px-6 pt-[68px] pb-4">
                <h1>Raih Peluang Bisnis Bersama Quantum</h1>
                <p class="large text-[#6D6D6D]">Quantum telah menjadi brand terpercaya di Indonesia dalam menghadirkan produk kebutuhan dapur andalan. Saatnya raih keuntungan usaha melalui kemitraan Quantum.</p>
            </div>
            <div class="relative">
                <img src="{{ asset('images/distributor-image.jpg') }}" alt="">
            </div>
            <div class="flex flex-col gap-20 py-20 px-4">
                <div class="flex flex-col gap-12">
                    <div class="space-y-4">
                        <h2>Headline Benefit jadi di stributor</h2>
                        <p>Body text lorem ipsum dolor sit amet lorem ipsum dolores sit amet</p>
                    </div>
                    <div class="grid grid-cols-1">
                        @for ($i = 1; $i <= 5; $i++)
                            <div class="space-y-4">
                                <h4>Headline benefit {{ $i }}</h4>
                                <p>Deskripsi singkat lorem ipsum dolor sit amet Info lorem ipsum dolor sit amet Info lorem ipsum dolor</p>
                            </div>
                            @if ($i < 5)
                                <div class="w-full h-px bg-black/10 my-4"></div>
                            @endif
                        @endfor
                    </div>
                </div>
                <livewire:forms.distributor-form />
            </div>
        </section>
        <livewire:displays.distributor-location />
    </main>
@endsection
