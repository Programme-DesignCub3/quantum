@extends('app')

@section('content')
    <main class="bg-[#F4F4F4]">
        <section class="flex flex-col gap-8 pt-[116px] pb-[100px] px-4">
            <div class="space-y-4 text-center max-w-xs mx-auto">
                <h1>Kontak Resmi</h1>
                <p class="large">Hubungi Kontak Resmi Quantum untuk berbagai layanan bantuan dan keperluan Anda seputar produk</p>
            </div>
            <div class="flex flex-col gap-4">
                <x-displays.simple-card background="white" :background-icon="false" :border="false">
                    <h3>Call Center</h3>
                    <p>Hubungi tim layanan Quantum untuk info dan bantuan</p>
                    <x-slot:icon>
                        <x-icons.customer-care-icon class="fill-qt-green-normal size-[42px]" />
                    </x-slot:icon>
                    <x-slot:button>
                        <div class="flex justify-between">
                            <x-inputs.button-icon type="button" size="lg" icon="icon-[material-symbols--info-outline-rounded]" class="border-[#D9E9EB]" />
                            <x-inputs.button type="button" size="lg" class="rounded-2xl">
                                Call
                            </x-inputs.button>
                        </div>
                    </x-slot:button>
                </x-displays.simple-card>
                <x-displays.simple-card background="white" :background-icon="false" :border="false">
                    <h3>Whatsapp</h3>
                    <p>Tanya seputar produk dan garansi di Live Chat WhatsApp.</p>
                    <x-slot:icon>
                        <span class="icon-[ic--baseline-whatsapp] text-qt-green-normal text-[42px]"></span>
                    </x-slot:icon>
                    <x-slot:button>
                        <div class="flex justify-between">
                            <x-inputs.button-icon type="button" size="lg" icon="icon-[material-symbols--info-outline-rounded]" class="border-[#D9E9EB]" />
                            <x-inputs.button type="button" size="lg" class="rounded-2xl">
                                Chat
                            </x-inputs.button>
                        </div>
                    </x-slot:button>
                </x-displays.simple-card>
                <x-displays.simple-card background="white" :background-icon="false" :border="false">
                    <h3>Email</h3>
                    <p>Sampaikan kebutuhan Anda via email resmi Quantum</p>
                    <x-slot:icon>
                        <span class="icon-[lucide--mail] text-qt-green-normal text-[42px]"></span>
                    </x-slot:icon>
                    <x-slot:button>
                        <div class="flex justify-between">
                            <x-inputs.button-icon type="button" size="lg" icon="icon-[material-symbols--info-outline-rounded]" class="border-[#D9E9EB]" />
                            <x-inputs.button type="button" size="lg" class="rounded-2xl">
                                Email
                            </x-inputs.button>
                        </div>
                    </x-slot:button>
                </x-displays.simple-card>
                <x-displays.simple-card background="white" :background-icon="false" :border="false">
                    <h3>Office</h3>
                    <p>Tim layanan Quantum siap menjawab pertanyaan Anda</p>
                    <x-slot:icon>
                        <span class="icon-[ci--building-04] text-qt-green-normal text-[42px]"></span>
                    </x-slot:icon>
                    <x-slot:button>
                        <div class="flex justify-between">
                            <x-inputs.button-icon type="button" size="lg" icon="icon-[material-symbols--info-outline-rounded]" class="border-[#D9E9EB]" />
                            <x-inputs.button type="button" size="lg" class="rounded-2xl">
                                Maps
                            </x-inputs.button>
                        </div>
                    </x-slot:button>
                </x-displays.simple-card>
                <x-displays.simple-card background="white" :background-icon="false" :border="false">
                    <h3>Social Media</h3>
                    <p>Dapatkan informasi produk terbaru di media sosial resmi Quantum</p>
                    <x-slot:icon>
                        <span class="icon-[tdesign--share] text-qt-green-normal text-[42px]"></span>
                    </x-slot:icon>
                    <x-slot:button>
                        <div class="flex justify-between">
                            <x-inputs.button-icon type="button" size="lg" icon="icon-[material-symbols--info-outline-rounded]" class="border-[#D9E9EB]" />
                            <div class="flex gap-2">
                                <a href="https://www.instagram.com/quantum_indonesia" target="_blank" class="flex justify-center items-center size-14 bg-[#E7F1F2] rounded-2xl">
                                    <span class="icon-[mdi--instagram] text-qt-green-normal text-3xl"></span>
                                </a>
                                <a href="https://www.youtube.com/@quantumindonesia" target="_blank" class="flex justify-center items-center size-14 bg-[#E7F1F2] rounded-2xl">
                                    <span class="icon-[mdi--youtube] text-qt-green-normal text-3xl"></span>
                                </a>
                                <a href="https://www.tiktok.com/@quantum_indonesia" target="_blank" class="flex justify-center items-center size-14 bg-[#E7F1F2] rounded-2xl">
                                    <span class="icon-[ic--baseline-tiktok] text-qt-green-normal text-3xl"></span>
                                </a>
                            </div>
                        </div>
                    </x-slot:button>
                </x-displays.simple-card>
            </div>
        </section>
        <section class="relative">
            <img src="{{ asset('images/contact-banner.jpg') }}" alt="">
            <div class="absolute top-0 left-0 flex flex-col gap-8 size-full py-[60px] px-4">
                <div class="text-white space-y-4 text-center max-w-sm mx-auto">
                    <h2>Service Center Quantum</h2>
                    <p>Pusat Servis Resmi Quantum yang profesional dan terpercaya siap membantu Anda untuk berbagai layanan seputar produk</p>
                </div>
                <div class="flex justify-center">
                    <x-inputs.button type="button" size="lg" color="white">
                        Selengkapnya
                    </x-inputs.button>
                </div>
            </div>
        </section>
    </main>
@endsection
