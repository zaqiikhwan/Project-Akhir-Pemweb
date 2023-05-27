@extends('agenda.layout')
     
@section('container')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Dashboard | Agenda</h2>
            </div>
            <div class="pull-right mb-3">
                <a class="btn btn-success" href="{{ route('agendas.create') }}"> Create New Agenda</a>
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
            <th width="280px">Action</th>
        </tr>
        @foreach ($agendas as $agenda)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/data_file/{{ $agenda->image }}" width="100px"></td>
            <td>{{ $agenda->title }}</td>
            <td>
                <form action="{{ route('agendas.destroy',$agenda->id) }}" method="POST">
     
                    <a class="btn btn-info" href="{{ route('agendas.show',$agenda->id) }}">Show</a>
      
                    <a class="btn btn-primary" href="{{ route('agendas.edit',$agenda->id) }}">Edit</a>
     
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