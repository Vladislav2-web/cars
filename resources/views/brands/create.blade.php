@extends('layouts.admin')

@section('title', 'Добавить марку')

@section('content')
    <h1>Добавить марку</h1>
    @include('admin.brands._form', ['action' => route('admin.brands.store')])
@endsection