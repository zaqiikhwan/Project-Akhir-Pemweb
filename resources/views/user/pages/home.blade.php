@extends('user.layouts.main')

@section('title', 'Homepage')

@section('content')
    <main 
        class="h-[calc(100vh-68px)] w-full bg-bottom flex items-center bg-no-repeat bg-cover"
        style="background-image: url({{asset("images/background.jpg")}})">
        <div class="flex items-center container mx-auto justify-between">
            <section>
                <h1 class="font-bold mb-2 text-transparent text-stroke">Palengaan Laok</h1>
                <h2 class="text-white">Bersahabat Kepada Masyarakat</h2>
            </section>
            <img 
                src="{{asset("images/logo-big.svg")}}" 
                alt="big logo"
                class="h-80">
        </div>
    </main>
@endsection