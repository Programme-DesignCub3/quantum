<div @class([
    'rounded-2xl p-6' => $simetric,
    'rounded-3xl py-6 px-4 md:p-5' => !$simetric,
    'border border-[#DBDBDB]' => $border,
    'bg-white' => $background === 'white',
    'flex flex-col gap-4'
])>
    <div class="flex justify-between gap-2.5">
        <div @class([
            'space-y-3' => $simetric,
            'space-y-1' => !$simetric,
        ])>
            {{ $slot }}
        </div>
        <div @class([
            'bg-[#F3F8F9] size-[60px] rounded-2xl items-center' => $backgroundIcon,
            'shrink-0 flex justify-center'
        ])>
            {{ $icon }}
        </div>
    </div>
    @if(isset($button))
        {{ $button }}
    @endif
</div>
