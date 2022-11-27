@extends('layouts.main')

@section('title', 'Создание новости')


@section ('menu')
    @include('admin.menu')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> @if ($category->id)
                            Изменить категорию новостей
                        @else
                            Добавить категорию новостей
                        @endif</div>
                    <div class="card-body">
                        <form action="@if (!$category->id){{ route('admin.category.create') }}@else{{ route('admin.category.update', $category) }}@endif"
                              method="post">
                            @csrf
                            <div class="form-group">
                                <label for="categoryName">Название категории</label>
                                @if ($errors->has('name'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('name') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input type="text" name="name" id="categoryName" class="form-control" value="{{$category->name ?? old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="categoryNameSlug">Псевдоним категории(slug)</label>
                                @if ($errors->has('slug'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('slug') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input type="text" name="slug" id="categoryNameSlug" class="form-control" value="{{$category->slug ?? old('slug') }}">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-primary"
                                       value="@if ($category->id) Изменить @else Добавить @endif">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')
    @include('admin.footer')
@endsection
