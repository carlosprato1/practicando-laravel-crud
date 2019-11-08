
@extends('layout')
@section('title','Contacto')
@section('content')
  <h1>Contact</h1>
{{--var_dump($errors->any()) --}}

{{--var_dump($errors->all()) --}}

{{--
<ul>
@foreach($errors -> all() as $error)
  <li>{{$error}}</li>
@endforeach  
</ul>
--}}

<form method="POST" action="{{route('contactformulario')}}">
@csrf
	<input name="name" placeholder="ingrese su nombre" value="{{old('name')}}">
	<br>
	{!!$errors->first('name','<small>:message</small><br>')!!}
	<input type="text" name="email" placeholder="ingrese su email" value="{{old('email')}}">
	<br>
	{!!$errors->first('email','<small>:message</small><br>')!!}
	
	<input name="subject" placeholder="ingrese su asunto" value="{{old('subject')}}">
	<br>
	<input type="text" name="mensaje" placeholder="escriba su mensaje" value="{{old('mensaje')}}"></input>
	<br>
    <button>Enviar</button>
</form>



@endsection