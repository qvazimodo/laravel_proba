@extends('layouts.main')

@section('title')
    @parent | Новость
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
<div class="container">
     @if($news)
        @if(!$news->isPrivate)
        <h2>{{ $news->title }}</h2>
        <p>{{ $news->text }}</p>
        <a href="{{ route('news.save', $news->id) }}" class="btn btn-outline-primary">Скачать новость</a>
        @else
        Новость приватная, зарегистрируйтесь
        @endif
    @else
    Нет такой новости
    @endif

</div>
@endsection

@section('footer')
    @include('footer')
@endsection
