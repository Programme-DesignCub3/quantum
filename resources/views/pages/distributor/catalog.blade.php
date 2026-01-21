@extends('app')

@section('meta_title', $meta_title ?? 'Katalog')
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image)

@section('content')
    <main x-data class="bg-[#F4F4F4]">
        <section class="flex flex-col gap-[62px] pt-[116px] pb-6">
            <div class="space-y-4 max-w-sm mx-auto text-center px-4">
                <h1>Temukan Produk Quantum Andalanmu</h1>
                <p class="large">Dapatkan informasi detail setiap produk untuk kebutuhan dapur Anda.</p>
            </div>
            <div class="flex flex-col gap-8 px-4">
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
                                Sparepart
                            </button>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4">
                        @foreach($catalogs as $catalog)
                            <x-displays.catalog-card :payload="$catalog" />
                        @endforeach
                    </div>
                    <x-displays.drawer store="brochureCatalogDrawer">
                        <livewire:forms.brochure-catalog-form />
                    </x-displays.drawer>
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
