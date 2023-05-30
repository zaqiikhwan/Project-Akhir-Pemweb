<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Dashboard Admin</title>
    {{-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> --}}
</head>
<body class="">
        <div class="flex flex-col items-center justify-center h-screen bg-no-repeat bg-cover" style="background-image: url({{asset("images/bg-login-admin.jpg")}})">
            <div class="border-2 shadow-lg rounded-md p-4 w-1/2 h-2/3 flex flex-col items-center justify-center bg-white">
            <div class="text-primary-500">
                <h1 class="text-center text-5xl font-semibold mb-2">Dashboard Admin</h1>
                <h2 class="text-center mb-8">Login</h2>
            </div>
            @if(session('error'))
            <div class="alert alert-danger font-bold text-red-500 text-center mb-4">
                <b>Terjadi Kesalahan, </b> {{session('error')}}
            </div>
            @endif
            <div class="mx-auto w-1/2 ">
            <form action="{{ route('actionlogin') }}" method="post" class="flex flex-col gap-2">
            @csrf
                <div class="form-group mb-2 flex flex-col">
                    <label class="font-semibold mb-1">Email</label>
                    <input type="email" name="email" class="form-control border-2 border-primary-500 shadow-md rounded-md p-2" placeholder="Masukkan Email" required>
                </div>
                <div class="form-group flex flex-col">
                    <label class="font-semibold mb-1">Password</label>
                    <input type="password" name="password" class="form-control border-2 border-primary-500 shadow-md rounded-md p-2 mb-4" placeholder="Masukkan Password" required="">
                </div>
                <button 
                    type="submit"
                    class="btn-primary w-1/3 self-end"
                    >Login
                </button>
            </form>
        </div>
    </div>
        </div>
</body>
</html>