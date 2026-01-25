<div class="flex flex-col gap-5 px-4">
    <div class="flex flex-col gap-4">
        <div class="flex flex-col gap-4">
            <div class="relative">
                <img class="w-full object-cover object-bottom h-[150px] rounded-[20px] overflow-hidden" src="{{ asset('images/toko-distributor.jpg') }}" alt="">
            </div>
            <div class="space-y-0">
                <span class="block text-[#6D6D6D]">Banten</span>
                <h5>Nama Toko Distributor/Service Center</h5>
            </div>
            <div class="flex gap-4">
                <span class="icon-[lucide--map-pin] shrink-0 text-lg text-qt-green-normal"></span>
                <span class="text-[#6D6D6D]">Alamat detil toko distributor/service center</span>
            </div>
        </div>
        <div class="flex flex-col gap-1">
            <h6>Jam Operasional</h6>
            <div class="flex justify-between">
                <div class="space-y-1">
                    <span class="extrasmall">Senin - Jumat</span>
                    <p>07.00-20.00 WIB</p>
                </div>
                <div class="space-y-1">
                    <span class="extrasmall">Sabtu-Minggu & Hari Libur</span>
                    <p>07.00-18.00 WIB</p>
                </div>
            </div>
        </div>
        <div class="space-y-1">
            <h6>Produk Penjualan</h6>
            <p class="small">Kompor</p>
            <p class="small">Regulator</p>
            <p class="small">Suku Cadang</p>
        </div>
        <div class="flex gap-2 justify-center py-4">
            <x-inputs.button-icon type="hyperlink" class="rounded-2xl!" icon="icon-[lucide--phone]" />
            <x-inputs.button-icon type="hyperlink" class="rounded-2xl!" icon="icon-[ic--baseline-whatsapp]" />
            <x-inputs.button-icon type="hyperlink" class="rounded-2xl!" icon="icon-[lucide--map-pin]" />
        </div>
    </div>
</div>
