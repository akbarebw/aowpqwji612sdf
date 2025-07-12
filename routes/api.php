<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Api\Sync\DosenController;
use App\Http\Controllers\Dashboard\Api\Sync\ProdiController;
use App\Http\Controllers\Dashboard\Api\Sync\MataKuliahController;
use App\Http\Controllers\Dashboard\Api\Sync\PembiayaanController;
use App\Http\Controllers\Dashboard\Api\Sync\KelasKuliahController;
use App\Http\Controllers\Dashboard\Api\Sync\MahasiswaController;
use App\Http\Controllers\Dashboard\Api\Sync\BiodataDosenController;
use App\Http\Controllers\Dashboard\Api\Sync\TranskipNilaiController;
use App\Http\Controllers\Dashboard\Api\Sync\BiodataMahasiswaController;
use App\Http\Controllers\Dashboard\Api\Sync\DosenPengajarKelasKuliahController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['prefix'=> 'sync'], function () {

    Route::post('prodi', [ProdiController::class,'getSyncProdi']);
    Route::post('pembiayaan', [PembiayaanController::class,'getSyncPembiayaan']);
    Route::post('matakuliah', [MataKuliahController::class,'getSyncMataKuliah']);
    Route::post('kelaskuliah', [KelasKuliahController::class,'getSyncKelasKuliah']);

    Route::post('mahasiswa', [MahasiswaController::class,'getSyncMahasiswa']);
    Route::post('biodatamahasiswa', [BiodataMahasiswaController::class,'getSyncBiodataMahasiswa']);
    Route::post('dosen', [DosenController::class,'getSyncDosen']);
    Route::post('biodatadosen', [BiodataDosenController::class,'getSyncBiodataDosen']);
    Route::post('dosenpengajarkelaskuliah', [DosenPengajarKelasKuliahController::class,'getSyncDosenPengajarKelasKuliah']);
    Route::post('transkipnilai', [TranskipNilaiController::class,'getSyncTranskipNilai']);
});
