@extends('app')
@section('container')
<section>
  <div class="w-full h-screen flex justify-center wrapper">
    <div class="container">
      <div class="mt-20">
        <div class="text_heading text-center text-4xl uppercase font-semibold text-gray-500 border-b-2 pb-5 mb-3 pt-10">
          <p>DETAIL PESANAN</p>
        </div>
        <div class="table_wrapper mx-auto mt-3">
          <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="py-3 px-6">
                    No Pesanan
                  </th>
                  <th scope="col" class="py-3 px-6">
                    Produk Pesanan
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
                  <td scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $order->user_order->name_product }}
                  </td>
                  <td class="py-4 px-6">
                    {{ $order->jumlah }}
                  </td>
                  <td class="py-4 px-6">
                    {{ $order->total }}
                  </td>
                  <td class="py-4 px-6">
                    @if ($order->status === 1)
                        <div class="w-fit h-auto mx-auto bg-green-500 text-white text-center uppercase p-2 rounded"><span>Dikonfirmasi</span></div>
                    @else
                         <div class="w-fit h-auto mx-auto bg-red-500 text-white text-center uppercase p-2 rounded"><span>Belum Dikonfirmasi</span></div>
                    @endif
                  </td>
                  <td class="py-4 px-6">
                    <div class="flex items-center space-x-2">
                      <button type="button" class="font-medium text-blue-600 hover:text-blue-300 hover:underline">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                          stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round"
                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                        </svg>
                      </button>
                      <button type="button" class="font-medium text-red-600 hover:text-red-300"><svg
                          xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                          stroke="currentColor" class="w-4 h-4">
                          <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                        </svg>
                      </button>
                    </div>
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
@endsection