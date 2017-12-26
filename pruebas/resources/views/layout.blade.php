<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Proyecto con Laravel</title>
    {{HTML::style('css/bootstrap.css')}}
    {{HTML::style('css/app.css')}}
    @yield('css')

    {{HTML::script('js/jquery-3.2.1.js')}}
    {{HTML::script('js/bootstrap.min.js')}}

    @yield('head')
    <script type="text/javascript">
      @yield('js')
    </script>
  </head>
  <body>
    <header>
      <h1>Bienvenido a nuestro proyecto</h1>
      <h3>{{$donde}}</h3>
    </header>
    @include('menu')
    <main>
      @yield('contenido')
    </main>
    <footer>
      &copy; 2017 IW.ua.es
    </footer>
  </body>
</html>
