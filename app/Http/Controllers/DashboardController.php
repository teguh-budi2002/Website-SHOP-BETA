<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $getProduct = Product::get();
      $getUserOrdered = Order::with(['user_order' => function($q) {
        $q->select("id", "name_product");
      }])->where('user_id', Auth::user()->id)->get();

      return view('dashboard.index', [
        'products' => $getProduct,
        'orders' => $getUserOrdered
      ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
          'name_product' => 'required',
          'category_product' => 'required',
          'price' => 'required',
          'product_image' => 'file|required'
        ]);

        if ($request->hasFile('product_image')) {
          $filename = $request->file('product_image')->getClientOriginalName();
          $storeImage = $request->file('product_image')->move(public_path() . "/storage/product_image/", $filename);

          $isCreated = Product::create([
            'name_product' => $request->name_product,
            'category_product' => $request->category_product,
            'price' => $request->price,
            'product_image' => $filename
          ]);

          notify()->success("Produk Sukses Untuk Ditambahkan", "PRODUCT ADDED");
          return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $getCurrentProduct = Product::select("id", "name_product", "price")
                                      ->where('id', $id)
                                      ->first();

        return view('product.edit' , ['product' => $getCurrentProduct]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
          'name_product' => 'required',
          'product_image' => 'file|mimes:jpg,png,svg,webp|max:3068'
        ]);

        if ($request->hasFile('product_image')) {
          $filename = $request->file('product_image')->getClientOriginalName();
          $storeImage = $request->file('product_image')
                                ->move(public_path() . "/storage/product_image/", $filename);
          $validation['product_image'] = $filename;
        }

        $isUpdated = Product::where('id', $id)->update($validation);

        notify()->success("Produk Sukses Di Update", "PRODUCT UPDATED");
        return redirect("dashboard");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $isDeleted = Product::where('id', $id)->delete();

        notify()->error("Produk Sukses Dihapus", "PRODUCT DELETED");
        return redirect()->back();
    }

    public function statusConfirmation(Request $req, $id) {
      $isConfirmed = Order::where('id', $id)->update([
        'status' => (int)$req->confirmed
      ]);

      notify()->success("Pesanan Sukses Dikonfirmasi", "CONFIRMED!");
      return redirect()->back();
    }
}
