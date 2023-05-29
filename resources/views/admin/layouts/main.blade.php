<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin</title>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin">
    <div>
        <nav class="bg-sky-950 p-2">
          <div class="container mx-auto flex justify-between">
            <h2 class="text-primary-500 text-3xl font-bold">Dashboard Admin</h2>
            <select 
              onchange="window.location.href = this.value;"
              value="none"
              class="bg-sky-950 text-white outline-none">
              <option value="none" hidden>{{Auth::user()->email}}</option>
              <option value="{{route('actionlogout')}}">
                Log out
              </option>
            </select>
          </div>
        </nav>
        <main class="flex container mx-auto mt-4 gap-4">
          <x-sidenav/>
          <div class="basis-3/4">
            @yield('content')
          </div>
        </main>
    </div>
</body>
</html>