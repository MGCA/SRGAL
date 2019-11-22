<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SRGAL</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-image: url('plugins/img/fondo.jpg');
                background-size: 100%;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;

            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #000000;
                padding: 0 25px;
                font-size: 18px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Perfil</a>
                    @else
                        <a href="{{ route('login') }}">Ingresar</a>

                        <!-- @if (Route::has('register'))
                            <a href="{{ route('register') }}">Registrarse</a>
                        @endif -->
                    @endauth
                </div>
            @endif

            <div class="content">
                <div>
                    <img src="{{asset('plugins/img/logo-ina.png')}}" alt="">
                </div>
                <div class="title m-b-md">
                    INA SRGAL
                </div>

                <div class="links">
                    <a href="{{action('ReporteController@index')}}">PGAI</a>
                    <a href="#">Galeria</a>
                    <a href="#">Calendario</a>
                    <a href="#">Noticias</a>
                    <a href="https://www.ina.ac.cr/SitePages/Inicio.aspx">INA</a>
                    <a href="#">Colaboradores</a>
                    <a href="#">Acerca de</a>
                </div>
            </div>
        </div>
    </body>
</html>
