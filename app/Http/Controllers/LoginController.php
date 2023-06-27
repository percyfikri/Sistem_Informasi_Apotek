<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index()
  {
    if ($user = Auth::user()) {
      if ($user->status == 'apoteker' || $user->status == 'admin') {
        return redirect()->route('dashboard');
      }
    }

    return view('pages.auth-login');
  }

  public function proses(Request $request)
  {
    $request->validate([
      'email' => 'required',
      'password' => 'required'
    ]);

    $kredensial = $request->only('email', 'password');

    if (Auth::attempt($kredensial)) {
      $request->session()->regenerate();

      return redirect()->route('dashboard');
    }

    return back()->withErrors([
      'email' => 'Maaf email atau password anda salah',
      'password' => 'Maaf email atau password anda salah'
    ])->onlyInput('email');
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect('/login');
  }
}
