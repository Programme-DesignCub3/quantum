<div x-data="{ data: @js($data_drawer) }" :class="$store.contactDrawer.open ? 'z-50' : 'z-40'" @class([
    'bottom-24 md:bottom-5' => Route::currentRouteName() === 'product.detail',
    'bottom-5' => Route::currentRouteName() !== 'product.detail',
    'fixed right-5 transition-all duration-300 ease-in-out'
])>
    <div x-cloak @if(Route::currentRouteName() === 'updates.recipe.detail') x-show="$store.premiumRecipeDrawer.footerShown" @endif class="flex flex-col gap-2 lg:gap-2.5">
        @if(
            Route::currentRouteName() === 'updates.news.detail' ||
            Route::currentRouteName() === 'updates.recipe.detail'
        )
            {{-- Share Button --}}
            <button type="button" @click="$store.shareDrawer.openDrawer()" class="transition-all duration-300 ease-in-out flex justify-center items-center size-10 bg-white drop-shadow-float rounded-full cursor-pointer active:shadow-none lg:size-[50px]">
                <span class="icon-[tdesign--share] text-xl text-qt-green-normal"></span>
            </button>
        @endif
        @if(
            Route::currentRouteName() !== 'product.detail' &&
            Route::currentRouteName() !== 'updates.news.detail' &&
            Route::currentRouteName() !== 'updates.recipe.detail'
        )
            {{-- Contact Button --}}
            <button type="button" @click="$store.contactDrawer.openDrawer(data)" class="transition-all duration-300 ease-in-out flex justify-center items-center size-10 bg-white drop-shadow-float rounded-full cursor-pointer active:shadow-none lg:size-[50px]">
                <x-icons.chat-icon class="stroke-qt-green-normal stroke-[2.5] size-5 fill-transparent" />
            </button>
        @endif
        @if(
            Route::currentRouteName() === 'product.detail'
        )
            {{-- Contact Button --}}
            <button type="button" @click="$store.contactDrawer.openDrawer(data)" class="transition-all duration-300 ease-in-out hidden justify-center items-center size-10 bg-white drop-shadow-float rounded-full cursor-pointer active:shadow-none md:flex lg:size-[50px]">
                <x-icons.chat-icon class="stroke-qt-green-normal stroke-[2.5] size-5 fill-transparent" />
            </button>
        @endif
        {{-- Scroll to Top Button --}}
        <button type="button" @click="$store.scroll.scrollToTop()" class="transition-all duration-300 ease-in-out flex justify-center items-center size-10 bg-white drop-shadow-float rounded-full cursor-pointer active:shadow-none lg:size-[50px]">
            <span class="icon-[lucide--chevron-up] text-3xl text-qt-green-normal"></span>
        </button>
    </div>
</div>
