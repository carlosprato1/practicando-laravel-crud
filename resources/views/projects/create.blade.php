@extends('layout')
@section('title','Crear Proyecto')
@section('content')

<h1>Crear Nuevo Proyecto</h1>

@include('partials.list-errors-val')

<form method="POST" action="{{route('projects.store')}}">

 @include('projects._form-create-edit',['btnTxt' => 'Crear'])

</form>

@endsection
