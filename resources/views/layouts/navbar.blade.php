<div class="flex justify-between items-center">
    <div class="logo">
      <img src="{{ asset("/img/logo_umsida.png") }}" class="w-20 h-fit" alt="logo_umsida">
    </div>
    <div class="menu flex-shrink">
        <ul class="flex items-center space-x-4">
            <li>
                <a href="/" class="text-lg text-blue-500 border-2 border-blue-500 p-1 rounded-md font-semibold uppercase flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5"
                        stroke="currentColor" class="w-6 h-6 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                    HOME
                </a>
            </li>
            <li>
                <a href="" class="text-lg text-blue-500 font-semibold uppercase">Menu</a>
            </li>
            <li>
                <a href="" class="text-lg text-blue-500 font-semibold uppercase">tentang kami</a>
            </li>
        </ul>
    </div>
    <div class="flex items-center space-x-3">
        @if (Auth::check())
        <div class="w-full bg-white shadow-md rounded-md p-2 flex items-center space-x-2">
            <span class="text-gray-400 uppercase font-semibold">{{ auth()->user()->name }}</span>
            <div class="overflow-hidden relative w-8 h-8 bg-gray-100 rounded-full dark:bg-gray-600">
                <svg class="absolute left-1 top-1 w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </div>
        </div>
        <div>
            <a href="{{ URL('pesanan') }}" class="block py-2 px-2.5 rounded-md bg-green-300 hover:bg-green-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>
            </a>
        </div>
        @if (auth()->user()->isAdmin === 1)
        <div>
            <a href="{{ URL("dashboard") }}" class="block py-2 px-2.5 rounded-md bg-blue-300 hover:bg-blue-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 107.5 7.5h-7.5V6z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0013.5 3v7.5z" />
                </svg>
            </a>
        </div>
        @endif
        <div>
            <button type="button" data-modal-toggle="logout_modal"
                class="w-9 h-9 focus:outline-none rounded-md bg-red-300 hover:bg-red-500 shadow-md shadow-red-300">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 ml-2 text-white">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                </svg>
            </button>
            @include('components.modal.logout')
        </div>
        @else
        <div
            class="py-1.5 px-4 rounded-md border-2 z-10 bg-blue-500/75 border-none text-blue-200 flex items-center space-x-2 relative before:content-[''] before:absolute before:left-0 before:w-0 before:transition-all before:hover:-z-10 before:duration-300 before:hover:w-full before:hover:h-full before:hover:rounded-md before:hover:bg-white before:hover:cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                class="w-6 h-6 cursor-pointer">
                <path fill-rule="evenodd"
                    d="M18.685 19.097A9.723 9.723 0 0021.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 003.065 7.097A9.716 9.716 0 0012 21.75a9.716 9.716 0 006.685-2.653zm-12.54-1.285A7.486 7.486 0 0112 15a7.486 7.486 0 015.855 2.812A8.224 8.224 0 0112 20.25a8.224 8.224 0 01-5.855-2.438zM15.75 9a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z"
                    clip-rule="evenodd" />
            </svg>
            <button type="button" class="focus:outline-none" data-modal-toggle="register_modal">REGISTER</button>
            @include('components.modal.register')
        </div>
        <div>
            <button type="button" class="flex items-center py-1.5 px-4 rounded-md border-2 border-slate-400"
                data-modal-toggle="login_modal">
                LOGIN
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 ml-2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                </svg>
            </button>
            @include('components.modal.login')
        </div>
        @endif
    </div>
</div>
