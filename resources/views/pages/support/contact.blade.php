@extends('app')

@section('meta_title', $meta_title ?? 'Kontak')
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image)

@section('content')
    <main x-data class="bg-[#F4F4F4]">
        <section class="flex flex-col gap-8 pt-[116px] pb-[100px] px-4">
            <div class="space-y-4 text-center max-w-sm mx-auto">
                <h1>{{ $page_settings->contact_title }}</h1>
                <p class="large">{{ $page_settings->contact_description }}</p>
            </div>
            <div class="flex flex-col gap-4">
                {{-- Call Center --}}
                <x-displays.simple-card background="white" :background-icon="false" :border="false">
                    <h3>Call Center</h3>
                    <p>Hubungi tim layanan Quantum untuk info dan bantuan</p>
                    <x-slot:icon>
                        <x-icons.customer-care-icon id="contact-customer-care" class="fill-qt-green-normal size-10" />
                    </x-slot:icon>
                    <x-slot:button>
                        <div class="flex justify-between">
                            <x-inputs.button-icon type="button" icon="icon-[material-symbols--info-outline-rounded]" event="$store.contactCallDrawer.openDrawer()" class="border-[#D9E9EB] rounded-2xl!" />
                            <x-inputs.button type="hyperlink" href="{{ 'tel:' . $page_settings->contact_cc_number_formatted }}" class="rounded-2xl!">
                                Call
                            </x-inputs.button>
                        </div>
                    </x-slot:button>
                </x-displays.simple-card>
                <x-displays.drawer store="contactCallDrawer">
                    <div class="flex flex-col gap-5 px-4">
                        <div class="flex justify-between gap-7">
                            <div class="space-y-2">
                                <h3>Call Center</h3>
                                <p class="large">{{ $page_settings->contact_cc_number }}</p>
                            </div>
                            <x-icons.customer-care-icon class="shrink-0 size-10 fill-qt-green-normal" />
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="flex flex-col gap-1">
                                <h6>Jam Operasional</h6>
                                <div class="grid grid-cols-2">
                                    @foreach($page_settings->contact_cc_operational as $operational)
                                        <div class="space-y-1">
                                            <span class="extrasmall">{{ $operational['from_day'] }} - {{ $operational['to_day'] }}</span>
                                            <p>{{ $operational['from_hour'] }} - {{ $operational['to_hour'] }} {{ $operational['timezone'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="space-y-2">
                                <h6>Informasi Lainnya</h6>
                                <p class="small">{{ $page_settings->contact_cc_information }}</p>
                            </div>
                            <div class="flex justify-center py-4">
                                <x-inputs.button-icon type="hyperlink" href="{{ 'tel:' . $page_settings->contact_cc_number_formatted }}" class="rounded-2xl!">
                                    <x-slot:image>
                                        <x-icons.customer-care-icon class="fill-qt-green-normal group-hover:fill-white" />
                                    </x-slot:image>
                                    Call Now
                                </x-inputs.button-icon>
                            </div>
                        </div>
                    </div>
                </x-displays.drawer>
                {{-- WhatsApp --}}
                <x-displays.simple-card background="white" :background-icon="false" :border="false">
                    <h3>WhatsApp</h3>
                    <p>Tanya seputar produk dan garansi di Live Chat WhatsApp.</p>
                    <x-slot:icon>
                        <span class="icon-[ic--baseline-whatsapp] text-qt-green-normal text-[40px]"></span>
                    </x-slot:icon>
                    <x-slot:button>
                        <div class="flex justify-between">
                            <x-inputs.button-icon type="button" icon="icon-[material-symbols--info-outline-rounded]" event="$store.contactWhatsAppDrawer.openDrawer()" class="border-[#D9E9EB] rounded-2xl!" />
                            <x-inputs.button type="hyperlink" :newTab="true" href="{{ 'https://wa.me/' . $page_settings->contact_wa_number_formatted }}" class="rounded-2xl!">
                                Chat
                            </x-inputs.button>
                        </div>
                    </x-slot:button>
                </x-displays.simple-card>
                <x-displays.drawer store="contactWhatsAppDrawer">
                    <div class="flex flex-col gap-5 px-4">
                        <div class="flex justify-between gap-7">
                            <div class="space-y-2">
                                <h3>WhatsApp</h3>
                                <p class="large">{{ $page_settings->contact_wa_number }}</p>
                            </div>
                            <span class="icon-[ic--baseline-whatsapp] shrink-0 text-qt-green-normal text-[40px]"></span>
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="flex flex-col gap-1">
                                <h6>Jam Operasional</h6>
                                <div class="grid grid-cols-2">
                                    @foreach($page_settings->contact_wa_operational as $operational)
                                        <div class="space-y-1">
                                            <span class="extrasmall">{{ $operational['from_day'] }} - {{ $operational['to_day'] }}</span>
                                            <p>{{ $operational['from_hour'] }} - {{ $operational['to_hour'] }} {{ $operational['timezone'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="space-y-2">
                                <h6>Informasi Lainnya</h6>
                                <p class="small">{{ $page_settings->contact_wa_information }}</p>
                            </div>
                            <div class="flex justify-center py-4">
                                <x-inputs.button-icon type="hyperlink" :newTab="true" href="{{ 'https://wa.me/' . $page_settings->contact_wa_number_formatted }}" class="rounded-2xl!" icon="icon-[ic--baseline-whatsapp]">
                                    Chat Now
                                </x-inputs.button-icon>
                            </div>
                        </div>
                    </div>
                </x-displays.drawer>
                {{-- Email --}}
                <x-displays.simple-card background="white" :background-icon="false" :border="false">
                    <h3>Email</h3>
                    <p>Sampaikan kebutuhan Anda via email resmi Quantum</p>
                    <x-slot:icon>
                        <span class="icon-[lucide--mail] text-qt-green-normal text-[40px]"></span>
                    </x-slot:icon>
                    <x-slot:button>
                        <div class="flex justify-between">
                            <x-inputs.button-icon type="button" icon="icon-[material-symbols--info-outline-rounded]" event="$store.contactEmailDrawer.openDrawer()" class="border-[#D9E9EB] rounded-2xl!" />
                            <x-inputs.button type="hyperlink" href="{{ 'mailto:' . $page_settings->contact_email }}" class="rounded-2xl!">
                                Email
                            </x-inputs.button>
                        </div>
                    </x-slot:button>
                </x-displays.simple-card>
                <x-displays.drawer store="contactEmailDrawer">
                    <div class="flex flex-col gap-5 px-4">
                        <div class="flex justify-between gap-7">
                            <div class="space-y-2">
                                <h3>Email</h3>
                                <p class="large break-all">{{ $page_settings->contact_email }}</p>
                            </div>
                            <span class="icon-[lucide--mail] shrink-0 text-qt-green-normal text-[40px]"></span>
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="flex flex-col gap-1">
                                <h6>Jam Operasional</h6>
                                <div class="grid grid-cols-2">
                                    @foreach($page_settings->contact_email_operational as $operational)
                                        <div class="space-y-1">
                                            <span class="extrasmall">{{ $operational['from_day'] }} - {{ $operational['to_day'] }}</span>
                                            <p>{{ $operational['from_hour'] }} - {{ $operational['to_hour'] }} {{ $operational['timezone'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="space-y-2">
                                <h6>Informasi Lainnya</h6>
                                <p class="small">{{ $page_settings->contact_email_information }}</p>
                            </div>
                            <div class="flex justify-center py-4">
                                <x-inputs.button-icon type="hyperlink" href="{{ 'mailto:' . $page_settings->contact_email }}" class="rounded-2xl!" icon="icon-[lucide--mail]">
                                    Email Now
                                </x-inputs.button-icon>
                            </div>
                        </div>
                    </div>
                </x-displays.drawer>
                {{-- Office --}}
                <x-displays.simple-card background="white" :background-icon="false" :border="false">
                    <h3>Office</h3>
                    <p>Tim layanan Quantum siap menjawab pertanyaan Anda</p>
                    <x-slot:icon>
                        <span class="icon-[ci--building-04] text-qt-green-normal text-[40px]"></span>
                    </x-slot:icon>
                    <x-slot:button>
                        <div class="flex justify-between">
                            <x-inputs.button-icon type="button" icon="icon-[material-symbols--info-outline-rounded]" event="$store.contactOfficeDrawer.openDrawer()" class="border-[#D9E9EB] rounded-2xl!" />
                            <x-inputs.button type="hyperlink" :newTab="true" href="{{ $page_settings->contact_office_map }}" class="rounded-2xl!">
                                Maps
                            </x-inputs.button>
                        </div>
                    </x-slot:button>
                </x-displays.simple-card>
                <x-displays.drawer store="contactOfficeDrawer">
                    <div class="flex flex-col gap-5 px-4">
                        <div class="flex justify-between items-center gap-7">
                            <h3>Office</h3>
                            <span class="icon-[ci--building-04] shrink-0 text-qt-green-normal text-[40px]"></span>
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="flex flex-col gap-4">
                                @if(isset($page_settings->contact_office_image) && $page_settings->contact_office_image != '')
                                    <img class="w-full object-cover object-bottom h-[150px] rounded-[20px] overflow-hidden" src="{{ asset('storage/' . $page_settings->contact_office_image) }}" alt="">
                                @endif
                                <h5>{{ $page_settings->contact_office_name }}</h5>
                                <div class="flex gap-4">
                                    <span class="icon-[lucide--map-pin] shrink-0 text-lg"></span>
                                    <span class="text-[#6D6D6D]">{{ $page_settings->contact_office_address }}</span>
                                </div>
                            </div>
                            <div class="flex flex-col gap-1">
                                <h6>Jam Operasional Kantor</h6>
                                <div class="grid grid-cols-2">
                                    @foreach($page_settings->contact_office_operational as $operational)
                                        <div class="space-y-1">
                                            <span class="extrasmall">{{ $operational['from_day'] }} - {{ $operational['to_day'] }}</span>
                                            <p>{{ $operational['from_hour'] }} - {{ $operational['to_hour'] }} {{ $operational['timezone'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="space-y-2">
                                <h6>Informasi Lainnya</h6>
                                <p class="small">{{ $page_settings->contact_office_information }}</p>
                            </div>
                            <div class="flex justify-center py-4">
                                <x-inputs.button-icon type="hyperlink" :newTab="true" href="{{ $page_settings->contact_office_map }}" class="rounded-2xl!" icon="icon-[lucide--map-pin]">
                                    Location
                                </x-inputs.button-icon>
                            </div>
                        </div>
                    </div>
                </x-displays.drawer>
                {{-- Social Media --}}
                <x-displays.simple-card background="white" :background-icon="false" :border="false">
                    <h3>Social Media</h3>
                    <p>Dapatkan informasi produk terbaru di media sosial resmi Quantum</p>
                    <x-slot:icon>
                        <span class="icon-[tdesign--share] text-qt-green-normal text-[40px]"></span>
                    </x-slot:icon>
                    <x-slot:button>
                        <div class="flex justify-between">
                            <x-inputs.button-icon type="button" icon="icon-[material-symbols--info-outline-rounded]" event="$store.contactSocmedDrawer.openDrawer()" class="border-[#D9E9EB] rounded-2xl!" />
                            <div class="flex gap-2">
                                <a href="{{ $page_settings->contact_socmed_instagram }}" target="_blank" class="flex justify-center items-center size-[58px] bg-[#E7F1F2] rounded-2xl">
                                    <span class="icon-[mdi--instagram] text-qt-green-normal text-3xl"></span>
                                </a>
                                <a href="{{ $page_settings->contact_socmed_youtube }}" target="_blank" class="flex justify-center items-center size-[58px] bg-[#E7F1F2] rounded-2xl">
                                    <span class="icon-[mdi--youtube] text-qt-green-normal text-3xl"></span>
                                </a>
                                <a href="{{ $page_settings->contact_socmed_tiktok }}" target="_blank" class="flex justify-center items-center size-[58px] bg-[#E7F1F2] rounded-2xl">
                                    <span class="icon-[ic--baseline-tiktok] text-qt-green-normal text-3xl"></span>
                                </a>
                            </div>
                        </div>
                    </x-slot:button>
                </x-displays.simple-card>
                <x-displays.drawer store="contactSocmedDrawer">
                    <div class="flex flex-col gap-5 px-4">
                        <div class="flex justify-between items-center gap-7">
                            <h3>Social Media</h3>
                            <span class="icon-[tdesign--share] shrink-0 text-qt-green-normal text-[40px]"></span>
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="flex flex-col gap-1">
                                <h6>Jam Operasional Message over Socmed</h6>
                                <div class="grid grid-cols-2">
                                    @foreach($page_settings->contact_socmed_operational as $operational)
                                        <div class="space-y-1">
                                            <span class="extrasmall">{{ $operational['from_day'] }} - {{ $operational['to_day'] }}</span>
                                            <p>{{ $operational['from_hour'] }} - {{ $operational['to_hour'] }} {{ $operational['timezone'] }}</p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="space-y-2">
                                <h6>Informasi Lainnya</h6>
                                <p class="small">{{ $page_settings->contact_socmed_information }}</p>
                            </div>
                            <div class="flex flex-wrap justify-center gap-2 py-4 max-w-60 mx-auto min-[360px]:max-w-full min-[360px]:flex-nowrap">
                                <x-inputs.button-icon type="hyperlink" :newTab="true" href="{{ $page_settings->contact_socmed_tiktok }}" class="rounded-2xl!" icon="icon-[ic--baseline-tiktok]" />
                                <x-inputs.button-icon type="hyperlink" :newTab="true" href="{{ $page_settings->contact_socmed_linkedin }}" class="rounded-2xl!" icon="icon-[jam--linkedin]" />
                                <x-inputs.button-icon type="hyperlink" :newTab="true" href="{{ $page_settings->contact_socmed_youtube }}" class="rounded-2xl!" icon="icon-[mdi--youtube]" />
                                <x-inputs.button-icon type="hyperlink" :newTab="true" href="{{ $page_settings->contact_socmed_instagram }}" class="rounded-2xl!" icon="icon-[mdi--instagram]" />
                                <x-inputs.button-icon type="hyperlink" :newTab="true" href="{{ $page_settings->contact_socmed_facebook }}" class="rounded-2xl!" icon="icon-[ri--facebook-fill]" />
                            </div>
                        </div>
                    </div>
                </x-displays.drawer>
            </div>
        </section>
        <section class="relative">
            <img src="{{ asset('images/contact-banner.jpg') }}" alt="">
            <div class="absolute top-0 left-0 flex flex-col gap-8 size-full py-[60px] px-4">
                <div class="text-white space-y-4 text-center max-w-sm mx-auto">
                    <h2>{{ $page_settings->contact_title_service }}</h2>
                    <p>{{ $page_settings->contact_description_service }}</p>
                </div>
                <div class="flex justify-center">
                    <x-inputs.button type="hyperlink" href="{{ route('support.service-center') }}" size="lg" color="white">
                        Selengkapnya
                    </x-inputs.button>
                </div>
            </div>
        </section>
    </main>
@endsection
