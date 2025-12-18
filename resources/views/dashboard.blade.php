<x-app-layout>
    <x-slot name="header">
        <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
            <div>
                <div class="d-flex align-items-center gap-2 mb-1">
                    <h1 class="h4 text-body-emphasis mb-0">{{ __('Dashboard') }}</h1>
                    <span class="badge bg-success-subtle text-success rounded-pill small">
                        <i class="bi bi-check-circle me-1"></i>{{ __('Online') }}
                    </span>
                </div>
                <p class="text-muted small mb-0">
                    {{ __('Welcome back,') }} <span class="fw-semibold">{{ Auth::user()->name }}</span>! {{ __('Here is what is happening today.') }}
                </p>
            </div>

            <div class="d-flex align-items-center gap-2 flex-wrap">
                <x-action-button variant="outline-secondary" icon="person-circle" href="{{ route('profile.show') }}" wire:navigate tooltip="{{ __('Review your profile configuration') }}">
                    <span class="d-none d-sm-inline">{{ __('Profile') }}</span>
                </x-action-button>

                <x-action-button variant="primary" icon="box-arrow-up-right" href="https://laravel.com/docs" tooltip="{{ __('Open the Laravel documentation in a new tab') }}" target="_blank" rel="noopener">
                    <span class="d-none d-sm-inline">{{ __('Docs') }}</span>
                </x-action-button>
            </div>
        </div>
    </x-slot>

    {{-- Stats Cards --}}
    <div class="row g-3 g-lg-4">
        <div class="col-6 col-lg-3">
            <div class="card app-surface shadow-sm border-0 h-100 card-hover-lift">
                <div class="card-body p-3 p-lg-4">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="dashboard-stat-icon bg-primary-subtle text-primary">
                            <i class="bi bi-rocket-takeoff"></i>
                        </div>
                        <span class="badge bg-primary-subtle text-primary rounded-pill small">
                            <i class="bi bi-arrow-up-short"></i>66%
                        </span>
                    </div>
                    <p class="text-muted text-uppercase small mb-1 fw-medium">{{ __('Tasks') }}</p>
                    <div class="d-flex align-items-baseline gap-2">
                        <h2 class="fs-3 fw-bold mb-0 text-body-emphasis">8</h2>
                        <span class="text-muted small">/ 12</span>
                    </div>
                    <div class="progress mt-2" style="height: 4px;" role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar bg-primary" style="width: 66%"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="card app-surface shadow-sm border-0 h-100 card-hover-lift">
                <div class="card-body p-3 p-lg-4">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="dashboard-stat-icon bg-success-subtle text-success">
                            <i class="bi bi-lightning-charge"></i>
                        </div>
                        <span class="badge bg-success-subtle text-success rounded-pill small">
                            <i class="bi bi-check2"></i> OK
                        </span>
                    </div>
                    <p class="text-muted text-uppercase small mb-1 fw-medium">{{ __('Build') }}</p>
                    <h2 class="fs-3 fw-bold mb-0 text-body-emphasis">{{ __('Ready') }}</h2>
                    <p class="text-success small mb-0 mt-1">
                        <i class="bi bi-check-circle me-1"></i>{{ __('All systems go') }}
                    </p>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="card app-surface shadow-sm border-0 h-100 card-hover-lift">
                <div class="card-body p-3 p-lg-4">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="dashboard-stat-icon bg-warning-subtle text-warning">
                            <i class="bi bi-diagram-3"></i>
                        </div>
                        <span class="badge bg-warning-subtle text-warning rounded-pill small">
                            {{ __('Active') }}
                        </span>
                    </div>
                    <p class="text-muted text-uppercase small mb-1 fw-medium">{{ __('Integrations') }}</p>
                    <h2 class="fs-3 fw-bold mb-0 text-body-emphasis">3</h2>
                    <p class="text-muted small mb-0 mt-1">
                        Bootstrap, Livewire, Alpine
                    </p>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3">
            <div class="card app-surface shadow-sm border-0 h-100 card-hover-lift">
                <div class="card-body p-3 p-lg-4">
                    <div class="d-flex align-items-start justify-content-between mb-3">
                        <div class="dashboard-stat-icon bg-info-subtle text-info">
                            <i class="bi bi-journal-check"></i>
                        </div>
                        <span class="badge bg-info-subtle text-info rounded-pill small">
                            {{ __('Next') }}
                        </span>
                    </div>
                    <p class="text-muted text-uppercase small mb-1 fw-medium">{{ __('Milestone') }}</p>
                    <h2 class="fs-5 fw-bold mb-0 text-body-emphasis">{{ __('CRUD Base') }}</h2>
                    <p class="text-muted small mb-0 mt-1 text-truncate">
                        {{ __('Blocks 4 & 5') }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    {{-- Main Content --}}
    <div class="row g-3 g-lg-4 mt-1">
        {{-- Welcome Section --}}
        <div class="col-12 col-xl-8">
            <x-welcome />
        </div>

        {{-- Checklist --}}
        <div class="col-12 col-xl-4">
            <div class="card app-surface shadow-sm border-0 h-100">
                <div class="card-header bg-transparent border-0 pb-0">
                    <div class="d-flex align-items-center gap-3">
                        <div class="dashboard-stat-icon bg-secondary-subtle text-secondary flex-shrink-0">
                            <i class="bi bi-list-check"></i>
                        </div>
                        <div class="flex-grow-1 min-width-0">
                            <h2 class="h6 mb-1 text-body-emphasis">{{ __('Getting Started') }}</h2>
                            <div class="d-flex align-items-center gap-2">
                                <div class="progress flex-grow-1" style="height: 6px;" role="progressbar">
                                    <div class="progress-bar bg-success" style="width: 66%"></div>
                                </div>
                                <span class="text-muted small fw-medium">2/3</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-3">
                    <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                        <li class="d-flex gap-3 align-items-start p-2 rounded bg-success-subtle bg-opacity-50">
                            <div class="d-flex align-items-center justify-content-center rounded-circle bg-success text-white flex-shrink-0" style="width: 24px; height: 24px;">
                                <i class="bi bi-check2 small"></i>
                            </div>
                            <div class="min-width-0">
                                <p class="fw-semibold mb-0 small text-success">{{ __('Vite & Bootstrap dependencies') }}</p>
                                <p class="text-muted small mb-0 text-truncate">{{ __('SCSS structure consolidated') }}</p>
                            </div>
                        </li>
                        <li class="d-flex gap-3 align-items-start p-2 rounded bg-success-subtle bg-opacity-50">
                            <div class="d-flex align-items-center justify-content-center rounded-circle bg-success text-white flex-shrink-0" style="width: 24px; height: 24px;">
                                <i class="bi bi-check2 small"></i>
                            </div>
                            <div class="min-width-0">
                                <p class="fw-semibold mb-0 small text-success">{{ __('Bootstrap 5 base layout') }}</p>
                                <p class="text-muted small mb-0 text-truncate">{{ __('Responsive sidebar & dark mode') }}</p>
                            </div>
                        </li>
                        <li class="d-flex gap-3 align-items-start p-2 rounded border border-primary border-opacity-25">
                            <div class="d-flex align-items-center justify-content-center rounded-circle bg-primary text-white flex-shrink-0" style="width: 24px; height: 24px;">
                                <span class="small fw-bold">3</span>
                            </div>
                            <div class="min-width-0">
                                <p class="fw-semibold mb-0 small text-primary">{{ __('Plan initial CRUDs') }}</p>
                                <p class="text-muted small mb-0 text-truncate">{{ __('Priority modules for Livewire') }}</p>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="card-footer bg-transparent border-0 pt-0">
                    <a href="#" class="btn btn-sm btn-outline-primary w-100">
                        <i class="bi bi-arrow-right me-1"></i>{{ __('View all tasks') }}
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- CRUD Table Preview --}}
    @php
        $showcaseRecords = [
            ['name' => 'Leads', 'entity' => 'Comercial', 'status' => 'Em andamento', 'variant' => 'primary', 'updated_at' => 'há 5 min'],
            ['name' => 'Projetos', 'entity' => 'PMO', 'status' => 'Revisão', 'variant' => 'warning', 'updated_at' => 'há 32 min'],
            ['name' => 'Financeiro', 'entity' => 'Contabilidade', 'status' => 'Aprovado', 'variant' => 'success', 'updated_at' => 'há 1h'],
        ];
    @endphp

    <div class="mt-4">
        <x-data-table
            title="{{ __('CRUD Structure Preview') }}"
            description="{{ __('Component kit ready for real data from priority modules.') }}"
        >
            <x-slot name="actions">
                <x-action-button variant="outline-secondary" icon="funnel" tooltip="{{ __('Filter records') }}" />
                <x-action-button variant="primary" icon="plus" tooltip="{{ __('Create new record') }}">
                    <span class="d-none d-sm-inline">{{ __('New') }}</span>
                </x-action-button>
            </x-slot>

            <x-slot name="head">
                <tr>
                    <th scope="col">{{ __('Module') }}</th>
                    <th scope="col" class="d-none d-md-table-cell">{{ __('Team') }}</th>
                    <th scope="col">{{ __('Status') }}</th>
                    <th scope="col" class="d-none d-sm-table-cell">{{ __('Updated') }}</th>
                    <th scope="col" class="text-end">{{ __('Actions') }}</th>
                </tr>
            </x-slot>

            @foreach ($showcaseRecords as $record)
                <tr class="align-middle">
                    <td>
                        <div class="d-flex align-items-center gap-2">
                            <div class="avatar-sm bg-{{ $record['variant'] }}-subtle text-{{ $record['variant'] }} rounded d-flex align-items-center justify-content-center" style="width: 36px; height: 36px;">
                                <i class="bi bi-folder2-open"></i>
                            </div>
                            <div>
                                <span class="fw-semibold text-body-emphasis">{{ $record['name'] }}</span>
                                <span class="d-md-none text-muted small d-block">{{ $record['entity'] }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="text-body-secondary d-none d-md-table-cell">{{ $record['entity'] }}</td>
                    <td>
                        <span class="badge rounded-pill bg-{{ $record['variant'] }}-subtle text-{{ $record['variant'] }} fw-semibold">
                            {{ $record['status'] }}
                        </span>
                    </td>
                    <td class="text-body-secondary small d-none d-sm-table-cell">{{ $record['updated_at'] }}</td>
                    <td class="text-end">
                        <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="tooltip" title="{{ __('View') }}">
                                <i class="bi bi-eye"></i>
                            </button>
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="{{ __('Edit') }}">
                                <i class="bi bi-pencil"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach

            <x-slot name="footer">
                <span class="text-muted small">{{ __('Bootstrap + Livewire table components') }}</span>
                <div class="d-flex gap-2">
                    <x-action-button variant="outline-secondary" icon="arrow-clockwise" tooltip="{{ __('Refresh') }}" size="sm" />
                </div>
            </x-slot>
        </x-data-table>
    </div>

    {{-- Components Showcase --}}
    <div class="row g-3 g-lg-4 mt-1">
        <div class="col-12 col-lg-6">
            <div class="card app-surface shadow-sm border-0 h-100">
                <div class="card-header bg-transparent border-0 d-flex align-items-center gap-3">
                    <div class="dashboard-stat-icon bg-success-subtle text-success flex-shrink-0" style="width: 2.5rem; height: 2.5rem; font-size: 1rem;">
                        <i class="bi bi-bell"></i>
                    </div>
                    <div>
                        <h2 class="h6 mb-0 text-body-emphasis">{{ __('Alerts & Notifications') }}</h2>
                        <p class="text-muted small mb-0">{{ __('Ready-to-use components') }}</p>
                    </div>
                </div>
                <div class="card-body pt-0 d-flex flex-column gap-3">
                    <x-alert variant="success" icon="check-circle" dismissible>
                        <strong>{{ __('Success!') }}</strong> {{ __('Reusable alert with icon and dismiss button.') }}
                    </x-alert>

                    <x-alert variant="info" icon="info-circle">
                        <strong>{{ __('Tip:') }}</strong> {{ __('Alerts support multiple variants and icons.') }}
                    </x-alert>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-6">
            <div class="card app-surface shadow-sm border-0 h-100">
                <div class="card-header bg-transparent border-0 d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <div class="dashboard-stat-icon bg-info-subtle text-info flex-shrink-0" style="width: 2.5rem; height: 2.5rem; font-size: 1rem;">
                            <i class="bi bi-chat-square-text"></i>
                        </div>
                        <div>
                            <h2 class="h6 mb-0 text-body-emphasis">{{ __('Toast Notifications') }}</h2>
                            <p class="text-muted small mb-0">{{ __('Auto-initialized by JS') }}</p>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm"
                            type="button"
                            x-data
                            x-on:click="
                                let toastEl = document.getElementById('starter-toast-example');
                                let toast = bootstrap.Toast.getOrCreateInstance(toastEl);
                                toast.show();
                            ">
                        <i class="bi bi-megaphone me-1"></i>
                        <span class="d-none d-sm-inline">{{ __('Show Toast') }}</span>
                        <span class="d-sm-none">{{ __('Show') }}</span>
                    </button>
                </div>
                <div class="card-body pt-0">
                    <div class="toast-container position-relative">
                        <x-toast id="starter-toast-example" icon="megaphone" :autohide="false">
                            {{ __('This toast can be reused on any screen!') }}
                        </x-toast>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
