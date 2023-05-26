<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin</title>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin">
    <div>
        <nav class="bg-gray-100 p-2">
          <div class="container mx-auto flex justify-between">
            <h2 class="text-primary-500 text-3xl font-bold">Dashboard Admin</h2>
            <select 
              onchange="window.location.href = this.value;"
              value="none"
              class="bg-gray-100 outline-none">
              <option value="none" hidden>{{Auth::user()->email}}</option>
              <option value="{{route('actionlogout')}}">
                Log out
              </option>
            </select>
          </div>
        </nav>
        <main class="flex container mx-auto mt-4">
          <aside class="basis-1/4">
            <section class="flex sidebar flex-col">
              <a href="" class="active">News</a>
              <a href="">Agenda</a>
              <a href="">Announcement</a>
            </section>
          </aside>
          <div class="basis-3/4">
            @yield('content')
          </div>
        </main>
    </div>
</body>
</html>