<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
       href="{{ route("admin.categories.index") }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Панель управления</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link" href="{{ route("admin.categories.index") }}">
            <span>Категории</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route("admin.pages.index") }}">
            <span>Страницы категорий</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route("admin.static-pages.index") }}">
            <span>Статичные страницы</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route("admin.widgets.index") }}">
            <span>Виджеты</span></a>
    </li>
    <hr class="sidebar-divider my-0">
    <div class="text-center d-none d-md-inline mt-3">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
