@extends('layouts.main')

@section('title')
    @parent | Админка
@endsection

@section('menu')
    @include('admin.menu')
@endsection

@section('content')
<div class="container">
    <h1>Админка</h1>
</div>
@endsection

@section('footer')
    @include('admin.footer')
@endsection
