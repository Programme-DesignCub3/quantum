<div class="flex flex-col gap-4 justify-center items-center px-4 md:gap-3">
    <h3 class="md:text-2xl md:font-medium">
        @if(Route::currentRouteName() === 'updates.recipe.detail')
            Bagikan Resep
        @else
            Bagikan Artikel
        @endif
    </h3>
    <div class="flex gap-2 py-4">
        <x-inputs.button-icon type="hyperlink" :newTab="true" href="https://www.linkedin.com/sharing/share-offsite/?url={{ URL::current() }}" class="rounded-2xl!" icon="icon-[jam--linkedin]" />
        <x-inputs.button-icon type="hyperlink" :newTab="true" href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}" class="rounded-2xl!" icon="icon-[ri--facebook-fill]" />
        <x-inputs.button-icon type="hyperlink" :newTab="true" href="https://wa.me/?text={{ URL::current() }}" class="rounded-2xl!" icon="icon-[ic--baseline-whatsapp]" />
        <x-inputs.button-icon type="hyperlink" href="mailto:?body={{ URL::current() }}" class="rounded-2xl!" icon="icon-[lucide--mail]" />
    </div>
</div>