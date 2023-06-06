<!DOCTYPE html>
<html>
<head>
	<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
	<title>Edit Berita</title>
	{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}

</head>

@extends('admin.layouts.main')

@section('content')
<body>
	<div class="container border-2 border-primary-500 p-4 rounded-md shadow-md">
		<h1 class="text-center my-5 pb-3 text-5xl font-semibold">Edit Berita</h1>
		<div class="">
			<a class="btn-primary flex self-end items-center justify-center w-1/6 mt-3 my-4" 
			href="{{ url('/admin/news')}}">Kembali</a>
		</div>
			<div class="col-lg-8 mx-auto my-5">
				@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
				@endif
				<form action="/admin/news/update" method="POST" enctype="multipart/form-data" class="flex flex-col w-full gap-4">
					{{ csrf_field() }}
                    @method('PATCH')
                    <input type="hidden" name="id" value="{{ $news->id }}">
					<div class="form-group flex gap-2">
						<label class="font-semibold w-1/4">File Gambar:</label>
						<input type="file" name="file" class="w-full p-2 shadow-md rounded-md border-2 border-primary-500">
					</div>
					<div class="form-group flex gap-2">
						<label class="font-semibold w-1/4">Judul:</label>
						<textarea class="form-control w-full p-2 shadow-md rounded-md border-2 border-primary-500" name="title" required>{{ $news->title }}</textarea>
					</div>
					<div class="form-group flex gap-2">
						<label class="font-semibold w-1/4">Konten:</label>
						<textarea class="form-control w-full p-2 shadow-md rounded-md border-2 border-primary-500" name="content">{{ $news->content }}</textarea>
					</div>
                    <div class="form-group flex gap-2">
                        <label class="font-semibold w-1/4">Tanggal:</label>
                        <input type="date" name="date" class="form-control w-full p-2 shadow-md rounded-md border-2 border-primary-500" placeholder="Date" value={{ $news->date }} required>
                    </div>

					<input type="submit" value="Simpan" class="btn-primary flex self-end items-center justify-center w-1/6 mt-3">
				</form>
			</div>
	</div>
</body>
@endsection
</html>
