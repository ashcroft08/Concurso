<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;

Route::get('/', function () {
    return view('administrativo');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::middleware(['auth', 'role:Personal Administrativo'])->prefix('admin')->name('admin.')->group(function () {
    // Otras rutas para el administrador

    Route::view('/Administrador', 'PersonalAdministrativo.indexAdmin')->name('indexAdmin');
});
