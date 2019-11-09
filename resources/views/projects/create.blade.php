@extends('layout')
@section('title','Crear Proyecto')
@section('content')

  <h1>Crear Nuevo Proyecto</h1>

<form method="POST" action="{{route('projects.store')}}">
  @csrf
  <label>
    Titulo del Proyecto <br>
    <input type="text" name="title">
  </label>
  <br>
  <label>
   URL del proyecto <br>
   <input type="text" name="url">
  </label>
  <br>
 <label>
   Descripcion del proyecto <br>
   <textarea name='description'></textarea>
</label>
<br>
<button>Guardar</button>
</form>

@endsection
