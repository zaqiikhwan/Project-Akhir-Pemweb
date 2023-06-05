@extends('admin.layouts.main')
  
@section('content')
    <div class="container border-2 border-primary-500 p-4 rounded-md shadow-md">
        <div class="flex flex-col">
            <div class="">
                <h1 class="text-center my-5 pb-3 text-5xl font-semibold">Agenda</h1>
            </div>
            <div class="flex justify-end">
                <a class="btn-primary flex self-end items-center justify-center w-1/5 mt-3" href="{{ route('agenda.create') }}">Tambah Agenda</a>
            </div>
        </div>

        <h4 class="text-2xl font-semibold mt-8 mb-4">Daftar Agenda</h4>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered table-striped border-2 border-primary-500 rounded-md w-full text-center">
        <thead>
            <tr class="text-white bg-primary-500">
                <th class="w-1/6">No</th>
                <th class="w-1/6 py-2">Gambar</th>
                <th class="w-1/6">Judul</th>
                <th class="w-1/6">Konten</th>
                <th class="w-1/6">Tanggal</th>
                <th class="w-2/6">Opsi</th>
        @foreach ($agendas as $agenda)
            </tr>
        </thead>
            <td>{{ ++$i }}</td>
            <td>
                @foreach(explode('|', $agenda->images) as $image)
                <img src="{{ asset('/data_file/'.$image) }}" class="flex items-center justify-center p-3">
                @endforeach
            </td>
            <td>{{ $agenda->title }}</td>
            <td>{{ $agenda->content }}</td>
            <td>{{ $agenda->date }}</td>
            <td>
                <form action="{{ route('agenda.destroy',$agenda->id) }}" method="POST">
                <div class="flex flex-col my-2">
                    <a class="btn-primary bg-blue-700 w-2/3 flex items-center justify-center self-center gap-1 m-1" href="{{ route('agenda.show',$agenda->id) }}"><span class="iconify" data-icon="material-symbols:present-to-all-rounded"></span>Lihat</a>
      
                    <a class="btn-primary w-2/3 flex items-center justify-center self-center gap-1 m-1" href="{{ route('agenda.edit',$agenda->id) }}"><span class="iconify" data-icon="bx:edit"></span>Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn-danger w-2/3 flex items-center justify-center self-center gap-1 m-1"><span class="iconify" data-icon="material-symbols:delete"></span>Hapus</button>
                </div>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $agendas->links() !!}
        
</div>
@endsection
