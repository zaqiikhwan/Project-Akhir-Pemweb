@extends('user.layouts.main')

@section('title', $product->product_name)

@section('content')
    <header 
    class="w-full container mx-auto py-16 bg-no-repeat bg-cover bg-center mb-8 rounded-md"
    style="background-image: url({{asset("images/product-bg.jpg")}})">
        <h1 class="text-white font-bold text-center">Produk UMKM</h1>
    </header>
    <section class="container mx-auto mb-16">
        <span class="block text-primary-500"><a href="/product">Produk</a> > {{$product->product_name}}</span>
        <div class="flex gap-4 items-center my-4">
            <section class="basis-1/2">
                <img
                    src="https://placehold.co/600x400"
                    alt="productimage"
                    class="w-full aspect-[3/2] object-cover rounded-md shadow-md"
                    id="product-image">
            </section>
            <section class="basis-1/2 flex flex-col gap-2 ml-4">
                <h2 class="text-primary-500 font-bold mb-2">{{$product->product_name}}</h2>
                <span class="text-xl block mb-4">Rp {{number_format($product->price)}}</span>
                <p class="mb-6">{{$product->description}}</p>
                <p>Jumlah Produk:</p>
                <section class="flex gap-4">
                    <input
                        type="number"
                        min="1"
                        value="1"
                        class="w-1/3 border-2 border-primary-500 rounded-md text-center font-bold"
                        id="amount-input"
                        onchange="setQuantity(event)">
                    <button class="btn-primary w-1/5" id="btn-buy" onclick="openModal()">Beli</button>
                </section>
            </section>
        </div>
        <section class="flex w-1/2 gap-4">
            @foreach (explode("|", $product->images) as $idx => $i)
                <span class="basis-1/5 hover:shadow-md cursor-pointer brightness-50 hover:brightness-100 transition-all" onclick="setImage(@json($idx))">
                    <img
                    src="/foto_produk/{{$i}}"
                    alt="productimages"
                    class="w-full aspect-[4/3] object-cover rounded-md">
                </span>
            @endforeach
        </section>
    </section>
    <h2 class="text-primary-500 font-bold container mx-auto mb-4">Produk lainnya</h2>
    <section class="grid grid-cols-3 container mx-auto mb-8 gap-4">
        @foreach ($other as $i)
            <a class="bg-gray-100 rounded-md shadow-md hover:shadow-lg hover:border-2" href="/product/{{$i->id}}">
                <img
                    src="/foto_produk/{{explode("|", $i->images)[0]}}"
                    alt="imageprodcut"
                    class="w-full aspect-video object-cover">
                <div class="p-4">
                    <h2 class="text-xl font-semibold">{{$i->product_name}}</h2>
                    <p class="mb-4">{{$i->description}}</p>
                    <span class="text-lg">Rp {{number_format($i->price)}}</span>
                </div>
            </a>
        @endforeach
    </section>
    <x-payment-modal :id="$product->id"/>
    <script>
        let imgIndex = 0;
        let productData = @json($product);
        let productImages = productData.images.split("|");
        let currentProductImage = document.getElementById("product-image");

        const setImage = (i) => {
            currentProductImage.style.opacity = 0;
            currentProductImage.classList.remove("fadeInLeft-animation");
            currentProductImage.setAttribute("src", `/foto_produk/${productImages[i]}`)
        }

        currentProductImage.addEventListener('load', () => {
            currentProductImage.classList.add("fadeInLeft-animation");
        })

        setImage(imgIndex);
    </script>
@endsection