@if($type === 'hyperlink')
    <a href="{{ $href ?? '#' }}" @class([
        'group transition-all duration-300 ease-in-out inline-flex items-center gap-2 cursor-pointer text-qt-green-normal border border-[#60A3AB] p-4 disabled:cursor-not-allowed',
        'justify-center' => (!$slot->isEmpty() || $icon) || (!$slot->isEmpty() || isset($image)),
        'justify-start' => (!$slot->isEmpty() && $icon) || (!$slot->isEmpty() && isset($image)),
        $sizeClass,
        $hoverColorClass,
        $class
    ])>
        @if($icon)
            <span @class([
                $icon,
                $iconClass,
                'shrink-0'
            ])></span>
        @endif
        @if(isset($image))
            {{ $image }}
        @endif
        {{ $slot }}
    </a>
@else
    <button type="{{ $type ?? 'button' }}" @class([
        'group transition-all duration-300 ease-in-out flex items-center gap-2 cursor-pointer text-qt-green-normal border border-[#60A3AB] p-4 disabled:cursor-not-allowed',
        'justify-center' => (!$slot->isEmpty() || $icon) || (!$slot->isEmpty() || isset($image)),
        'justify-start' => (!$slot->isEmpty() && $icon) || (!$slot->isEmpty() && isset($image)),
        $sizeClass,
        $hoverColorClass,
        $class
    ]) @disabled($disabled)>
        @if($icon)
            <span @class([
                $icon,
                $iconClass,
                'shrink-0'
            ])></span>
        @endif
        @if(isset($image))
            {{ $image }}
        @endif
        {{ $slot }}
    </button>
@endif
