<div id="award" class="scrollspy flex flex-col gap-8 scroll-mt-20 py-[92px] bg-[#F4F4F4]">
    <div class="space-y-4 text-center max-w-sm mx-auto px-4 sm:max-w-2xl">
        <h2>{{ $page_settings->about_title_award }}</h2>
        <p class="text-[#6D6D6D]">{{ $page_settings->about_description_award }}</p>
    </div>
    <div class="flex flex-col gap-6">
        @if(!empty($page_settings->about_award))
            <div class="flex justify-center items-center px-6">
                <div class="flex gap-0.5 bg-white p-1 rounded-full overflow-x-auto">
                    @foreach($page_settings->about_award as $award)
                        <button type="button" wire:click="awardsFilter('{{ $award['year'] }}')" class="tab {{ $award['year'] === $year ? 'active' : '' }}">
                            {{ $award['year'] }}
                        </button>
                    @endforeach
                </div>
            </div>
            <div class="splide award-about" role="group" aria-label="Awards About Slides">
                <div class="splide__track">
                    <ul class="splide__list">
                        @foreach($page_settings->about_award[array_search($year, array_column($page_settings->about_award, 'year'))]['awards'] as $award)
                            <li class="splide__slide">
                                <x-displays.swipe-card :image="$award['image'] ? 'storage/' . $award['image'] : 'images/og-image.jpg'">
                                    <h4 class="md:text-xl">{{ $award['title'] }}</h4>
                                    @if(isset($award['description']))
                                        <p class="small text-[#9a9a9a]">{{ $award['description'] }}</p>
                                    @endif
                                </x-displays.swipe-card>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @else
            <div class="min-h-[100px] flex justify-center items-center">
                <p class="text-center text-gray-500">Tidak ada data untuk ditampilkan</p>
            </div>
        @endif
    </div>
</div>
