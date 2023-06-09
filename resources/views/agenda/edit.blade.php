@extends('admin.layouts.main')
  
@section('content')
    <div class="container border-2 border-primary-500 p-4 rounded-md shadow-md">
		<h1 class="text-center my-5 pb-3 text-5xl font-semibold">Edit Agenda</h1>
            <div class="">
                <a class="btn-primary flex self-end items-center justify-center w-1/6 mt-3 my-4" href="{{ route('agenda.index') }}">Kembali</a>
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
     
         <div class="flex flex-col">
            <div class="py-4">
                <div class="form-group flex gap-2">
                    <label class="font-semibold w-1/4">Judul:</label>
                    <input type="text" name="title" value="{{ $agenda->title }}" class="w-full p-2 shadow-md rounded-md border-2 border-primary-500" placeholder="Title">
                </div>
            </div>
            <div class="py-4 flex">
                <div class="form-group flex gap-2 w-full">
                    <label class="font-semibold w-1/4">File Gambar:</label>
                    <div class="flex w-full p-2 shadow-md rounded-md border-2 border-primary-500">
                    <input type="file" name="images[]" class="flex flex-col" placeholder="image" max="5" multiple>
                    @if ($agenda->images)
                        <div class="form-group flex flex-col">
                            <label class="font-semibold">Gambar Sekarang</label>
                            {{-- <div class="existing-images"> --}}
                                @foreach (explode('|', $agenda->images) as $image)
                                <img src="{{ asset('data_file/' . $image) }}" alt="Agenda Image" class="flex items-center justify-center p-3">
                                    <div class="flex items-end self-end justify-end w-1/3 p-3">
                                        <button type="button" class="btn-danger w-2/3 flex items-center justify-center self-center gap-1" data-image="{{ $image }}" name="deleted_images">Hapus</button>
                                    </div>
                                @endforeach
                            {{-- </div> --}}
                        </div>
                    @endif
                    <input type="hidden" name="deleted_images" id="deleted_images">
                </div>
                </div>
            </div>
            <div class="py-4">
                <div class="form-group flex gap-2">
                    <label class="font-semibold w-1/4">Konten:</label>
                    <input type="text" name="content" value="{{ $agenda->content }}" class="form-control flex w-full p-2 shadow-md rounded-md border-2 border-primary-500" placeholder="Content">
                </div>
            </div>
            <div class="py-4">
                <div class="form-group flex gap-2">
                    <label class="font-semibold w-1/4">Tanggal:</label>
                    <input type="date" name="date" value="{{ $agenda->date }}" class="form-control flex w-full p-2 shadow-md rounded-md border-2 border-primary-500" placeholder="Date">
                </div>
            </div>
        </div>
            <div class="flex justify-end">
              <button type="submit" class="btn-primary flex self-end items-center justify-center w-1/5 mt-3">Simpan</button>
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
</div>
@endsection