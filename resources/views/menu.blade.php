<nav class="py-2 bg-light border-bottom">
    <div class="container d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link link-dark px-2 active" aria-current="page">Домашняя</a></li>
            <li class="nav-item"><a href="{{ route('news.index') }}" class="nav-link link-dark px-2">Новости</a></li>
            <li class="nav-item"><a href="{{ route('news.category.index') }}" class="nav-link link-dark px-2">Категории</a></li>
            <li class="nav-item"><a href="{{ route('admin.index') }}" class="nav-link link-dark px-2">Админка</a></li>
        </ul>
        <ul class="nav">
            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link link-dark px-2">Войти</a></li>
            <li class="nav-item"><a href="{{ route('register') }}" class="nav-link link-dark px-2">Зарегистрироваться</a></li>
        </ul>
    </div>
</nav>
<header class="py-3 mb-4 border-bottom">
    <div class="container d-flex flex-wrap justify-content-center">
        <a href="/" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
            <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
            <span class="fs-4">Портал новостей</span>
        </a>
        <form class="col-12 col-lg-auto mb-3 mb-lg-0" role="search">
            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>
    </div>
</header>
