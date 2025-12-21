<?php

use App\Livewire\LeadsTable;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/leads', LeadsTable::class)->name('leads.index');

    // Session ping endpoint for session renewal
    Route::post('/session/ping', function () {
        return response()->json(['success' => true, 'timestamp' => now()->toIso8601String()]);
    })->name('session.ping');
});
