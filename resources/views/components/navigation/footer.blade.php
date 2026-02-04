<footer x-data @if(Route::currentRouteName() == 'updates.recipe.detail') x-cloak x-show="$store.premiumRecipeDrawer.footerShown" @endif id="footer">
    @if (Route::currentRouteName() !== 'support.contact')
        <div class="bg-[#F4F4F4]">
            <div class="container px-4 py-[60px] flex flex-col gap-8 sm:px-6">
                <div class="grid grid-cols-3 gap-4 sm:grid-cols-6 sm:gap-x-12 md:gap-6 lg:gap-10 xl:gap-14">
                    @for($i = 1; $i <= 6; $i++)
                        <img src="{{ asset('images/certify-' . $i . '.png') }}" alt="">
                    @endfor
                </div>
                <div class="md:space-y-2">
                    <h2>Quantum Care</h2>
                    <p class="hidden md:block">
                        Jam Operasional
                        @foreach($general_settings->operational_hours as $operational)
                            {{ $operational['from_day'] }} - {{ $operational['to_day'] }} {{ $operational['from_hour'] }} - {{ $operational['to_hour'] }} {{ $operational['timezone'] }}
                        @endforeach
                    </p>
                </div>
                {{-- Mobile --}}
                <div class="grid grid-cols-2 gap-4 md:hidden">
                    <x-inputs.button-icon type="hyperlink" href="{{ 'tel:' . $page_settings->contact_cc_number_formatted }}">
                        <x-slot:image>
                            <x-icons.customer-care-icon id="footer-customer-care" class="fill-qt-green-normal size-[30px] group-hover:fill-white" />
                        </x-slot:image>
                        Call Center
                    </x-inputs.button-icon>
                    <x-inputs.button-icon type="hyperlink" :newTab="true" href="{{ 'https://wa.me/' . $page_settings->contact_wa_number_formatted }}" icon="icon-[ic--baseline-whatsapp]">
                        WhatsApp
                    </x-inputs.button-icon>
                    <x-inputs.button-icon type="hyperlink" href="{{ 'mailto:' . $page_settings->contact_email }}" icon="icon-[lucide--mail]">
                        Email
                    </x-inputs.button-icon>
                    <x-inputs.button-icon type="hyperlink" :newTab="true" href="{{ $page_settings->contact_office_map }}" icon="icon-[lucide--map-pin]">
                        Location
                    </x-inputs.button-icon>
                </div>
                {{-- Desktop --}}
                <div class="hidden grid-cols-4 gap-4 md:grid">
                    <x-inputs.button-icon type="hyperlink" href="{{ 'tel:' . $page_settings->contact_cc_number_formatted }}" size="lg" class="md:py-6 md:flex-row-reverse md:justify-between">
                        <x-slot:image>
                            <x-icons.customer-care-icon id="footer-customer-care" class="fill-qt-green-normal size-[30px] group-hover:fill-white" />
                        </x-slot:image>
                        Call Center
                    </x-inputs.button-icon>
                    <x-inputs.button-icon type="hyperlink" :newTab="true" href="{{ 'https://wa.me/' . $page_settings->contact_wa_number_formatted }}" icon="icon-[ic--baseline-whatsapp]" size="lg" class="md:py-6 md:flex-row-reverse md:justify-between">
                        WhatsApp
                    </x-inputs.button-icon>
                    <x-inputs.button-icon type="hyperlink" href="{{ 'mailto:' . $page_settings->contact_email }}" icon="icon-[lucide--mail]" size="lg" class="md:py-6 md:flex-row-reverse md:justify-between">
                        Email
                    </x-inputs.button-icon>
                    <x-inputs.button-icon type="hyperlink" :newTab="true" href="{{ $page_settings->contact_office_map }}" icon="icon-[lucide--map-pin]" size="lg" class="md:py-6 md:flex-row-reverse md:justify-between">
                        Location
                    </x-inputs.button-icon>
                </div>
                <div class="space-y-1 md:hidden">
                    <h5>Jam Operasional</h5>
                    <div class="grid grid-cols-2 gap-2">
                        @foreach($general_settings->operational_hours as $operational)
                            <div class="space-y-1">
                                <span class="extrasmall">{{ $operational['day'] }}</span>
                                <p>{{ $operational['from_hour'] }} - {{ $operational['to_hour'] }} {{ $operational['timezone'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif
    <div class="bg-cover bg-[#0D545C] md:bg-desktop-subscription">
        <div class="container px-4 py-[60px] md:py-[67px] sm:px-6">
            <div class="flex flex-col gap-6 md:max-w-xl">
                <div class="space-y-4 text-white">
                    <h2>Jangan Lewatkan Penawaran Spesial dari Quantum</h2>
                    <p>Nantikan berbagai info produk terbaru dan promo menarik untuk para pelanggan Quantum.</p>
                </div>
                <livewire:forms.subscription-form />
            </div>
        </div>
    </div>
    <div class="bg-[#F4F4F4]">
        <div class="container px-4 py-[60px] flex flex-col gap-[42px] sm:px-6">
            {{-- Mobile --}}
            <div class="space-y-4 md:hidden">
                <h4>Link</h4>
                <div class="flex flex-col">
                    <x-displays.accordion title="Tentang">
                        <div class="flex flex-col gap-6 pb-5 pt-2.5">
                            <a href="{{ route('about') }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px]">Tentang Kami</a>
                            <a href="{{ route('about') }}#award" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px]">Award</a>
                            <a href="{{ route('about') }}#marketplace" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px]">Partner Marketplace</a>
                        </div>
                    </x-displays.accordion>
                    <x-displays.accordion title="Produk">
                        <div class="flex flex-col gap-6 pb-5 pt-2.5">
                            @foreach ($product_categories as $category)
                                <a href="{{ route('product.category', $category->slug) }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px]">
                                    {{ $category->name }}
                                </a>
                            @endforeach
                        </div>
                    </x-displays.accordion>
                    <x-displays.accordion title="Updates">
                        <div class="flex flex-col gap-6 pb-5 pt-2.5">
                            <a href="{{ route('updates.news') }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px]">Artikel</a>
                            <a href="{{ route('updates.news', ['kategori' => 'event']) }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px]">Event</a>
                            <a href="{{ route('updates.recipe') }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px]">Resep</a>
                        </div>
                    </x-displays.accordion>
                    <x-displays.accordion title="Bantuan" :last="true">
                        <div class="flex flex-col gap-6 pb-5 pt-2.5">
                            <a href="{{ route('support.guarantee-information') }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px]">Informasi Garansi</a>
                            <a href="{{ route('support.service-center') }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px]">Service Center</a>
                            <a href="{{ route('support.faq') }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px]">FAQ</a>
                            <a href="{{ route('support.contact') }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px]">Kontak Kami</a>
                            <a href="{{ route('support.guidance') }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px]">Edukasi dan Panduan</a>
                            <a href="{{ route('support.tutorial-video') }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px]">Video dan Tutorial</a>
                            <a href="{{ route('support.customer-service') }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px]">Layanan Pelanggan</a>
                        </div>
                    </x-displays.accordion>
                </div>
                <div class="flex justify-between">
                    <a href="{{ $page_settings->contact_socmed_linkedin }}" target="_blank" class="flex justify-center items-center size-[54px] bg-[#E7F1F2] rounded-full">
                        <span class="icon-[jam--linkedin] text-qt-green-normal text-[32px]"></span>
                    </a>
                    <a href="{{ $page_settings->contact_socmed_facebook }}" target="_blank" class="flex justify-center items-center size-[54px] bg-[#E7F1F2] rounded-full">
                        <span class="icon-[ri--facebook-fill] text-qt-green-normal text-[32px]"></span>
                    </a>
                    <a href="{{ $page_settings->contact_socmed_youtube }}" target="_blank" class="flex justify-center items-center size-[54px] bg-[#E7F1F2] rounded-full">
                        <span class="icon-[mdi--youtube] text-qt-green-normal text-[32px]"></span>
                    </a>
                    <a href="{{ $page_settings->contact_socmed_instagram }}" target="_blank" class="flex justify-center items-center size-[54px] bg-[#E7F1F2] rounded-full">
                        <span class="icon-[mdi--instagram] text-qt-green-normal text-[32px]"></span>
                    </a>
                    <a href="{{ $page_settings->contact_socmed_tiktok }}" target="_blank" class="flex justify-center items-center size-[54px] bg-[#E7F1F2] rounded-full">
                        <span class="icon-[ic--baseline-tiktok] text-qt-green-normal text-[32px]"></span>
                    </a>
                </div>
                <div class="text-[#6D6D6D]">
                    <p>{{ $general_settings->footer_description }}</p>
                </div>
            </div>
            {{-- Desktop --}}
            <div class="hidden gap-8 flex-col md:flex">
                <div class="flex flex-col justify-between gap-8 lg:flex-row">
                    <div class="w-full text-[#6D6D6D] lg:w-[420px] xl:w-[380px]">
                        <p>{{ $general_settings->footer_description }}</p>
                    </div>
                    <div class="grid grid-cols-3 gap-x-5 gap-y-10 xl:grid-cols-5">
                        <div class="flex min-w-40 flex-col gap-7">
                            <p class="font-semibold text-[#0D545C]">Tentang</p>
                            <div class="flex flex-col gap-6">
                                <a href="{{ route('about') }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px] lg:w-max">Tentang Kami</a>
                                <a href="{{ route('about') }}#award" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px] lg:w-max">Award</a>
                                <a href="{{ route('about') }}#marketplace" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px] lg:w-max">Partner Marketplace</a>
                            </div>
                        </div>
                        <div class="flex min-w-40 flex-col gap-7">
                            <p class="font-semibold text-[#0D545C]">Produk</p>
                            <div class="flex flex-col gap-6">
                                @foreach ($product_categories as $category)
                                    <a href="{{ route('product.category', $category->slug) }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px] lg:w-max">
                                        {{ $category->name }}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="flex min-w-40 flex-col gap-7">
                            <p class="font-semibold text-[#0D545C]">Distributor</p>
                            <div class="flex flex-col gap-6">
                                <a href="{{ route('distributor.list-distributor') }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px] lg:w-max">Daftar Jadi Distributor</a>
                                <a href="{{ route('distributor.catalog') }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px] lg:w-max">Katalog</a>
                            </div>
                        </div>
                        <div class="flex min-w-40 flex-col gap-7">
                            <p class="font-semibold text-[#0D545C]">Updates</p>
                            <div class="flex flex-col gap-6">
                                <a href="{{ route('updates.news') }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px] lg:w-max">Artikel</a>
                                <a href="{{ route('updates.news', ['kategori' => 'event']) }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px] lg:w-max">Event</a>
                                <a href="{{ route('updates.recipe') }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px] lg:w-max">Resep</a>
                            </div>
                        </div>
                        <div class="flex min-w-40 flex-col gap-7">
                            <p class="font-semibold text-[#0D545C]">Bantuan</p>
                            <div class="flex flex-col gap-6">
                                <a href="{{ route('support.guarantee-information') }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px] lg:w-max">Informasi Garansi</a>
                                <a href="{{ route('support.service-center') }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px] lg:w-max">Service Center</a>
                                <a href="{{ route('support.faq') }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px] lg:w-max">FAQ</a>
                                <a href="{{ route('support.contact') }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px] lg:w-max">Kontak Kami</a>
                                <a href="{{ route('support.guidance') }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px] lg:w-max">Edukasi dan Panduan</a>
                                <a href="{{ route('support.tutorial-video') }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px] lg:w-max">Video dan Tutorial</a>
                                <a href="{{ route('support.customer-service') }}" class="font-semibold text-xs text-qt-green-normal tracking-[0.5px] lg:w-max">Layanan Pelanggan</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex gap-4">
                    <a href="{{ $page_settings->contact_socmed_linkedin }}" target="_blank" class="flex justify-center items-center size-[54px] bg-[#E7F1F2] rounded-full">
                        <span class="icon-[jam--linkedin] text-qt-green-normal text-[32px]"></span>
                    </a>
                    <a href="{{ $page_settings->contact_socmed_facebook }}" target="_blank" class="flex justify-center items-center size-[54px] bg-[#E7F1F2] rounded-full">
                        <span class="icon-[ri--facebook-fill] text-qt-green-normal text-[32px]"></span>
                    </a>
                    <a href="{{ $page_settings->contact_socmed_youtube }}" target="_blank" class="flex justify-center items-center size-[54px] bg-[#E7F1F2] rounded-full">
                        <span class="icon-[mdi--youtube] text-qt-green-normal text-[32px]"></span>
                    </a>
                    <a href="{{ $page_settings->contact_socmed_instagram }}" target="_blank" class="flex justify-center items-center size-[54px] bg-[#E7F1F2] rounded-full">
                        <span class="icon-[mdi--instagram] text-qt-green-normal text-[32px]"></span>
                    </a>
                    <a href="{{ $page_settings->contact_socmed_tiktok }}" target="_blank" class="flex justify-center items-center size-[54px] bg-[#E7F1F2] rounded-full">
                        <span class="icon-[ic--baseline-tiktok] text-qt-green-normal text-[32px]"></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-[#083236] text-white">
        <div class="container space-y-4 px-4 py-8 justify-between items-center sm:px-6 md:flex md:space-y-0">
            <div class="flex items-center gap-2.5">
                <a href="{{ route('terms-conditions') }}" class="font-semibold text-xs tracking-[0.5px] border-b border-transparent hover:border-qt-green-normal">Syarat dan Ketentuan</a>
                <div class="size-1 bg-white rounded-full"></div>
                <a href="{{ route('privacy-policy') }}" class="font-semibold text-xs tracking-[0.5px] border-b border-transparent hover:border-qt-green-normal">Kebijakan Privasi</a>
            </div>
            <p class="small">&copy; PT. Nawasena Sentosa Utama. All right reserved.</p>
        </div>
    </div>
</footer>
