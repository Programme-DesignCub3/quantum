<div :class="copied ? 'bottom-24 scale-100' : '-bottom-full scale-0'" class="fixed bottom-12 flex justify-center items-center gap-2 text-sm z-50 -translate-x-1/2 left-1/2 transition-all duration-300 ease-in-out font-medium bg-white drop-shadow-float px-8 py-2 w-60 rounded-full">
    <i class="icon-[material-symbols--check-circle-rounded] text-xl text-qt-green-normal"></i>
    {{ $slot }}
</div>
