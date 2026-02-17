<div class="flex flex-col gap-5 px-4 md:p-0">
    <div class="flex justify-between gap-7">
        <div class="space-y-2">
            <h3>Call Center</h3>
            <p class="large">{{ $page_settings->contact_cc_number }}</p>
        </div>
        <x-icons.customer-care-icon class="shrink-0 size-10 fill-qt-green-normal md:mr-8" />
    </div>
    <div class="flex flex-col gap-4">
        <div class="flex flex-col gap-1">
            <h6 class="md:font-medium">Jam Operasional</h6>
            <div class="grid grid-cols-2 gap-2">
                @foreach($page_settings->contact_cc_operational as $operational)
                    <div class="space-y-1">
                        <span class="extrasmall">{{ $operational['day'] }}</span>
                        <p>{{ $operational['from_hour'] }} - {{ $operational['to_hour'] }} {{ $operational['timezone'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="space-y-2">
            <h6 class="md:font-medium">Informasi Lainnya</h6>
            <p class="small">{{ $page_settings->contact_cc_information }}</p>
        </div>
        <div class="flex justify-center py-4 md:justify-start md:pt-4 md:pb-0">
            <x-inputs.button-icon type="hyperlink" href="{{ 'tel:' . $page_settings->contact_cc_number_formatted }}" class="rounded-2xl! md:flex-row-reverse md:gap-10">
                <x-slot:image>
                    <x-icons.customer-care-icon class="fill-qt-green-normal group-hover:fill-white" />
                </x-slot:image>
                Call Now
            </x-inputs.button-icon>
        </div>
    </div>
</div>
