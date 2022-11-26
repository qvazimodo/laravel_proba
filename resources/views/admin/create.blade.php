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
                    <div class="card-header"> @if ($news->id)
                            Изменить новость
                        @else
                            Добавить новость
                        @endif</div>
                    <div class="card-body">
                        <form action="@if (!$news->id){{ route('admin.create') }}@else{{ route('admin.update', $news) }}@endif"
                              method="post">
                            @csrf
                            <div class="form-group">
                                <label for="newsTitle">Заголовок новости</label>
                                <input type="text" name="title" id="newsTitle" class="form-control" value="{{$news->title ?? old('title') }}">
                            </div>

                            <div class="form-group">
                                <label for="newsCategory">Категория новости</label>
                                <select name="category" id="newsCategory" class="form-control">
                                    @if ($news->id)
                                        @forelse($categories as $item)
                                            <option @if ($item->id == $news->category_id) selected
                                                    @endif value="{{ $item->id}} ">{{ $item->name }}</option>
                                        @empty
                                            <option value="0" selected>Нет категории</option>
                                        @endforelse
                                    @else
                                        @forelse($categories as $item)
                                            <option @if ($item->id == old('id')) selected
                                                    @endif value="{{ $item->id??old('id')}} ">{{ $item->name??old('name') }}</option>
                                        @empty
                                            <option value="0" selected>Нет категории</option>
                                        @endforelse
                                    @endif
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="newsText">Текст новости</label>
                                <textarea name="text" id="newsText" class="form-control">{{$news->text ?? old('text') }}</textarea>
                            </div>

                            <div class="form-check">
                                <input @if (($news->isPrivate == 1 ) || (old('isPrivate') == "1")) checked @endif id="newsPrivate" name="isPrivate"
                                       type="checkbox" value="1" class="form-check-input">
                                <label for="newsPrivate">Приватная</label>
                            </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-primary"
                                       value="@if ($news->id) Изменить @else Добавить @endif">
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

