@extends('admin.layouts.main')
  
@section('content')
<div class="container border-2 border-primary-500 p-4 rounded-md shadow-md">
    <h1 class="text-center my-5 pb-3 text-5xl font-semibold">Tambah Produk</h1>
    <div class="">
        <a class="btn-primary flex self-end items-center justify-center w-1/6 mt-3 my-4" href="{{ route('products.index') }}">Kembali</a>
    </div>

     
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
     
<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="flex flex-col">
        <div class="py-4">
            <div class="form-group flex gap-2">
                <label class="font-semibold w-1/4">Produk:</label>
                <input type="text" name="product_name" class="form-control w-full p-2 shadow-md rounded-md border-2 border-primary-500" placeholder="Nama Produk">
            </div>
        </div>
        <div class="py-4">
            <div class="form-group flex gap-2">
                <label class="font-semibold w-1/4">Gambar Produk:</label>
                <input type="file" name="images[]" class="form-control w-full p-2 shadow-md rounded-md border-2 border-primary-500" placeholder="Gambar Produk" multiple>
            </div>
        </div>
        <div class="py-4">
            <div class="form-group flex gap-2">
                <label class="font-semibold w-1/4">Deskripsi Produk:</label>
                <input type="text" name="description" class="form-control w-full p-2 shadow-md rounded-md border-2 border-primary-500" placeholder="Deskripsi Produk">
            </div>
        </div>
        <div class="py-4">
            <div class="form-group flex gap-2">
                <label class="font-semibold w-1/4">Stok:</label>
                <input type="number" min="1" name="product_stock" class="form-control w-full p-2 shadow-md rounded-md border-2 border-primary-500" placeholder="Stok produk" min="0" value="0">
            </div>
        </div>
        <div class="py-4">
            <div class="form-group flex gap-2">
                <label class="font-semibold w-1/4">Harga:</label>
                <input type="number" min="0" name="price" class="form-control w-full p-2 shadow-md rounded-md border-2 border-primary-500" placeholder="Harga produk" min="0" value="0">
            </div>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="btn-primary flex self-end items-center justify-center w-1/5 mt-3">Simpan</button>
          </div>
    </div>
     
</form>
</div>
@endsection