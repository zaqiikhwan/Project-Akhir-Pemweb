@extends('admin.layouts.main')

@section('content')
  <h1 class="text-4xl">Selamat Datang <b class="text-primary-500">{{Auth::user()->username}}</b>, Anda Login sebagai <b class="text-primary-500">Admin</b></h4>
@endsection