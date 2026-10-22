@extends('layouts.admin')

@section('title', 'Редактировать марку')

@section('content')
    <h1>Редактировать марку</h1>
    @include('admin.brands._form', ['action' => route('admin.brands.update', $brand)])
@endsection