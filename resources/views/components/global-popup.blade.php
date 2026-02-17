{{-- Product --}}
<x-displays.drawer store="productDrawer" color="green">
    <x-layouts.product-layout />
</x-displays.drawer>
<x-displays.modal store="productDrawer">
    <div class="relative w-full grid grid-cols-2 bg-white drop-shadow-float-lg rounded-3xl overflow-hidden min-[830px]:w-4xl">
        <div class="absolute top-3 right-3">
            <button type="button" @click="$store.productDrawer.closeDrawer()" class="rounded-full cursor-pointer size-10 flex justify-center items-center bg-white">
                <span class="icon-[material-symbols--close-rounded] text-2xl"></span>
            </button>
        </div>
        <div class="relative aspect-square w-full h-[400px] overflow-hidden">
            <img class="size-full object-cover" :src="$store.productDrawer.data?.image" :alt="($store.productDrawer.data?.category ?? '') + ' ' + ($store.productDrawer.data?.name ?? '')">
        </div>
        <x-layouts.product-layout />
    </div>
</x-displays.modal>

{{-- Share --}}
<x-displays.drawer store="shareDrawer">
    <x-layouts.share-layout />
</x-displays.drawer>
<x-displays.modal store="shareDrawer">
    <div class="relative w-md bg-white drop-shadow-float-lg rounded-3xl overflow-hidden p-10">
        <div class="absolute top-3 right-3">
            <button type="button" @click="$store.shareDrawer.closeDrawer()" class="rounded-full cursor-pointer size-10 flex justify-center items-center">
                <span class="icon-[material-symbols--close-rounded] text-2xl"></span>
            </button>
        </div>
        <x-layouts.share-layout />
    </div>
</x-displays.modal>

{{-- Place Detail --}}
<x-displays.drawer store="placeDetailDrawer">
    <x-layouts.place-detail-layout />
</x-displays.drawer>
<x-displays.modal store="placeDetailDrawer">
    <div class="relative w-full grid bg-white drop-shadow-float-lg rounded-3xl overflow-hidden" :class="$store.placeDetailDrawer.data?.image ? 'grid-cols-2 min-[830px]:w-4xl' : 'grid-cols-1 min-[830px]:w-xl'">
        <div class="absolute top-3 right-3">
            <button type="button" @click="$store.placeDetailDrawer.closeDrawer()" class="rounded-full cursor-pointer size-10 flex justify-center items-center">
                <span class="icon-[material-symbols--close-rounded] text-2xl"></span>
            </button>
        </div>
        <template x-if="$store.placeDetailDrawer.data?.image">
            <div class="relative overflow-hidden">
                <img class="aspect-square size-full object-cover" :src="$store.placeDetailDrawer.data?.image" :alt="$store.placeDetailDrawer.data?.name">
            </div>
        </template>
        <x-layouts.place-detail-layout />
    </div>
</x-displays.modal>

{{-- Number Model --}}
<x-displays.drawer store="numberModelDrawer">
    <x-layouts.number-model-layout />
</x-displays.drawer>
<x-displays.modal store="numberModelDrawer">
    <div class="relative w-full bg-white drop-shadow-float-lg rounded-3xl overflow-hidden min-[830px]:w-xl">
        <div class="absolute top-3 right-3">
            <button type="button" @click="$store.numberModelDrawer.closeDrawer()" class="rounded-full cursor-pointer size-10 flex justify-center items-center">
                <span class="icon-[material-symbols--close-rounded] text-2xl"></span>
            </button>
        </div>
        <x-layouts.number-model-layout />
    </div>
</x-displays.modal>

{{-- Contact --}}
<x-displays.drawer store="contactDrawer">
    <x-layouts.contact-layout />
</x-displays.drawer>
<x-displays.modal store="contactDrawer">
    <div class="relative w-full grid grid-cols-2 bg-white drop-shadow-float-lg rounded-3xl overflow-hidden min-[830px]:w-3xl">
        <div class="absolute top-3 right-3">
            <button type="button" @click="$store.contactDrawer.closeDrawer()" class="rounded-full cursor-pointer size-10 flex justify-center items-center">
                <span class="icon-[material-symbols--close-rounded] text-2xl"></span>
            </button>
        </div>
        <div class="overflow-hidden">
            <img class="size-full object-cover" src="{{ asset('images/modal-contact.jpg') }}" alt="">
        </div>
        <x-layouts.contact-layout />
    </div>
</x-displays.modal>

{{-- Video --}}
<div x-data x-cloak x-effect="document.body.style.overflow = $store.videoModal.open ? 'hidden' : 'auto'" @keydown.escape.window="$store.videoModal.closeVideo()" :class="$store.videoModal.open ? 'visible bg-black/40' : 'invisible bg-black/0'" class="fixed z-50 left-1/2 top-0 -translate-x-1/2 transition-all duration-300 ease-in-out max-w-full w-full mx-auto min-h-dvh overflow-hidden flex justify-center items-center px-4">
    <div :class="$store.videoModal.open ? 'visible' : 'invisible'" class="flex grow flex-col gap-2 drop-shadow-float-lg md:rounded-2xl md:max-w-3xl md:relative">
        <div class="flex justify-end md:absolute md:z-60 md:-top-4 md:-right-4">
            <button type="button" @click="$store.videoModal.closeVideo()" class="size-6 cursor-pointer md:rounded-full md:size-10 md:bg-white md:flex md:justify-center md:items-center">
                <span class="icon-[material-symbols--close-rounded] text-2xl text-white md:text-black"></span>
            </button>
        </div>
        <template x-if="$store.videoModal.data?.type === 'local'">
            <video x-ref="videoPlayer" class="w-full aspect-video rounded-2xl bg-black" controls playsinline webkit-playsinline>
                <source :src="$store.videoModal.data?.src" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </template>
        <template x-if="$store.videoModal.data?.type === 'youtube'">
            <iframe class="w-full aspect-video bg-black rounded-2xl" :src="$store.videoModal.open ? 'https://www.youtube.com/embed/' + $store.videoModal.data?.src : ''" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </template>
    </div>
</div>
