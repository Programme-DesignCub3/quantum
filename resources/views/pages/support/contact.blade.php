@extends('app')

@section('meta_title', $meta_title ?? 'Kontak')
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image)

@section('breadcrumbs')
    {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endsection

@section('content')
    <main x-data class="bg-[#F4F4F4]">
        <section class="container flex flex-col gap-8 pt-[116px] pb-[100px] px-4 sm:px-6 md:gap-16">
            {{-- Heading --}}
            <div class="space-y-4 text-center max-w-sm mx-auto sm:max-w-5xl md:text-left md:mx-0">
                <h1>{{ $page_settings->contact_title }}</h1>
                <p class="large">{{ $page_settings->contact_description }}</p>
            </div>
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
                {{-- Call Center --}}
                <x-displays.simple-card background="white" :background-icon="false" :border="false">
                    <h3 class="md:text-2xl">Call Center</h3>
                    <p>Hubungi tim layanan Quantum untuk info dan bantuan</p>
                    <x-slot:icon>
                        <x-icons.customer-care-icon id="contact-customer-care" class="fill-qt-green-normal size-10" />
                    </x-slot:icon>
                    <x-slot:button>
                        <div class="flex justify-between">
                            <x-inputs.button-icon type="button" icon="icon-[material-symbols--info-outline-rounded]" event="$store.contactCallDrawer.openDrawer()" class="rounded-2xl!" />
                            <x-inputs.button type="hyperlink" href="{{ 'tel:' . $page_settings->contact_cc_number_formatted }}" class="rounded-2xl!">
                                Call
                            </x-inputs.button>
                        </div>
                    </x-slot:button>
                </x-displays.simple-card>
                <x-displays.drawer store="contactCallDrawer">
                    <x-layouts.contacts.call-center-layout :settings="$page_settings" />
                </x-displays.drawer>
                <x-displays.modal store="contactCallDrawer">
                    <div class="relative w-full bg-white drop-shadow-float-lg rounded-3xl overflow-hidden p-10 min-[830px]:w-xl">
                        <div class="absolute top-3 right-3">
                            <button type="button" @click="$store.contactCallDrawer.closeDrawer()" class="rounded-full cursor-pointer size-10 flex justify-center items-center">
                                <span class="icon-[material-symbols--close-rounded] text-2xl"></span>
                            </button>
                        </div>
                        <x-layouts.contacts.call-center-layout :settings="$page_settings" />
                    </div>
                </x-displays.modal>
                {{-- WhatsApp --}}
                <x-displays.simple-card background="white" :background-icon="false" :border="false">
                    <h3 class="md:text-2xl">WhatsApp</h3>
                    <p>Tanya seputar produk dan garansi di Live Chat WhatsApp.</p>
                    <x-slot:icon>
                        <span class="icon-[ic--baseline-whatsapp] text-qt-green-normal text-[40px]"></span>
                    </x-slot:icon>
                    <x-slot:button>
                        <div class="flex justify-between">
                            <x-inputs.button-icon type="button" icon="icon-[material-symbols--info-outline-rounded]" event="$store.contactWhatsAppDrawer.openDrawer()" class="rounded-2xl!" />
                            <x-inputs.button type="hyperlink" :newTab="true" href="{{ 'https://wa.me/' . $page_settings->contact_wa_number_formatted }}" class="rounded-2xl!">
                                Chat
                            </x-inputs.button>
                        </div>
                    </x-slot:button>
                </x-displays.simple-card>
                <x-displays.drawer store="contactWhatsAppDrawer">
                    <x-layouts.contacts.whatsapp-layout :settings="$page_settings" />
                </x-displays.drawer>
                <x-displays.modal store="contactWhatsAppDrawer">
                    <div class="relative w-full bg-white drop-shadow-float-lg rounded-3xl overflow-hidden p-10 min-[830px]:w-xl">
                        <div class="absolute top-3 right-3">
                            <button type="button" @click="$store.contactWhatsAppDrawer.closeDrawer()" class="rounded-full cursor-pointer size-10 flex justify-center items-center">
                                <span class="icon-[material-symbols--close-rounded] text-2xl"></span>
                            </button>
                        </div>
                        <x-layouts.contacts.whatsapp-layout :settings="$page_settings" />
                    </div>
                </x-displays.modal>
                {{-- Email --}}
                <x-displays.simple-card background="white" :background-icon="false" :border="false">
                    <h3 class="md:text-2xl">Email</h3>
                    <p>Sampaikan kebutuhan Anda via email resmi Quantum</p>
                    <x-slot:icon>
                        <span class="icon-[lucide--mail] text-qt-green-normal text-[40px]"></span>
                    </x-slot:icon>
                    <x-slot:button>
                        <div class="flex justify-between">
                            <x-inputs.button-icon type="button" icon="icon-[material-symbols--info-outline-rounded]" event="$store.contactEmailDrawer.openDrawer()" class="rounded-2xl!" />
                            <x-inputs.button type="hyperlink" href="{{ 'mailto:' . $page_settings->contact_email }}" class="rounded-2xl!">
                                Email
                            </x-inputs.button>
                        </div>
                    </x-slot:button>
                </x-displays.simple-card>
                <x-displays.drawer store="contactEmailDrawer">
                    <x-layouts.contacts.email-layout :settings="$page_settings" />
                </x-displays.drawer>
                <x-displays.modal store="contactEmailDrawer">
                    <div class="relative w-full bg-white drop-shadow-float-lg rounded-3xl overflow-hidden p-10 min-[830px]:w-xl">
                        <div class="absolute top-3 right-3">
                            <button type="button" @click="$store.contactEmailDrawer.closeDrawer()" class="rounded-full cursor-pointer size-10 flex justify-center items-center">
                                <span class="icon-[material-symbols--close-rounded] text-2xl"></span>
                            </button>
                        </div>
                        <x-layouts.contacts.email-layout :settings="$page_settings" />
                    </div>
                </x-displays.modal>
                {{-- Office --}}
                <x-displays.simple-card background="white" :background-icon="false" :border="false">
                    <h3 class="md:text-2xl">Office</h3>
                    <p>Tim layanan Quantum siap menjawab pertanyaan Anda</p>
                    <x-slot:icon>
                        <span class="icon-[ci--building-04] text-qt-green-normal text-[40px]"></span>
                    </x-slot:icon>
                    <x-slot:button>
                        <div class="flex justify-between">
                            <x-inputs.button-icon type="button" icon="icon-[material-symbols--info-outline-rounded]" event="$store.contactOfficeDrawer.openDrawer()" class="rounded-2xl!" />
                            <x-inputs.button type="hyperlink" :newTab="true" href="{{ $page_settings->contact_office_map }}" class="rounded-2xl!">
                                Maps
                            </x-inputs.button>
                        </div>
                    </x-slot:button>
                </x-displays.simple-card>
                <x-displays.drawer store="contactOfficeDrawer">
                    <x-layouts.contacts.office-layout :settings="$page_settings" />
                </x-displays.drawer>
                <x-displays.modal store="contactOfficeDrawer">
                    <div @class([
                        'grid-cols-2 min-[830px]:w-4xl' => isset($page_settings->contact_office_image) && $page_settings->contact_office_image != '',
                        'grid-cols-1 min-[830px]:w-xl' => !isset($page_settings->contact_office_image) || $page_settings->contact_office_image == '',
                        'relative w-full grid bg-white drop-shadow-float-lg rounded-3xl overflow-hidden'
                    ])>
                        <div class="absolute top-3 right-3">
                            <button type="button" @click="$store.contactOfficeDrawer.closeDrawer()" class="rounded-full cursor-pointer size-10 flex justify-center items-center">
                                <span class="icon-[material-symbols--close-rounded] text-2xl"></span>
                            </button>
                        </div>
                        @if(isset($page_settings->contact_office_image) && $page_settings->contact_office_image != '')
                            <div class="relative overflow-hidden">
                                <img class="aspect-square size-full object-cover" src="{{ asset('storage/' . $page_settings->contact_office_image) }}" alt="{{ $page_settings->contact_office_name }}">
                            </div>
                        @endif
                        <x-layouts.contacts.office-layout :settings="$page_settings" />
                    </div>
                </x-displays.modal>
                {{-- Social Media --}}
                <x-displays.simple-card background="white" :background-icon="false" :border="false">
                    <h3 class="md:text-2xl">Social Media</h3>
                    <p>Dapatkan informasi produk terbaru di media sosial resmi Quantum</p>
                    <x-slot:icon>
                        <span class="icon-[tdesign--share] text-qt-green-normal text-[40px]"></span>
                    </x-slot:icon>
                    <x-slot:button>
                        <div class="flex justify-between">
                            <x-inputs.button-icon type="button" icon="icon-[material-symbols--info-outline-rounded]" event="$store.contactSocmedDrawer.openDrawer()" class="rounded-2xl!" />
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
                    <x-layouts.contacts.social-media-layout :settings="$page_settings" />
                </x-displays.drawer>
                <x-displays.modal store="contactSocmedDrawer">
                    <div class="relative w-full bg-white drop-shadow-float-lg rounded-3xl overflow-hidden p-10 min-[830px]:w-xl">
                        <div class="absolute top-3 right-3">
                            <button type="button" @click="$store.contactSocmedDrawer.closeDrawer()" class="rounded-full cursor-pointer size-10 flex justify-center items-center">
                                <span class="icon-[material-symbols--close-rounded] text-2xl"></span>
                            </button>
                        </div>
                        <x-layouts.contacts.social-media-layout :settings="$page_settings" />
                    </div>
                </x-displays.modal>
            </div>
        </section>
        {{-- Service Center --}}
        <section class="relative">
            <img class="hidden w-full h-[600px] object-cover object-right md:block" src="{{ asset('images/desktop-contact-banner.jpg') }}" alt="">
            <img class="md:hidden" src="{{ asset('images/mobile-contact-banner.jpg') }}" alt="">
            <div class="absolute top-0 left-0 size-full">
                <div class="flex flex-col gap-8 py-[60px] px-4 size-full sm:px-6 md:justify-center md:container">
                    <div class="text-white space-y-4 text-center max-w-sm mx-auto md:text-left md:max-w-xl md:mx-0">
                        <h2>{{ $page_settings->contact_title_service }}</h2>
                        <p>{{ $page_settings->contact_description_service }}</p>
                    </div>
                    <div class="flex justify-center md:justify-start">
                        <x-inputs.button type="hyperlink" href="{{ route('support.service-center') }}" size="lg" color="white">
                            Selengkapnya
                        </x-inputs.button>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
