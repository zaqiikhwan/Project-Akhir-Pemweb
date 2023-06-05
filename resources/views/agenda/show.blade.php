@extends('admin.layouts.main')
  
@section('content')
    <div class="container border-2 border-primary-500 p-4 rounded-md shadow-md">
		<h1 class="text-center my-5 pb-3 text-5xl font-semibold">Lihat Agenda</h1>
            <div class="">
                <a class="btn-primary flex self-end items-center justify-center w-1/6 mt-3 my-4" href="{{ route('agenda.index') }}">Kembali</a>
            </div>
    
     
    <div class="flex flex-col">
        <div class="py-4">
            <div class="form-group flex gap-2">
                <label class="font-semibold w-1/4">Judul:</label>
                <div class="w-full p-2 shadow-md rounded-md border-2 border-primary-500">
                    {{ $agenda->title }}
                </div>
            </div>
        </div>
        <div class="py-4">
            <div class="form-group flex gap-2">
                <label class="font-semibold w-1/4">File Gambar:</label>
                @foreach(explode('|', $agenda->images) as $image)
                    <img src="{{ asset('/data_file/'.$image) }}" class="w-full p-2 shadow-md rounded-md border-2 border-primary-500">
                @endforeach
            </div>
        </div>
        <div class="py-4">
            <div class="form-group flex gap-2">
                <label class="font-semibold w-1/4">Konten:</label>
                <div class="w-full p-2 shadow-md rounded-md border-2 border-primary-500">
                {{ $agenda->content }}
                </div>
            </div>
        </div>
        <div class="py-4">
            <div class="form-group flex gap-2">
                <label class="font-semibold w-1/4">Tanggal:</label>
                <div class="w-full p-2 shadow-md rounded-md border-2 border-primary-500">
                    {{ $agenda->date }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection