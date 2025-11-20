@props(['id', 'maxWidth'])

@php
    $id = $id ?? md5($attributes->wire('model'));

    $maxWidths = [
        'sm' => 'max-width: 24rem;',
        'md' => 'max-width: 28rem;',
        'lg' => 'max-width: 32rem;',
        'xl' => 'max-width: 36rem;',
        '2xl' => 'max-width: 42rem;',
    ];

    $dialogWidth = $maxWidths[$maxWidth ?? '2xl'] ?? $maxWidths['2xl'];
@endphp

<div
    x-data="{ show: @entangle($attributes->wire('model')) }"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-show="show"
    id="{{ $id }}"
    class="jetstream-modal position-fixed top-0 start-0 w-100 h-100 overflow-auto py-5 px-3 z-50"
    style="display: none;"
>
    <div x-show="show"
         class="position-fixed top-0 start-0 w-100 h-100 bg-dark bg-opacity-50"
         x-on:click="show = false"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
    </div>

    <div x-show="show"
         class="position-relative mx-auto bg-white rounded-4 shadow-lg overflow-hidden"
         style="{{ $dialogWidth }}"
         x-trap.inert.noscroll="show"
         x-transition:enter="ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="ease-in duration-200"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-4">
        {{ $slot }}
    </div>
</div>
