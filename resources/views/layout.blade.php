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

  @include('partials.nav')
  @include('partials.sesion-status')
  @yield('content')

</body>
</html>
