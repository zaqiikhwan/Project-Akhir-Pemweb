@extends('user.layouts.main')

@section('content')
    <header 
    class="w-full container mx-auto py-16 bg-no-repeat bg-cover bg-center mb-8 rounded-md"
    style="background-image: url({{asset("images/product-bg.jpg")}})">
        <h1 class="text-white font-bold text-center">Produk UMKM</h1>
    </header>
    <section class="container mx-auto mb-16">
        <span class="block text-primary-500">Produk > Lorem ipsum</span>
        <div class="flex gap-4 items-center my-4">
            <section class="basis-1/2">
                <img
                    src="https://placekitten.com/400/400"
                    alt="productimage"
                    class="w-full aspect-[3/2] object-cover rounded-md shadow-md">
            </section>
            <section class="basis-1/2 flex flex-col gap-2 ml-4">
                <h2 class="text-primary-500 font-bold mb-2">Lorem Ipsum Dolor</h2>
                <span class="text-xl block mb-4">Rp 00.000</span>
                <p class="mb-6">Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor</p>
                <p>Jumlah Produk:</p>
                <section class="flex gap-4">
                    <input type="number" min="1" value="1" class="w-1/3 border-2 border-primary-500 rounded-md text-center font-bold">
                    <button class="btn-primary w-1/5">Beli</button>
                </section>
            </section>
        </div>
        <section class="flex w-1/2 gap-4">
            @foreach (range(1,4) as $i)
                <span class="basis-1/5 hover:shadow-md">
                    <img
                    src="https://placekitten.com/700/400"
                    alt="productimages"
                    class="w-full aspect-[4/3] object-cover rounded-md">
                </span>
            @endforeach
        </section>
    </section>
    <h2 class="text-primary-500 font-bold container mx-auto mb-4">Produk lainnya</h2>
    <section class="grid grid-cols-3 container mx-auto mb-8 gap-4">
        @foreach (range(1,3) as $i)
            <span class="bg-gray-100 rounded-md shadow-md hover:shadow-lg hover:border-2">
                <img
                    src="https://placekitten.com/300/300"
                    alt="imageprodcut"
                    class="w-full aspect-video object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold">Lorem Ipsum Dolor</h2>
                    <p class="mb-4">Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor</p>
                    <span class="text-lg">Rp 00.000</span>
                </div>
            </span>
        @endforeach
    </section>
@endsection