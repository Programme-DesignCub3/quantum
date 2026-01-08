@extends('app')

@section('meta_title', $meta_title ?? config('app.name'))
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image ?? asset('images/og-image.png'))

@section('content')
    <main x-data="faq" class="bg-white">
        <div class="space-y-4 text-center pt-[116px] pb-[46px] px-6">
            <h1>Butuh Bantuan, Bu?</h1>
            <p class="large">Kami rangkum pertanyaan yang sering muncul supaya Ibu lebih tenang dan nyaman.</p>
        </div>
        <div id="tabs-border-anchor" :class="isTop ? 'top-[68px] duration-150 delay-200' : 'top-0 duration-50'" class="sticky z-30 transition-all ease-in-out flex gap-8 w-full overflow-x-auto px-8 bg-[#F4F4F4]">
            <a href="#produk" class="tab-border active">Produk</a>
            <a href="#pembelian" class="tab-border">Pembelian</a>
            <a href="#garansi" class="tab-border">Garansi</a>
        </div>
        <section class="flex flex-col gap-[42px] py-20 px-4">
            <div id="produk" class="scrollspy flex flex-col gap-8 scroll-mt-24">
                <h2>Sub Question Produk</h2>
                <div class="flex flex-col gap-4">
                    @for($i = 1; $i <= 3; $i++)
                        <x-displays.accordion title="Headline FAQ?" type="tertiary">
                            <div class="mt-6">
                                <p class="large">Detil answer Lorem ipsum dolor sit amet consectetur. Pharetra nisl massa nisi eu non aliquet neque tempus. Vulputate nullam pellentesque nulla non. Amet varius consectetur amet libero ullamcorper bibendum sollicitudin. Nisi orci sit id ultrices a risus. Neque lorem ipsum tristique iaculis nunc. Sodales lectus amet elementum molestie non sit nibh velit.</p>
                            </div>
                        </x-displays.accordion>
                    @endfor
                </div>
            </div>
            <div id="pembelian" class="scrollspy flex flex-col gap-8 scroll-mt-24">
                <h2>Sub Question Pembelian</h2>
                <div class="flex flex-col gap-4">
                    @for($i = 1; $i <= 3; $i++)
                        <x-displays.accordion title="Headline FAQ?" type="tertiary">
                            <div class="mt-6">
                                <p class="large">Detil answer Lorem ipsum dolor sit amet consectetur. Pharetra nisl massa nisi eu non aliquet neque tempus. Vulputate nullam pellentesque nulla non. Amet varius consectetur amet libero ullamcorper bibendum sollicitudin. Nisi orci sit id ultrices a risus. Neque lorem ipsum tristique iaculis nunc. Sodales lectus amet elementum molestie non sit nibh velit.</p>
                            </div>
                        </x-displays.accordion>
                    @endfor
                </div>
            </div>
            <div id="garansi" class="scrollspy flex flex-col gap-8 scroll-mt-24">
                <h2>Sub Question Garansi</h2>
                <div class="flex flex-col gap-4">
                    @for($i = 1; $i <= 3; $i++)
                        <x-displays.accordion title="Headline FAQ?" type="tertiary">
                            <div class="mt-6">
                                <p class="large">Detil answer Lorem ipsum dolor sit amet consectetur. Pharetra nisl massa nisi eu non aliquet neque tempus. Vulputate nullam pellentesque nulla non. Amet varius consectetur amet libero ullamcorper bibendum sollicitudin. Nisi orci sit id ultrices a risus. Neque lorem ipsum tristique iaculis nunc. Sodales lectus amet elementum molestie non sit nibh velit.</p>
                            </div>
                        </x-displays.accordion>
                    @endfor
                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('faq', () => ({
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
