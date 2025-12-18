<div>
    <x-slot name="header">
        <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <h1 class="h4 text-body-emphasis mb-0">{{ __('Leads') }}</h1>
                    <span class="badge bg-primary-subtle text-primary rounded-pill">
                        {{ $leads->total() }}
                    </span>
                </div>
                <p class="text-muted small mb-0">
                    {{ __('Manage your leads and track their progress through the sales pipeline.') }}
                </p>
            </div>

            <div class="d-flex align-items-center gap-2">
                <div wire:loading.delay.short wire:target="search,status,resetFilters,save,delete,exportCsv,create,edit" class="text-primary">
                    <span class="spinner-border spinner-border-sm" role="status">
                        <span class="visually-hidden">{{ __('Loading...') }}</span>
                    </span>
                </div>

                <x-action-button
                    variant="outline-secondary"
                    icon="download"
                    tooltip="{{ __('Export CSV') }}"
                    wire:click="exportCsv"
                    wire:loading.attr="disabled"
                >
                    <span class="d-none d-md-inline">{{ __('Export') }}</span>
                </x-action-button>

                <x-action-button variant="primary" icon="plus" tooltip="{{ __('Add new lead') }}" wire:click="create">
                    <span class="d-none d-sm-inline">{{ __('New Lead') }}</span>
                    <span class="d-sm-none">{{ __('New') }}</span>
                </x-action-button>
            </div>
        </div>
    </x-slot>

    @if ($flashMessage)
        <div class="alert alert-{{ $flashStyle }} alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert">
            @if($flashStyle === 'success')
                <i class="bi bi-check-circle-fill flex-shrink-0"></i>
            @elseif($flashStyle === 'danger')
                <i class="bi bi-exclamation-triangle-fill flex-shrink-0"></i>
            @else
                <i class="bi bi-info-circle-fill flex-shrink-0"></i>
            @endif
            <span>{{ $flashMessage }}</span>
            <button type="button" class="btn-close" aria-label="{{ __('Close') }}" wire:click="$set('flashMessage', null)"></button>
        </div>
    @endif

    {{-- Filters Card --}}
    <div class="card app-surface shadow-sm border-0 mb-4">
        <div class="card-body p-3 p-lg-4">
            <div class="row g-3 align-items-end">
                <div class="col-12 col-md-6 col-lg-5">
                    <label for="lead-search" class="form-label small text-uppercase fw-semibold text-muted mb-1">
                        <i class="bi bi-search me-1"></i>{{ __('Search') }}
                    </label>
                    <div class="input-group">
                        <span class="input-group-text bg-transparent border-end-0">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input
                            id="lead-search"
                            type="search"
                            class="form-control border-start-0 ps-0"
                            placeholder="{{ __('Search by name, email, phone...') }}"
                            wire:model.live.debounce.250ms="search"
                        >
                    </div>
                </div>

                <div class="col-6 col-md-3 col-lg-2">
                    <label for="lead-status" class="form-label small text-uppercase fw-semibold text-muted mb-1">
                        <i class="bi bi-funnel me-1"></i>{{ __('Status') }}
                    </label>
                    <select id="lead-status" class="form-select" wire:model.live="status">
                        @foreach ($statuses as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-6 col-md-3 col-lg-2">
                    @if ($search !== '' || $status !== 'all')
                        <button type="button" class="btn btn-outline-secondary w-100" wire:click="resetFilters">
                            <i class="bi bi-x-lg me-1"></i>{{ __('Clear') }}
                        </button>
                    @endif
                </div>
            </div>

            @if ($search !== '' || $status !== 'all')
                <div class="d-flex flex-wrap align-items-center gap-2 mt-3 pt-3 border-top">
                    <span class="text-muted small fw-medium">{{ __('Active filters:') }}</span>

                    @if ($search !== '')
                        <button type="button" class="btn btn-primary-subtle btn-sm rounded-pill d-inline-flex align-items-center gap-1 border-0" wire:click="$set('search', '')">
                            <i class="bi bi-search small"></i>
                            <span>"{{ Str::limit($search, 15) }}"</span>
                            <i class="bi bi-x"></i>
                        </button>
                    @endif

                    @if ($status !== 'all')
                        <button type="button" class="btn btn-secondary-subtle btn-sm rounded-pill d-inline-flex align-items-center gap-1 border-0" wire:click="$set('status', 'all')">
                            <i class="bi bi-funnel small"></i>
                            <span>{{ $statuses[$status] ?? $status }}</span>
                            <i class="bi bi-x"></i>
                        </button>
                    @endif
                </div>
            @endif
        </div>
    </div>

    {{-- Desktop Table --}}
    <div class="card app-surface shadow-sm border-0 d-none d-md-block">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th scope="col" class="ps-4">{{ __('Lead') }}</th>
                        <th scope="col">{{ __('Team') }}</th>
                        <th scope="col">{{ __('Status') }}</th>
                        <th scope="col">{{ __('Updated') }}</th>
                        <th scope="col" class="text-end pe-4">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody wire:loading.class="opacity-50" wire:target="search,status,resetFilters">
                    @forelse ($leads as $lead)
                        <tr wire:key="lead-row-{{ $lead->id }}">
                            <td class="ps-4">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="avatar-initials bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center fw-semibold" style="width: 40px; height: 40px; font-size: 0.875rem;">
                                        {{ strtoupper(substr($lead->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <div class="fw-semibold text-body-emphasis">{{ $lead->name }}</div>
                                        @if ($lead->email)
                                            <div class="text-muted small">
                                                <i class="bi bi-envelope me-1"></i>{{ $lead->email }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if($lead->entity)
                                    <span class="badge bg-secondary-subtle text-secondary rounded-pill">
                                        <i class="bi bi-people me-1"></i>{{ $lead->entity }}
                                    </span>
                                @else
                                    <span class="text-muted">—</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge rounded-pill fw-semibold {{ $lead->status_badge_class }}">
                                    {{ $lead->status_label }}
                                </span>
                            </td>
                            <td class="text-muted small">
                                <i class="bi bi-clock me-1"></i>{{ $lead->updated_at?->diffForHumans() }}
                            </td>
                            <td class="text-end pe-4">
                                <div class="d-inline-flex gap-2">
                                    <x-action-button variant="outline-primary" icon="pencil" tooltip="{{ __('Edit') }}" wire:click="edit({{ $lead->id }})" />
                                    <x-action-button variant="outline-danger" icon="trash" tooltip="{{ __('Delete') }}" wire:click="confirmDelete({{ $lead->id }})" />
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-5">
                                <div class="text-center">
                                    <div class="mb-3">
                                        <i class="bi bi-inbox display-4 text-muted"></i>
                                    </div>
                                    <h5 class="text-body-emphasis mb-1">{{ __('No leads found') }}</h5>
                                    <p class="text-muted small mb-3">
                                        @if ($search !== '' || $status !== 'all')
                                            {{ __('Try adjusting your filters or search terms.') }}
                                        @else
                                            {{ __('Get started by creating your first lead.') }}
                                        @endif
                                    </p>
                                    @if ($search !== '' || $status !== 'all')
                                        <button type="button" class="btn btn-outline-secondary btn-sm" wire:click="resetFilters">
                                            <i class="bi bi-x-lg me-1"></i>{{ __('Clear filters') }}
                                        </button>
                                    @else
                                        <x-action-button variant="primary" icon="plus" wire:click="create" size="sm">
                                            {{ __('Create Lead') }}
                                        </x-action-button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($leads->hasPages())
            <div class="card-footer bg-transparent border-top d-flex flex-column flex-lg-row align-items-center justify-content-between gap-3 py-3 px-4">
                <span class="text-muted small">
                    {{ __('Showing') }} <span class="fw-semibold">{{ $leads->firstItem() }}</span> {{ __('to') }} <span class="fw-semibold">{{ $leads->lastItem() }}</span> {{ __('of') }} <span class="fw-semibold">{{ $leads->total() }}</span> {{ __('results') }}
                </span>
                {{ $leads->onEachSide(1)->links() }}
            </div>
        @endif
    </div>

    {{-- Mobile Cards --}}
    <div class="d-md-none">
        <div class="d-flex flex-column gap-3" wire:loading.class="opacity-50" wire:target="search,status,resetFilters">
            @forelse ($leads as $lead)
                <div class="card app-surface shadow-sm border-0" wire:key="lead-card-{{ $lead->id }}">
                    <div class="card-body p-3">
                        <div class="d-flex align-items-start justify-content-between mb-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="avatar-initials bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center fw-semibold flex-shrink-0" style="width: 48px; height: 48px;">
                                    {{ strtoupper(substr($lead->name, 0, 2)) }}
                                </div>
                                <div>
                                    <h6 class="mb-0 text-body-emphasis">{{ $lead->name }}</h6>
                                    @if($lead->entity)
                                        <span class="text-muted small">{{ $lead->entity }}</span>
                                    @endif
                                </div>
                            </div>
                            <span class="badge rounded-pill fw-semibold {{ $lead->status_badge_class }}">
                                {{ $lead->status_label }}
                            </span>
                        </div>

                        @if($lead->email || $lead->phone)
                            <div class="d-flex flex-column gap-1 mb-3 small">
                                @if ($lead->email)
                                    <div class="text-muted">
                                        <i class="bi bi-envelope me-2"></i>{{ $lead->email }}
                                    </div>
                                @endif
                                @if ($lead->phone)
                                    <div class="text-muted">
                                        <i class="bi bi-telephone me-2"></i>{{ $lead->phone }}
                                    </div>
                                @endif
                            </div>
                        @endif

                        <div class="d-flex align-items-center justify-content-between pt-2 border-top">
                            <span class="text-muted small">
                                <i class="bi bi-clock me-1"></i>{{ $lead->updated_at?->diffForHumans() }}
                            </span>
                            <div class="d-inline-flex gap-2">
                                <x-action-button variant="outline-primary" icon="pencil" tooltip="{{ __('Edit') }}" wire:click="edit({{ $lead->id }})" size="sm">
                                    <span class="d-none d-sm-inline">{{ __('Edit') }}</span>
                                </x-action-button>
                                <x-action-button variant="outline-danger" icon="trash" tooltip="{{ __('Delete') }}" wire:click="confirmDelete({{ $lead->id }})" size="sm" />
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="card app-surface shadow-sm border-0">
                    <div class="card-body p-4 text-center">
                        <div class="mb-3">
                            <i class="bi bi-inbox display-4 text-muted"></i>
                        </div>
                        <h5 class="text-body-emphasis mb-1">{{ __('No leads found') }}</h5>
                        <p class="text-muted small mb-3">
                            @if ($search !== '' || $status !== 'all')
                                {{ __('Try adjusting your filters.') }}
                            @else
                                {{ __('Create your first lead to get started.') }}
                            @endif
                        </p>
                        @if ($search !== '' || $status !== 'all')
                            <button type="button" class="btn btn-outline-secondary btn-sm" wire:click="resetFilters">
                                <i class="bi bi-x-lg me-1"></i>{{ __('Clear filters') }}
                            </button>
                        @else
                            <x-action-button variant="primary" icon="plus" wire:click="create">
                                {{ __('Create Lead') }}
                            </x-action-button>
                        @endif
                    </div>
                </div>
            @endforelse
        </div>

        @if($leads->hasPages())
            <div class="d-flex flex-column align-items-center gap-2 mt-4">
                <span class="text-muted small">
                    {{ $leads->firstItem() }}-{{ $leads->lastItem() }} {{ __('of') }} {{ $leads->total() }}
                </span>
                {{ $leads->onEachSide(1)->links() }}
            </div>
        @endif
    </div>

    {{-- Create/Edit Modal --}}
    <x-dialog-modal wire:key="leads-form-modal" wire:model.live="showFormModal" maxWidth="2xl">
        <x-slot name="title">
            <div class="d-flex align-items-center gap-3">
                <div class="avatar-initials bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    <i class="bi bi-{{ $editing ? 'pencil' : 'plus-lg' }}"></i>
                </div>
                <div>
                    <h5 class="mb-0">{{ $editing ? __('Edit Lead') : __('New Lead') }}</h5>
                    <p class="text-muted small mb-0">{{ $editing ? __('Update the lead information') : __('Fill in the details to create a new lead') }}</p>
                </div>
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="row g-3">
                <div class="col-12 col-lg-6">
                    <label for="lead-name" class="form-label small text-uppercase fw-semibold text-muted">
                        {{ __('Name') }} <span class="text-danger">*</span>
                    </label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                        <input
                            id="lead-name"
                            type="text"
                            class="form-control @error('form.name') is-invalid @enderror"
                            placeholder="{{ __('Enter lead name') }}"
                            wire:model.defer="form.name"
                            required
                        >
                    </div>
                    @error('form.name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-lg-6">
                    <label for="lead-entity" class="form-label small text-uppercase fw-semibold text-muted">{{ __('Team') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-people"></i></span>
                        <input
                            id="lead-entity"
                            type="text"
                            class="form-control @error('form.entity') is-invalid @enderror"
                            placeholder="{{ __('e.g., Sales, Marketing') }}"
                            wire:model.defer="form.entity"
                        >
                    </div>
                    @error('form.entity')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-lg-4">
                    <label for="lead-status-form" class="form-label small text-uppercase fw-semibold text-muted">
                        {{ __('Status') }} <span class="text-danger">*</span>
                    </label>
                    <select
                        id="lead-status-form"
                        class="form-select @error('form.status') is-invalid @enderror"
                        wire:model.defer="form.status"
                    >
                        @foreach ($this->statusOptions as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    @error('form.status')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-lg-4">
                    <label for="lead-email" class="form-label small text-uppercase fw-semibold text-muted">{{ __('Email') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input
                            id="lead-email"
                            type="email"
                            class="form-control @error('form.email') is-invalid @enderror"
                            placeholder="{{ __('email@example.com') }}"
                            wire:model.defer="form.email"
                        >
                    </div>
                    @error('form.email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-lg-4">
                    <label for="lead-phone" class="form-label small text-uppercase fw-semibold text-muted">{{ __('Phone') }}</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                        <input
                            id="lead-phone"
                            type="text"
                            class="form-control @error('form.phone') is-invalid @enderror"
                            placeholder="{{ __('+55 (11) 99999-9999') }}"
                            wire:model.defer="form.phone"
                        >
                    </div>
                    @error('form.phone')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="lead-notes" class="form-label small text-uppercase fw-semibold text-muted">{{ __('Notes') }}</label>
                    <textarea
                        id="lead-notes"
                        rows="3"
                        class="form-control @error('form.notes') is-invalid @enderror"
                        placeholder="{{ __('Add any additional notes or context...') }}"
                        wire:model.defer="form.notes"
                    ></textarea>
                    @error('form.notes')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="d-flex align-items-center justify-content-between w-100">
                <span class="text-muted small">
                    <span class="text-danger">*</span> {{ __('Required fields') }}
                </span>
                <div class="d-flex gap-2">
                    <x-secondary-button wire:click="closeFormModal" wire:loading.attr="disabled">
                        {{ __('Cancel') }}
                    </x-secondary-button>

                    <x-button type="button" wire:click="save" wire:loading.attr="disabled">
                        <span wire:loading.remove wire:target="save">
                            <i class="bi bi-check-lg me-1"></i>{{ __('Save') }}
                        </span>
                        <span wire:loading wire:target="save">
                            <span class="spinner-border spinner-border-sm me-1" role="status"></span>
                            {{ __('Saving...') }}
                        </span>
                    </x-button>
                </div>
            </div>
        </x-slot>
    </x-dialog-modal>

    {{-- Delete Confirmation Modal --}}
    <x-confirmation-modal wire:key="leads-delete-modal" wire:model.live="showDeleteModal">
        <x-slot name="title">
            <div class="d-flex align-items-center gap-3">
                <div class="avatar-initials bg-danger-subtle text-danger rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                    <i class="bi bi-exclamation-triangle"></i>
                </div>
                <div>
                    <h5 class="mb-0">{{ __('Delete Lead') }}</h5>
                    <p class="text-muted small mb-0">{{ __('This action cannot be undone') }}</p>
                </div>
            </div>
        </x-slot>

        <x-slot name="content">
            <div class="text-center py-3">
                <p class="mb-0">
                    {{ __('Are you sure you want to delete') }} <strong class="text-body-emphasis">{{ $editing?->name }}</strong>?
                </p>
                <p class="text-muted small mb-0 mt-2">
                    {{ __('All data associated with this lead will be permanently removed.') }}
                </p>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="cancelDelete" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-danger-button wire:click="delete" wire:loading.attr="disabled">
                <span wire:loading.remove wire:target="delete">
                    <i class="bi bi-trash me-1"></i>{{ __('Delete') }}
                </span>
                <span wire:loading wire:target="delete">
                    <span class="spinner-border spinner-border-sm me-1" role="status"></span>
                    {{ __('Deleting...') }}
                </span>
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>
