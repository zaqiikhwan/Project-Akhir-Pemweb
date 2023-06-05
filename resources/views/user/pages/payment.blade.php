@extends('user.layouts.main')

@section('title', 'Pembayaran')

@section('content')
    <header 
    class="w-full container mx-auto py-16 bg-no-repeat bg-cover bg-center mb-8 rounded-md"
    style="background-image: url({{asset("images/payment-bg.jpg")}})">
        <h1 class="text-white font-bold text-center">Pembayaran</h1>
    </header>
    <div class="container mx-auto flex flex-col mb-8">
        <h2 class="font-bold text-primary-500 mb-2">Kode QR</h2>
        <p class="text-xl">Pindai kode QR berikut untuk melakukan pembayaran</p>
        <img
            src="{{$data->actions[0]->url}}"
            alt="qrcodeimage"
            class="mx-auto my-8 w-1/3 aspect-square">
        <footer class="flex self-center mb-8 w-5/6 text-xl hover:shadow-md">
            <section class="basis-1/2 card p-4 hover:shadow-none rounded-none rounded-l-md">
                <p>Nama: {{$product['name']}}</p>
                <p>Alamat: {{$product['address']}}</p>
                <p>Nomor Telepon: {{$product['phone']}}</p>
            </section>
            <section class="basis-1/2 card p-4 hover:shadow-none rounded-none rounded-r-md">
                <p>Nama Produk: {{$product['product_name']}}</p>
                <p>Jumlah: {{$product['quantity']}}</p>
                <p>Total: Rp {{$product['total']}}</p>
            </section>
        </footer>
        <button class="btn-primary self-center">Simpan di Whatsapp</button>
    </div>
@endsection