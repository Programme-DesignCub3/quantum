@extends('app')

@section('content')
    <main x-data="serviceCenter" class="bg-white">
        <section class="flex flex-col">
            <div class="space-y-4 max-w-xs mx-auto text-center pt-[116px] pb-[46px] px-6">
                <h1>Jaringan Service Produk Quantum</h1>
                <p class="large">Dapatkan layanan perbaikan produk Quantum di pusat service resmi dan mitra terpercaya.</p>
            </div>
            <div :class="isTop ? 'top-[68px] duration-150 delay-200' : 'top-0 duration-50'" class="sticky z-30 transition-all ease-in-out flex gap-8 w-full overflow-x-auto px-8 bg-[#F4F4F4]">
                <button type="button" @click="changeTab('service-center')" class="tab-border cursor-pointer" :class="currentTab === 'service-center' && 'active'">Service Center</button>
                <button type="button" @click="changeTab('mitra-service')" class="tab-border cursor-pointer" :class="currentTab === 'mitra-service' && 'active'">Mitra Service</button>
            </div>
            <div x-show="currentTab === 'service-center'" class="flex flex-col gap-[42px] px-4 pt-10 pb-[52px]">
                <div class="flex flex-col gap-[52px]">
                    <div class="flex flex-col gap-8">
                        <div class="flex flex-col gap-4 justify-center items-center px-2">
                            <h3>Temukan Service Center</h3>
                            <div class="relative w-full">
                                <input type="text" placeholder="Cari lokasi service center" class="w-full bg-[#F4F4F4] rounded-3xl text-lg outline-none font-medium pl-16 pr-8 py-[18px] placeholder:font-medium placeholder:text-[#868686]">
                                <span class="icon-[iconamoon--search] absolute top-1/2 -translate-y-1/2 left-4 text-[30px] text-qt-green-normal"></span>
                            </div>
                        </div>
                        <div class="rounded-2xl overflow-hidden">
                            <iframe class="aspect-17/21 size-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.9738101235635!2d106.80351287321153!3d-6.227937672823461!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1a04d5ff145%3A0xcbae36e958f80d6a!2sOffice%208%20%40%20Senopati!5e0!3m2!1sid!2sid!4v1764743736932!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4">
                        @foreach ($service_centers as $service_center)
                            <x-displays.place-card :payload="$service_center" />
                        @endforeach
                    </div>
                </div>
                <div class="flex justify-center">
                    <x-inputs.button type="button" size="lg">
                        Lebih banyak
                    </x-inputs.button>
                </div>
            </div>
            <div x-show="currentTab === 'mitra-service'" class="flex flex-col gap-[42px] px-4 pt-10 pb-[52px]">
                <div class="flex flex-col gap-[52px]">
                    <div class="flex flex-col gap-8">
                        <div class="flex flex-col gap-4 justify-center items-center px-2">
                            <h3>Temukan Mitra Service</h3>
                            <div class="relative w-full">
                                <input type="text" placeholder="Cari lokasi mitra service" class="w-full bg-[#F4F4F4] rounded-3xl text-lg outline-none font-medium pl-16 pr-8 py-[18px] placeholder:font-medium placeholder:text-[#868686]">
                                <span class="icon-[iconamoon--search] absolute top-1/2 -translate-y-1/2 left-4 text-[30px] text-qt-green-normal"></span>
                            </div>
                        </div>
                        <div class="rounded-2xl overflow-hidden">
                            <iframe class="aspect-17/21 size-full" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3168.9738101235635!2d106.80351287321153!3d-6.227937672823461!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1a04d5ff145%3A0xcbae36e958f80d6a!2sOffice%208%20%40%20Senopati!5e0!3m2!1sid!2sid!4v1764743736932!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 gap-4">
                        @foreach ($mitra_services as $mitra_service)
                            <x-displays.place-card :payload="$mitra_service" />
                        @endforeach
                    </div>
                </div>
                <div class="flex justify-center">
                    <x-inputs.button type="button" size="lg">
                        Lebih banyak
                    </x-inputs.button>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('serviceCenter', () => ({
            isTop: false,
            currentTab: 'service-center',

            init() {
                let yprev;

                document.addEventListener('scroll', () => {
                    let y = window.pageYOffset;
                    this.isTop = y > yprev ? false : true;
                    yprev = y;
                });
            },
            changeTab(tab) { this.currentTab = tab }
        }))
    })
</script>
@endpush
