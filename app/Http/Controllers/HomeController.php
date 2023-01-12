<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  public function index() {
    $getProduct = Product::get();
    return view('home', ['products' => $getProduct]);
  }

  public function indexPesanan() {
    $getDetailOrder = Order::with(['user_order' => function($q) {
        $q->select("id", "name_product");
    }])->where('user_id', Auth::user()->id)->get();

    return view('users.ordered', ['orders' => $getDetailOrder]);
  }
}
