@extends('agenda.layout')
   
@section('container')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Agenda</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('agenda.index') }}"> Back</a>
            </div>
        </div>
    </div>
     
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $agenda->title }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Image:</strong>
                <img src="/data_file/{{ $agenda->image }}" width="500px">
            </div>
        </div>
    </div>
@endsection