<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- alert: {{ $data }} --}}
    {{-- <Link href=""></Link> --}}
    {{-- id: {{ $id }}
    title: {{ $title }}
    content: {{ $content }}
    <img src="{{ $image }}" alt="" srcset="">
    date: {{ $date }} --}}
    {{ $news[0] }}
    <br>
    {{ $news[1] }}
    <br>
    {{ $news[2] }}
    <br>
    {{ $news[3] }}
    <br>
    {{-- {{ $news[0] }} --}}
    <br>
    total berita: {{ $total }}
    @foreach ($news as $item)
        {{ $item->id }}
        <br>
        {{-- <h1>{{ $item }}</h1> --}}
    @endforeach
</body>
</html>
