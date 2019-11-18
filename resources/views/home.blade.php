@extends('layout')

@section('title','Home')
@section('content')
  <h1>HOME</h1>

@auth
  
  {{auth()->user()}}

@endauth

@endsection
