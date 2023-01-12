<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterUserRequest;

class RegisterController extends Controller
{
    public function registerProcess(RegisterUserRequest $req) {
      $data = $req->validated();

      User::create($data);
      notify()->success("Pendaftaran Berhasil.", "USER REGISTERED");
      return redirect()->back();
    }
}
