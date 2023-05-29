<!DOCTYPE html>
<html>
<head>
	<title>News Admin</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

@extends('admin.layouts.main')

@section('content')
<body>
	<div class="row">
		<div class="container">

			<h2 class="text-center my-5">CRUD News Page</h2>

			<div class="col-lg-8 mx-auto my-5">

				@if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
				@endif

				<form action="/admin/news/update" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
                    @method('PATCH')
                    <input type="hidden" name="id" value="{{ $news->id }}">
					<div class="form-group">
						<b>File Gambar</b><br/>
						<input type="file" name="file">
					</div>
					<div class="form-group">
						<b>Title</b>
						<textarea class="form-control" name="title">{{ $news->title }}</textarea>
					</div>
					<div class="form-group">
						<b>Content</b>
						<textarea class="form-control" name="content">{{ $news->content }}</textarea>
					</div>

					<input type="submit" value="Update" class="btn btn-primary">
				</form>

				<h4 class="my-5">Data</h4>

				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="1%">File</th>
							<th>Title</th>
							<th width="1%">OPSI</th>
						</tr>
					</thead>
					<tbody>
                        <td><img width="150px" src="{{ url('/data_file/'.$news->image) }}"></td>
                        <td>{{$news->title}}</td>
                        <td>{{ $news->content }}</td>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
@endsection
</html>
