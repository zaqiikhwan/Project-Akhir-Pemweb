@extends('product.layout')
  
@section('container')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Product</h2>
        </div>
        <div class="pull-right mb-3">
            <a class="btn btn-success" href="{{ route('products.create') }}"> Create New Product</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
 
<table class="table table-bordered">
    <tr>
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
@endsection