@extends('layouts.admin')

@section('title', 'Добавить автомобиль')

@section('content')
    <h1>Добавить автомобиль</h1>
    @include('admin.cars._form', ['action' => route('admin.cars.store')])
@endsection