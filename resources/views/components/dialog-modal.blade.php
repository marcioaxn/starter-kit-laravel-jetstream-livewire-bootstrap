@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="modal-body p-4">
        <h2 class="h5 text-body-emphasis mb-2">
            {{ $title }}
        </h2>

        <div class="text-muted small">
            {{ $content }}
        </div>
    </div>

    <div class="modal-footer bg-body-tertiary border-0 d-flex flex-column flex-sm-row justify-content-end gap-2 p-4">
        {{ $footer }}
    </div>
</x-modal>
