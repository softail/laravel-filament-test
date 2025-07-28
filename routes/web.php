<?php

use App\Http\Controllers\CharacteristicController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', fn() => Inertia::render('Welcome'))->name('home');

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('dashboard', fn() => Inertia::render('Dashboard'))->name('dashboard');
    Route::get('characteristics', [CharacteristicController::class, 'index'])->name('characteristics.index');
    Route::get('characteristics/{characteristic}', [CharacteristicController::class, 'show'])->name('characteristics.show');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
