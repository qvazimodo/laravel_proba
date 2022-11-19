<nav class="py-2 bg-light border-bottom">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link link-dark px-2 active" aria-current="page">Домашняя</a></li>
            <li class="nav-item"><a href="{{ route('admin.index') }}" class="nav-link link-dark px-2">Главная админка</a></li>
            <li class="nav-item"><a href="{{ route('admin.create') }}" class="nav-link link-dark px-2">Создать новость</a></li>
            <li class="nav-item"><a href="{{ route('admin.test1') }}" class="nav-link link-dark px-2">Скачать изображение</a></li>
            <li class="nav-item"><a href="{{ route('admin.test2') }}" class="nav-link link-dark px-2">Скачать текст</a></li>
        </ul>

    </div>
</nav>
