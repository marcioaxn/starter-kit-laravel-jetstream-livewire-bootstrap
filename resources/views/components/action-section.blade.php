<div {{ $attributes->merge(['class' => 'row g-4']) }}>
    <div class="col-12 col-xl-4">
        <x-section-title>
            <x-slot name="title">{{ $title }}</x-slot>
            <x-slot name="description">{{ $description }}</x-slot>
        </x-section-title>
    </div>

    <div class="col-12 col-xl-8">
        <div class="card border-0 shadow-sm h-100">
            <div class="card-body p-4">
                {{ $content }}
            </div>
        </div>
    </div>
</div>
