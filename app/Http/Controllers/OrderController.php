<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout(Request $req) {
      $validate = $req->validate([
        'jumlah' => 'required'
      ]);

      $total = (int)$req->jumlah * (int)$req->price;
      $no_pesanan = "INV/" . Carbon::now()->format("Y") . "/" . random_int(100000000000, 9999999000000);

      $isOrdered = Order::create([
        'no_pesanan' => $no_pesanan,
        'total' => $total,
        'jumlah' => $req->jumlah,
        'product_id' => $req->product_id,
        'user_id' => Auth::user()->id
      ]);

      notify()->success("Pesanan Telah Dibuat", "Ordered Successfully");
      return redirect("pesanan");
    }
}
