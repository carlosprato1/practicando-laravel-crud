@extends('layout')
@section('title','Usuario | '.$user -> name)
@section('content')


<div class="container">
  <div class="bg-white p-5 shadow rounded">

    <h1>{{$user -> name}}</h1>
    <p class="text-btn-secondary">Email: {{ $user-> email }}</p>
    <p class="text-btn-secondary">Edad: {{ $user-> edad }}</p>
    <p class="text-black-50">{{ $user-> created_at -> diffForHumans() }}</p>

     <div class="d-flex justify-content-between align-items-center">


          <a href="{{ route('users.index') }}">
           Regresar</a>

          <div class="btn-group btn-group-sm ">
                  @can ('users.edit')
                       <a class="btn btn-primary rounded"
                        href="{{route('users.edit',$user)}}"
                        >Editar</a>
                  @endcan



                  @can ('users.destroy')
                    <a class="btn btn-danger rounded"
                       href="#"
                       onclick="document.getElementById('delete-user').submit()"
                   >Eliminar</a>

                    <form class="d-none"
                       id="delete-user"
                       action="{{route('users.destroy',$user)}}"
                       method="post">
                       @csrf
                       @method('DELETE')
                    </form>
                  @endcan
          </div>
   </div>
  </div>
</div>

@endsection
