<x-dynamic-component
    :component="$getEntryWrapperView()"
    :entry="$entry"
>
    <div {{ $getExtraAttributeBag() }}>
        <a href="{{ '/storage/' . $getState() }}" target="_blank" rel="noopener noreferrer" style="color: #00a6f4;">Lihat</a>
    </div>
</x-dynamic-component>
