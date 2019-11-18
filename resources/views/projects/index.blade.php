@extends('layout')
@section('title','Proyectos')
@section('content')

<h1>Listado de Proyectos</h1>
@auth
   <a href="{{route('projects.create')}}">Crear Proyecto</a>
@endauth

  <ul>
  	@forelse($projects as $projectsItem)
  	  <li>  <a href="{{route('projects.show',$projectsItem)}}"> {{$projectsItem->title}} </a>
         <span>-</span>
         <small>{{$projectsItem->description}}
  	     {{$projectsItem->updated_at->format('h:i:s')}}</small>
  	  </li>
  	  @empty
  	  <li>no hay proyectos para mostrar</li>
  	  @endforelse
  </ul>

@endsection
