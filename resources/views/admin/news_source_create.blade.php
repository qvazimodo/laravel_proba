@extends('layouts.app')

@section('title', 'Создание новости')


@section ('menu')
    @include('admin.menu')
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> @if ($source->id)
                            Изменить источник новостей
                        @else
                            Добавить источник новостей
                        @endif</div>
                    <div class="card-body">
                        <form action="@if (!$source->id){{ route('admin.sources.store') }}@else{{ route('admin.sources.update', $source) }}@endif"
                              method="post">
                            @csrf
                            <div class="form-group">
                                <label for="sourceName">Источник новостей</label>
                                @if ($errors->has('name'))
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->get('name') as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <input type="text" name="source" id="sourceName" class="form-control" value="{{$source->source ?? old('source') }}">
                            </div>

                            @if($source->id) @method('put') @endif
                            <div class="form-group">
                                <input type="submit" class="btn btn-outline-primary"
                                       value="@if ($source->id) Изменить @else Добавить @endif">
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

