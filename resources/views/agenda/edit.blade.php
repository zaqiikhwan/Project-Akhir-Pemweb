@extends('admin.layouts.main')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Agenda</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('agenda.index') }}"> Back</a>
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
    
    <form action="{{ route('agenda.update',$agenda->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf
        @method('PUT')
     
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="title" value="{{ $agenda->title }}" class="form-control" placeholder="Title">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="images[]" class="form-control" placeholder="image" multiple>
                    @if ($agenda->images)
                        <div class="form-group">
                            <label>Existing Images</label>
                            <div class="existing-images">
                                @foreach (explode('|', $agenda->images) as $image)
                                    <div class="existing-image">
                                        <img src="{{ asset('data_file/' . $image) }}" alt="Agenda Image" width="100px">
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
                    <strong>Content:</strong>
                    <input type="text" name="content" value="{{ $agenda->content }}" class="form-control" placeholder="Content">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Date:</strong>
                    <input type="date" name="date" value="{{ $agenda->date }}" class="form-control" placeholder="Date">
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