@if($type === 'hyperlink')
    <a href="{{ $href ?? '#' }}" @class([
        'transition-all duration-300 ease-in-out inline-block cursor-pointer border disabled:cursor-not-allowed',
        $sizeClass,
        $variantClass,
        $colorClass,
        $class
    ]) @disabled($disabled)>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type ?? 'button' }}" @if(isset($event)) @click="{{ $event }}" @endif @class([
        'transition-all duration-300 ease-in-out cursor-pointer border disabled:cursor-not-allowed',
        $sizeClass,
        $variantClass,
        $colorClass,
        $class
    ]) @disabled($disabled)>
        {{ $slot }}
    </button>
@endif
