<x-app-layout>
    <x-slot name="header">
        <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-3">
            <div>
                <h1 class="h4 text-body-emphasis mb-1">{{ __('Dashboard') }}</h1>
                <p class="text-muted small mb-0">
                    {{ __('Track your project setup, quick actions and helpful resources in one place.') }}
                </p>
            </div>

            <div class="d-flex align-items-center gap-2">
                <x-action-button variant="outline-secondary" icon="person-circle" href="{{ route('profile.show') }}" tooltip="{{ __('Review your profile configuration') }}">
                    {{ __('Profile Settings') }}
                </x-action-button>

                <x-action-button variant="primary" icon="box-arrow-up-right" href="https://laravel.com/docs" tooltip="{{ __('Open the Laravel documentation in a new tab') }}" target="_blank" rel="noopener">
                    {{ __('Docs') }}
                </x-action-button>
            </div>
        </div>
    </x-slot>

    <div class="row g-4">
        <div class="col-12 col-lg-3 col-sm-6">
            <div class="card app-surface shadow-sm border-0 h-100">
                <div class="card-body p-4 d-flex flex-column gap-3">
                    <div class="dashboard-stat-icon bg-primary-subtle text-primary">
                        <i class="bi bi-rocket-takeoff"></i>
                    </div>
                    <div>
                        <p class="text-muted text-uppercase small mb-1">{{ __('Starter Tasks') }}</p>
                        <h2 class="fs-4 fw-semibold mb-0">8</h2>
                        <p class="text-body-secondary small mb-0">
                            {{ __('Out of 12 steps recommended in the onboarding checklist.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3 col-sm-6">
            <div class="card app-surface shadow-sm border-0 h-100">
                <div class="card-body p-4 d-flex flex-column gap-3">
                    <div class="dashboard-stat-icon bg-success-subtle text-success">
                        <i class="bi bi-lightning-charge"></i>
                    </div>
                    <div>
                        <p class="text-muted text-uppercase small mb-1">{{ __('Build Status') }}</p>
                        <h2 class="fs-4 fw-semibold mb-0">{{ __('Ready') }}</h2>
                        <p class="text-body-secondary small mb-0">
                            {{ __('Vite + Laravel Mix configured for both dev and production modes.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3 col-sm-6">
            <div class="card app-surface shadow-sm border-0 h-100">
                <div class="card-body p-4 d-flex flex-column gap-3">
                    <div class="dashboard-stat-icon bg-warning-subtle text-warning">
                        <i class="bi bi-diagram-3"></i>
                    </div>
                    <div>
                        <p class="text-muted text-uppercase small mb-1">{{ __('Integrations') }}</p>
                        <h2 class="fs-4 fw-semibold mb-0">3</h2>
                        <p class="text-body-secondary small mb-0">
                            {{ __('Bootstrap, Livewire e Alpine pre-configurados para os proximos blocos.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-3 col-sm-6">
            <div class="card app-surface shadow-sm border-0 h-100">
                <div class="card-body p-4 d-flex flex-column gap-3">
                    <div class="dashboard-stat-icon bg-info-subtle text-info">
                        <i class="bi bi-journal-check"></i>
                    </div>
                    <div>
                        <p class="text-muted text-uppercase small mb-1">{{ __('Next Milestone') }}</p>
                        <h2 class="fs-4 fw-semibold mb-0">{{ __('CRUD Base') }}</h2>
                        <p class="text-body-secondary small mb-0">
                            {{ __('Preparar scaffolding para os cadastros iniciais conforme roteiro dos blocos 4 e 5.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-1">
        <div class="col-12 col-xl-8">
            <x-welcome />
        </div>

        <div class="col-12 col-xl-4">
            <div class="card app-surface shadow-sm border-0 h-100">
                <div class="card-body p-4 d-flex flex-column gap-3">
                    <div class="d-flex align-items-center gap-3">
                        <div class="dashboard-stat-icon bg-secondary-subtle text-secondary">
                            <i class="bi bi-list-check"></i>
                        </div>
                        <div>
                            <h2 class="h5 mb-1">{{ __('Getting Started Checklist') }}</h2>
                            <p class="text-muted small mb-0">
                                {{ __('Keep track of what is done and what still needs attention.') }}
                            </p>
                        </div>
                    </div>

                    <ul class="list-unstyled d-flex flex-column gap-3 mb-0">
                        <li class="d-flex gap-3 align-items-start">
                            <span class="badge rounded-pill text-bg-success flex-shrink-0">1</span>
                            <div>
                                <p class="fw-semibold mb-1">{{ __('Atualizar Vite e dependencias Bootstrap') }}</p>
                                <p class="text-body-secondary small mb-0">
                                    {{ __('Estrutura SCSS consolidada e tooltips integrados com Livewire.') }}
                                </p>
                            </div>
                        </li>
                        <li class="d-flex gap-3 align-items-start">
                            <span class="badge rounded-pill text-bg-success flex-shrink-0">2</span>
                            <div>
                                <p class="fw-semibold mb-1">{{ __('Migrar layout base para Bootstrap 5') }}</p>
                                <p class="text-body-secondary small mb-0">
                                    {{ __('Sidebar responsiva, topbar e dark mode com preferencia persistida.') }}
                                </p>
                            </div>
                        </li>
                        <li class="d-flex gap-3 align-items-start">
                            <span class="badge rounded-pill text-bg-primary flex-shrink-0">3</span>
                            <div>
                                <p class="fw-semibold mb-1">{{ __('Planejar CRUDs iniciais') }}</p>
                                <p class="text-body-secondary small mb-0">
                                    {{ __('Listar modulos prioritarios para transformacao em Livewire + Bootstrap.') }}
                                </p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    @php
        $showcaseRecords = [
            ['name' => 'Leads', 'entity' => 'Comercial', 'status' => 'Em andamento', 'updated_at' => 'há 5 minutos'],
            ['name' => 'Projetos', 'entity' => 'PMO', 'status' => 'Revisão', 'updated_at' => 'há 32 minutos'],
            ['name' => 'Financeiro', 'entity' => 'Contabilidade', 'status' => 'Aprovado', 'updated_at' => 'há 1 hora'],
        ];
    @endphp

    <div class="mt-4">
        <x-data-table
            title="{{ __('Estrutura CRUD em preparação') }}"
            description="{{ __('O kit de componentes já está pronto para receber os dados reais dos módulos prioritários.') }}"
        >
            <x-slot name="actions">
                <x-action-button variant="outline-secondary" icon="funnel" tooltip="{{ __('Filtrar registros') }}" />
                <x-action-button variant="primary" icon="plus" tooltip="{{ __('Criar novo registro') }}">
                    {{ __('Novo') }}
                </x-action-button>
            </x-slot>

            <x-slot name="head">
                <tr>
                    <th scope="col">{{ __('Módulo') }}</th>
                    <th scope="col">{{ __('Equipe') }}</th>
                    <th scope="col">{{ __('Status') }}</th>
                    <th scope="col">{{ __('Atualizado') }}</th>
                    <th scope="col" class="text-end">{{ __('Ações') }}</th>
                </tr>
            </x-slot>

            @foreach ($showcaseRecords as $record)
                <tr>
                    <td class="fw-semibold text-body-emphasis">{{ $record['name'] }}</td>
                    <td class="text-body-secondary">{{ $record['entity'] }}</td>
                    <td>
                        <span class="badge rounded-pill bg-primary-subtle text-primary fw-semibold">
                            {{ $record['status'] }}
                        </span>
                    </td>
                    <td class="text-body-secondary">{{ $record['updated_at'] }}</td>
                    <td class="text-end">
                        <div class="d-inline-flex gap-2">
                            <x-action-button variant="outline-secondary" icon="eye" tooltip="{{ __('Visualizar detalhes') }}" />
                            <x-action-button variant="outline-primary" icon="pencil" tooltip="{{ __('Editar registro') }}" />
                        </div>
                    </td>
                </tr>
            @endforeach

            <x-slot name="empty">
                {{ __('Nenhum registro encontrado. Configure os primeiros módulos para ver esta lista populada.') }}
            </x-slot>

            <x-slot name="footer">
                <span class="text-muted small">{{ __('Componentes adaptados para tabelas Bootstrap + Livewire.') }}</span>
                <div class="d-flex gap-2">
                    <x-action-button variant="outline-secondary" icon="arrow-clockwise" tooltip="{{ __('Atualizar agora') }}" />
                    <x-action-button variant="outline-primary" icon="gear" tooltip="{{ __('Configurar colunas') }}" />
                </div>
            </x-slot>
        </x-data-table>
    </div>

    <div class="row g-4 mt-1">
        <div class="col-12 col-xl-6">
            <div class="card app-surface shadow-sm border-0 h-100">
                <div class="card-header bg-transparent border-0">
                    <h2 class="h5 mb-1 text-body-emphasis">{{ __('Componentes de alerta & dropdown') }}</h2>
                    <p class="text-muted small mb-0">
                        {{ __('Exemplos prontos para reutilização com Bootstrap 5 e acessibilidade básica.') }}
                    </p>
                </div>
                <div class="card-body d-flex flex-column gap-3">
                    <x-alert variant="success" icon="check-circle" heading="{{ __('Alerta de sucesso') }}" dismissible>
                        {{ __('Tudo pronto! Este é um alerta reaproveitável com suporte a ícone e botão de fechar.') }}
                    </x-alert>

                    {{--
                    <x-dropdown
                        label="{{ __('Ações rápidas') }}"
                        variant="outline-secondary"
                        icon="list"
                        :items="[
                            ['label' => __('Criar lead'), 'href' => route('leads.index'), 'icon' => 'plus-circle'],
                            ['label' => __('Exportar CSV'), 'href' => '#', 'icon' => 'download'],
                            ['label' => __('Configurações'), 'href' => route('profile.show'), 'icon' => 'gear'],
                        ]"
                    />
--}}
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-6">
            <div class="card app-surface shadow-sm border-0 h-100">
                <div class="card-header bg-transparent border-0 d-flex align-items-center justify-content-between">
                    <div>
                        <h2 class="h5 mb-1 text-body-emphasis">{{ __('Toasts prontos para uso') }}</h2>
                        <p class="text-muted small mb-0">
                            {{ __('Basta incluir o componente, o JavaScript central já inicializa automaticamente.') }}
                        </p>
                    </div>
                    <button class="btn btn-outline-primary btn-sm"
                            type="button"
                            x-data
                            x-on:click="
                                let toastEl = document.getElementById('starter-toast-example');
                                let toast = bootstrap.Toast.getOrCreateInstance(toastEl);
                                toast.show();
                            ">
                        <i class="bi bi-megaphone me-1"></i> {{ __('Exibir') }}
                    </button>
                </div>
                <div class="card-body">
                    <div class="toast-container position-relative">
                        <x-toast id="starter-toast-example" icon="megaphone" :autohide="false">
                            {{ __('Este toast pode ser reutilizado em qualquer tela. Clique em exibir para demonstrar o comportamento.') }}
                        </x-toast>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
