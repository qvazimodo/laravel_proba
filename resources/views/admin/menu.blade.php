<ul class="nav">
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link link-dark px-2 active" aria-current="page">Домашняя</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.index') }}" class="nav-link link-dark px-2">Главная админка</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.category.index') }}" class="nav-link link-dark px-2">Категории</a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Создать</a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('admin.create') }}" class="nav-link link-dark px-2">Создать новость</a></li>
            <li><a href="{{ route('admin.category.create') }}" class="nav-link link-dark px-2">Категории</a></li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.test1') }}" class="nav-link link-dark px-2">Скачать изображение</a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.test2') }}" class="nav-link link-dark px-2">Скачать текст</a>
    </li>
</ul>
