<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticateRole
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle(Request $request, Closure $next, $rules)
  {
    if (!Auth::check()) {
      return redirect('login')->with('msg-error', "Kamu tidak ada akses");
    }

    $user = Auth::user();
    if ($rules == 'apoteker') {

      if ($user->status == 'admin' || $user->status == 'apoteker') return $next($request);
    }
    if ($rules) {
      if ($user->status == $rules) return  $next($request);
    }

    return redirect('login')->with('msg-error', "Kamu tidak ada akses");
  }
}
