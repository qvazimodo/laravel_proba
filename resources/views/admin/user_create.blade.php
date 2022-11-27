@extends('layouts.app')

@section('title', 'Новый пользователь')

@section ('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">@if (!$user->id){{ 'Создание профиля'}}@else{{ 'Редактирование профиля'}}@endif</div>

                    <div class="card-body">
                        <form method="POST" action="@if (!$user->id){{ route('admin.users.store') }}@else{{ route('admin.users.update', $user) }}@endif">
                            @if($user->id) @method('put') @endif
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Имя пользователя</label>

                                <div class="col-md-6">
                                    @if ($errors->has('name'))
                                        <div class="alert alert-danger" role="alert">
                                            @foreach ($errors->get('name') as $error)
                                                {{ $error }}
                                            @endforeach
                                        </div>
                                    @endif
                                    <input id="name" type="text" class="form-control"  name="name" value="{{ old('name') ?? $user->name }}"  autofocus>


                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail </label>

                                <div class="col-md-6">
                                    @if ($errors->has('email'))
                                        <div class="alert alert-danger" role="alert">
                                            @foreach ($errors->get('email') as $error)
                                                {{ $error }}
                                            @endforeach
                                        </div>
                                    @endif
                                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') ?? $user->email }}">


                                </div>
                            </div>
                                @if (!$user->id)
                                    <div class="form-group row">
                                        <label for="password" class="col-md-4 col-form-label text-md-right"> Укажите пароль </label>

                                        <div class="col-md-6">
                                            @if ($errors->has('password'))
                                                <div class="alert alert-danger" role="alert">
                                                    @foreach ($errors->get('password') as $error)
                                                        {{ $error }}
                                                    @endforeach
                                                </div>
                                            @endif
                                            <input id="password" type="password" class="form-control" name="password" >


                                        </div>
                                    </div>

                                @endif



                            <div class="form-check">
                                <input @if (($user->is_admin == 1 ) || (old('is_admin') == "1")) checked @endif id="isAdmin" name="isAdmin"
                                       type="checkbox" value="1" class="form-check-input">
                                <label for="isAdmin">Админ</label>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        @if (!$user->id){{ 'Создать профиль'}}@else{{ 'Изменить профиль'}}@endif
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

