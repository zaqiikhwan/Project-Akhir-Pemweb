@extends('admin.layouts.main')
  
@section('content')
<div class="container border-2 border-primary-500 p-4 rounded-md shadow-md">
    <h1 class="text-center my-5 pb-3 text-5xl font-semibold">Tambah Agenda</h1>
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
     
<form action="{{ route('agenda.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div class="flex flex-col">
        <div class="py-4">
            <div class="form-group flex gap-2">
                <label class="font-semibold w-1/4">Judul:</label>
                <input type="text" name="title" class="form-control w-full p-2 shadow-md rounded-md border-2 border-primary-500" placeholder="Judul">
            </div>
        </div>
        <div class="py-4">
            <div class="form-group flex gap-2">
                <label class="font-semibold w-1/4">File Gambar:</label>
                <input type="file" name="images[]" class="form-control w-full p-2 shadow-md rounded-md border-2 border-primary-500" placeholder="Gambar" multiple>
            </div>
        </div>
        <div class="py-4">
            <div class="form-group flex gap-2">
                <label class="font-semibold w-1/4">Konten:</label>
                <input type="text" name="content" class="form-control w-full p-2 shadow-md rounded-md border-2 border-primary-500" placeholder="Konten">
            </div>
        </div>
        <div class="py-4">
            <div class="form-group flex gap-2">
                <label class="font-semibold w-1/4">Tanggal:</label>
                <input type="date" name="date" class="form-control w-full p-2 shadow-md rounded-md border-2 border-primary-500" placeholder="Tanggal">
            </div>
        </div>
        <div class="flex justify-end">
            <button type="submit" class="btn-primary flex self-end items-center justify-center w-1/5 mt-3">Simpan</button>
          </div>
    </div>
     
</form>
</div>
@endsection