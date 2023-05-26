<nav class="sticky top-0 bg-white">
    <div class="flex justify-between w-full container mx-auto">
        <a href="/">
            <img src="{{$logoUrl}}" alt="logo">
        </a>
        <ul>
            @foreach ($links as $link)
            <li class="@if($link == $active) text-primary-500 @endif">
                <a href="/">{{$link}}</a>
            </li>
            @endforeach
            <li>
                <button class="btn-primary">Produk UMKM</button>
            </li>
        </ul>
    </div>
</nav>