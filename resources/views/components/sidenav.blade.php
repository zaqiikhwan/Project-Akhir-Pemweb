<aside class="basis-1/4">
    <section class="flex sidebar flex-col">
      <a href="/admin/home" class="@if ($route == "home") active @endif">
        <span class="iconify" data-icon="material-symbols:home"></span>
        Beranda
      </a>
      <a href="/admin/news" class="@if ($route == "news") active @endif">
        <span class="iconify" data-icon="tabler:news"></span>
        Berita
      </a>
      <a href="/admin/agenda" class="@if ($route == "agenda") active @endif">
        <span class="iconify" data-icon="material-symbols:view-agenda"></span>
        Agenda
      </a>
      <a href="/admin/product" class="@if ($route == "product.index") active @endif">
        <span class="iconify" data-icon="gridicons:product"></span>
        Produk
      </a>
      <a href="/admin/order" class="@if ($route == "order") active @endif">
        <span class="iconify" data-icon="material-symbols:order-approve"></span>
        Pesanan
      </a>
    </section>
  </aside>
