@extends('layout')
@section('title','Proyecto | '.$project -> title)

@section('content')
  <h1>{{$project -> title}}</h1>
@auth
  <a href="{{route('projects.edit',$project)}}">Editar Proyecto</a>

  <form  action="{{route('projects.destroy',$project)}}" method="post">
     @csrf
     @method('DELETE')
    <button>Eliminar</button>
  </form>
@endauth



<p>  {{$project-> description}}</p>
<p>{{$project-> created_at -> diffForHumans()}}</p>
@endsection
