<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', [HomeController::class , 'index']);
Route::get('pesanan', [HomeController::class, 'indexPesanan']);

Route::prefix("auth")->group(function() {
  Route::post('register', [RegisterController::class, 'registerProcess'])->name('user.regis');
  Route::post('login', [LoginController::class, 'loginProcess'])->name('user.login');
  Route::post('logout', [LogoutController::class, 'logout'])->name('user.logout');
});

Route::resource('dashboard', DashboardController::class)->middleware('auth_dashboard');
Route::put('confirmation/{id}', [DashboardController::class, 'statusConfirmation'])->middleware('auth_dashboard');
Route::post('checkout/send', [OrderController::class, 'checkout'])->name('checkout');