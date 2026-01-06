<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta data-update-uri="{{ url('/livewire/update') }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />

        <!-- Bootstrap Icons (CDN) -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

            /* Dark mode - same gradients work for both modes */
            [data-bs-theme="dark"] .gradient-theme,
            [data-bs-theme="dark"] .gradient-theme-btn,
            [data-bs-theme="dark"] .gradient-theme-icon {
                /* Variables already adapt to dark mode, no changes needed */
            }

            body {
                transition: background-color 0.3s ease;
            }
        </style>

        @stack('styles')
    </head>
    <body class="antialiased">
        
        {{ $slot }}

        @livewireScripts
        @stack('scripts')

        <script>
            // Theme Color System (Public uses default primary)
            (function() {
                const root = document.documentElement;

                const themeColors = {
                    primary: {
                        base: '#0d6efd',
                        dark: '#0a58ca',
                        light: '#7bb5ff',
                        lighter: '#6ea8fe',
                        rgb: '13, 110, 253'
                    }
                };

                const selectedTheme = themeColors.primary;

                // Apply CSS custom properties
                root.style.setProperty('--bs-primary', selectedTheme.base);
                root.style.setProperty('--bs-primary-rgb', selectedTheme.rgb);
                root.style.setProperty('--theme-primary', selectedTheme.base);
                root.style.setProperty('--theme-primary-dark', selectedTheme.dark);
                root.style.setProperty('--theme-primary-light', selectedTheme.light);
                root.style.setProperty('--theme-primary-lighter', selectedTheme.lighter);
                root.style.setProperty('--theme-primary-rgb', selectedTheme.rgb);

                // Set data attribute for theme-specific styling
                root.setAttribute('data-theme-color', 'primary');
            })();
        </script>
    </body>
</html>
