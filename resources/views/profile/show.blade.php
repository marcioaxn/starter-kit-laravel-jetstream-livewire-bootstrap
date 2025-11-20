<x-app-layout>
    <x-slot name="header">
        <h1 class="h4 text-body-emphasis mb-0">
            {{ __('Profile') }}
        </h1>
    </x-slot>

    <section class="py-5 bg-body-tertiary">
        <div class="container">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-5">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-5">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <div class="mt-5">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-5">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </section>
</x-app-layout>
