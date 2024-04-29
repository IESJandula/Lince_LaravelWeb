<nav class="navbar navbar-expand-md navbar-light bg-custom">
    <a class="navbar-brand ml-3" href="{{ url('/') }}">
        <img src="{{ asset('assets/img/icono-lince.png') }}" class="iconoLince">
    </a>
    <button class="navbar-toggler m-5" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto menuPrincipal">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown1" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Conócenos
                </a>
                <ul class="dropdown-menu submenuInicio" aria-labelledby="navbarDropdown1">
                    <li><a class="dropdown-item text-white" href="{{ url('/conocenos/sobre-nosotros') }}">Sobre
                            nosotros</a></li>
                    <li><a class="dropdown-item text-white" href="{{ url('/conocenos/equipos') }}">Equipos</a></li>
                    <li><a class="dropdown-item text-white" href="{{ url('/conocenos/pilotos') }}">Pilotos</a></li>
                    <li><a class="dropdown-item text-white" href="{{ url('/conocenos/dorsales') }}">Dorsales</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ url('vehiculos') }}">Vehículos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ url('blog') }}">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ url('reconocimientos') }}">Reconocimientos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ url('contacto') }}">Contacto</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="https://lince-jandula.blogspot.com/" target="_blank">Web
                    Antigua</a>
            </li>
            @if (Auth::check())
                <li class="nav-item">
                    <a href="{{ url('/escritorio') }}" class="mx-3 btn btn-primary btn-lg nav-link px-3">
                        <i class="menu-icon fa-solid fa-table-columns"></i>
                        <div data-i18n="Dashboards">Escritorio</div>
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="mx-2 btn btn-danger btn-lg nav-link px-3">
                            <i class="menu-icon fa-solid fa-right-from-bracket"></i>
                            Cerrar sesión
                        </button>
                    </form>
                </li>
            @endif
        </ul>
        <ul class="navbar-nav ml-auto menuRedesSociales">
            <li class="nav-item">
                <a class="nav-link text-white" href="https://www.instagram.com/linceteamjandula/?hl=es" target="_blank"><i class="fab fa-instagram fa-lg"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="https://m.facebook.com/people/Veh%C3%ADculo-Ecol%C3%B3gico-Lince/100057685771001/" target="_blank"><i class="fab fa-facebook-square fa-lg"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="https://twitter.com/linceiesjandula?lang=es" target="_blank"><i class="fab fa-twitter fa-lg"></i></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="https://www.youtube.com/@jandulatv" target="_blank"><i class="fab fa-youtube fa-lg"></i></a>
            </li>
        </ul>
    </div>
</nav>
