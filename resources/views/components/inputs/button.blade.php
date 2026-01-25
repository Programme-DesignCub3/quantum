@if($type === 'hyperlink')
    <a href="{{ $href ?? '#' }}" @if(isset($event)) @click="{{ $event }}" @endif @if($newTab) target="_blank" @endif @class([
        'transition-all duration-300 ease-in-out inline-flex justify-center items-center cursor-pointer border disabled:cursor-not-allowed',
        $sizeClass,
        $variantClass,
        $colorClass,
        $class
    ])  @disabled($disabled)>
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
