<div class="flex flex-col justify-between gap-2 w-[260px] bg-white px-4 py-[21px] rounded-2xl h-full">
    <p class="text-[#6D6D6D]">
        {{ $payload['feedback'] }}
    </p>
    <div class="flex justify-between items-end">
        <div>
            <p>{{ $payload['name'] }}</p>
            <p>{{ $payload['role'] }}</p>
        </div>
        <div>
            <x-icons.double-quote-icon class="fill-qt-green-normal/90" />
        </div>
    </div>
</div>
