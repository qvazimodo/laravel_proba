@extends('layouts.app_js')

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
                        <form
                            action="@if (!$news->id){{ route('admin.news.store') }}@else{{ route('admin.news.update', $news) }}@endif"
                              method="post">
                            @csrf
                            @if($news->id) @method('put') @endif
                            <div class="form-group">
                                <label for="newsTitle">Заголовок новости</label>
                                @if ($errors->has('title'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach($errors->get('title') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input type="text" name="title" id="newsTitle" class="form-control" value="{{$news->title ?? old('title') }}">
                            </div>

                            <div class="form-group">
                                <label for="newsCategory">Категория новости</label>
                                @if ($errors->has('category_id'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('category_id') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
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
                                @if ($errors->has('text'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('text') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <textarea  name="text" id="editor" class="form-control">{{empty(old())?$news->text : old('text') }}</textarea>
                            </div>


                            <script>
                                CKEDITOR.replace( 'editor', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
                            </script>

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

