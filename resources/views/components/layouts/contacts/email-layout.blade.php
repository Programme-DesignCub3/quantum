<div class="flex flex-col gap-5 px-4 md:p-0">
    <div class="flex justify-between gap-7">
        <div class="space-y-2">
            <h3>Email</h3>
            <p class="large break-all">{{ $page_settings->contact_email }}</p>
        </div>
        <span class="icon-[lucide--mail] shrink-0 text-qt-green-normal text-[40px] md:mr-8"></span>
    </div>
    <div class="flex flex-col gap-4">
        <div class="flex flex-col gap-1">
            <h6 class="md:font-medium">Jam Operasional</h6>
            <div class="grid grid-cols-2 gap-2">
                @foreach($page_settings->contact_email_operational as $operational)
                    <div class="space-y-1">
                        <span class="extrasmall">{{ $operational['day'] }}</span>
                        <p>{{ $operational['from_hour'] }} - {{ $operational['to_hour'] }} {{ $operational['timezone'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="space-y-2">
            <h6 class="md:font-medium">Informasi Lainnya</h6>
            <p class="small">{{ $page_settings->contact_email_information }}</p>
        </div>
        <div class="flex justify-center py-4 md:justify-start md:pt-4 md:pb-0">
            <x-inputs.button-icon type="hyperlink" href="{{ 'mailto:' . $page_settings->contact_email }}" icon="icon-[lucide--mail]" class="rounded-2xl! md:flex-row-reverse md:gap-10">
                Email Now
            </x-inputs.button-icon>
        </div>
    </div>
</div>
