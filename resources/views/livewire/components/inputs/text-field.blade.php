<div class="space-y-2">
    @if($showLabel)
        <label for="{{ $id }}" class="block leading-[150%]">{{ $label }}</label>
    @endif
    <input
        wire:model="value"
        type="{{ $type }}"
        id="{{ $id }}"
        placeholder="{{ $placeholder }}"
        autocomplete="off"
        class="w-full p-3 rounded-xl border outline-offset-2 text-sm focus:outline-1 placeholder:text-[#6D6D6D]/60 {{ $colorClass }}">
</div>
