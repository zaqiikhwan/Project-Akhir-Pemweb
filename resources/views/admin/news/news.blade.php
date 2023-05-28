<!DOCTYPE html>
<html>
<head>
	<title>CRUD News</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
@extends('admin.layouts.main')

@section('content')
<body>
	<div class="row">
		<div class="container">

			<h2 class="text-center my-5">CRUD News</h2>

			<div class="col-lg-8 mx-auto my-5">

				@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
				@endif
				<form method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}

					<div class="form-group">
						<strong>File Gambar</strong><br/>
						<input type="file" name="file">
					</div>
					<div class="form-group">
						<strong>Judul</strong>
						<textarea class="form-control" name="title"></textarea>
					</div>
					<div class="form-group">
						<strong>Konten</strong>
						<textarea class="form-control" name="content"></textarea>
					</div>
                    <div class="form-group">
                        <strong>Tanggal</strong>
                        <input type="date" name="date" class="form-control" placeholder="Date">
                    </div>

					<input type="submit" value="Upload" class="btn btn-primary">
				</form>

				<h4 class="my-5">Data</h4>

				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="1%">Gambar</th>
							<th>Judul</th>
                            <th>Konten</th>
                            <th>Tanggal</th>
							<th width="1%">Opsi</th>
						</tr>
					</thead>
					<tbody>
						@foreach($news as $g)
						<tr>
							<td><img width="150px" src="{{ url('/data_file/'.$g->image) }}"></td>
							<td>{{$g->title}}</td>
                            <td>{{$g->content}}</td>
                            <td>{{$g->date->format('y-m-H')}}</td>
							<td>
                                <a class="btn btn-danger" href="/admin/news/hapus/{{ $g->id }}">Hapus</a>
                                <a class="btn btn-danger" href="/admin/news/edit/{{ $g->id }}">Edit</a>
                            </td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
@endsection
</html>
