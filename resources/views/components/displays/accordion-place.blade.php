<div x-data="{ isOpen: false, last: @json($last), init() {
    if (this.isOpen) {
        this.$nextTick(() => {
            this.$refs.content.style.maxHeight = this.$refs.content.scrollHeight + 'px';
        });
    }
}, toggleAccordion() {
    this.isOpen = !this.isOpen;

    if (this.isOpen) {
        this.$nextTick(() => {
            this.$refs.content.style.maxHeight = this.$refs.content.scrollHeight + 'px';
        });
    } else {
        this.$refs.content.style.maxHeight = null;
    }
} }" @class([
    'border-y' => $last,
    'border-t' => !$last,
    'transition-all duration-300 ease-in-out flex flex-col border-qt-green-normal'
])>
    <button type="button" @click="toggleAccordion" class="flex items-center justify-between gap-3 transition-all duration-300 ease-in-out cursor-pointer">
        <div class="flex items-center gap-3">
            <span class="icon-[lucide--map] text-qt-green-normal text-2xl"></span>
            <p class="font-semibold text-lg tracking-[0.5px] text-qt-green-normal py-3">{{ $area }}</p>
        </div>
        <div class="shrink-0 relative col-span-2">
            <div class="relative flex items-center justify-center">
                <span :class="{ 'rotate-180': isOpen }" class="icon-[lucide--chevron-down] transition-all duration-200 ease-in-out text-qt-green-normal text-2xl"></span>
            </div>
        </div>
    </button>
    <div x-ref="content" class="overflow-hidden transition-all duration-300 ease-in-out max-h-0">
        {{ $slot }}
    </div>
</div>
