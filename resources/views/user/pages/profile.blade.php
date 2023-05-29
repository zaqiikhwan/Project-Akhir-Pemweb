@extends('user.layouts.main')

@section('title',"Profile")

@section('content')
    <header 
        class="w-full container mx-auto py-16 bg-no-repeat bg-cover bg-center mb-14 rounded-md"
        style="background-image: url({{asset("images/profile-bg-1.jpg")}})">
        <h1 class="text-white font-bold text-center">Profil</h1>
    </header>
    <main class="container mx-auto flex">
        <aside class="basis-1/3 pr-48">
            <h2 class="text-primary-500 mb-4">Kategori</h2>
            <div class="flex flex-col card hover:shadow-sm">
                <a href="pemerintah" class="p-4 text-xl @if ($params == "pemerintah")
                    bg-primary-500 text-white
                @endif">Pemerintah</a>
                <a href="wilayah" class="p-4 text-xl @if ($params == "wilayah")
                    bg-primary-500 text-white
                @endif">Wilayah</a>
                <a href="komunitas" class="p-4 text-xl @if ($params == "komunitas")
                    bg-primary-500 text-white
                @endif">Forum/Komunitas</a>
            </div>
        </aside>
        <div class="basis-2/3 py-16 mb-16">
            @switch($params)
                @case("pemerintah")
                    <x-profile.pemerintah/>
                    @break
                @case("wilayah")
                    <x-profile.wilayah/>
                    @break
                @case("komunitas")
                    <x-profile.komunitas/>
                    @break
                @default
                    <div>404</div>
            @endswitch
        </div>
    </main>
@endsection