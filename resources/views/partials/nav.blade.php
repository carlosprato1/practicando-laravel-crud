<nav>
 <ul>
   <li class="{{ setActive('home') }}"><a href="{{Route('home')}}">Home</a></li>
   <li class="{{setActive('projects.*') }}"><a href="{{Route('projects.index')}}">Proyectos</a></li>
   <li class="{{ setActive('contact')}}"><a href="{{Route('contact')}}">Contact</a></li>
   <li class="{{setActive('about')}}"><a href="{{Route('about')}}">About</a></li>
 @guest
   <li ><a href="{{Route('login')}}">Login</a></li>

 @else  {{--boton submit del formulario con JS para poder organizarlo cn una tabla--}}
   <li> <a href="#" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"> Cerrar Sesion </a>
   </li>
 @endguest

 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
     @csrf
 </form>

 </ul>
</nav>
