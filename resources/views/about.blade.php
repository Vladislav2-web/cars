@extends('layouts.app')

@section('title', 'О проекте')

@section('content')
    <h1>О проекте</h1>
    <p>Разработчик: {{ $name }} (группа {{ $group }})</p>
    <p>Проект представляет собой автосалон с каталогом машин и личным кабинетом.</p>
@endsection