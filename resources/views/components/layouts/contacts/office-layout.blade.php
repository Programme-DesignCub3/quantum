<div class="flex flex-col gap-5 px-4 md:p-10">
    <div class="flex justify-between items-center gap-7">
        <h3>Office</h3>
        <span class="icon-[ci--building-04] shrink-0 text-qt-green-normal text-[40px] md:mr-8"></span>
    </div>
    <div class="flex flex-col gap-4">
        <div class="flex flex-col gap-4">
            @if(isset($page_settings->contact_office_image) && $page_settings->contact_office_image != '')
                <div class="relative md:hidden">
                    <img class="w-full object-cover h-40 rounded-[20px] overflow-hidden sm:h-60" src="{{ asset('storage/' . $page_settings->contact_office_image) }}" alt="{{ $page_settings->contact_office_name }}">
                </div>
            @endif
            <h5>{{ $page_settings->contact_office_name }}</h5>
            <div class="flex gap-4">
                <span class="icon-[lucide--map-pin] shrink-0 text-lg"></span>
                <span class="text-[#6D6D6D]">{{ $page_settings->contact_office_address }}</span>
            </div>
        </div>
        <div class="flex flex-col gap-1">
            <h6 class="md:font-medium">Jam Operasional Kantor</h6>
            <div class="grid grid-cols-2 gap-2">
                @foreach($page_settings->contact_office_operational as $operational)
                    <div class="space-y-1">
                        <span class="extrasmall">{{ $operational['day'] }}</span>
                        <p>{{ $operational['from_hour'] }} - {{ $operational['to_hour'] }} {{ $operational['timezone'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="space-y-2">
            <h6 class="md:font-medium">Informasi Lainnya</h6>
            <p class="small">{{ $page_settings->contact_office_information }}</p>
        </div>
        <div class="flex justify-center py-4 md:justify-start md:pt-4 md:pb-0">
            <x-inputs.button-icon type="hyperlink" :newTab="true" href="{{ $page_settings->contact_office_map }}" icon="icon-[lucide--map-pin]" class="rounded-2xl! md:flex-row-reverse md:gap-10">
                Location
            </x-inputs.button-icon>
        </div>
    </div>
</div>
