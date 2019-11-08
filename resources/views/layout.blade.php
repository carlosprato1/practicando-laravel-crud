<!DOCTYPE html>
<html>
<head>
<title>@yield('title','PorDefecto')</title>

<style type="text/css">
    .active a{
    	color: red;
	    text-decoration: none;
    }
	
</style>

</head>
<body>
 <nav> 

 	<ul>
 		<li class="{{ setActive('home') }}"><a href="{{Route('home')}}">Home</a></li>
		<li class="{{setActive('portafolio.index') }}"><a href="{{Route('portafolio.index')}}">Portafolio</a></li>
		<li class="{{ setActive('contact')}}"><a href="{{Route('contact')}}">Contact</a></li>
		<li class="{{setActive('about')}}"><a href="{{Route('about')}}">About</a></li>
 	</ul>
 </nav>
 @yield('content')

</body>
</html>