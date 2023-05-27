

    <h1>CRUD VIDEOJUEGOS </h1>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark my-3">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav fw-bold">
                <a class="nav-item nav-link {{request()->routeIs('videojuegos.index') ? 'active' : ''}}"  href='{{ route("videojuegos.index") }}'>Inicio</a>
                <a class="nav-item nav-link {{request()->routeIs('videojuegos.juegos') ? 'active' : ''}}"  href='{{ route("videojuegos.juegos") }}'>Juegos</a>
                <a class="nav-item nav-link {{request()->routeIs('videojuegos.about') ? 'active' : ''}}"  href='{{ route("videojuegos.about") }}'>Sobre nosotros</a>
                <a class="nav-item nav-link {{request()->routeIs('videojuegos.contacto') ? 'active' : ''}}"  href='{{ route("videojuegos.contacto") }}'>Contacto</a>
                <div class='dropdown me-3'>
                    <a class="nav-item nav-link dropdown-toggle {{request()->routeIs('videojuegos.admin') ? 'active' : ''}}"  href='{{ route("videojuegos.admin") }}'  id='navbarDropdown2' role='button' data-bs-toggle='dropdown' aria-expanded='false'>Admin</a>
                    <ul class='dropdown-menu dropdown-menu-dark' aria-labelledby='navbarDropdown'>
                        <a class="nav-item nav-link {{request()->routeIs('videojuegos.create') ? 'active' : ''}}"  href='{{ route("videojuegos.create") }}'>Agregar juego</a>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

