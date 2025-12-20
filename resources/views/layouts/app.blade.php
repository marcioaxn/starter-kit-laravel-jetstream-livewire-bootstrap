<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta data-update-uri="{{ url('/livewire/update') }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/_0403eb0b-de95-4131-87cd-5c705ae95535.png') }}" />
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/_0403eb0b-de95-4131-87cd-5c705ae95535.png') }}" />

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
        @livewireStyles

        <!-- Global Theme Gradient Classes -->
        <style>
            /* ========== GLOBAL THEME GRADIENT CLASSES ========== */
            /* These classes use CSS variables defined by the theme system */

            /* Primary gradient for buttons, icons, and main elements */
            .gradient-theme {
                background: linear-gradient(135deg, var(--theme-primary), var(--theme-primary-light)) !important;
            }

            /* Gradient for active navigation items */
            .gradient-theme-nav {
                background: linear-gradient(135deg, var(--theme-primary), var(--theme-primary-light));
                color: white;
                box-shadow: 0 2px 8px rgba(var(--theme-primary-rgb), 0.3);
            }

            .gradient-theme-nav:hover {
                box-shadow: 0 4px 12px rgba(var(--theme-primary-rgb), 0.4);
            }

            /* Gradient for buttons */
            .gradient-theme-btn {
                background: linear-gradient(135deg, var(--theme-primary), var(--theme-primary-light));
                border: none;
                color: white;
                box-shadow: 0 2px 8px rgba(var(--theme-primary-rgb), 0.25);
                transition: all 0.2s ease;
            }

            .gradient-theme-btn:hover {
                transform: translateY(-1px);
                box-shadow: 0 4px 12px rgba(var(--theme-primary-rgb), 0.35);
                color: white;
            }

            /* Gradient for icons and badges */
            .gradient-theme-icon {
                background: linear-gradient(135deg, var(--theme-primary), var(--theme-primary-light));
                color: white;
            }

            /* Gradient for large header sections */
            .gradient-theme-header {
                background: linear-gradient(135deg, var(--theme-primary) 0%, var(--theme-primary-light) 100%);
                box-shadow: 0 8px 32px rgba(var(--theme-primary-rgb), 0.2);
            }

            /* Dark mode - same gradients work for both modes */
            [data-bs-theme="dark"] .gradient-theme,
            [data-bs-theme="dark"] .gradient-theme-nav,
            [data-bs-theme="dark"] .gradient-theme-btn,
            [data-bs-theme="dark"] .gradient-theme-icon,
            [data-bs-theme="dark"] .gradient-theme-header {
                /* Variables already adapt to dark mode, no changes needed */
            }

            [data-bs-theme="dark"] .gradient-theme-header {
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
            }
        </style>
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
                    'label' => __('Home'),
                    'href' => url('/'),
                    'icon' => 'house-door',
                ],
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

        <script>
            // Theme Color System
            function applyTheme(theme) {
                const root = document.documentElement;

                // Define theme colors with harmonious gradients
                const themeColors = {
                    primary: {
                        base: '#0d6efd',
                        dark: '#0a58ca',
                        light: '#7bb5ff',
                        lighter: '#6ea8fe',
                        rgb: '13, 110, 253'
                    },
                    secondary: {
                        base: '#6c757d',
                        dark: '#5a6268',
                        light: '#a8b1bb',
                        lighter: '#adb5bd',
                        rgb: '108, 117, 125'
                    },
                    success: {
                        base: '#198754',
                        dark: '#146c43',
                        light: '#3bffc3',
                        lighter: '#75b798',
                        rgb: '25, 135, 84'
                    },
                    warning: {
                        base: '#ffc107',
                        dark: '#e0a800',
                        light: '#ffe066',
                        lighter: '#ffe69c',
                        rgb: '255, 193, 7'
                    },
                    info: {
                        base: '#0dcaf0',
                        dark: '#0891b2',
                        light: '#6ff5ff',
                        lighter: '#9eeaf9',
                        rgb: '13, 202, 240'
                    }
                };

                const selectedTheme = themeColors[theme] || themeColors.primary;

                // Apply CSS custom properties for base colors
                root.style.setProperty('--bs-primary', selectedTheme.base);
                root.style.setProperty('--bs-primary-rgb', selectedTheme.rgb);

                // Apply gradient colors
                root.style.setProperty('--theme-primary', selectedTheme.base);
                root.style.setProperty('--theme-primary-dark', selectedTheme.dark);
                root.style.setProperty('--theme-primary-light', selectedTheme.light);
                root.style.setProperty('--theme-primary-lighter', selectedTheme.lighter);
                root.style.setProperty('--theme-primary-rgb', selectedTheme.rgb);

                // Set data attribute for theme-specific styling (text colors, etc.)
                root.setAttribute('data-theme-color', theme);

                // Store theme preference
                localStorage.setItem('user-theme-color', theme);
            }

            function initializeTheme() {
                const userTheme = '{{ Auth::user()->theme_color ?? "primary" }}';
                applyTheme(userTheme);
            }

            // Apply theme on initial page load
            document.addEventListener('DOMContentLoaded', initializeTheme);

            // Apply theme on Livewire navigation (SPA navigation with wire:navigate)
            document.addEventListener('livewire:navigated', initializeTheme);

            // Apply theme when Livewire is loaded/reloaded
            document.addEventListener('livewire:load', initializeTheme);

            // Listen for theme updates from the profile page
            window.addEventListener('theme-updated', function(event) {
                applyTheme(event.detail.themeColor);

                // Dispatch Livewire event to reload and apply theme globally
                setTimeout(function() {
                    window.location.reload();
                }, 300);
            });
        </script>
    </body>
</html>
