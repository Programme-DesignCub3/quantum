@extends('app')

@section('content')
    <main x-data="product" class="bg-white">
        <section class="relative">
            <img class="w-full h-[560px] object-cover" src="{{ asset('images/product-mobile.jpg') }}" alt="">
            <div class="absolute bottom-0 space-y-4 text-white text-center px-6 pb-[76px]">
                <h1>Kompor Andalan Buat Setiap Kreasi Masakan</h1>
                <p class="large">Andalkan kompor Quantum yang bikin setiap ide masak jadi sempurna</p>
            </div>
        </section>
        <section>
            <div :class="isTop ? 'top-[88px] duration-300 delay-130' : 'top-0 duration-100'" class="sticky z-40 flex flex-col transition-all ease-in-out">
                <div class="flex justify-evenly gap-2 p-2 bg-[#106B75]">
                    <a href="{{ route('product') }}" class="flex flex-col gap-3 justify-start items-center bg-[#0B474D] rounded-2xl text-white w-[90px] text-center cursor-pointer px-2 py-2.5">
                        <span class="icon-[mingcute--grid-line] text-[28px]"></span>
                        <span class="font-semibold leading-[133%]">Semua</span>
                    </a>
                    <a href="{{ route('product.category', 'kompor') }}" class="flex flex-col gap-3 justify-start items-center rounded-2xl text-white w-[90px] text-center cursor-pointer px-2 py-2.5">
                        <x-icons.stove-icon class="fill-white stroke-white" />
                        <span class="font-semibold leading-[133%]">Kompor</span>
                    </a>
                    <a href="{{ route('product.category', 'regulator-dan-selang-gas') }}" class="flex flex-col gap-3 justify-start items-center rounded-2xl text-white w-[90px] text-center cursor-pointer px-2 py-2.5">
                        <x-icons.regulator-icon class="fill-white stroke-white" />
                        <span class="font-semibold leading-[133%]">Regulator & Selang Gas</span>
                    </a>
                    <a href="{{ route('product.category', 'suku-cadang') }}" class="flex flex-col gap-3 justify-start items-center rounded-2xl text-white w-[90px] text-center cursor-pointer px-2 py-2.5">
                        <x-icons.target-icon class="fill-white stroke-white" />
                        <span class="font-semibold leading-[133%]">Suku Cadang</span>
                    </a>
                </div>
                <div class="flex flex-col bg-white">
                    <div class="flex gap-2 py-2 px-4">
                        <button type="button" class="flex justify-center items-center size-9 cursor-pointer">
                            <span class="icon-[mage--filter] text-2xl"></span>
                        </button>
                        <div class="flex gap-2 w-full">
                            <button type="button" class="font-semibold text-xs py-2.5 px-5 rounded-full border border-[#E9E9E9] flex-auto cursor-pointer">
                                Jenis
                            </button>
                            <button type="button" class="font-semibold text-xs py-2.5 px-5 rounded-full border border-[#E9E9E9] flex-auto cursor-pointer">
                                Tipe Kategori
                            </button>
                            <button type="button" class="font-semibold text-xs py-2.5 px-5 rounded-full border border-[#E9E9E9] flex-auto cursor-pointer">
                                Harga
                            </button>
                        </div>
                    </div>
                    <div class="flex justify-between py-2 px-4">
                        <button type="button" class="w-[170px] flex justify-between items-center rounded-xl p-3 border border-[#E9E9E9]">
                            <p class="text-[#6D6D6D]">Terbaru</p>
                            <span class="icon-[lucide--chevron-down] text-xl"></span>
                        </button>
                        <div class="flex border border-[#F4F4F4] rounded-xl">
                            <button type="button" class="p-2.5 cursor-pointer">
                                <x-icons.grid-square-icon class="stroke-[#6D6D6D] fill-none" />
                            </button>
                            <button type="button" class="border-x border-[#E9E9E9] p-2.5 cursor-pointer bg-[#F4F4F4]">
                                <x-icons.grid-row-icon class="stroke-[#6D6D6D] fill-none" />
                            </button>
                            <button type="button" class="p-2.5 cursor-pointer">
                                <x-icons.grid-col-icon class="stroke-[#6D6D6D] fill-none" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-[#F4F4F4] px-4 p-1">
                <p class="text-[#6D6D6D] p-2">12 Produk</p>
                <div class="grid grid-cols-2 gap-4">
                    @foreach($products as $product)
                        <x-displays.product-card :payload="$product" />
                    @endforeach
                </div>
                <div class="flex justify-center">

                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('product', () => ({
            isTop: false,

            init() {
                let yprev;

                document.addEventListener('scroll', () => {
                    let y = window.pageYOffset;
                    this.isTop = y > yprev ? false : true;
                    yprev = y;
                });
            },
        }))
    })
</script>
@endpush
