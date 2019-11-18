{{--Opcion para mostrar errores en listado "mas sencillo"--}}
@if ($errors->any())
 <ul>
   @foreach ($errors->all() as $error)
     <li>{{$error}}</li>
   @endforeach
 </ul>
@endif
