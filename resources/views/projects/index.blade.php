@extends('layout')
@section('title','Proyecto')
@section('content')


  <h1>Proyetos</h1>
  <a href="{{route('projects.create')}}">Crear Proyecto</a>
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
