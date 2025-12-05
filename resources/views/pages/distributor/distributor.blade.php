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
                <div class="bg-white rounded-[20px]">
                    <livewire:forms.distributor-submission-form />
                </div>
            </div>
        </section>
        <section class="flex flex-col gap-[42px] px-4 pt-[58px] pb-[52px]">
            <div class="flex flex-col gap-[52px]">
                <div class="flex flex-col gap-[26px]">
                    <div class="max-w-sm mx-auto space-y-4 text-center">
                        <h2>Headline Lokasi Distributor</h2>
                        <p class="large">Body text lorem ipsum dolor sit amet lorem ipsum dolores sit amet</p>
                    </div>
                    <div class="flex flex-col gap-8">
                        <button type="button" class="flex justify-between items-center w-full p-3 rounded-xl border text-sm border-[#E9E9E9] text-[#6D6D6D]/60 outline-none cursor-pointer focus:border-[#6D6D6D]">
                            Pilih Provinsi
                            <span class="icon-[lucide--chevron-down] text-xl text-[#6D6D6D]"></span>
                        </button>
                        <div class="rounded-2xl overflow-hidden">
                            <iframe class="aspect-17/21 size-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.9738101235635!2d106.80351287321153!3d-6.227937672823461!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1a04d5ff145%3A0xcbae36e958f80d6a!2sOffice%208%20%40%20Senopati!5e0!3m2!1sid!2sid!4v1764743736932!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-1 gap-4">
                    @foreach ($distributors as $distributor)
                        <x-displays.place-card :payload="$distributor" />
                    @endforeach
                </div>
            </div>
            <div class="flex justify-center">
                <x-inputs.button type="button" size="lg" color="white" variant="secondary">
                    Lebih banyak
                </x-inputs.button>
            </div>
        </section>
    </main>
@endsection
