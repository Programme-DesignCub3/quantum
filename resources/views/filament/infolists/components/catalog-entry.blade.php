<x-dynamic-component
    :component="$getEntryWrapperView()"
    :entry="$entry"
>
    <ol {{ $getExtraAttributeBag() }}>
        @foreach($getState() as $catalog)
            <li class="bg-red-500">{{ $catalog }}</li>
        @endforeach
    </ol>
</x-dynamic-component>
