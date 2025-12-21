<?php

namespace App\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UpdateThemeColorForm extends Component
{
    public $themeColor;
    public $previousThemeColor;

    public $availableColors = [
        'primary' => [
            'name' => 'Ocean Blue',
            'description' => 'Classic professional blue theme',
            'preview' => '#0d6efd',
        ],
        'secondary' => [
            'name' => 'Slate Gray',
            'description' => 'Sophisticated neutral gray',
            'preview' => '#6c757d',
        ],
        'success' => [
            'name' => 'Forest Green',
            'description' => 'Fresh and natural green',
            'preview' => '#198754',
        ],
        'warning' => [
            'name' => 'Sunset Orange',
            'description' => 'Warm and energetic orange',
            'preview' => '#ffc107',
        ],
        'info' => [
            'name' => 'Sky Cyan',
            'description' => 'Light and airy cyan',
            'preview' => '#0dcaf0',
        ],
    ];

    public function mount()
    {
        $this->themeColor = Auth::user()->theme_color ?? 'primary';
        $this->previousThemeColor = $this->themeColor;
    }

    public function updated($propertyName)
    {
        // Auto-save when theme color changes
        if ($propertyName === 'themeColor' && $this->themeColor !== $this->previousThemeColor) {
            $this->updateThemeColor();
        }
    }

    public function updateThemeColor()
    {
        $this->validate([
            'themeColor' => 'required|in:primary,secondary,success,warning,info',
        ]);

        Auth::user()->update([
            'theme_color' => $this->themeColor,
        ]);

        $this->previousThemeColor = $this->themeColor;

        $this->dispatch('theme-updated', themeColor: $this->themeColor);
        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.profile.update-theme-color-form');
    }
}
