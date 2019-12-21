

<nav class="navbar navbar-light navbar-expand-md bg-white shadow-sm">

  <div class="container">

     <a class="navbar-brand" href="{{ route('home')}}">
        {{config('app.name')}}
     </a>

   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
  </button>

 <div class="collapse navbar-collapse" id="navbarSupportedContent">

     <ul class="nav nav-pills">
    <li class="nav-item"><a class="nav-link {{ setActive('home') }}" href="{{Route('home')}}">Home</a></li>
    <li class="nav-item"><a class="nav-link  {{setActive('projects.*') }}" href="{{Route('projects.index')}}">Proyectos</a></li>
    <li class="nav-item"><a class="nav-link {{ setActive('contact')}}" href="{{Route('contact')}}">Contact</a></li>
    <li class="nav-item"><a class="nav-link {{setActive('about')}}" href="{{Route('about')}}">About</a></li>
    <li class="nav-item"><a class="nav-link {{setActive('boot4')}}" href="{{Route('boot4')}}">boot4-practica</a></li>
    @guest
      <li class="nav-item"><a class="nav-link" href="{{Route('login')}}">Login</a></li>

    @else  {{--boton submit del formulario con JS para poder organizarlo cn una tabla--}}
      <li> <a href="#" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"> Cerrar Sesion </a>
      </li>
    @endguest

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
      @csrf
    </form>

  </ul>

 </div>

 </div>
</nav>
