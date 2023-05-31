@extends('admin.layouts.main')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
            </div>
        </div>
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
    
    <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
     
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Product Name:</strong>
                    <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="images[]" class="form-control" placeholder="Image" multiple>
                    <br>
                    @if ($product->images)
                        <div class="form-group">
                            <label>Existing Images</label>
                            <div class="existing-images">
                                @foreach (explode('|', $product->images) as $image)
                                    <div class="existing-image">
                                        <img src="{{ asset('foto_produk/' . $image) }}" alt="Product Image" width="100px">
                                        <button type="button" class="delete-image-btn" data-image="{{ $image }}" name="deleted_images">Delete</button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <input type="hidden" name="deleted_images" id="deleted_images">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    <input type="text" name="description" value="{{ $product->description }}" class="form-control" placeholder="Description">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Stock:</strong>
                    <input type="number" name="product_stock" value="{{ $product->product_stock }}" class="form-control" placeholder="Stock">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="number" name="price" value="{{ $product->price }}" class="form-control" placeholder="Price">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var deleteButtons = document.querySelectorAll(".delete-image-btn");
            var deletedImagesInput = document.querySelector("#deleted_images");
            var form = document.querySelector("#edit-form");

            deleteButtons.forEach(function(button) {
                button.addEventListener("click", function() {
                    var imageToDelete = this.dataset.image;
                    var deletedImages = deletedImagesInput.value;
    
                    // Tambahkan gambar yang akan dihapus ke input deleted_images
                    deletedImages += imageToDelete + "|";
                    deletedImagesInput.value = deletedImages;
    
                    // Hapus elemen gambar dari tampilan
                    this.parentNode.remove();
                    form.submit();
                });
            });
        });
    </script>
@endsection