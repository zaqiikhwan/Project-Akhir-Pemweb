@extends('layouts.main')

@section('container')

    <h1 class="mb-5">{{ $post->title }}</h1>

    {!! $post->body !!}

    <a href="/posts">Back to posts</a>

@endsection
