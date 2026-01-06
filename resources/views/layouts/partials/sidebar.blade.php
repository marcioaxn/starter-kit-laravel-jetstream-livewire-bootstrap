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

<!-- Desktop Sidebar -->
<aside class="app-sidebar app-surface border-end d-none d-lg-flex flex-column"
       :class="{'is-collapsed': sidebarCollapsed}">
    <!-- Header -->
    <div class="app-sidebar-header d-flex align-items-center justify-content-between gap-2 p-3">
        <a class="app-brand d-flex align-items-center gap-2 text-decoration-none text-reset"
           href="{{ route('dashboard') }}"
           wire:navigate>
            <x-application-mark class="app-brand-mark flex-shrink-0" />
            <span class="sidebar-text fw-semibold text-uppercase small mb-0">{{ config('app.name', 'Laravel') }}</span>
        </a>
    </div>

    <!-- Navigation -->
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
                   @if($item['label'] !== 'Home') wire:navigate @endif
                   class="nav-link-modern d-flex align-items-center gap-2 py-2 px-3 {{ $isActive ? 'active gradient-theme-nav' : '' }}"
                   data-bs-toggle="tooltip"
                   data-bs-placement="right"
                   title="{{ $item['label'] }}">
                    <i class="bi bi-{{ $item['icon'] }} fs-5 flex-shrink-0"></i>
                    <span class="sidebar-text">{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>
    </div>

    <!-- User Footer -->
    <div class="app-sidebar-footer p-3">
        <div class="user-card-modern">
            <div class="user-card-inner">
                <div class="user-avatar-wrapper">
                    <img src="{{ Auth::user()->profile_photo_url }}"
                         alt="{{ Auth::user()->name }}"
                         class="user-avatar">
                    <div class="user-status-indicator"></div>
                </div>

                <div class="sidebar-text user-info-wrapper">
                    <p class="user-name"
                       data-bs-toggle="tooltip"
                       data-bs-placement="top"
                       title="{{ Auth::user()->name }}">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="user-email"
                       data-bs-toggle="tooltip"
                       data-bs-placement="top"
                       title="{{ Auth::user()->email }}">
                        {{ Auth::user()->email }}
                    </p>
                </div>
            </div>

            <a href="{{ route('profile.show') }}"
               wire:navigate
               class="sidebar-text user-profile-link">
                <i class="bi bi-person-circle me-1"></i>
                <span>{{ __('View profile') }}</span>
                <i class="bi bi-arrow-right ms-auto"></i>
            </a>
        </div>
    </div>
</aside>

<!-- Mobile Offcanvas -->
<div class="offcanvas offcanvas-start offcanvas-modern d-lg-none"
     tabindex="-1"
     id="appSidebarOffcanvas"
     aria-labelledby="appSidebarLabel">
    <div class="offcanvas-header-modern">
        <div class="d-flex align-items-center gap-2">
            <x-application-mark class="offcanvas-brand-mark" />
            <h5 class="offcanvas-title mb-0" id="appSidebarLabel">{{ config('app.name', 'Laravel') }}</h5>
        </div>
        <button type="button" class="btn-close-modern" data-bs-dismiss="offcanvas" aria-label="{{ __('Close') }}">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>

    <div class="offcanvas-body-modern">
        <!-- User Info -->
        <div class="offcanvas-user-card">
            <div class="d-flex align-items-center gap-3">
                <div class="user-avatar-wrapper-mobile">
                    <img src="{{ Auth::user()->profile_photo_url }}"
                         alt="{{ Auth::user()->name }}"
                         class="user-avatar-mobile">
                    <div class="user-status-indicator"></div>
                </div>
                <div class="flex-grow-1 overflow-hidden">
                    <p class="user-name-mobile"
                       data-bs-toggle="tooltip"
                       title="{{ Auth::user()->name }}">
                        {{ Auth::user()->name }}
                    </p>
                    <p class="user-email-mobile"
                       data-bs-toggle="tooltip"
                       title="{{ Auth::user()->email }}">
                        {{ Auth::user()->email }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Navigation -->
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
                   @if($item['label'] !== 'Home') wire:navigate @endif
                   class="nav-link-modern-mobile d-flex align-items-center gap-2 {{ $isActive ? 'active gradient-theme-nav' : '' }}"
                   data-bs-dismiss="offcanvas">
                    <i class="bi bi-{{ $item['icon'] }} fs-5 flex-shrink-0"></i>
                    <span>{{ $item['label'] }}</span>
                </a>
            @endforeach
        </nav>

        <!-- Action Buttons -->
        <div class="offcanvas-actions">
            <a href="{{ route('profile.show') }}"
               wire:navigate
               class="btn btn-profile-modern gradient-theme-btn"
               data-bs-dismiss="offcanvas">
                <i class="bi bi-person-circle me-2"></i>{{ __('Manage profile') }}
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-logout-modern w-100">
                    <i class="bi bi-box-arrow-right me-2"></i>{{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</div>