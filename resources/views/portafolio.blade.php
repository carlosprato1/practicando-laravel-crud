@extends('layout')
@section('title','Portafolio')
@section('content')
  <h1>Portafolio</h1>

  <ul>
  	@forelse($projects as $projectsItem)
  	  <li>   {{$projectsItem->title}}<span>-</span>
        <small>{{$projectsItem->description}}

  	    {{$projectsItem->updated_at->format('h:i:s')}}</small>
  	  </li>
  	  @empty
  	  <li>no hay proyectos para mostrar</li>
  	  @endforelse
  </ul>

@endsection
