<div x-data="{ isOpen: @json($open), last: @json($last), type: '{{ $type }}', init() {
    if (this.isOpen) {
        this.$refs.content.style.maxHeight = this.$refs.content.scrollHeight + 'px';
    }
}, toggleAccordion() {
    this.isOpen = !this.isOpen;

    if (this.isOpen) {
        this.$refs.content.style.maxHeight = this.$refs.content.scrollHeight + 'px';
    } else {
        this.$refs.content.style.maxHeight = null;
    }
} }" :class="{
    'border-none': type === 'secondary' || type === 'tertiary',
    'border-b': !last || isOpen && type === 'primary',
    'border-[#DBDBDB]': !last && type === 'primary',
    'border-[#B3B3B3]': last && type === 'primary',
}" class="transition-all duration-300 ease-in-out flex flex-col">
    <button type="button" @click="toggleAccordion" @class([
        'border-b border-[#CECECE]' => $type !== 'primary',
        'py-3' => $type === 'tertiary',
        'py-4' => $type !== 'tertiary',
        'flex items-center justify-between gap-3 transition-all duration-300 ease-in-out cursor-pointer'
    ])>
        @if ($type === 'primary')
            <p class="font-semibold text-sm tracking-[0.5px] text-[#0D545C]">{{ $title }}</p>
        @elseif ($type === 'secondary' || $type === 'tertiary')
            <h4>{{ $title }}</h4>
        @endif
        <div class="shrink-0 relative col-span-2">
            <div @class([
                'size-4' => $type === 'primary',
                'size-6' => $type !== 'primary',
                'relative flex items-center justify-center'
            ])>
                <span :class="{
                    'rotate-180': isOpen && type !== 'tertiary',
                    'scale-0': isOpen && type === 'tertiary'
                }" @class([
                    'text-qt-green-normal text-lg' => $type === 'primary',
                    'text-[#6D6D6D] text-2xl' => $type === 'secondary',
                    'text-2xl' => $type === 'tertiary',
                    'icon-[heroicons--plus] text-2xl absolute' => $type === 'tertiary',
                    'icon-[lucide--chevron-down] transition-all duration-200 ease-in-out' => $type !== 'tertiary',
                ])></span>
                @if ($type === 'tertiary')
                    <span class="icon-[heroicons--minus] text-2xl absolute"></span>
                @endif
            </div>
        </div>
    </button>
    <div x-ref="content" class="overflow-hidden transition-all duration-300 ease-in-out max-h-0">
        {{ $slot }}
    </div>
</div>
