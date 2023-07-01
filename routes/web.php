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
use App\Http\Controllers\DetailRacikanController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ResepObatController;
use App\Http\Controllers\StokObatController;
use App\Http\Controllers\RacikanController;
use App\Models\DetailResep;
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


Route::middleware(['auth.role:apoteker'])->group(function () {
  Route::get('dashboard', [PageController::class, 'dashboard'])->name('dashboard');
  Route::prefix('autocomplete')->as('autocomplete.')->controller(AutocompleteController::class)->group(function () {
    Route::get('apoteker', 'getApoteker')->name('apoteker');
    Route::get('customer', 'getCustomer')->name('customer');
    Route::get('obat', 'getObat')->name('obat');
    Route::get('satuan', 'getSatuan')->name('satuan');

    Route::get('resep', 'getResep')->name('resep');
    Route::get('racikan', 'getRacikan')->name('racikan');

    Route::get('jasa', 'getJasa')->name('jasa');
  });
  Route::prefix('cetak')->as('cetak.')->group(function () {
    Route::prefix('pdf')->as('pdf.')->group(function () {
      Route::get('pengguna', [PenggunaController::class, 'cetak_pdf'])->name('pengguna');
      Route::get('customer', [CustomerController::class, 'cetak_pdf'])->name('customer');
      Route::get('dokter', [DokterController::class, 'cetak_pdf'])->name('dokter');
      Route::get('obat', [ObatController::class, 'cetak_pdf'])->name('obat');
      Route::get('penjualan', [PenjualanController::class, 'cetak_pdf'])->name('penjualan');
      Route::get('jasa', [JasaController::class, 'cetak_pdf'])->name('jasa');
      Route::get('resep-obat', [ResepObatController::class, 'cetak_pdf'])->name('resep-obat');
      Route::get('racikan', [RacikanController::class, 'cetak_pdf'])->name('racikan');
    });
  });
  Route::get('stok-obat/tambah', [StokObatController::class, 'tambah']);
  Route::get('detail-resep/tambah', [DetailResepController::class, 'tambah']);
  Route::resource('pengguna', PenggunaController::class);
  Route::resource('kasir', KasirController::class)->only(['index', 'store']);
  Route::resource('penjualan', PenjualanController::class);
  Route::resource('detail_penjualan', DetailPenjualanController::class);
  Route::resource('jasa', JasaController::class);
  Route::resource('obat', ObatController::class);
  Route::resource('stok-obat', StokObatController::class)->except(['destroy', 'create', 'edit', 'update']);
  Route::delete('stok-obat/{id_obat}/{satuan}', [StokObatController::class, 'destroy']);
  Route::get('stok-obat/{id_obat}/edit/{satuan}', [StokObatController::class, 'edit']);
  Route::put('stok-obat/{id_obat}/{satuan}', [StokObatController::class, 'update'])->name('stok-obat.update');
  Route::get('stok-obat/{id_obat}/create', [StokObatController::class, 'create'])->name('stok-obat.create');
  Route::resource('resep-obat', ResepObatController::class);
  Route::resource('pengguna', PenggunaController::class);
  Route::resource('customer', CustomerController::class);
  Route::resource('dokter', DokterController::class);
  Route::resource('detail-resep', DetailResepController::class)->except(['create', 'store']);
  Route::resource('racikan', RacikanController::class);
  Route::resource('detail_racikan', DetailRacikanController::class);

  Route::get('penjualan/report/weekly', [PenjualanController::class, 'weekly_report'])->name('penjualan.report.weekly');
  Route::get('penjualan/report/monthly', [PenjualanController::class, 'monthly_report'])->name('penjualan.report.monthly');

  Route::get('detail-resep/{id_resep}', [DetailResepController::class, 'show'])->name('detail-resep.show');
  Route::get('detail-resep/{id_resep}/create', [DetailResepController::class, 'create'])->name('detail-resep.create');
  Route::post('/store/{id_resep}', [DetailResepController::class, 'store'])->name('detail-resep.store');
  Route::post('/store/{id_resep?}', [DetailResepController::class, 'store1'])->name('detail-resep.store');
  Route::delete('detail-resep/{id_resep}/{id_detail}', [DetailResepController::class, 'destroy']);

  Route::get('/detail-resep/{id_resep}/{id_detail}/edit', [DetailResepController::class, 'edit'])->name('detail-resep.edit');
  Route::post('/detail-resep/{id_resep}/{id_detail}', [DetailResepController::class, 'update'])->name('detail-resep.update');

  Route::delete('detail_racikan/{id_racikan}/{id_obat}/{satuan}', [DetailRacikanController::class, 'destroy']);

  Route::delete('detail-resep/{id_resep}/{id_detail}', [DetailResepController::class, 'destroy']);
  Route::get('detail-resep/sum/1', [ResepObatController::class, 'sumKuantitas']);


  Route::get('detail-racikan/{id_racikan}/create', [DetailRacikanController::class, 'create'])->name('detail-racikan.create');
});
