<div @class([
    'rounded-2xl p-6' => $simetric,
    'rounded-3xl py-6 px-4' => !$simetric,
    'flex flex-col gap-4 border border-[#DBDBDB]'
])>
    <div class="flex gap-2.5">
        <div @class([
            'space-y-3' => $simetric,
            'space-y-1' => !$simetric,
        ])>
            {{ $slot }}
        </div>
        <div class="shrink-0 flex justify-center items-center size-[60px] bg-[#F3F8F9] rounded-2xl">
            {{ $icon }}
        </div>
    </div>
    @if(isset($button))
        <div class="flex justify-start">
            {{ $button }}
        </div>
    @endif
</div>
