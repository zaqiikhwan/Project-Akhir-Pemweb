@extends('admin.layouts.main')
  
@section('content')
<div class="container border-2 border-primary-500 p-4 rounded-md shadow-md">
    <div class="flex flex-col">
        <div class="">
            <h1 class="text-center my-5 pb-3 text-5xl font-semibold">Produk</h1>
        </div>
        <div class="flex justify-end">
            <a class="btn-primary flex self-end items-center justify-center w-1/5 mt-3" href="{{ route('products.create') }}">Tambah Produk</a>
        </div> 
    </div>

    <h4 class="text-2xl font-semibold mt-8 mb-4">Daftar Produk</h4>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
 
<table class="table table-bordered table-striped border-2 border-primary-500 rounded-md w-full text-center">
    <thead>
    <tr class="text-white bg-primary-500">
        <th >No</th>
        <th >Produk</th>
        <th class="w-1/6 py-2">Gambar</th>
        <th >Deskripsi</th>
        <th >Stok</th>
        <th >Harga</th>
        <th class="w-1/6">Opsi</th>
    </tr>
    @foreach ($products as $product)
    <tr>
    </thead>
        <td>{{ ++$i }}</td>
        <td>{{ $product->product_name }}</td>
        <td>
            @foreach(explode('|', $product->images) as $image)
            <img src="{{ asset('/foto_produk/'.$image) }}" class="flex items-center justify-center p-3">
            @endforeach
        </td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->product_stock }}</td>
        <td>{{ 'Rp ' . number_format($product->price, 2, ',', '.') }}</td>
        <td>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                <div class="flex flex-col my-2">
                    <a class="btn-primary bg-blue-700 w-2/3 flex items-center justify-center self-center gap-1 m-1" href="{{ route('products.show',$product->id) }}"><span class="iconify" data-icon="material-symbols:present-to-all-rounded"></span>Lihat</a>
    
                    <a class="btn-primary w-2/3 flex items-center justify-center self-center gap-1 m-1" href="{{ route('products.edit',$product->id) }}"><span class="iconify" data-icon="bx:edit"></span>Edit</a>
    
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn-danger w-2/3 flex items-center justify-center self-center gap-1 m-1"><span class="iconify" data-icon="material-symbols:delete"></span>Hapus</button>
                </div>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $products->links() !!}

</div>
@endsection