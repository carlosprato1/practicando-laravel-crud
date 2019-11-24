@extends('layout')
@section('title','Proyectos')
@section('content')

<h1>Listado de Proyectos</h1>
@auth
   <a href="{{route('projects.create')}}">Crear Proyecto</a>
@endauth

  <ul>
  	@forelse($projects as $projectsItem)

        @cannot ('solo-admin-show-project-3', $projectsItem->id)
             <li> Prohibido</li>
        @else
          <li>  <a href="{{route('projects.show',$projectsItem)}}"> {{$projectsItem->title}} </a>
             <span>-</span>
             <small>{{$projectsItem->description}}
             {{$projectsItem->updated_at->format('h:i:s')}}</small>
          </li>
        @endcannot

  	  @empty
  	  <li>no hay proyectos para mostrar</li>
  	  @endforelse
  </ul>

@endsection
