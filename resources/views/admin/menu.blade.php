<ul class="nav">
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link link-dark px-2 active" aria-current="page">Домашняя</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.news.index') }}" class="nav-link link-dark px-2">Главная админка</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.categories.index') }}" class="nav-link link-dark px-2">Категории</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.users.index') }}" class="nav-link link-dark px-2">Пользователи</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.sources.index') }}" class="nav-link link-dark px-2">Источники новостей</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.parser') }}" class="nav-link link-dark px-2">Парсить</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Создать</a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('admin.news.create') }}" class="nav-link link-dark px-2">Новость</a></li>
            <li><a href="{{ route('admin.categories.create') }}" class="nav-link link-dark px-2">Категорию</a></li>
            <li><a href="{{ route('admin.users.create') }}" class="nav-link link-dark px-2">Пользователя</a></li>
            <li><a href="{{ route('admin.sources.create') }}" class="nav-link link-dark px-2">Добавить источник новости</a></li>
        </ul>
    </li>

</ul>
