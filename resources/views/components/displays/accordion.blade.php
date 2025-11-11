<div x-data="{ isOpen: @json($open), last: @json($last), type: '{{ $type }}', init() {
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
} }" :class="{
    'border-none': type === 'secondary',
    'border-b': !last || isOpen && type === 'primary',
    'border-[#DBDBDB]': !last && type === 'primary',
    'border-[#B3B3B3]': last && type === 'primary',
}" class="transition-all duration-300 ease-in-out flex flex-col">
    <button type="button" @click="toggleAccordion" @class([
        'border-b border-[#CECECE]' => $type === 'secondary',
        'flex items-center justify-between gap-3 py-4 transition-all duration-300 ease-in-out cursor-pointer'
    ])>
        @if ($type === 'primary')
            <p class="font-semibold text-sm tracking-[0.5px] text-[#0D545C]">{{ $title }}</p>
        @elseif ($type === 'secondary')
            <h4>{{ $title }}</h4>
        @endif
        <div class="shrink-0 relative col-span-2">
            <div @class([
                'size-4' => $type === 'primary',
                'size-6' => $type === 'secondary',
                'flex items-center justify-center'
            ])>
                <span :class="isOpen && 'rotate-180'" @class([
                    'text-qt-green-normal text-lg' => $type === 'primary',
                    'text-[#6D6D6D] text-2xl' => $type === 'secondary',
                    'icon-[lucide--chevron-down] transition-all duration-200 ease-in-out'
                ])></span>
            </div>
        </div>
    </button>
    <div x-ref="content" class="overflow-hidden transition-all duration-300 ease-in-out max-h-0">
        {{ $slot }}
    </div>
</div>
