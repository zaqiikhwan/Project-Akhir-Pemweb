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
@endsection