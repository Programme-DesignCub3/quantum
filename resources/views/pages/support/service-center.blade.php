@extends('app')

@section('meta_title', $meta_title ?? 'Service Center')
@section('meta_description', $meta_description ?? 'Kompor dan regulator berkualitas dari Quantum sebagai solusi kebutuhan dapur Anda. Tersedia di berbagai marketplace, Miliki sekarang juga!')
@section('meta_keywords', $meta_keywords ?? 'kompor, kompor gas, kompor quantum, kompor indonesia, regulator gas, selang gas')
@section('meta_image', $meta_image)

@section('breadcrumbs')
    {{ Breadcrumbs::render(Route::currentRouteName()) }}
@endsection

@section('content')
    <main x-data="serviceCenter" class="bg-white">
        <section class="flex flex-col">
            <div class="space-y-4 max-w-md mx-auto text-center pt-[116px] pb-[46px] px-6">
                <h1>{{ $page_settings->sc_title }}</h1>
                <p class="large">{{ $page_settings->sc_description }}</p>
            </div>
            <div :class="$store.scrollStack.isTop ? 'top-[68px] duration-150 delay-200' : 'top-0 duration-50'" class="sticky z-30 transition-all ease-in-out flex gap-8 w-full overflow-x-auto px-8 bg-[#F4F4F4]">
                <button type="button" @click="changeTab('service-center')" class="tab-border cursor-pointer" :class="currentTab === 'service-center' && 'active'">Service Center</button>
                <button type="button" @click="changeTab('mitra-service')" class="tab-border cursor-pointer" :class="currentTab === 'mitra-service' && 'active'">Mitra Service</button>
            </div>
            <livewire:displays.service-center-list />
            <livewire:displays.service-partner-list />
        </section>
    </main>
@endsection

@push('scripts')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('serviceCenter', () => ({
            currentTab: 'service-center',

            changeTab(tab) {
                this.currentTab = tab
                this.$store.placeDetailDrawer.data = null
                this.$store.placeDetailDrawer.closeEmbedMap()
                Livewire.dispatch('change-tab');
            }
        }))
    })
</script>
@endpush
