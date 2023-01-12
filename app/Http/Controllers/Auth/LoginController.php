<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginProcess(Request $req) {
      if (!Auth::attempt($req->only(['username', 'password']))) {
        notify()->error("User TIdak Ditemukan", "ALERT AUTHENTICATION");
        return redirect()->back();
      }

      if (Auth::attempt($req->only(['username', 'password']))) {
        $req->session()->regenerate();

        return redirect()->intended("/");
      }
    }
}
