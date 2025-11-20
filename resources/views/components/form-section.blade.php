@props(['submit'])

<div {{ $attributes->merge(['class' => 'row g-4']) }}>
    <div class="col-12 col-xl-4">
        <x-section-title>
            <x-slot name="title">{{ $title }}</x-slot>
            <x-slot name="description">{{ $description }}</x-slot>
        </x-section-title>
    </div>

    <div class="col-12 col-xl-8">
        <form wire:submit.prevent="{{ $submit }}">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-body p-4">
                    <div class="row g-3">
                        {{ $form }}
                    </div>
                </div>

                @isset($actions)
                    <div class="card-footer bg-body-tertiary d-flex flex-column flex-sm-row justify-content-end align-items-center gap-2">
                        {{ $actions }}
                    </div>
                @endisset
            </div>
        </form>
    </div>
</div>
