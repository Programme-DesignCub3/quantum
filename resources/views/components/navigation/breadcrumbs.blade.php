<div class="bg-[#D9E9EB] py-2.5 px-4 overflow-auto">
    <div class="w-max">
        @unless ($breadcrumbs->isEmpty())
            <ol class="flex items-center gap-2">
                @foreach ($breadcrumbs as $breadcrumb)
                    @if (!is_null($breadcrumb->url) && !$loop->last)
                        <li>
                            <a href="{{ $breadcrumb->url }}">
                                <span class="block text-[#106B75]">{{ $breadcrumb->title }}</span>
                            </a>
                        </li>
                        <span class="icon-[lucide--chevron-right] text-[#106B75]"></span>
                    @else
                        <li>
                            <span class="block">{{ str_replace('-', ' ', $breadcrumb->title) }}</span>
                        </li>
                    @endif
                @endforeach
            </ol>
        @endunless
    </div>
</div>
