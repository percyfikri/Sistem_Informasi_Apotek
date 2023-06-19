<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Models\Penjualan;
use App\Models\Racikan;
use App\Models\ResepObat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    return view('pages.dashboard', compact('penggunaCount', 'penjualanCount', 'resepCount', 'racikanCount'));
  }
}
