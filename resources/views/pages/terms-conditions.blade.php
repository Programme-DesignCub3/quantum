@extends('app')

@section('meta_title', $meta_title ?? config('app.name'))
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image ?? asset('images/og-image.png'))

@section('content')
    <main class="flex flex-col gap-8 py-[60px] px-6 bg-white">
        <div class="space-y-2">
            <h2>Syarat & Ketentuan Penggunaan</h2>
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
    </main>
@endsection
