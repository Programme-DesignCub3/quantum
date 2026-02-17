<div x-data x-cloak x-effect="document.body.style.overflow = $store.{{ $store }}.open ? 'hidden' : 'auto'" @click.self="$store.{{ $store }}.closeDrawer()" @keydown.escape.window="$store.{{ $store }}.closeDrawer()" :class="$store.{{ $store }}.open ? 'visible bg-black/40' : 'invisible bg-black/0'" class="fixed z-50 left-1/2 top-0 -translate-x-1/2 transition-all duration-300 ease-in-out w-full min-h-dvh overflow-hidden hidden md:block">
    <div @click.self="$store.{{ $store }}.closeDrawer()" class="absolute w-full flex justify-center items-center px-6 transition-all duration-300 ease-in-out top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2" :class="$store.{{ $store }}.open ? 'opacity-100' : 'opacity-0'">
        {{ $slot }}
    </div>
</div>
