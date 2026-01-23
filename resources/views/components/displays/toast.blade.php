<div x-data="{ init() {
    $watch('status', (value) => {
        if (value) {
            setTimeout(() => {
                status = false;
            }, 5000);
        }
    });
} }" x-cloak :class="status ? 'scale-100' : 'scale-0'" class="visible fixed bottom-12 flex justify-center items-center gap-2 text-sm z-50 -translate-x-1/2 left-1/2 transition-all duration-300 ease-in-out font-medium bg-white drop-shadow-float px-8 py-2 w-60 rounded-full">
    <i class="icon-[material-symbols--check-circle-rounded] text-xl text-qt-green-normal"></i>
    {{ $slot }}
</div>
