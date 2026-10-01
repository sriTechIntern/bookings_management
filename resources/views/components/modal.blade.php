@props([
    'name',
    'show' => false,
    'maxWidth' => '2xl',
])

@php
    $maxWidth = [
        'sm' => 'sm:max-w-sm',
        'md' => 'sm:max-w-md',
        'lg' => 'sm:max-w-lg',
        'xl' => 'sm:max-w-xl',
        '2xl' => 'sm:max-w-2xl',
    ][$maxWidth];
@endphp

<dialog id="{{ $name }}"
        data-modal
        @if ($show) open @endif
        class="fixed inset-0 m-0 h-full max-h-none w-full max-w-none bg-transparent p-0 backdrop:bg-gray-500/75">
    <div data-modal-backdrop class="flex min-h-full items-center justify-center overflow-y-auto px-4 py-6 sm:px-0">
        <div class="w-full {{ $maxWidth }} sm:mx-auto">
            <div class="overflow-hidden rounded-lg bg-white shadow-xl">
                {{ $slot }}
            </div>
        </div>
    </div>
</dialog>