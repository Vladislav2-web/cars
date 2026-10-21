@extends('layouts.admin')

@section('title', 'Панель администратора')

@section('content')
    <h1>Панель администратора</h1>
    <p>Добро пожаловать в закрытый раздел сотрудников автосалона.</p>
    <ul>
        <li><a href="{{ route('admin.index') }}" style="color: #63b3ed;">Список автомобилей (управление)</a></li>
        <li><a href="{{ route('admin.create') }}" style="color: #63b3ed;">Добавить новый автомобиль</a></li>
    </ul>
@endsection