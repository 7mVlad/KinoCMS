<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <span class="text-center brand-link">Kino CMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
                <a href="{{route('admin.main.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Статистика
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.banner.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-light fa-file"></i>
                    <p>
                        Баннеры
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.film.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-solid fa-film"></i>
                    <p>
                        Фильмы
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.news.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-light fa-newspaper"></i>
                    <p>
                        Новости
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.stock.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-light fa-business-time"></i>
                    <p>
                        Акции
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.page.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-light fa-file"></i>
                    <p>
                        Страницы
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.user.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Пользователи
                    </p>
                </a>
            </li>





        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
