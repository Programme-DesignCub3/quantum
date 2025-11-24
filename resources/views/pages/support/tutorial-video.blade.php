@extends('app')

@section('content')
    <main x-data class="bg-[#F4F4F4]">
        <section class="flex flex-col gap-[62px] px-4 pt-[116px] pb-6">
            <div class="space-y-4 text-center max-w-xs mx-auto">
                <h1>Tutorial Penggunaan Produk</h1>
                <p class="large">Rasakan performa produk Quantum yang optimal dengan video tutorial resmi.</p>
            </div>
            <div class="flex flex-col gap-8">
                <div class="flex flex-col gap-12">
                    <div class="px-2">
                        <div class="flex gap-0.5 bg-white p-1 rounded-full overflow-x-auto">
                            <button type="button" class="tab active">
                                Semua
                            </button>
                            <button type="button" class="tab">
                                Kompor
                            </button>
                            <button type="button" class="tab">
                                Regulator & Selang Gas
                            </button>
                            <button type="button" class="tab">
                                Suku Cadang
                            </button>
                        </div>
                    </div>
                    <div class="flex flex-col gap-6">
                        @foreach($tutorials as $tutorial)
                            <x-displays.tutorial-video-card :payload="$tutorial" />
                        @endforeach
                    </div>
                </div>
                <div class="flex justify-center">
                    <x-inputs.button type="button" size="lg" color="white">
                        Lebih banyak
                    </x-inputs.button>
                </div>
            </div>
        </section>
    </main>
@endsection
