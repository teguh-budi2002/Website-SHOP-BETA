@extends('app')
@section('container')
<section>
    <div class="w-full {{ $products->count() >= 3 ? "h-full" : "h-screen" }} flex justify-center wrapper">
        <div class="container">
            <div class="mt-20">
                <div
                    class="text_heading text-center text-4xl uppercase font-semibold text-gray-500 border-b-2 pb-5 mb-3 pt-10">
                    <p>Dashboard</p>
                </div>
                <div class="create_button">
                    <button type="button" data-modal-toggle="create_modal"
                        class="py-2.5 px-4 rounded-md bg-blue-500 hover:bg-blue-300 text-white flex items-center focus:border-none focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                        </svg>
                        Tambah Produk
                    </button>
                </div>
                <div class="table_wrapper mx-auto mt-3">
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                       @if ($products->count())
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6 text-center">
                                        Gambar Produk
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Nama Produk
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Kategori Produk
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Harga
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <td class="py-4 px-6">
                                        <img src="{{ asset("/storage/product_image/" . $product->product_image) }}"
                                            class="w-16 mx-auto h-auto" alt="{{ $product->product_image }}">
                                    </td>
                                    <td scope="row"
                                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $product->name_product }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $product->category_product }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $product->price }}
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ URL('dashboard/' . $product->id . "/edit") }}"
                                                class="font-medium text-blue-600 hover:text-blue-300 hover:underline">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                                                </svg>
                                            </a>
                                            <form action="{{ URL('dashboard/'. $product->id) }}" method="post">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit"
                                                class="font-medium text-red-600 hover:text-red-300"><svg
                                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                </svg>
                                            </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                        <div class="p-2 text-center">
                          <p class="text-xl uppercase font-medium text-gray-600">Produk Belum Ditambahkan</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <div
                    class="text_heading text-start text-xl uppercase font-semibold text-gray-500 border-b-2 pb-5 mb-3 pt-10">
                    <p>pesanan customer</p>
                </div>
                <div class="table_wrapper mx-auto mt-3">
                    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="py-3 px-6">
                                        No Pesanan
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Produk Dipesan
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Jumlah Pesanan
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Total Harga
                                    </th>
                                    <th scope="col" class="py-3 px-6 text-center">
                                        Status
                                    </th>
                                    <th scope="col" class="py-3 px-6">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                    <td class="py-4 px-6">
                                        {{ $order->no_pesanan }}
                                    </td>
                                    <td scope="row"
                                        class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $order->user_order->name_product }}
                                    </td>
                                    <td class="py-4 px-6">
                                        {{ $order->jumlah }}
                                    </td>
                                    <td class="py-4 px-6">
                                        Rp. {{ number_format($order->total, 2) }}
                                    </td>
                                    <td class="py-4 px-6">
                                        @if ($order->status === 1)
                                        <div
                                            class="w-fit h-auto mx-auto bg-green-500 text-white text-center uppercase p-2 rounded">
                                            <span>Dikonfirmasi</span></div>
                                        @else
                                        <div
                                            class="w-fit h-auto mx-auto bg-red-500 text-white text-center uppercase p-2 rounded">
                                            <span>Belum Dikonfirmasi</span></div>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6">
                                        <form action="{{ URL('confirmation/' . $order->id) }}" method="POST">
                                            @csrf
                                            @method("PUT")
                                            <input type="hidden" value="1" name="confirmed">
                                            <button type="submit" class="p-2 rounded bg-green-500">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                    fill="currentColor" class="w-6 h-6 text-white">
                                                    <path fill-rule="evenodd"
                                                        d="M19.916 4.626a.75.75 0 01.208 1.04l-9 13.5a.75.75 0 01-1.154.114l-6-6a.75.75 0 011.06-1.06l5.353 5.353 8.493-12.739a.75.75 0 011.04-.208z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div id="create_modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 p-4 w-full md:inset-0 h-modal md:h-full"
    style="z-index: 99999;">
    <div class="relative w-full max-w-md h-full md:h-auto">

        <div class="relative bg-white rounded-lg shadow">
            <button type="button"
                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                data-modal-toggle="create_modal">
                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                        clip-rule="evenodd"></path>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="py-6 px-6 lg:px-8">
                <h3 class="mb-4 text-xl text-center font-medium text-gray-600 ">Tambah Produk</h3>
                <form class="space-y-6" action="{{ URL("dashboard") }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="name_product" class="block mb-2 text-sm font-medium text-gray-900 ">Nama
                            Produk</label>
                        <input type="text" name="name_product" id="name_product"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 ">
                    </div>
                    <div>
                        <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 ">Harga Produk</label>
                        <input type="text" name="price" id="harga"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 ">
                    </div>
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                            for="file_input">Upload
                            Image</label>
                        <div id="preview" class="w-full h-auto mb-2"></div>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                            aria-describedby="file_input_help" id="file_input" type="file" name="product_image"
                            onchange="getImage(event)">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG
                            (MAX.
                            800x400px).</p>
                    </div>
                    <div>
                        <select id="underline_select" name="category_product"
                            class="block p-2 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                            <option selected>Pilih Kategori</option>
                            <option value="Makanan">MAKANAN</option>
                            <option value="Minuman">MINUMAN</option>
                        </select>
                    </div>
                    <div class="text-center">
                        <button type="submit" id="btnSubmitLogin"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Tambah
                            Sekarang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function getImage(e) {
        let pathImg = URL.createObjectURL(e.currentTarget.files[0])
        let prevImage = document.createElement("img")
        let preview = document.querySelector("#preview")

        prevImage.setAttribute("src", pathImg)
        preview.innerHTML = "";
        preview.appendChild(prevImage)
    }

</script>
@endsection
