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

    <h4 class="text-2xl font-semibold mt-8 mb-4">Data</h4>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
 
<table class="table table-bordered table-striped border-2 border-primary-500 rounded-md w-full text-center">
    <thead>
    <tr class="text-white bg-primary-500">
        <th>No</th>
        <th>Product Name</th>
        <th>Image</th>
        <th>Description</th>
        <th>Stock</th>
        <th>Price</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
    </thead>
        <td>{{ ++$i }}</td>
        <td>{{ $product->product_name }}</td>
        <td>
            @foreach(explode('|', $product->images) as $image)
            <img src="{{ asset('/foto_produk/'.$image) }}" width="100px" class="mt-3 mb-3">
            @endforeach
        </td>
        <td>{{ $product->description }}</td>
        <td>{{ $product->product_stock }}</td>
        <td>{{ 'Rp ' . number_format($product->price, 2, ',', '.') }}</td>
        <td>
            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
 
                <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
  
                <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
 
                @csrf
                @method('DELETE')
    
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $products->links() !!}

</div>
@endsection