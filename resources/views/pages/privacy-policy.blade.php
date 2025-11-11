@extends('app')

@section('content')
    <main x-data="privacyPolicy" class="bg-white">
        <div class="pt-[60px] pb-8 px-6">
            <h2>Kebijakan Privasi</h2>
        </div>
        <div :class="isTop ? 'top-[88px] duration-300 delay-150' : 'top-0 duration-150'" class="sticky z-40 transition-all ease-in-out flex gap-8 w-full px-8 bg-[#F4F4F4]">
            <a href="#kebijakan-privasi" class="inline-block relative py-5 font-semibold text-sm before:absolute before:left-0 before:bottom-0 before:content-[''] before:w-full before:h-[3px] before:bg-qt-green-normal before:rounded-t-xl">Kebijakan Privasi</a>
            <a href="#penggunaan-cookies" class="inline-block relative py-5 font-semibold text-sm text-[#6D6D6D]">Penggunaan Cookies</a>
        </div>
        <section id="kebijakan-privasi" class="flex flex-col gap-6 pt-[50px] pb-20 px-6 scroll-mt-28 border-b border-[#DBDBDB]">
            <div class="space-y-2.5">
                <h3>Kebijakan Privasi</h3>
                <p>Terakhir diperbarui: 25 Juli 2025</p>
            </div>
            <div class="space-y-4">
                <p>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.</p>
                <ol class="list-decimal space-y-6 ml-5">
                    <li class="space-y-2">
                        <h5>Headline</h5>
                        <p>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.</p>
                    </li>
                    <li class="space-y-2">
                        <h5>Headline</h5>
                        <p>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.</p>
                    </li>
                    <li class="space-y-2">
                        <h5>Headline</h5>
                        <p>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.</p>
                    </li>
                    <li class="space-y-2">
                        <h5>Headline</h5>
                        <p>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.</p>
                    </li>
                    <li class="space-y-2">
                        <h5>Headline</h5>
                        <p>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.</p>
                    </li>
                </ol>
                <p>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.</p>
            </div>
        </section>
        <section id="penggunaan-cookies" class="flex flex-col gap-6 pt-[50px] pb-20 px-6 scroll-mt-28">
            <div class="space-y-2.5">
                <h3>Penggunaan Cookies</h3>
                <p>Terakhir diperbarui: 25 Juli 2025</p>
            </div>
            <div class="space-y-4">
                <p>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.</p>
                <ol class="list-decimal space-y-6 ml-5">
                    <li class="space-y-2">
                        <h5>Headline</h5>
                        <p>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.</p>
                    </li>
                    <li class="space-y-2">
                        <h5>Headline</h5>
                        <p>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.</p>
                    </li>
                    <li class="space-y-2">
                        <h5>Headline</h5>
                        <p>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.</p>
                    </li>
                    <li class="space-y-2">
                        <h5>Headline</h5>
                        <p>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.</p>
                    </li>
                    <li class="space-y-2">
                        <h5>Headline</h5>
                        <p>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.</p>
                    </li>
                </ol>
                <p>Lorem ipsum dolor sit amet consectetur. Vestibulum odio tellus imperdiet sollicitudin. Consequat gravida sit mauris mi cursus. Dui a blandit suspendisse suspendisse tincidunt felis diam pretium. Sem vel egestas pulvinar porttitor diam morbi varius. Amet aliquam adipiscing tellus vitae enim facilisis.</p>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('privacyPolicy', () => ({
            isTop: false,

            init() {
                let yprev;

                document.addEventListener('scroll', () => {
                    let y = window.pageYOffset;
                    this.isTop = y > yprev ? false : true;
                    yprev = y;
                });
            },
        }))
    })
</script>
@endpush
