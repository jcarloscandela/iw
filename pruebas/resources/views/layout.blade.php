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
<body class="modal-content">
    <div id="app" style="">
        <nav class="navbar-inverse navbar-default navbar-static-top">
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
                        {{ config('app.name', 'Beatport') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav navbar">
                        &nbsp;
                        <li> <a href="{{url('tracks')}}">Tracks</a></li>
                        <li> <a href="{{url('artists')}}">Artists</a></li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                              Genres <span class="caret"></span>
                          </a>
                          <ul class="dropdown-menu" role="menu" >
                            <?php foreach (App\Genre::all() as $g): ?>
                              <li><a href="{{url('genres').'/'.$g->id}}">{{$g->name}}</a></li>
                            <?php endforeach; ?>
                          </ul>
                        </li>
                    </ul>
                    <form class="navbar-form navbar-left" action="/action_page.php" style="">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Search">
                      </div>
                      <button type="submit" class="btn btn-default">Submit</button>
                    </form>
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
                                    <li><a href="{{url('pedidos')}}">Mis pedidos</a> </li>
                                    <li><a href="{{url('listas')}}">Mis listas</a> </li>
                                    <?php if (Auth::user()->name == 'admin'): ?>
                                      <li><a href="{{url('edit_artists')}}">Gestionar artistas</a> </li>
                                      <li><a href="{{url('edit_tracks')}}">Gestionar tracks</a> </li>
                                      <li><a href="{{url('edit_genres')}}">Gestionar géneros</a> </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
        <header>
          @yield('cabecera')
        </header>
          <!-- @include('menu') -->
        <main>
          @yield('contenido')
        </main>

    </div>
    <footer  class="text-center" style="text-align:center; background:black; width:100%; position:fixed; bottom:0">
      &copy; 2017 IW.ua.es
    </footer>
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
</body>
</html>
