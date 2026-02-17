<div class="flex flex-col gap-5 px-4 md:p-0">
    <div class="flex justify-between items-center gap-7">
        <h3>Social Media</h3>
        <span class="icon-[tdesign--share] shrink-0 text-qt-green-normal text-[40px] md:mr-8"></span>
    </div>
    <div class="flex flex-col gap-4">
        <div class="flex flex-col gap-1">
            <h6 class="md:font-medium">Jam Operasional Message over Socmed</h6>
            <div class="grid grid-cols-2 gap-2">
                @foreach($page_settings->contact_socmed_operational as $operational)
                    <div class="space-y-1">
                        <span class="extrasmall">{{ $operational['day'] }}</span>
                        <p>{{ $operational['from_hour'] }} - {{ $operational['to_hour'] }} {{ $operational['timezone'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="space-y-2">
            <h6 class="md:font-medium">Informasi Lainnya</h6>
            <p class="small">{{ $page_settings->contact_socmed_information }}</p>
        </div>
        <div class="flex flex-wrap justify-center gap-2 py-4 max-w-60 mx-auto min-[360px]:max-w-full min-[360px]:flex-nowrap md:max-w-full md:mx-0 md:justify-start md:pt-4 md:pb-0">
            <x-inputs.button-icon type="hyperlink" :newTab="true" href="{{ $page_settings->contact_socmed_tiktok }}" class="rounded-2xl!" icon="icon-[ic--baseline-tiktok]" />
            <x-inputs.button-icon type="hyperlink" :newTab="true" href="{{ $page_settings->contact_socmed_linkedin }}" class="rounded-2xl!" icon="icon-[jam--linkedin]" />
            <x-inputs.button-icon type="hyperlink" :newTab="true" href="{{ $page_settings->contact_socmed_youtube }}" class="rounded-2xl!" icon="icon-[mdi--youtube]" />
            <x-inputs.button-icon type="hyperlink" :newTab="true" href="{{ $page_settings->contact_socmed_instagram }}" class="rounded-2xl!" icon="icon-[mdi--instagram]" />
            <x-inputs.button-icon type="hyperlink" :newTab="true" href="{{ $page_settings->contact_socmed_facebook }}" class="rounded-2xl!" icon="icon-[ri--facebook-fill]" />
        </div>
    </div>
</div>
