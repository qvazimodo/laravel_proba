@extends('layouts.app')

@section('title')
    @parent | Главная
@endsection

@section('menu')
    @include('menu')
@endsection

@section('content')
<div class="container text-center">
    <h1>Здравствуйте !</h1>
</div>
@endsection

@section('footer')
    @include('footer')
@endsection

