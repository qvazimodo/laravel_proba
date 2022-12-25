@extends('layouts.app')

@section('title')
    @parent | Новость
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
<div class="container">
     @if($news)
        @if(!$news->isPrivate || Auth::check())
        <h2>{{ $news->title }}</h2>
            <div class="card-img" ><img src={{!empty($news->image)?$news->image:asset('storage/default.jpg')}} alt=""></div>

        <p>{!! $news->text !!}</p>
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
