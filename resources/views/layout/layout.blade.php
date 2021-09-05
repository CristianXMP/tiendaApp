<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
    <title>TiendaApp</title>
</head>

<body >
    @include('sweetalert::alert')
   <header>
    <ul class="  shadow-sm p-3 mb-3 bg-white rounded">
        <div class="nav justify-content-start text-size">
            <a class="navbar-brand" href="/">
                <img src="https://www.tiendapp.net/images/logo-tiendapp.png" class="logo" alt="">
            </a>
            <li class="nav-item">
                <a class="nav-link active" href="/">Estadisticas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('trademarks.index')}}">Marcas</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('products.index')}}">Productos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('sales.index')}}">ventas</a>
            </li>

        </div>

    </ul>
   </header>

    <div class="container">
        @yield('content')
      </div>
    </body>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>



</html>
