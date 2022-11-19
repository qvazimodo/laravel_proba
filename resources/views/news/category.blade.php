@extends('layouts.main')

@section('title')
    @parent | Новость по категории
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
<div class="container ">
    <h1 class="text-center">Новости категории {{ $category }}</h1>
    <div class="row ">
            @forelse ($news as $item)
                <h2>{{ $item['title']}}</h2>
                @if(!$item['isPrivate'])
                    <div class="col ">
                        <a href=" {{ route('news.show', $item['id']) }}">Подробнее...</a><br>
                    </div>
        @endif
    @empty
        Нет такой категории
    @endforelse
    </div>

</div>
@endsection

@section('footer')
    @include('footer')
@endsection
