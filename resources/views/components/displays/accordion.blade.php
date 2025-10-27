<div x-data="{ isOpen: false, last: @json($last), toggleAccordion() {
    this.isOpen = !this.isOpen;

    if (this.isOpen) {
        this.$nextTick(() => {
            this.$refs.content.style.maxHeight = this.$refs.content.scrollHeight + 'px';
        });
    } else {
        this.$refs.content.style.maxHeight = null;
    }
} }" :class="last && !isOpen ? 'border-none' : 'border-b'" @class([
    'transition-all duration-300 ease-in-out flex flex-col',
    'border-[#DBDBDB]' => !$last,
    'border-[#B3B3B3]' => $last,
])>
    <button type="button" @click="toggleAccordion" class="flex items-center justify-between gap-3 py-4 transition-all duration-300 ease-in-out cursor-pointer">
        <p class="font-semibold text-sm tracking-[0.5px] text-[#0D545C]">{{ $title }}</p>
        <div class="relative col-span-2">
            <div class="flex items-center justify-center size-4">
                <span :class="isOpen && 'rotate-180'" class="icon-[lucide--chevron-down] transition-all duration-200 ease-in-out text-qt-green-normal text-lg"></span>
            </div>
        </div>
    </button>
    <div x-ref="content" class="overflow-hidden transition-all duration-300 ease-in-out max-h-0">
        {{ $slot }}
    </div>
</div>
