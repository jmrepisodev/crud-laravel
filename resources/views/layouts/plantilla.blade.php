<!DOCTYPE html>
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="José Miguel Repiso García">
    <meta name="description" content="Tarea 07 - DWES">
   
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    
  
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid bg-dark mb-3">
        <nav class="navbar navbar-expand-lg p-2 navbar-dark">
            <div class="container">
                <!-- Navbar brand -->
                <a class="navbar-brand" href="#">
                    <img src='{{ asset("img/logo-laravel.png") }}' alt="logo" style="width:40px;" class="rounded-pill">
                    MyLaravel
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="navbar-nav collapse navbar-collapse mb-2 mb-lg-0" id="navbarSupportedContent">
                    <a class="nav-item nav-link {{request()->routeIs('videojuegos.index') ? 'active' : ''}}"  href='{{ route("videojuegos.index") }}'>Inicio</a>
                    <a class="nav-item nav-link {{request()->routeIs('videojuegos.about') ? 'active' : ''}}"  href='{{ route("videojuegos.about") }}'>Sobre nosotros</a>
                    <a class="nav-item nav-link {{request()->routeIs('videojuegos.contacto') ? 'active' : ''}}"  href='{{ route("videojuegos.contacto") }}'>Contacto</a>

                    <div class="navbar-nav navbar-right ms-auto">
                        <div class="dropdown me-3">
                            <a id="navbarDropdown1" class="nav-link dropdown-toggle" href="#" role='button' data-bs-toggle='dropdown' aria-expanded='false' aria-haspopup="true">
                                <span class="badge badge-pill badge-dark">
                                    <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
                                </span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown1" style="width: 450px; padding: 0px; border-color: #9DA0A2">
                                <ul class="list-group" style="margin: 20px;">
                                    @include('partials.cart-drop')
                                </ul>
                            </div>
                        </div>

                        @auth
                        <div class='dropdown me-3'>
                            <a class='btn btn-success nav-link dropdown-toggle text-white' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                <i class='fas fa-user-circle me-2'></i>{{ Auth::user()->name }} ({{ Auth::user()->role }})</a>
                            </a>
                            <ul class='dropdown-menu dropdown-menu-dark' aria-labelledby='navbarDropdown'>
                                @if(Auth::user()->role =='admin')
                                <li><a class="dropdown-item"  href='{{ route("videojuegos.create") }}'>Agregar juego</a></li>
                                @endif
                                <li><a class='dropdown-item' href='{{ route("logout") }}'>Cerrar sesión</a></li>
                            </ul>
                        </div>
                        
                        @else
                            <a class='btn btn-success me-3' href='{{ route("login") }}'><i class='fas fa-sign-in-alt me-2'></i>Login</a> |
                            <a class='btn btn-danger me-3' href='{{ route("register") }}'><i class='fas fa-solid fa-user-plus me-2'></i>Registrar</a>
                           
                        @endauth  
                       
                    </div>
                    
                            
                </div>

            </div>

            
            
        </nav>
    </div>

    <div class="container">
        
        @yield('content')

    </div>


    <div class="container-fluid bg-dark mt-auto">
            <!-- Copyright -->
            <div class="text-white text-center p-2">
                Copyright © 2022. All rights reserved. By Jose Miguel Repiso.
            </div>
    </div>

     <!-- JavaScript Libraries -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>

</html>