<footer x-data @if(Route::currentRouteName() == 'updates.recipe.detail') x-cloak x-show="$store.premiumRecipeDrawer.footerShown" @endif id="footer">
    @if (Route::currentRouteName() !== 'contact')
        <div class="px-4 py-[60px] bg-[#F4F4F4] flex flex-col gap-8">
            <div class="grid grid-cols-3 gap-4">
                @for($i = 1; $i <= 6; $i++)
                    <img src="{{ asset('images/certify-' . $i . '.png') }}" alt="">
                @endfor
            </div>
            <h2>Quantum Care</h2>
            <div class="grid grid-cols-2 gap-4">
                <x-inputs.button-icon type="hyperlink" href="{{ 'tel:' . $page_settings->contact_cc_number_formatted }}">
                    <x-slot:image>
                        <x-icons.customer-care-icon id="footer-customer-care" class="fill-qt-green-normal group-hover:fill-white" />
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
            <div class="space-y-1">
                <h5>Jam Operasional</h5>
                <div class="grid grid-cols-2 gap-2">
                    @foreach($general_settings->operational_hours as $operational)
                        <div class="space-y-1">
                            <span class="extrasmall">{{ $operational['from_day'] }} - {{ $operational['to_day'] }}</span>
                            <p>{{ $operational['from_hour'] }} - {{ $operational['to_hour'] }} {{ $operational['timezone'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <div class="px-4 py-[60px] bg-[#0D545C] flex flex-col gap-6">
        <div class="space-y-4 text-white">
            <h2>Jangan Lewatkan Penawaran Spesial dari Quantum</h2>
            <p>Nantikan berbagai info produk terbaru dan promo menarik untuk para pelanggan Quantum.</p>
        </div>
        <livewire:forms.subscription-form />
    </div>
    <div class="px-4 py-[60px] bg-[#F4F4F4]">
        <div class="flex flex-col gap-[42px]">
            <div class="space-y-4">
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
    </div>
    <div class="px-4 py-8 space-y-4 bg-[#083236] text-white">
        <div class="flex items-center gap-2.5">
            <a href="{{ route('terms-conditions') }}" class="font-semibold text-xs tracking-[0.5px] border-b border-transparent hover:border-qt-green-normal">Syarat dan Ketentuan</a>
            <div class="size-1 bg-white rounded-full"></div>
            <a href="{{ route('privacy-policy') }}" class="font-semibold text-xs tracking-[0.5px] border-b border-transparent hover:border-qt-green-normal">Kebijakan Privasi</a>
        </div>
        <p class="small">&copy; PT. Nawasena Sentosa Utama. All right reserved.</p>
    </div>
</footer>
