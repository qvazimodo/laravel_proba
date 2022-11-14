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
                    <div class="card-header">Добавить новость</div>
                    <div class="card-body">
                        <form action="#" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="newsTitle">Заголовок новости</label>
                                <input type="text" name="title" id="newsTitle" class="form-control" value="">
                            </div>

                            <div class="form-group">
                                <label for="newsCategory">Категория новости</label>
                                <select name="category" id="newsCategory" class="form-control">
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="newsText">Текст новости</label>
                                <textarea name="text" id="newsText" class="form-control"></textarea>
                            </div>

                            <div class="form-check">

                                <label for="newsPrivate">Приватная</label>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-primary" value="Добавить новость">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
