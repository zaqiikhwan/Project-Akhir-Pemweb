@extends('admin.layouts.main')

@section('content')
  <h4>Selamat Datang <b>{{Auth::user()->username}}</b>, Anda Login sebagai admin</b>.</h4>
@endsection