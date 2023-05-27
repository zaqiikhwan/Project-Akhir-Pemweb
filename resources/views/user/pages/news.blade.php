@extends('user.layouts.main')

@section('title', 'Homepage')

@section('content')
    <header 
        class="w-full container mx-auto py-16 bg-no-repeat bg-cover bg-top mb-8"
        style="background-image: url({{asset("images/news-bg.jpg")}})">
        <h1 class="text-white font-bold text-center">Berita</h1>
    </header>
    <section class="container mx-auto">
        <form class="float-right border-primary-500 border-2 flex items-center gap-2 mb-8">
            <button class="btn-primary inline-block h-full">
                <span class="iconify" data-icon="material-symbols:search"></span>
            </button>
            <input type="text" name="key" placeholder="Apa berita yang anda cari?" class="w-64 outline-none">
        </form>
    </section>
    <main class="container mx-auto grid-cols-3 grid gap-4">
        @foreach ($news as $i)
            <div class="border-2 border-primary-500">
                <img
                    src="/data_file/{{$i->image}}"
                    alt="newsimage"
                    class="w-full aspect-[4/3] object-cover">
                <h2 class="text-2xl font-bold m-4 mb-2 line-clamp-2">{{$i->title}}</h2>
                <p class="line-clamp-4 mx-4">{{$i->content}}</p>
                <button class="btn-secondary bg-gray-200 float-right m-4">Selengkapnya</button>
            </div>
        @endforeach
    </main>
    <x-paginate :cur="$cur" :max="$max"/>
@endsection