@extends('layouts.app')

@section('title')
    @parent | Админка
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h1>CRUD Новости</h1>
                        @forelse($news as $item)
                            <h2>{{ $item->title }}</h2>

                            <form action="{{ route('admin.news.destroy', $item) }}" method="post">
                                <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-success">
                                    Edit
                                </a>
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>




                        @empty
                            Нет новостей
                        @endforelse

                        {{ $news->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @include('admin.footer')
@endsection
