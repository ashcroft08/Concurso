<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('estudiante');
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

Route::middleware(['auth', 'role:Profesor'])->group(function () {
    Route::get('/profesor', function () {
        return 'Página para Profesores';
    });
});

Route::middleware(['auth', 'role:Estudiante'])->group(function () {
    Route::get('/estudiante', function () {
        return 'Página para Estudiantes';
    });
});

Route::middleware(['auth', 'role:Personal Administrativo'])->group(function () {
    Route::get('/admin', function () {
        return 'Página para Personal Administrativo';
    });
});
