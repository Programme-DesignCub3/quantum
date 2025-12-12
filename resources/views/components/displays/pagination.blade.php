@php
if (! isset($scrollTo)) {
    $scrollTo = 'body';
}

$scrollIntoViewJsSnippet = ($scrollTo !== false)
    ? <<<JS
       (\$el.closest('{$scrollTo}') || document.querySelector('{$scrollTo}')).scrollIntoView()
    JS
    : '';
@endphp

<div>
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
            <div class="relative z-0 inline-flex rtl:flex-row-reverse rounded-xl overflow-hidden border border-[#E9E9E9]">

                <span>
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="relative inline-flex items-center p-2.5 size-10 font-medium bg-transparent text-[#6D6D6D] cursor-default border-r border-[#E9E9E9]" aria-hidden="true">
                                <span class="icon-[lucide--chevron-left] text-2xl text-[#6D6D6D]/30"></span>
                            </span>
                        </span>
                    @else
                        <button type="button"
                                wire:click="previousPage('{{ $paginator->getPageName() }}')"
                                x-on:click="{{ $scrollIntoViewJsSnippet }}"
                                dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
                                class="relative inline-flex items-center p-2.5 size-10 font-medium bg-transparent text-[#6D6D6D] cursor-pointer border-r border-[#E9E9E9] hover:bg-[#E9E9E9]/30"
                                aria-label="{{ __('pagination.previous') }}">
                            <span class="icon-[lucide--chevron-left] text-2xl text-[#6D6D6D]"></span>
                        </button>
                    @endif
                </span>

                @php
                    $current = $paginator->currentPage();
                    $last    = $paginator->lastPage();

                    // Window berapa halaman tengah
                    $window = 1;

                    $pages = [];

                    // Selalu tampil halaman 1
                    $pages[] = 1;

                    // ===== ELLIPSIS KIRI =====
                    if ($current > ($window + 1)) {
                        $pages[] = 'ellipsis-left';
                    }

                    // ===== WINDOW TENGAH =====
                    $start = max(2, $current - $window);
                    $end   = min($last - 1, $current + $window);

                    for ($i = $start; $i <= $end; $i++) {
                        $pages[] = $i;
                    }

                    // ===== ELLIPSIS KANAN =====
                    if ($current < ($last - ($window + 1))) {
                        $pages[] = 'ellipsis-right';
                    }

                    // ===== HALAMAN TERAKHIR =====
                    if ($last > 1) {
                        $pages[] = $last;
                    }

                    // Buang duplikat, tapi TANPA sort → supaya posisi tidak hancur
                    $pages = array_values(array_unique($pages));
                @endphp

                {{-- Pagination Elements --}}
                @foreach ($pages as $page)
                    {{-- Ellipsis --}}
                    @if ($page === 'ellipsis-left' || $page === 'ellipsis-right')
                        <span aria-disabled="true">
                            <span class="relative inline-flex items-center justify-center p-2.5 size-10 font-medium text-[#6D6D6D] bg-transparent cursor-default border-r border-[#E9E9E9]">
                                ...
                            </span>
                        </span>

                    @else
                        <span wire:key="paginator-{{ $paginator->getPageName() }}-page{{ $page }}">

                            {{-- Current Page --}}
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page">
                                    <span class="relative inline-flex items-center justify-center p-2.5 text-base size-10 font-medium text-[#6D6D6D] bg-[#E9E9E9] cursor-default border-r border-[#E9E9E9]">
                                        {{ $page }}
                                    </span>
                                </span>

                            {{-- Other Pages --}}
                            @else
                                <button type="button"
                                        wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')"
                                        x-on:click="{{ $scrollIntoViewJsSnippet }}"
                                        class="relative inline-flex items-center justify-center p-2.5 text-base size-10 font-medium text-[#6D6D6D] bg-transparent cursor-pointer border-r border-[#E9E9E9] hover:bg-[#E9E9E9]/30"
                                        aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                    {{ $page }}
                                </button>
                            @endif

                        </span>
                    @endif
                @endforeach

                <span>
                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <button type="button"
                                wire:click="nextPage('{{ $paginator->getPageName() }}')"
                                x-on:click="{{ $scrollIntoViewJsSnippet }}"
                                dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}.after"
                                class="relative inline-flex items-center p-2.5 size-10 font-medium bg-transparent text-[#6D6D6D] cursor-pointer hover:bg-[#E9E9E9]/30"
                                aria-label="{{ __('pagination.next') }}">
                            <span class="icon-[lucide--chevron-right] text-2xl text-[#6D6D6D]"></span>
                        </button>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="relative inline-flex items-center p-2.5 size-10 font-medium bg-transparent text-[#6D6D6D] cursor-default" aria-hidden="true">
                                <span class="icon-[lucide--chevron-right] text-2xl text-[#6D6D6D]/30"></span>
                            </span>
                        </span>
                    @endif
                </span>

            </div>
        </nav>
    @endif
</div>
