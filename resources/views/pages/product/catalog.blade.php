@extends('app')

@section('meta_title', $meta_title ?? 'Katalog')
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image)

@section('breadcrumbs')
    {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endsection

@section('content')
    <main x-data class="bg-[#F4F4F4]">
        <section class="container flex flex-col gap-[62px] pt-[116px] px-4 pb-6 sm:px-6">
            {{-- Heading --}}
            <div class="space-y-4 max-w-sm mx-auto text-center sm:max-w-5xl">
                <h1>{{ $page_settings->catalog_title }}</h1>
                <p class="large">{{ $page_settings->catalog_description }}</p>
            </div>
            <livewire:displays.catalog-list />
        </section>
    </main>
@endsection

@push('scripts')
<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('close-catalog-drawer', () => {
            Alpine.store('catalogDrawer').open = false;
        });
    });
</script>
@endpush
