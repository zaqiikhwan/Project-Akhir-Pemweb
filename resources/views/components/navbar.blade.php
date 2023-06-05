<nav class="sticky top-0 bg-white">
    <div class="flex justify-between w-full container mx-auto">
        <a href="/">
            <img src="{{$logoUrl}}" alt="logo">
        </a>
        <ul>
            @foreach ($links as $link)
            <li class="@if($link["display"] == $active) text-primary-500 font-bold underline underline-offset-[12px] @endif">
                <a href="/{{$link["link"]}}">{{$link["display"]}}</a>
            </li>
            @endforeach
            <li>
                <a href="/product" class="btn-primary @if($active == "product") shadow-lg @endif">Produk UMKM</a>
            </li>
        </ul>
    </div>
</nav>
