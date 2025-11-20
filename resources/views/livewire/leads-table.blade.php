<div>
    <x-slot name="header">
        <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
            <div>
                <h1 class="h4 text-body-emphasis mb-1">{{ __('Leads') }}</h1>
                <p class="text-muted small mb-0">
                    {{ __('Listagem conectada ao banco de dados, pronta para evoluir com formulários e ações completas.') }}
                </p>
            </div>
        </div>
    </x-slot>

    @if ($flashMessage)
        <div class="alert alert-{{ $flashStyle }} alert-dismissible fade show d-flex align-items-center gap-2" role="alert">
            <i class="bi bi-info-circle"></i>
            <span>{{ $flashMessage }}</span>
            <button type="button" class="btn-close" aria-label="{{ __('Fechar') }}" wire:click="$set('flashMessage', null)"></button>
        </div>
    @endif

    <x-data-table
        title="{{ __('Leads registrados') }}"
        description="{{ __('Use os filtros para encontrar rapidamente um cadastro. Clique em Novo lead para incluir registros reais.') }}"
    >
        <x-slot name="filters">
            <div class="row g-3 align-items-end">
                <div class="col-12 col-md-6 col-lg-4">
                    <label for="lead-search" class="form-label small text-uppercase fw-semibold text-muted">{{ __('Busca') }}</label>
                    <input
                        id="lead-search"
                        type="search"
                        class="form-control"
                        placeholder="{{ __('Digite para filtrar automaticamente') }}"
                        wire:model.live.debounce.250ms="search"
                    >
                    <small class="form-text text-muted">{{ __('Os resultados atualizam conforme você digita.') }}</small>
                </div>

                <div class="col-12 col-md-4 col-lg-2">
                    <label for="lead-status" class="form-label small text-uppercase fw-semibold text-muted">{{ __('Status') }}</label>
                    <select id="lead-status" class="form-select" wire:model.live="status">
                        @foreach ($statuses as $value => $label)
                            <option value="{{ $value }}">{{ $label }}</option>
                        @endforeach
                    </select>
                </div>

                @if ($search !== '' || $status !== 'all')
                    <div class="col-12">
                        <div class="d-flex flex-wrap align-items-center gap-2 small">
                            <span class="text-muted me-2">{{ __('Filtros ativos:') }}</span>

                            @if ($search !== '')
                                <span class="badge rounded-pill bg-primary-subtle text-primary">
                                    {{ __('Busca: ":value"', ['value' => $search]) }}
                                </span>
                            @endif

                            @if ($status !== 'all')
                                <span class="badge rounded-pill bg-secondary-subtle text-secondary">
                                    {{ __('Status: :value', ['value' => $statuses[$status] ?? $status]) }}
                                </span>
                            @endif
                        </div>
                    </div>
                @endif
            </div>
        </x-slot>

        <x-slot name="actions">
            <div class="d-flex align-items-center gap-2">
                <x-action-button
                    variant="outline-secondary"
                    icon="arrow-counterclockwise"
                    tooltip="{{ __('Limpar filtros') }}"
                    wire:click="resetFilters"
                />
                <x-action-button
                    variant="outline-secondary"
                    icon="download"
                    tooltip="{{ __('Exportar CSV com o filtro atual') }}"
                    wire:click="exportCsv"
                />
                <x-action-button variant="primary" icon="plus" tooltip="{{ __('Adicionar lead') }}" wire:click="create">
                    {{ __('Novo lead') }}
                </x-action-button>

                <div wire:loading.delay.short wire:target="search,status,resetFilters,save,delete,exportCsv,create,edit" class="spinner-border spinner-border-sm text-primary" role="status">
                    <span class="visually-hidden">{{ __('Carregando...') }}</span>
                </div>
            </div>
        </x-slot>

        <x-slot name="head">
            <tr>
                <th scope="col">{{ __('Lead') }}</th>
                <th scope="col">{{ __('Equipe') }}</th>
                <th scope="col">{{ __('Status') }}</th>
                <th scope="col">{{ __('Atualizado') }}</th>
                <th scope="col" class="text-end">{{ __('Ações') }}</th>
            </tr>
        </x-slot>

        @forelse ($leads as $lead)
            <tr wire:key="lead-row-{{ $lead->id }}">
                <td class="fw-semibold text-body-emphasis">
                    {{ $lead->name }}
                    @if ($lead->email)
                        <div class="text-body-secondary small">{{ $lead->email }}</div>
                    @endif
                </td>
                <td class="text-body-secondary">{{ $lead->entity ?? '—' }}</td>
                <td>
                    <span class="badge rounded-pill fw-semibold {{ $lead->status_badge_class }}">
                        {{ $lead->status_label }}
                    </span>
                </td>
                <td class="text-body-secondary">{{ $lead->updated_at?->diffForHumans() }}</td>
                <td class="text-end">
                    <div class="d-inline-flex gap-2">
                        <x-action-button variant="outline-primary" icon="pencil" tooltip="{{ __('Editar lead') }}" wire:click="edit({{ $lead->id }})" />
                        <x-action-button variant="outline-danger" icon="trash" tooltip="{{ __('Remover lead') }}" wire:click="confirmDelete({{ $lead->id }})" />
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center text-muted py-4">
                    {{ __('Nenhum lead encontrado.') }}
                </td>
            </tr>
        @endforelse

        <x-slot name="footer">
            <div class="d-flex flex-column flex-lg-row w-100 align-items-center justify-content-between gap-2">
                <span class="text-muted small">
                    {{ trans_choice(':count lead|:count leads', $leads->total(), ['count' => $leads->total()]) }}
                </span>
                {{ $leads->onEachSide(1)->links() }}
            </div>
        </x-slot>
    </x-data-table>

    <x-dialog-modal wire:key="leads-form-modal" wire:model.live="showFormModal" maxWidth="2xl">
        <x-slot name="title">
            {{ $editing ? __('Editar lead') : __('Novo lead') }}
        </x-slot>

        <x-slot name="content">
            <div class="row g-3">
                <div class="col-12 col-lg-6">
                    <label for="lead-name" class="form-label small text-uppercase fw-semibold text-muted">{{ __('Nome') }}</label>
                    <input
                        id="lead-name"
                        type="text"
                        class="form-control @error('form.name') is-invalid @enderror"
                        wire:model.defer="form.name"
                        required
                    >
                    @error('form.name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-lg-6">
                    <label for="lead-entity" class="form-label small text-uppercase fw-semibold text-muted">{{ __('Equipe') }}</label>
                    <input
                        id="lead-entity"
                        type="text"
                        class="form-control @error('form.entity') is-invalid @enderror"
                        wire:model.defer="form.entity"
                    >
                    @error('form.entity')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-lg-4">
                    <label for="lead-status-form" class="form-label small text-uppercase fw-semibold text-muted">{{ __('Status') }}</label>
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
                    <label for="lead-email" class="form-label small text-uppercase fw-semibold text-muted">{{ __('E-mail') }}</label>
                    <input
                        id="lead-email"
                        type="email"
                        class="form-control @error('form.email') is-invalid @enderror"
                        wire:model.defer="form.email"
                    >
                    @error('form.email')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12 col-lg-4">
                    <label for="lead-phone" class="form-label small text-uppercase fw-semibold text-muted">{{ __('Telefone') }}</label>
                    <input
                        id="lead-phone"
                        type="text"
                        class="form-control @error('form.phone') is-invalid @enderror"
                        wire:model.defer="form.phone"
                    >
                    @error('form.phone')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-12">
                    <label for="lead-notes" class="form-label small text-uppercase fw-semibold text-muted">{{ __('Notas') }}</label>
                    <textarea
                        id="lead-notes"
                        rows="4"
                        class="form-control @error('form.notes') is-invalid @enderror"
                        wire:model.defer="form.notes"
                    ></textarea>
                    @error('form.notes')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="closeFormModal" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-button type="button" wire:click="save" wire:loading.attr="disabled">
                {{ __('Salvar') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

    <x-confirmation-modal wire:key="leads-delete-modal" wire:model.live="showDeleteModal">
        <x-slot name="title">
            {{ __('Remover lead') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Tem certeza que deseja remover o lead :name?', ['name' => $editing?->name]) }}
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="cancelDelete" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-secondary-button>

            <x-danger-button wire:click="delete" wire:loading.attr="disabled">
                {{ __('Remover') }}
            </x-danger-button>
        </x-slot>
    </x-confirmation-modal>
</div>
