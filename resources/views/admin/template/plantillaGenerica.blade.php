<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css')}}">
  <title>@yield('title')</title>
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand font-weight-bold text-warning" href="@yield('pgai')">PGAI</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" 
    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="@yield('item1')"> @yield('uno') <span class="sr-only"></span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="@yield('item2')"> @yield('dos') </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="@yield('item3')"> @yield('tres') </a>
        </li>
      </ul>
      <!-- cerrar cession -->
      <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                {{ __('Cerrar sesion') }}
              </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
        <!-- fin de cerrar cession -->
    </div>
  </nav>

  <br>
    
  <div class="container" style="height: 920px;">
    @yield('contenido')
  </div> 
  <footer>
    <!-- <div class="container">
      <span class="text-muted">SRGA INA LIBERIA, 2019</span>
    </div> -->
    <nav class="navbar fixed-bottom navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand text-warning" href="#">SRGA INA LIBERIA, 2019</a>
        
    </nav>
  </footer>

  
  <!-- esta sentencia hace coneccion con el CDN desde el servidor
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  
  el de abajo hace uso de modo local-->
  <script>window.jQuery || document.write('<script src="{{ asset('plugins/bootstrap/js/jquery-3.3.1.slim.min.js')}}"><\/script>')</script>
  
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
