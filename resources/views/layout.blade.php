<!DOCTYPE html>
<html>
<head>
<title>@yield('title','PorDefecto')</title>
<!-- CSRF Token lo utiliza axiox -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="{{mix('/css/app.css')}}">
<script src="{{mix('/js/app.js')}}" defer> </script>

</head>
<body>
<!-- #app lo utiliza vuejs-->
  <div id='app' class="d-flex flex-column h-screen justify-content-between">

      <header>
            @include('partials.nav')
            @include('partials.sesion-status')
      </header>

      <main class="py-4">
            @yield('content')
      </main>

      <footer class="bg-while text-center text-black-50 py-3 shadow">
           {{ config('app.name') }} | Copyright @ {{ date('Y') }}
      </footer>

  </div>

</body>
</html>
