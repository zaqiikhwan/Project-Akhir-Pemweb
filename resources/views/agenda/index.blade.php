@extends('admin.layouts.main')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Dashboard | Agenda</h2>
            </div>
            <div class="pull-right mb-3">
                <a class="btn btn-success" href="{{ route('agenda.create') }}"> Create New Agenda</a>
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
            <th>Image</th>
            <th>Title</th>
            <th>Content</th>
            <th>Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($agendas as $agenda)
        <tr>
            <td>{{ ++$i }}</td>
            <td>
                @foreach(explode('|', $agenda->images) as $image)
                <img src="{{ asset('/data_file/'.$image) }}" width="100px" class="mb-3 mt-3">
                @endforeach
            </td>
            <td>{{ $agenda->title }}</td>
            <td>{{ $agenda->content }}</td>
            <td>{{ $agenda->date }}</td>
            <td>
                <form action="{{ route('agenda.destroy',$agenda->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('agenda.show',$agenda->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('agenda.edit',$agenda->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $agendas->links() !!}
        
@endsection