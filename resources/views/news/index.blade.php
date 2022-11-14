@extends('layouts.main')

@section('title')
    @parent | Новости
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
    <div class="container overflow-hidden text-center">
        <div class="row gy-5">
    @forelse ($news as $item)
          <div class="col-6">
              <div class="p-3 border bg-light">
                 <div class="card">
                     <img src="#" class="card-img-top" alt="">
                     <div class="card-body">
                       <h5 class="card-title">{{ $item['title']}}</h5>
                           @if(!$item['isPrivate'])
                              <p class="card-text"> {{ $item['text']}}</p>
                              <a href="{{ route('news.show', $item['id']) }}" class="btn btn-outline-primary">Перейти к новости</a>
                           @endif

                     </div>
                 </div>
              </div>
          </div>
    @empty
        Нет новостей
    @endforelse
        </div>
    </div>
@endsection

@section('footer')
    @include('footer')
@endsection
