@extends('user.layouts.main')

@section('title', 'Homepage')

@section('content')
    <main 
        class="h-[calc(100vh-68px)] w-full bg-bottom flex items-center bg-no-repeat bg-cover"
        style="background-image: url({{asset("images/background.jpg")}})">
        <div class="flex items-center container mx-auto justify-between">
            <section>
                <h1 class="font-bold mb-2 text-transparent text-stroke">Palengaan Laok</h1>
                <h2 class="text-white">Bersahabat Kepada Masyarakat</h2>
            </section>
            <img 
                src="{{asset("images/logo-big.svg")}}" 
                alt="big logo"
                class="h-80">
        </div>
    </main>
    <x-pray-schedule/>
    {{-- News Sementara --}}
    <main class="flex container mx-auto py-24 gap-12">
        <div class="basis-2/3">
            <h2 class="font-bold text-primary-500 mb-2">Berita</h2>
            <section class="flex card h-5/6">
                <img 
                    src="{{ asset('https://placekitten.com/300/300') }}" 
                    alt="image-news"
                    class="basis-1/3 aspect-[2/3] object-cover">
                <span class="basis-2/3 flex flex-col justify-center px-12 relative">
                    <h1 class="text-3xl font-bold mb-4">Lorem Ipsum Dolor </h1>
                    <p>Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor.....</p>
                    <section class="self-end mt-4 absolute right-8 bottom-8">
                        <button class="btn-primary" disabled><</button>
                        <button class="btn-primary">></button>
                    </section>
                </span>
            </section>
        </div>
        <div class="basis-1/3">
            <h2 class="font-bold text-primary-500 mb-2">Pengumuman</h2>
            <section class="bg-primary-500 h-5/6 p-4 flex flex-col">
                <ul class="flex flex-col gap-2 text-primary-500 text-xl font-medium">
                    <li class="card p-2">Lorem Ipsum Dolor Sit Amet</li>
                    <li class="card p-2">Lorem Ipsum Dolor Sit Amet</li>
                    <li class="card p-2">Lorem Ipsum Dolor Sit Amet</li>
                    <li class="card p-2">Lorem Ipsum Dolor Sit Amet</li>
                    <li class="card p-2">Lorem Ipsum Dolor Sit Amet</li>
                    <li class="card p-2">Lorem Ipsum Dolor Sit Amet</li>
                </ul>
                <button class="card p-2 text-primary-500 font-semibold self-end mt-4">Selengkapnya</button>
            </section>
        </div>
    </main>
    {{-- Agenda Sementara --}}
    <main class="bg-primary-500 mb-12 flex">
        <section class="basis-1/12 flex items-center">
            <img src="{{ asset('images/logo-side.svg') }}" alt="side logo">
        </section>
        <section class="basis-6/12 relative p-12 text-white pb-24">
            <h1 class="text-3xl font-bold mb-4">Lorem Ipsum Dolor </h1>
            <span>12 Agustus 2023</span>
            <p class="mt-4">Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor.....</p>
            <section class="self-end mt-4 absolute right-8 bottom-8">
                <button class="btn-secondary" disabled><</button>
                <button class="btn-secondary">></button>
            </section>
        </section>
        <section class="basis-5/12">
            <img 
                src="{{ asset('https://placekitten.com/400/400') }}" 
                alt="image"
                class="w-full h-96 object-cover">
        </section>
    </main>
    {{-- Lokasi --}}
    <main class="container mx-auto mb-6">
        <h2 class="text-primary-500 font-bold mb-12">Lokasi</h2>
        <a href="https://www.google.com/maps/place/Palengaan+Laok,+Palengaan,+Pamekasan+Regency,+East+Java/@-7.058905,113.3957703,14z/data=!3m1!4b1!4m6!3m5!1s0x2dd9d36fb7039871:0x64ad246dc2cb5e28!8m2!3d-7.0561494!4d113.4121233!16s%2Fg%2F12lng_4nd" target="blank">
            <img 
                src="{{ asset('images/map.png') }}" 
                alt="maps"
                class="w-full">
        </a>
    </main>
@endsection