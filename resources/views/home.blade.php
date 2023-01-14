@extends('app')
@section('container')
<style>
input[type='number']::-webkit-inner-spin-button,
  input[type='number']::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }
</style>
<div id="indicators-carousel" class="relative top-16 overflow-x-hidden" data-carousel="carousel_component">
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96 -z-10">
        <div class="text_carousel absolute w-3/4 left-40 top-20 z-50 text-center leading-loose xl:block hidden">
            <p class="text-white text-6xl font-semibold">Warung Mie Ayam & Bakso Bu Putri</p>
            <p class="text-white text-xl pt-16">Warung Bu Putri Menyediakan Berbagai Macam-Macam Menu Mie Ayam &
                Bakso</p>
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
            <img src="{{ asset("/img/bg-carousel.JPG") }}"
                class="absolute block blur-sm w-full h-fit -translate-x-1/2 md:-translate-y-80 -translate-y-1/4 top-1/2 left-1/2" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset("/img/bg-carousel.JPG") }}"
                class="absolute block blur-sm w-full h-fit -translate-x-1/2 md:-translate-y-80 -translate-y-1/4 top-1/2 left-1/2" alt="...">
        </div>
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{ asset("/img/bg-carousel.JPG") }}"
                class="absolute block blur-sm w-full h-fit -translate-x-1/2 md:-translate-y-80 -translate-y-1/4 top-1/2 left-1/2" alt="...">
        </div>
    </div>
    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
            data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
            data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
            data-carousel-slide-to="2"></button>
    </div>
    <button type="button"
        class="absolute top-0 left-0 z-50 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-prev>
        <span
            class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button"
        class="absolute top-0 right-0 z-50 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-next>
        <span
            class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none"
                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
<div id="menuSection"></div>
@if ($products->count())
<div class="grid md:grid-cols-2 grid-cols-1 gap-5 mt-20 md:mx-0 mx-3">
    @foreach ($products as $product)
    <div class="w-full h-full flex justify-center">
        <div class="w-[600px] h-auto rounded-md bg-white shadow-md relative flex">
            @if (!empty($product->product_image))
            <div class="img_menu">
                <img src="{{ "/storage/product_image/" . $product->product_image }}"
                    class="block w-96 object-cover min-h-[320px] rounded-l-md" alt="image menu">
            </div>
            @else
            <div class="img_menu">
                <img src="https://picsum.photos/1600/900" class="block w-96 object-cover min-h-[320px] rounded-l-md"
                    alt="image menu">
            </div>
            @endif
            <div class="text_menu text-center w-full leading-loose">
                <div class="flex items-start justify-end mb-3">
                    <div
                        class="{{ $product->category_product == "Makanan" ? "bg-blue-500" : "bg-violet-500" }} text-white p-1.5 px-6 rounded-tr-md">
                        <span>{{ $product->category_product }}</span>
                    </div>
                </div>
                <p class="text-2xl font-semibold text-gray-600">{{ $product->name_product }}</p>
                <p class="text-xl font-semibold text-gray-400 pt-6">Harga: Rp. {{ number_format($product->price, 2) }}
                </p>
                @if (Auth::check())
                <div class="button_section mt-8">
                    <button type="button" data-modal-toggle="cart_modal"
                        class="py-2.5 px-6 rounded-md text-white bg-green-500 focus:outline-none">Pesan
                        Sekarang</button>
                </div>
                <div id="cart_modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 w-full md:inset-0 h-modal md:h-full">
                    <div class="relative w-full max-w-2xl h-full md:h-auto">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-600 dark:text-white">
                                    Checkout Order
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="cart_modal">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <form action="{{ Route("checkout") }}" method="POST">
                              @csrf
                              <div class="w-full p-6 space-y-6">
                                  <div class="form_group">
                                      <label for="qty" class="uppercase text-gray-500 font-semibold">Jumlah Pemesanan</label>
                                      <div class="w-full flex items-center space-x-2 h-10 rounded-lg bg-transparent mt-1">
                                          <button type="button" data-action="decrement"
                                              class=" bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-l cursor-pointer outline-none focus:outline-none focus:border-none block">
                                              <span class="m-auto text-2xl font-thin">−</span>
                                          </button>
                                          <input type="number"
                                              class="focus:outline-none focus:border-none text-center w-full bg-gray-50 font-semibold text-md hover:text-black focus:text-black  flex items-center text-gray-700  outline-none border-none"
                                              name="jumlah" value="0"></input>
                                          <button type="button" data-action="increment"
                                              class="bg-gray-300 text-gray-600 hover:text-gray-700 hover:bg-gray-400 h-full w-20 rounded-r cursor-pointer focus:outline-none focus:border-none block">
                                              <span class="m-auto text-2xl font-thin">+</span>
                                          </button>
                                      </div>
                                  </div>
                                  <input type="hidden" name="price" value="{{ $product->price }}">
                                  <input type="hidden" name="product_id" value="{{ $product->id }}">
                              </div>
                              <div
                                  class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                  <button type="submit"
                                      class="text-white bg-green-600 hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Pesan Sekarang</button>
                                  <button data-modal-toggle="cart_modal" type="button"
                                      class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Batal</button>
                              </div>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                <div class="button_section mt-8">
                    <button type="button" data-modal-toggle="not_allow"
                        class="py-2.5 px-6 rounded-md text-white bg-green-500 focus:outline-none">Pesan
                        Sekarang</button>
                </div>
                <div id="not_allow" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 w-full md:inset-0 h-modal md:h-full">
                    <div class="relative w-full max-w-2xl h-full md:h-auto">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                <h3 class="text-xl flex-1 text-center font-semibold text-red-500 dark:text-white">
                                    WARNING
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="not_allow">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>
                            <div class="p-6 space-y-6">
                                <p class="text-lg text-gray-500 uppercase">Harap Login Terlebih Dahulu Untuk Melakukan
                                    Pemesanan!</p>
                            </div>
                            <div
                                class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                <button data-modal-toggle="not_allow" type="button"
                                    class="text-gray-500 bg-gray-100 hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Ya,
                                    Saya Mengerti</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <!-- Rating Component -->
                <div class="rating_section mt-10 flex justify-center items-center">
                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <title>First star</title>
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <title>Second star</title>
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <title>Third star</title>
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <title>Fourth star</title>
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-300 dark:text-gray-500" fill="currentColor"
                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <title>Fifth star</title>
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                    <p class="ml-2 text-sm font-medium text-gray-500 dark:text-gray-400">4.95</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="w-full h-full flex justify-center mt-20">
  <div class="w-3/4 bg-white shadow-md rounded p-2 text-center">
    <p class="text-2xl text-red-500 uppercase">Belum Ada Produk Yang Dijual</p>
  </div>
</div>
@endif
  <div class="w-full h-full flex justify-center mt-5 border-t-2 mx-5 overflow-x-hidden">
    <div class="w-3/4 h-fit bg-gradient-to-br from-blue-500 via-blue-50 to-blue-50 p-2 rounded mt-5 border-2 border-blue-500 shadow-md shadow-slate-400" id="aboutWarung">
      <div class="img_warung">
        <img src="{{ asset('/img/warung_img.JPG') }}" class="mx-auto object-cover" alt="Warung Bu Putri">
      </div>
       <div class="header_text mt-3">
        <p class="text-center text-2xl font-semibold text-blue-600">TENTANG KAMI</p>
      </div>
      <div class="information grid grid-cols-2">
        <div class="left_item space-y-2 text-gray-500 uppercase font-bold">
          <p>Nama Usaha</p>
          <p>Pemilik</p>
          <p>Nomer WA</p>
          <p>Alamat</p>
        </div>
        <div class="right_item text-gray-700">
          <p>Warung Mie Ayam & Bakso Bu Putri</p>
          <p>-</p>
          <p>-</p>
          <address>Jl. Raya Gelam No.250, Pagerwaja, Gelam, Kec. Candi, Kabupaten Sidoarjo, Jawa Timur 61271</address>
        </div>
      </div>
    </div>
  </div>
<script>
  function decrement(e) {
    const btn = e.target.parentNode.parentElement.querySelector(
      'button[data-action="decrement"]'
    );
    const target = btn.nextElementSibling;
    let value = Number(target.value);
    value--;
    if(value <= -1){
      console.log("STOP")
    } else {
      target.value = value;
    }
  }

  function increment(e) {
    const btn = e.target.parentNode.parentElement.querySelector(
      'button[data-action="decrement"]'
    );
    const target = btn.nextElementSibling;
    let value = Number(target.value);
    value++;
    target.value = value;
  }

  const decrementButtons = document.querySelectorAll(
    `button[data-action="decrement"]`
  );

  const incrementButtons = document.querySelectorAll(
    `button[data-action="increment"]`
  );

  decrementButtons.forEach(btn => {
    btn.addEventListener("click", decrement);
  });

  incrementButtons.forEach(btn => {
    btn.addEventListener("click", increment);
  });
</script>
@endsection
