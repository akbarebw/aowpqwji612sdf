<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\LivewireNilaiMahasiswa;
use App\Http\Controllers\Dashboard\NilaiMahasiswaController;

Route::middleware(['web', 'auth', 'role:dosen'])
    ->prefix('dosen')
    ->name('dosen.')
    ->group(function () {
        // Route::get('/penilaian', LivewireNilaiMahasiswa::class)->name('penilaian');
        Route::get('/penilaian', [NilaiMahasiswaController::class, 'index'])->name('penilaian');
    });
