<!DOCTYPE html>
<html>
<head>
	<title>Berita</title>
	{{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
	<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
@extends('admin.layouts.main')

@section('content')
<body>
	<div class="container border-2 border-primary-500 p-4 rounded-md shadow-md">
		<h1 class="text-center my-5 pb-3 text-5xl font-semibold">Berita</h1>
		<div class="col-lg-8 mx-auto my-5">
			@if(count($errors) > 0)
			<div class="alert alert-danger">
				@foreach ($errors->all() as $error)
				{{ $error }} <br/>
				@endforeach
			</div>
			@endif
			<form method="POST" enctype="multipart/form-data" class="flex flex-col w-full gap-4">
				{{ csrf_field() }}
				<div class="form-group flex gap-2">
					<label class="font-semibold w-1/4">File Gambar:</label>
					<input type="file" name="file" class="w-full p-2 shadow-md rounded-md border-2 border-primary-500">
				</div>
				<div class="form-group flex gap-2">
					<label class="font-semibold w-1/4">Judul:</label>
					<input type="text" class="form-control w-full p-2 shadow-md rounded-md border-2 border-primary-500" name="title" required></input>
				</div>
				<div class="form-group flex gap-2">
					<label class="font-semibold w-1/4">Konten:</label>
					<textarea class="form-control w-full p-2 shadow-md rounded-md border-2 border-primary-500" name="content"></textarea>
				</div>
				<div class="form-group flex gap-2">
					<label class="font-semibold w-1/4">Tanggal:</label>
					<input type="date" name="date" class="form-control w-full p-2 shadow-md rounded-md border-2 border-primary-500" placeholder="Date" required>
				</div>

				<input type="submit" value="Unggah" class="btn-primary flex self-end items-center justify-center w-1/6 mt-3">
			</form>

			<h4 class="text-2xl font-semibold mt-8 mb-4">Daftar Berita</h4>

			<table class="table table-bordered table-striped border-2 border-primary-500 rounded-md w-full text-center">
				<thead>
					<tr class="text-white bg-primary-500">
						<th class="w-1/6 py-2">Gambar</th>
						<th class="w-1/6">Judul</th>
						<th class="w-2/6">Konten</th>
						<th class="w-1/6">Tanggal</th>
						<th class="w-2/6">Opsi</th>
					</tr>
				</thead>
				<tbody>
					@foreach($news as $g)
					<tr>
						<td><img class="flex items-center justify-center p-3" src="{{ url('/data_file/'.$g->image) }}"></td>
						<td>{{$g->title}}</td>
						<td class="text-justify py-3">{{$g->content}}</td>
						<td>{{$g->date->format('y-m-H')}}</td>
						<td>
							<div class="flex flex-col justify-center items-center self-center h-full gap-2">
								<a class="btn-primary w-2/3 flex items-center justify-center self-center gap-1" href="/admin/news/edit/{{ $g->id }}"><span class="iconify" data-icon="bx:edit"></span>Edit</a>
								<a class="btn-danger w-2/3 flex items-center justify-center self-center gap-1" href="/admin/news/hapus/{{ $g->id }}"><span class="iconify" data-icon="material-symbols:delete"></span>Hapus</a>
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</body>
@endsection
</html>
