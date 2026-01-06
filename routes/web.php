<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EgresadoController;

Route::get('/', function () {
    return redirect()->route('login');
});


// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



// Rutas protegidas
Route::middleware(['auth'])->group(function () {

    // Dashboard (admin y usuario)
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // SOLO ADMIN
    Route::middleware('admin')->group(function () {
        Route::post('/egresados', [EgresadoController::class, 'store'])
            ->name('egresados.store');

        Route::put('/egresados/{egresado}', [EgresadoController::class, 'update'])
            ->name('egresados.update');

        Route::delete('/egresados/{egresado}', [EgresadoController::class, 'destroy'])
            ->name('egresados.destroy');
    });

});
