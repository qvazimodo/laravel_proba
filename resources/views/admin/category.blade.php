@extends('layouts.app')

@section('title')
    @parent | Категории
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container text-center">
        <h1>Категории новостей</h1>
        <div class="row">

            @forelse ($categories as $category)

                <h2>{{ $category->name }}</h2>
                <form action="{{ route('admin.categories.destroy', $category) }}" method="post">
                    <a href="{{ route('admin.categories.edit', $category) }}" class="btn btn-success">
                        Edit
                    </a>
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>

            @empty
                Нет категорий
            @endforelse

        </div>
    </div>



@endsection

@section('footer')
    @include('admin.footer')
@endsection
