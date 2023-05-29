@extends('user.layouts.main')

@section('title', $news->title)

@section('content')
    <header 
        class="w-full container mx-auto py-16 bg-no-repeat bg-cover bg-top mb-8 rounded-md"
        style="background-image: url({{asset("images/news-bg-1.jpg")}})">
        <h1 class="text-white font-bold text-center">Berita</h1>
    </header>
    <main class="container mx-auto flex flex-wrap">
        <header class="basis-full">
            <h1 class="text-primary-500 font-bold my-8 text-6xl">{{$news->title}}</h1>
            <em class="block mb-8">{{$news->created_at}}</em>
        </header>
        <div class="basis-2/3 mx-auto mb-20">
            <img src="/data_file/{{$news->image}}" alt="imagenews" class="aspect-[2/1] object-cover mb-4 w-full rounded-md">
            <pre>
                {{$news->content}}
            </pre>
        </div>
        {{-- <div class="px-4 basis-1/3">
            <section class="bg-green-600 w-full h-64">
                Space Iklan ini woy
            </section>
        </div> --}}
        <h2 class="text-primary-500 font-bold container mx-auto mb-4">Berita lainnya</h2>
        <div class="container mx-auto grid-cols-3 grid gap-4 mb-12">
            @foreach ($other as $i)
            <div class="bg-gray-100 shadow-sm rounded-lg hover:shadow-md">
                <img
                    src="/data_file/{{$i->image}}"
                    alt="newsimage"
                    class="w-full aspect-[4/3] object-cover rounded-t-md">
                <h2 class="text-2xl font-bold m-4 mb-2 line-clamp-2">{{$i->title}}</h2>
                <p class="line-clamp-4 mx-4">{{$i->content}}</p>
                <a href="/news/{{$i->id}}" class="btn-primary float-right m-4">Selengkapnya</a>
            </div>
            @endforeach
        </div>
    </main>
@endsection