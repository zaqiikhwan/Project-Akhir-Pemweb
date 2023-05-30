<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard Admin</title>
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    {{-- <link href="https://fonts.cdnfonts.com/css/poppins" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="admin">
    <div>
        <nav class="bg-primary-500">
          <div class="container mx-auto flex justify-between py-4">
            <h1 class="text-white text-4xl font-semibold">Dashboard Admin</h1>
            <select 
              onchange="window.location.href = this.value;"
              value="none"
              class="bg-primary-500 text-white font-semibold outline-none px-2 py-1 rounded-md shadow-sm hover:shadow-lg">
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