@extends('app')

@section('content')
    <main x-data="guaranteeInformation" class="bg-white">
        <section class="flex flex-col">
            <div class="flex flex-col gap-8 px-6 pt-[116px] pb-[66px]">
                <div class="max-w-xs mx-auto space-y-4 text-center">
                    <h1>Informasi Garansi</h1>
                    <p class="large">Cek syarat, ketentuan, dan masa garansi produk Quantum.</p>
                </div>
                <div class="flex flex-col gap-2 justify-center items-center">
                    <x-inputs.button type="button" size="lg">
                        Daftarkan Produk Anda
                    </x-inputs.button>
                    <x-inputs.button type="button" size="lg" color="white">
                        Cek Syarat Garansi
                    </x-inputs.button>
                </div>
            </div>
            <div id="tabs-border-anchor" :class="isTop ? 'top-[68px] duration-150 delay-200' : 'top-0 duration-50'" class="sticky z-30 transition-all ease-in-out flex gap-8 w-full overflow-x-auto px-8 bg-[#F4F4F4]">
                <a href="#biaya-servis" class="tab-border active">Biaya Servis</a>
                <a href="#masa-garansi" class="tab-border">Masa Garansi</a>
            </div>
            <div id="biaya-servis" class="scrollspy px-4 pt-20 pb-24 border-b border-[#CECECE] scroll-mt-20">
                <h2 class="mb-8">Panduan Biaya Servis (Perbaikan Produk)</h2>
                <div class="flex flex-col gap-11 rounded-2xl bg-[#F4F4F4] px-6 pt-4 pb-12 mb-6">
                    <div class="flex gap-2 justify-around">
                        <div class="flex flex-col gap-2.5 text-center">
                            <span class="icon-[qlementine-icons--settings-24] text-4xl m-4"></span>
                            <span>Harga Suku<br> Cadang</span>
                        </div>
                        <div class="pt-6">
                            <span class="icon-[hugeicons--plus-sign] size-6 text-black"></span>
                        </div>
                        <div class="flex flex-col gap-2.5 text-center">
                            <span class="icon-[qlementine-icons--tool-24] text-4xl m-4"></span>
                            <span>Biaya<br> Perbaikan</span>
                        </div>
                        <div class="pt-6">
                            <span class="icon-[hugeicons--equal-sign] size-6 text-black"></span>
                        </div>
                        <div class="flex flex-col gap-2.5 text-center">
                            <span class="text-3xl m-4">Rp</span>
                            <span>Biaya Servis</span>
                        </div>
                    </div>
                    <ul class="list-disc space-y-4 ml-4">
                        <li>
                            <p>Harga suku cadang</p>
                            <p>Lorem ipsum dolor sit amet lorem ipsum dolores sit amet</p>
                        </li>
                        <li>
                            <p>Biaya Perbaikan</p>
                            <p>Lorem ipsum dolor sit amet lorem ipsum dolores sit amet</p>
                        </li>
                        <li>
                            <p>Harga Servis</p>
                            <p>Lorem ipsum dolor sit amet lorem ipsum dolores sit amet</p>
                        </li>
                    </ul>
                </div>
                <div class="space-y-4 mb-10">
                    <h4>Informasi Layanan Garansi</h4>
                    <ul class="list-disc ml-6">
                        <li>
                            <p>Info lorem ipsum dolor sit amet 1</p>
                        </li>
                        <li>
                            <p>Info lorem ipsum dolor sit amet 2</p>
                        </li>
                        <li>
                            <p>Info lorem ipsum dolor sit amet 3</p>
                        </li>
                    </ul>
                </div>
                <div class="flex flex-col gap-4 mb-10">
                    <h4>Kategori Garansi</h4>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="rounded-2xl space-y-1 bg-[#F4F4F4] p-4">
                            <p>Masa Garansi Produk</p>
                            <h4>1 tahun</h4>
                        </div>
                        <div class="rounded-2xl space-y-1 bg-[#F4F4F4] p-4">
                            <p>Masa Garansi Layanan</p>
                            <h4>1 tahun</h4>
                        </div>
                        <div class="space-y-1">
                            <p>Catatan:</p>
                            <ul class="list-disc ml-6">
                                <li>
                                    <p>Info lorem ipsum dolor sit amet 1</p>
                                </li>
                                <li>
                                    <p>Info lorem ipsum dolor sit amet 2</p>
                                </li>
                                <li>
                                    <p>Info lorem ipsum dolor sit amet 3</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="space-y-4 mb-10">
                    <h4>Layanan Produk diluar Garansi</h4>
                    <p>Lorem ipsum dolor sit amet consectetur. Elit ac sit magna tortor posuere donec ornare etiam. Praesent ipsum turpis libero morbi turpis lorem lacus iaculis sed. Condimentum mauris vestibulum adipiscing in lorem massa sagittis nunc ultrices.</p>
                </div>
                <div class="flex flex-col gap-4 mb-10">
                    <h4>Ketentuan Layanan Produk diluar Garansi</h4>
                    <div class="grid grid-cols-1 gap-4">
                        <div class="rounded-2xl space-y-1 bg-[#F4F4F4] p-4">
                            <h5>Masa Garansi Produk</h5>
                            <p>Masa garansi sudah habis</p>
                        </div>
                        <div class="rounded-2xl space-y-1 bg-[#F4F4F4] p-4">
                            <h5>Headline lorem ipsum sit amet</h5>
                            <p>Lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet</p>
                        </div>
                        <div class="rounded-2xl space-y-1 bg-[#F4F4F4] p-4">
                            <h5>Headline lorem ipsum sit amet</h5>
                            <p>Lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet</p>
                        </div>
                        <div class="rounded-2xl space-y-1 bg-[#F4F4F4] p-4">
                            <h5>Headline lorem ipsum sit amet</h5>
                            <p>Lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet</p>
                        </div>
                        <div class="rounded-2xl space-y-1 bg-[#F4F4F4] p-4">
                            <h5>Headline lorem ipsum sit amet</h5>
                            <p>Lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet</p>
                        </div>
                    </div>
                </div>
            </div>
            <div id="masa-garansi" class="scrollspy px-4 pt-20 pb-[60px] scroll-mt-20">
                <div class="mb-28">
                    <h2 class="mb-12">Panduan Masa Garansi</h2>
                    <div class="space-y-4 mb-10">
                        <h4>Standar Estimasi Masa Garansi</h4>
                        <p>Info lorem ipsum dolor sit amet Info lorem ipsum dolor sit amet Info lorem ipsum dolor sit amet 3</p>
                    </div>
                    <div class="space-y-4 mb-10">
                        <h4>Masa Garansi Produk</h4>
                        <p>Lorem ipsum dolor sit amet consectetur. Elit ac sit magna tortor posuere donec ornare etiam.</p>
                    </div>
                    <div class="grid grid-cols-1 gap-4 mb-14">
                        <div class="flex flex-col gap-4 rounded-2xl bg-[#F4F4F4] p-4">
                            <h3>Kompor</h3>
                            <div class="flex gap-4">
                                <div class="space-y-1">
                                    <p>Servis (Bulan)</p>
                                    <h4>36 bulan</h4>
                                </div>
                                <div class="space-y-1">
                                    <p>Suku Cadang (Bulan)</p>
                                    <h4>36 bulan</h4>
                                </div>
                            </div>
                            <div class="space-y-1">
                                <p>Rincian</p>
                                <h4>Penggantian suku cadang lorem ipsum dolor sit amet</h4>
                            </div>
                        </div>
                        <div class="flex flex-col gap-4 rounded-2xl bg-[#F4F4F4] p-4">
                            <h3>Regulator Gas</h3>
                            <div class="flex gap-4">
                                <div class="space-y-1">
                                    <p>Servis (Bulan)</p>
                                    <h4>36 bulan</h4>
                                </div>
                                <div class="space-y-1">
                                    <p>Suku Cadang (Bulan)</p>
                                    <h4>36 bulan</h4>
                                </div>
                            </div>
                            <div class="space-y-1">
                                <p>Rincian</p>
                                <h4>Penggantian suku cadang lorem ipsum dolor sit amet</h4>
                            </div>
                        </div>
                        <div class="space-y-1">
                            <p>Catatan:</p>
                            <ul class="list-disc ml-6">
                                <li>
                                    <p>Info lorem ipsum dolor sit amet 1</p>
                                </li>
                                <li>
                                    <p>Info lorem ipsum dolor sit amet 2</p>
                                </li>
                                <li>
                                    <p>Info lorem ipsum dolor sit amet 3</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="space-y-4 mb-[72px]">
                        <h4>Standar estimasi untuk produk</h4>
                        <ul class="list-disc ml-6">
                            <li>
                                <p>Info lorem ipsum dolor sit amet Info lorem ipsum dolor sit amet Info lorem ipsum dolor sit amet 3</p>
                            </li>
                            <li>
                                <p>Info lorem ipsum dolor sit amet Info lorem ipsum dolor sit amet Info lorem ipsum dolor sit amet 3</p>
                            </li>
                        </ul>
                    </div>
                    <div class="space-y-4">
                        <h4>Hal-hal yang membatalkan garansi produk</h4>
                        <ul class="list-disc ml-6">
                            <li>
                                <p>Info lorem ipsum dolor sit amet Info lorem ipsum dolor sit amet Info lorem ipsum dolor sit amet 3</p>
                            </li>
                            <li>
                                <p>Info lorem ipsum dolor sit amet Info lorem ipsum dolor sit amet Info lorem ipsum dolor sit amet 3</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col gap-4 my-8 px-5">
                    <h3 class="text-center">Daftarkan Produk Quantum Anda Sekarang dan Nikmati Perlindungan Garansi Resmi!</h3>
                    <div class="flex flex-col gap-5">
                        <div class="flex flex-col gap-2">
                            <p>Data Pribadi</p>
                            <input type="text" placeholder="Nama Lengkap" autocomplete="off" class="w-full p-3 rounded-xl border outline-offset-2 text-sm border-[#E9E9E9] text-[#6D6D6D] outline-none focus:border-[#6D6D6D] placeholder:text-[#6D6D6D]/60">
                            <input type="tel" placeholder="Nomor Handphone" autocomplete="off" class="w-full p-3 rounded-xl border outline-offset-2 text-sm border-[#E9E9E9] text-[#6D6D6D] outline-none focus:border-[#6D6D6D] placeholder:text-[#6D6D6D]/60">
                            <input type="email" placeholder="Email" autocomplete="off" class="w-full p-3 rounded-xl border outline-offset-2 text-sm border-[#E9E9E9] text-[#6D6D6D] outline-none focus:border-[#6D6D6D] placeholder:text-[#6D6D6D]/60">
                            <input type="email" placeholder="Alamat Lengkap" autocomplete="off" class="w-full p-3 rounded-xl border outline-offset-2 text-sm border-[#E9E9E9] text-[#6D6D6D] outline-none focus:border-[#6D6D6D] placeholder:text-[#6D6D6D]/60">
                        </div>
                        <div class="flex flex-col gap-2">
                            <p>Data Produk</p>
                            <input type="text" placeholder="Nomor Seri Produk" autocomplete="off" class="w-full p-3 rounded-xl border outline-offset-2 text-sm border-[#E9E9E9] text-[#6D6D6D] outline-none focus:border-[#6D6D6D] placeholder:text-[#6D6D6D]/60">
                            <button type="button" class="w-max text-[#6D6D6D] underline text-xs cursor-pointer">Cara menemukan Nomor Seri dan Model?</button>
                            <button type="button" class="flex justify-between items-center w-full p-3 rounded-xl border text-sm border-[#E9E9E9] text-[#6D6D6D]/60 outline-none cursor-pointer focus:border-[#6D6D6D]">
                                Pilih Provinsi
                                <span class="icon-[lucide--chevron-down] text-xl text-[#6D6D6D]"></span>
                            </button>
                            <button type="button" class="flex justify-between items-center w-full p-3 rounded-xl border text-sm border-[#E9E9E9] text-[#6D6D6D]/60 outline-none cursor-pointer focus:border-[#6D6D6D]">
                                Pilih Provinsi
                                <span class="icon-[lucide--chevron-down] text-xl text-[#6D6D6D]"></span>
                            </button>
                            <input type="date" placeholder="Nomor Seri Produk" autocomplete="off" class="w-full p-3 rounded-xl border outline-offset-2 text-sm border-[#E9E9E9] text-[#6D6D6D] outline-none focus:border-[#6D6D6D] placeholder:text-[#6D6D6D]/60">
                            <button type="button" class="flex justify-between items-center w-full p-3 rounded-xl border text-sm border-[#E9E9E9] text-[#6D6D6D]/60 outline-none cursor-pointer focus:border-[#6D6D6D]">
                                Tempat Pembelian
                                <span class="icon-[lucide--chevron-down] text-xl text-[#6D6D6D]"></span>
                            </button>
                            <input type="text" placeholder="Pesan" autocomplete="off" class="w-full p-3 rounded-xl border outline-offset-2 text-sm border-[#E9E9E9] text-[#6D6D6D] outline-none focus:border-[#6D6D6D] placeholder:text-[#6D6D6D]/60">
                            <div class="flex justify-start gap-3">
                                <input type="checkbox" id="tnc" class="shrink-0">
                                <label for="tnc" class="text-sm leading-4">Saya menyetujui syarat & ketentuan garansi Quantum Indonesia.</label>
                            </div>
                        </div>
                    </div>
                    <x-inputs.button type="button" size="lg">
                        Daftarkan Garansi Sekarang
                    </x-inputs.button>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('guaranteeInformation', () => ({
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
