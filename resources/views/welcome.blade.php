<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    </head>
    <body class="bg-light">
        <div class="d-flex min-vh-100 align-items-center justify-content-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6">
                        <div class="card shadow-sm">
                            <div class="card-body p-4 p-md-5">
                                <h1 class="h3 mb-3 text-center">
                                    {{ config('app.name', 'Laravel') }}
                                </h1>
                                <p class="text-muted text-center mb-4">
                                    Projeto base Laravel + Jetstream (Livewire) + Bootstrap 5.
                                </p>

                                @if (Route::has('login'))
                                    <div class="d-flex flex-column flex-sm-row justify-content-center gap-2">
                                        @auth
                                            <a href="{{ url('/dashboard') }}" class="btn btn-primary">
                                                Ir para o dashboard
                                            </a>
                                        @else
                                            <a href="{{ route('login') }}" class="btn btn-primary">
                                                Entrar
                                            </a>

                                            @if (Route::has('register'))
                                                <a href="{{ route('register') }}" class="btn btn-outline-secondary">
                                                    Registrar
                                                </a>
                                            @endif
                                        @endauth
                                    </div>
                                @endif
                            </div>
                            <div class="card-footer text-center small text-muted">
                                Ambiente de desenvolvimento - Vite + Bootstrap 5
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

