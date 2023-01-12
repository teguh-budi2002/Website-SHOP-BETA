@extends('app')
@section('container')
<div class="w-full h-screen flex justify-center">
    <div class="w-2/3 h-fit shadow-md border-2 rounded-md p-2 mt-28">
        <form action="{{ URL("dashboard/" . $product->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')
            <div class="mb-3">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Produk</label>
                <input type="text" name="name_product" id="name"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ old('name_product', $product->name_product) }}">
            </div>
            <div class="mb-3">
                <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                    Produk</label>
                <input type="text" name="price" id="harga"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    value="{{ old('price', $product->price) }}">
            </div>
            <div class="mb-3">
                <select id="underline_select" name="category_product"
                    class="block p-2 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                    <option selected>Pilih Kategori</option>
                    <option value="Makanan">MAKANAN</option>
                    <option value="Minuman">MINUMAN</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="img_product" class="block mb-2 text-sm font-medium text-gray-900 ">Produk Image</label>
                <input type="hidden" name="oldimage" value={{  $product->product_image }}>
                <input
                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                    aria-describedby="file_input_help" id="file_input" type="file" name="product_image"
                    onchange="getImage(event)">
                <p class="mt-1 mb-5 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG
                    (MAX.
                    800x400px).</p>
                <div id="preview" class="w-28 h-28 mb-8"></div>
            </div>
            <div class="text-center">
                <button type="submit"
                    class="text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium uppercase rounded-lg text-sm w-full px-5 py-2.5 text-center">Edit
                    Product</button>
            </div>
        </form>
        @if ($errors->any())
            @foreach ($errors->all() as $err)
              <p>{{ $err }}</p>
            @endforeach
        @endif
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
