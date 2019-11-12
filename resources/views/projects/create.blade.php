@extends('layout')
@section('title','Crear Proyecto')
@section('content')

  <h1>Crear Nuevo Proyecto</h1>

{{--Opcion para mostrar errores en listado "mas sencillo"--}}
@if ($errors->any())
 <ul>
   @foreach ($errors->all() as $error)
     <li>{{$error}}</li>
   @endforeach
 </ul>
@endif


<form method="POST" action="{{route('projects.store')}}">
  @csrf
  <label>
    Titulo del Proyecto <br>
    <input type="text" name="title"  value="{{old('title')}}">
    	{!!$errors->first('title','<small>:message</small><br>')!!}
  </label>
  <br>
  <label>
   URL del proyecto <br>
   <input type="text" name="url"  value="{{old('url')}}">
   	{!!$errors->first('url','<small>:message</small><br>')!!}
  </label>
  <br>
 <label>
   Descripcion del proyecto <br>
   <textarea name='description'  value="{{old('description')}}"></textarea>
   {!!$errors->first('description','<small>:message</small><br>')!!}
</label>
<br>
<button>Guardar</button>
</form>

@endsection
