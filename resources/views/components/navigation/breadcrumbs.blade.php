<div class="bg-[#D9E9EB] overflow-auto">
    <div class="container py-2.5 px-4 sm:px-6">
        <div class="w-max">
            @unless ($breadcrumbs->isEmpty())
                <ol class="flex items-center gap-2">
                    @foreach ($breadcrumbs as $breadcrumb)
                        @if (!is_null($breadcrumb->url) && !$loop->last)
                            <li>
                                <a href="{{ $breadcrumb->url }}">
                                    <span class="block text-[#106B75] md:text-sm">{{ $breadcrumb->title }}</span>
                                </a>
                            </li>
                            <span class="icon-[lucide--chevron-right] text-[#106B75] md:size-3.5"></span>
                        @else
                            <li>
                                <span class="block md:text-sm">{{ str_replace('-', ' ', $breadcrumb->title) }}</span>
                            </li>
                        @endif
                    @endforeach
                </ol>
            @endunless
        </div>
    </div>
</div>
