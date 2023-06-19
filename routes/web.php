<?php

use App\Http\Controllers\AutocompleteController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\JasaController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\DetailResepController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ResepObatController;
use App\Http\Controllers\StokObatController;
use App\Http\Controllers\RacikanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('home', [PageController::class, 'home'])->name('home');
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('about', [PageController::class, 'about'])->name('about');

Route::controller(LoginController::class)->group(function () {
  Route::get('login', 'index')->name('login');
  Route::post('login/proses', 'proses');
  Route::get('logout', 'logout');
});

Route::middleware(['auth.role:admin'])->group(function () {
  Route::resource('pengguna', PenggunaController::class);
});
Route::middleware(['auth.role:apoteker'])->group(function () {
  Route::get('dashboard', [PageController::class, 'dashboard'])->name('dashboard');
  Route::prefix('autocomplete')->as('autocomplete.')->controller(AutocompleteController::class)->group(function () {
    Route::get('apoteker', 'getApoteker')->name('apoteker');
    Route::get('customer', 'getCustomer')->name('customer');
    Route::get('obat', 'getObat')->name('obat');
    Route::get('jasa', 'getJasa')->name('jasa');
  });
  Route::prefix('cetak')->as('cetak.')->group(function () {
    Route::prefix('pdf')->as('pdf.')->group(function () {
      Route::get('pengguna', [PenggunaController::class, 'cetak_pdf'])->name('pengguna');
      Route::get('obat', [ObatController::class, 'cetak_pdf'])->name('obat');
      Route::get('penjualan', [PenjualanController::class, 'cetak_pdf'])->name('penjualan');
      Route::get('jasa', [JasaController::class, 'cetak_pdf'])->name('jasa');
      Route::get('resep-obat', [ResepObatController::class, 'cetak_pdf'])->name('resep-obat');
      Route::get('racikan', [RacikanController::class, 'cetak_pdf'])->name('racikan');
    });
  });
  Route::get('stok-obat/tambah', [StokObatController::class, 'tambah']);
  Route::resource('kasir', KasirController::class)->only(['index', 'store']);
  Route::resource('penjualan', PenjualanController::class);
  Route::resource('detail-penjualan', DetailPenjualanController::class);
  Route::resource('jasa', JasaController::class);
  Route::resource('obat', ObatController::class);
  Route::delete('stok-obat/{id_obat}/{satuan}', [StokObatController::class, 'destroy']);
  Route::resource('stok-obat', StokObatController::class)->except(['destroy', 'create']);
  Route::get('stok-obat/${id_obat}/create', [StokObatController::class, 'create'])->name('stok-obat.create');
  Route::resource('resep-obat', ResepObatController::class);
  Route::resource('customer', CustomerController::class);
  Route::resource('dokter', DokterController::class);
  Route::resource('detail-resep', DetailResepController::class);
  Route::resource('racikan', RacikanController::class);
});
