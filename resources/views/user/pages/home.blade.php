@extends('user.layouts.main')

@section('title', 'Homepage')

@section('content')
    <main
        class="h-[calc(100vh-68px)] w-full bg-bottom flex items-center bg-no-repeat bg-cover"
        style="background-image: url({{asset("images/background.jpg")}})">
        <div class="flex items-center container mx-auto justify-between overflow-hidden">
            <section class="fadeInLeft-animation">
                <h1 class="font-bold mb-6 text-transparent text-stroke text-8xl">Palengaan Laok</h1>
                <h2 class="text-white">Bersahabat Kepada Masyarakat</h2>
            </section>
            <img
                src="{{asset("images/logo-big.svg")}}"
                alt="big logo"
                class="h-80 fadeInRight-animation">
        </div>
    </main>
    <x-pray-schedule/>
    {{-- News --}}
    <main class="flex container mx-auto my-[120px] gap-12">
        <div class="basis-2/3">
            <x-news-slide/>
        </div>
        <div class="basis-1/3">
            <h2 class="font-bold text-primary-500 mb-4">Pengumuman</h2>
            <section class="bg-primary-500 h-5/6 p-7 flex flex-col rounded-md relative">
                <ul class="flex flex-col gap-4 text-primary-500 text-xl font-medium rounded">
                    <li class="card py-3 px-4">Hari Lahir Pancasila 1 Juni 2023</li>
                    <li class="card py-3 px-4">Mahasiswa Membangun Desa (MMD) Universitas Brawijaya Malang, akan mengabdi di Desa Palengaan Laok selama 40 hari!</li>
                    <li class="card py-3 px-4">All Palengaan Laok Final Turnamen Futsal Kades Cup Rombuh se - Madura Rasta FC vs Taylonk FC, dukung sekarang!</li>
                </ul>
            </section>
        </div>
    </main>
    {{-- Agenda --}}
    <x-agenda-slide/>
    {{-- Lokasi --}}
    <main class="container mx-auto my-[120px] flex flex-col">
        <h2 class="text-primary-500 font-bold mb-4">Lokasi</h2>
        <a href="https://www.google.com/maps/place/Palengaan+Laok,+Palengaan,+Pamekasan+Regency,+East+Java/@-7.058905,113.3957703,14z/data=!3m1!4b1!4m6!3m5!1s0x2dd9d36fb7039871:0x64ad246dc2cb5e28!8m2!3d-7.0561494!4d113.4121233!16s%2Fg%2F12lng_4nd" target="blank">
            <img
                src="{{ asset('images/map.png') }}"
                alt="maps"
                class="w-full rounded-md mx-auto fadeInFromRight aspect-[3/1] object-cover hover:shadow-lg transition-all">
        </a>
    </main>
@endsection
