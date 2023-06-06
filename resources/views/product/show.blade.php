@extends('admin.layouts.main')
  
@section('content')
    <div class="container border-2 border-primary-500 p-4 rounded-md shadow-md">
        <h1 class="text-center my-5 pb-3 text-5xl font-semibold">Lihat Produk</h1>
            <div class="">
                <a class="btn-primary flex self-end items-center justify-center w-1/6 mt-3 my-4" href="{{ route('products.index') }}">Kembali</a>
            </div>
     
    <div class="flex flex-col">
        <div class="py-4">
            <div class="form-group flex gap-2">
                <label class="font-semibold w-1/4">Produk:</label>
                <div class="w-full p-2 shadow-md rounded-md border-2 border-primary-500">
                    {{ $product->product_name }}
                </div>
            </div>
        </div>
        <div class="py-4">
            <div class="form-group flex gap-2">
                <label class="font-semibold w-1/4">Gambar Produk:</label>
                <div class="flex  w-full p-2 shadow-md rounded-md border-2 border-primary-500">
                @foreach(explode('|', $product->images) as $image)
                    <img src="{{ asset('/foto_produk/'.$image) }}" class="w-1/3">
                @endforeach
            </div>
            </div>
        </div>
        <div class="py-4">
            <div class="form-group flex gap-2">
                <label class="font-semibold w-1/4">Deskripsi Produk:</label>
                <div class="w-full p-2 shadow-md rounded-md border-2 border-primary-500">
                    {{$product->description }}
                </div>
            </div>
        </div>
        <div class="py-4">
            <div class="form-group flex gap-2">
                <label class="font-semibold w-1/4">Stok:</label>
                <div class="w-full p-2 shadow-md rounded-md border-2 border-primary-500">
                    {{$product->product_stock }}
                </div>
            </div>
        </div>
        <div class="py-4">
            <div class="form-group flex gap-2">
                <label class="font-semibold w-1/4">Harga Produk:</label>
                <div class="w-full p-2 shadow-md rounded-md border-2 border-primary-500">
                    {{ 'Rp ' . number_format($product->price, 2, ',', '.') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection