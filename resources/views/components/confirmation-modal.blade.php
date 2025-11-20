@props(['id' => null, 'maxWidth' => null])

<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="modal-body p-4">
        <div class="d-flex gap-3 align-items-start">
            <span class="d-inline-flex align-items-center justify-content-center rounded-circle bg-danger-subtle text-danger" style="width: 3rem; height: 3rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M11.751 6a.75.75 0 0 1 .75.75v5.5a.75.75 0 1 1-1.5 0v-5.5A.75.75 0 0 1 11.75 6Zm0 10.5a1 1 0 1 1 0 2 1 1 0 0 1 0-2Z"/>
                    <path d="M11.75 1.5c5.385 0 9.75 4.365 9.75 9.75s-4.365 9.75-9.75 9.75S2 16.635 2 11.25 6.365 1.5 11.75 1.5Zm0 1.5A8.25 8.25 0 1 0 20 11.25 8.26 8.26 0 0 0 11.75 3Z"/>
                </svg>
            </span>

            <div>
                <h2 class="h5 text-body-emphasis mb-2">
                    {{ $title }}
                </h2>

                <div class="text-muted small">
                    {{ $content }}
                </div>
            </div>
        </div>
    </div>

    <div class="modal-footer bg-body-tertiary border-0 d-flex flex-column flex-sm-row justify-content-end gap-2 p-4">
        {{ $footer }}
    </div>
</x-modal>
