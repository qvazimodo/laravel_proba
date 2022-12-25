@extends('layouts.app')

@section('title')
    @parent | Категории
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container text-center">
        <h1>Источники новостей</h1>
        <div class="row">

            @forelse ($sources as $source)
                <div>
                    <h2><img src="{{ $source->avatar }}" width="40" alt=""> {{ $source->name }}</h2>

                </div>

                <form action="{{ route('admin.sources.destroy', $source) }}" method="post">
                    <a href="{{ route('admin.sources.edit', $source) }}" class="btn btn-success">
                        Edit
                    </a>
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>

            @empty
                Нет источников новостей
            @endforelse

                {{ $sources->links() }}

        </div>
    </div>



@endsection

@section('footer')
    @include('admin.footer')
@endsection
