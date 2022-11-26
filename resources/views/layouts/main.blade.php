<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@section('title')Страница @show</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{csrf_token()}}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

</head>
<body>
<div id="app">
    @yield('menu')
    <main class="py-4">
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    @yield('content')
    </main>
    @yield('footer')
</div>


<script src="{{ asset('js/app.js') }}" ></script>
</body>
</html>
