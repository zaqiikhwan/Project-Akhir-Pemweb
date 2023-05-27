<aside class="basis-1/4">
    <section class="flex sidebar flex-col">
      <a href="/admin/home" class="@if ($route == "home") active @endif">
        <span class="iconify" data-icon="material-symbols:home"></span>
        Home
      </a>
      <a href="/admin/news" class="@if ($route == "news") active @endif">
        <span class="iconify" data-icon="material-symbols:breaking-news-alt-1"></span>
        News
      </a>
      <a href="/admin/agenda" class="@if ($route == "agenda") active @endif">
        <span class="iconify" data-icon="material-symbols:view-agenda"></span>
        Agenda
      </a>
      <a href="/admin/announcement" class="@if ($route == "announcement") active @endif">
        <span class="iconify" data-icon="bxs:megaphone"></span>
        Announcement
      </a>
    </section>
  </aside>