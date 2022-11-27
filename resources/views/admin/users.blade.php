@extends('layouts.app')

@section('title')
    @parent | Категории
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
    <div class="container text-center">
        <h1>Список пользователей</h1>
        <div class="row">

            @forelse ($users as $user)

                <h2>{{ $user->name }}  <sup @if(!($user->is_admin)) style="display: none"  @endif> <i>(admin)</i> </sup></h2>

                <form action="{{ route('admin.users.destroy', $user) }}" method="post">
                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-success">
                        Edit
                    </a>
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Delete">
                </form>

            @empty
                Нет категорий
            @endforelse

        </div>
    </div>



@endsection

@section('footer')
    @include('admin.footer')
@endsection

