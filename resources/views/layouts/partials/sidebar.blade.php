@props(['items' => []])

@php
    $navItems = collect($items)->map(function ($item) {
        return array_merge([
            'icon' => 'circle',
            'route' => null,
            'href' => null,
        ], $item);
    });
@endphp

<aside class="app-sidebar app-surface border-end d-none d-lg-flex flex-column"
       :class="{'is-collapsed': sidebarCollapsed}">
    <div class="app-sidebar-header d-flex align-items-center justify-content-between gap-2 p-3">
        <a class="app-brand d-flex align-items-center gap-2 text-decoration-none text-reset"
           href="{{ route('dashboard') }}">
            <x-application-mark class="app-brand-mark flex-shrink-0" />
            <span class="sidebar-text fw-semibold text-uppercase small mb-0">{{ config('app.name', 'Laravel') }}</span>
        </a>

        <button type="button"
                class="btn btn-outline-secondary btn-icon"
                aria-label="{{ __('Toggle sidebar') }}"
                data-bs-toggle="tooltip"
                data-bs-placement="bottom"
                title="{{ __('Collapse sidebar') }}"
                @click="$dispatch('app-toggle-sidebar')">
            <i class="bi bi-layout-sidebar-inset"></i>
        </button>
    </div>

    <div class="app-sidebar-scroll flex-grow-1 overflow-auto px-2 pb-4">
        <nav class="nav nav-pills flex-column gap-1">
            @foreach ($navItems as $item)
                @php
                    $isActive = $item['route']
                        ? request()->routeIs($item['route'])
                        : ($item['href'] ? request()->fullUrlIs($item['href']) : false);

                    $url = $item['route']
                        ? route($item['route'])
                        : ($item['href'] ?? '#');
                @endphp

                <a href="{{ $url }}"
                   class="nav-link d-flex align-items-center gap-2 py-2 px-3 {{ $isActive ? 'active' : '' }}"
                   data-bs-toggle="tooltip"
                   data-bs-placement="right"
                   title="{{ $item['label'] }}">
                    <i class="bi bi-{{ $item['icon'] }} fs-5 flex-shrink-0"></i>
                    <span class="sidebar-text">{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>
    </div>

    <div class="app-sidebar-footer px-3 pb-3">
        <div class="card app-surface-subtle border-0">
            <div class="card-body p-3 d-flex align-items-center gap-3">
                <img src="{{ Auth::user()->profile_photo_url }}"
                     alt="{{ Auth::user()->name }}"
                     class="rounded-circle object-fit-cover border"
                     style="width: 2.75rem; height: 2.75rem;">

                <div class="sidebar-text">
                    <p class="fw-semibold mb-0 text-truncate">{{ Auth::user()->name }}</p>
                    <p class="text-muted small mb-0 text-truncate">{{ Auth::user()->email }}</p>
                    <a href="{{ route('profile.show') }}" class="link-primary small text-decoration-none">
                        {{ __('View profile') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</aside>

<div class="offcanvas offcanvas-start d-lg-none"
     tabindex="-1"
     id="appSidebarOffcanvas"
     aria-labelledby="appSidebarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="appSidebarLabel">{{ config('app.name', 'Laravel') }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="{{ __('Close') }}"></button>
    </div>
    <div class="offcanvas-body d-flex flex-column gap-4">
        <div>
            <div class="d-flex align-items-center gap-3 mb-3">
                <img src="{{ Auth::user()->profile_photo_url }}"
                     alt="{{ Auth::user()->name }}"
                     class="rounded-circle object-fit-cover border"
                     style="width: 2.75rem; height: 2.75rem;">
                <div>
                    <p class="fw-semibold mb-0">{{ Auth::user()->name }}</p>
                    <p class="text-muted small mb-0">{{ Auth::user()->email }}</p>
                </div>
            </div>

            <nav class="nav nav-pills flex-column gap-2">
                @foreach ($navItems as $item)
                    @php
                        $isActive = $item['route']
                            ? request()->routeIs($item['route'])
                            : ($item['href'] ? request()->fullUrlIs($item['href']) : false);

                        $url = $item['route']
                            ? route($item['route'])
                            : ($item['href'] ?? '#');
                    @endphp

                    <a href="{{ $url }}"
                       class="nav-link d-flex align-items-center gap-2 {{ $isActive ? 'active' : '' }}"
                       data-bs-dismiss="offcanvas">
                        <i class="bi bi-{{ $item['icon'] }} fs-5 flex-shrink-0"></i>
                        <span>{{ $item['label'] }}</span>
                    </a>
                @endforeach
            </nav>
        </div>

        <a href="{{ route('profile.show') }}" class="btn btn-outline-secondary">
            {{ __('Manage profile') }}
        </a>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-outline-danger w-100">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</div>
