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
  @yield('cabecera')
  <br>
  <br>
  @yield('imagenes')

  <footer>
    <!-- <div class="container">
      <span class="text-muted">SRGA INA LIBERIA, 2019</span>
    </div> -->

    <nav class="navbar fixed-bottom navbar-expand-md navbar-dark bg-dark">
      <a class="navbar-brand font-weight-bold" href="#">SRGA INA LIBERIA, 2019</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </nav>
  </footer>
  <!-- esta sentencia hace coneccion con el CDN desde el servidor
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  
  el de abajo hace uso de modo local-->
  <script>window.jQuery || document.write('<script src="{{ asset('plugins/bootstrap/js/jquery-3.3.1.slim.min.js')}}"><\/script>')</script>
  <script src="https://code.jquery.com/jquery-1.9.1.js" integrity="sha256-e9gNBsAcA0DBuRWbm0oZfbiCyhjLrI6bmqAl5o+ZjUA=" crossorigin="anonymous"></script>
  @stack('scripts')
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
