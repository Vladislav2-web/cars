@extends('layouts.admin')

@section('title', 'Редактировать автомобиль')

@section('content')
    <h1>Редактировать автомобиль</h1>
    @include('admin.cars._form', ['action' => route('admin.cars.update', $car)])
@endsection