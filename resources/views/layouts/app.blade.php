<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="app-body bg-body-tertiary"
          x-data="appLayout()"
          x-init="init()"
          x-on:app-toggle-sidebar.window="toggleSidebar()"
          x-on:app-open-sidebar.window="openSidebar()"
          x-on:app-close-sidebar.window="closeSidebar()">
        <x-banner />

        @php
            $appNavigation = [
                [
                    'label' => __('Dashboard'),
                    'route' => 'dashboard',
                    'icon' => 'speedometer2',
                ],
                [
                    'label' => __('Leads'),
                    'route' => 'leads.index',
                    'icon' => 'people',
                ],
            ];
        @endphp

        <div class="app-shell d-flex min-vh-100">
            @include('layouts.partials.sidebar', ['items' => $appNavigation])

            <div class="app-main flex-grow-1 d-flex flex-column" :class="{'is-sidebar-collapsed': sidebarCollapsed}">
                @livewire('navigation-menu')

                @if (isset($header))
                    <header class="app-page-header app-surface border-bottom shadow-sm">
                        <div class="container-fluid py-3 px-3 px-lg-4">
                            {{ $header }}
                        </div>
                    </header>
                @endif

                <main class="app-content flex-grow-1 py-4">
                    <div class="container-fluid px-3 px-lg-4">
                        {{ $slot }}
                    </div>
                </main>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
