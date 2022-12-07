            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link link-dark px-2 active" aria-current="page">Домашняя</a></li>
            <li class="nav-item"><a href="{{ route('news.index') }}" class="nav-link link-dark px-2">Новости</a></li>
            <li class="nav-item"><a href="{{ route('news.category.index') }}" class="nav-link link-dark px-2">Категории</a></li>
            <li class="nav-item" @if (!(isset(Auth::user()->name)) || !(Auth::user()->is_admin) ) style="display: none" @endif ><a href="{{ route('admin.news.index') }}" class="nav-link link-dark px-2">Админка</a></li>

