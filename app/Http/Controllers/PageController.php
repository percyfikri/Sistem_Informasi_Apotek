<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Penjualan;
use App\Models\Racikan;
use App\Models\ResepObat;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{

  public function home()
  {
    return view('pages.homepage.home');
  }
  public function about()
  {
    return view('pages.homepage.about');
  }

  public function dashboard()
  {
    $penggunaCount = Pengguna::count();
    $penjualanCount = Penjualan::count();
    $resepCount = ResepObat::count();
    $racikanCount = Racikan::count();
    $newestTransaction = Penjualan::orderBy("tanggal", 'desc')->take('5')->get();


    return view('pages.dashboard', compact('newestTransaction', 'penggunaCount', 'penjualanCount', 'resepCount', 'racikanCount'));
  }
}
