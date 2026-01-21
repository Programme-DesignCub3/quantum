<section class="flex flex-col gap-8 pt-[76px] pb-[100px] px-4 bg-[#F5F5F5]">
    <div class="flex flex-col gap-12">
        <div class="space-y-4 text-center max-w-sm mx-auto">
            <h2>{{ $page_settings->guidance_title_article }}</h2>
            <p>{{ $page_settings->guidance_description_article }}</p>
        </div>
        <div class="flex flex-col gap-4">
            @if(!$latest->isEmpty())
                <div class="flex flex-col gap-3">
                    <div class="rounded-3xl overflow-hidden">
                        <img class="aspect-17/10 object-cover" src="{{ $latest[0]->media->first()->getUrl() }}" alt="">
                    </div>
                    <div class="space-y-1 p-3">
                        <span class="block text-qt-green-normal">{{ $latest[0]->category->name }}</span>
                        <h4>{{ $latest[0]->title }}</h4>
                    </div>
                </div>
                <div class="flex justify-start">
                    <x-inputs.button type="hyperlink" href="{{ route('support.guidance.detail', $latest[0]->slug) }}" color="white">
                        Selengkapnya
                    </x-inputs.button>
                </div>
            @else
                <div class="min-h-[100px] flex justify-center items-center">
                    <p class="text-center text-gray-500">Tidak ada data untuk ditampilkan</p>
                </div>
            @endif
        </div>
        <div class="flex flex-col gap-4">
            @foreach($guidances as $item)
                <x-displays.guidance-article-card :payload="$item" />
            @endforeach
        </div>
    </div>
    <div class="flex justify-center">
        @if($guidances->count() < $total_count)
            <div wire:click="loadMore">
                <x-inputs.button type="button" size="lg" color="white">
                    Lebih banyak
                </x-inputs.button>
            </div>
        @endif
    </div>
</section>
