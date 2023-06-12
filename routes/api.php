<?php

use App\Http\Controllers\ObatController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\ResepObatController;
use App\Models\ResepObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
  return $request->user();
});

Route::get('/obat', [ObatController::class, 'getAllObat'])->name('obat.getAll');
Route::get('/resep-obat', [ResepObatController::class, 'getAllResep'])->name('resep.getAll');

Route::get('/obat/{obat}', [ObatController::class, 'getObat'])->name('obat.get');
Route::get('/pengguna/customer', [PenggunaController::class, 'getCustomer'])->name('pengguna.get.customer');
Route::get('/pengguna/dokter', [PenggunaController::class, 'getDokter'])->name('pengguna.get.dokter');
