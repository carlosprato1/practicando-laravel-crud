@extends('layout')
@section('title','Editar Proyecto')
@section('content')

<h1>Editar Proyecto</h1>

@include('partials.list-errors-val')

  <form method="POST" action="{{route('projects.update',$project)}}">
     @method('PUT')
     @include('projects._form-create-edit',['btnTxt' => 'Actualizar'])

  </form>


@endsection
