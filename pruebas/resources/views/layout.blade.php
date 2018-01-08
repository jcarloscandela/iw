<!-- <!DOCTYPE html>
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
</html> -->

<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->


    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
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
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav navbar">
                        &nbsp;
                        <li> <a href="#">tracks</a></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              genres <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" role="menu" >
                            <?php foreach (App\Genre::all() as $g): ?>
                              <li><a href="{{url('/genres/').'/'.$g->name}}">{{$g->name}}</a></li>
                            <?php endforeach; ?>
                          </ul>
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        @yield('content')
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
    </div>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
</body>
</html>
