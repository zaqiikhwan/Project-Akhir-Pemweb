@extends('user.layouts.main')

@section('title', 'Produk UMKM')

@section('content')
    <header 
        class="w-full container mx-auto py-16 bg-no-repeat bg-cover bg-center mb-8 rounded-md"
        style="background-image: url({{asset("images/product-bg.jpg")}})">
        <h1 class="text-white font-bold text-center">Produk UMKM</h1>
    </header>
    <section class="container mx-auto">
        <form class="float-right border-primary-500 border-2 flex items-center gap-2 mb-8 rounded-lg">
            <button class="btn-primary rounded-none rounded-l-sm inline-block h-full hover:shadow-sm">
                <span class="iconify" data-icon="material-symbols:search"></span>
            </button>
            <input type="text" name="key" placeholder="Apa berita yang anda cari?" class="w-64 outline-none">
        </form>
    </section>
    <section class="grid grid-cols-3 container mx-auto mb-8 gap-4">
        @foreach (range(1,10) as $i)
            <span class="bg-gray-100 rounded-md shadow-md hover:shadow-xl hover:bg-gray-200">
                <img
                    src="https://placekitten.com/300/300"
                    alt="imageprodcut"
                    class="w-full aspect-video object-cover rounded-t-md">
                <div class="p-4">
                    <h2 class="text-xl font-semibold">Lorem Ipsum Dolor</h2>
                    <p class="mb-4">Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor</p>
                    <span class="text-lg">Rp 00.000</span>
                </div>
            </span>
        @endforeach
    </section>
    <x-paginate :cur="1" :max="3"/>
@endsection