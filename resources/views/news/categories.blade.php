@extends('layouts.app')

@section('title')
    @parent | Категории
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
<div class="container text-center">
    <h1>Категории новостей</h1>
    <div class="row">

    @forelse ($categories as $category)
            <div class="col">
                <a href="{{ route('news.category.show', $category->slug) }}">
                <h2>{{ $category->name}}</h2></a>
                <a href="{{ route('news.category.save', $category->slug)}}" >Скачать новость</a>
            </div>

    @empty
        Нет категорий
    @endforelse

    </div>
</div>




@endsection


@section('footer')
    @include('footer')
@endsection
