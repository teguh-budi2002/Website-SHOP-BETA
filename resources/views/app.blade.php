<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Warung Bu Putri</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.4/dist/flowbite.min.css" />
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  @notifyCss
</head>
<body>

  <nav class="fixed w-full py-3 px-12 bg-slate-100 shadow-md shadow-slate-300" style="z-index: 99999;">
    @include('layouts.navbar')
  </nav>
  <main class="w-full h-full">
      @include('notify::components.notify')
      <x:notify-messages />
      @yield('container')
  </main>

  @include('layouts.footer')
  @notifyJs
  <script src="https://unpkg.com/flowbite@1.5.4/dist/flowbite.js"></script>
</body>
</html>