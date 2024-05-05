<aside id="layout-menu" class="layout-menu menu-vertical menu bg-custom">
    <div class="app-brand demo">
        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>
    
    <div class="menu-inner-shadow"></div>
    <div class="mx-4 mb-4 text-white h3">Panel de Administración</div>

    <ul class="menu-inner py-1 menuBackend">
        <li class="menu-item">
            <a href="{{url('/')}}" class="menu-link">
                <i class="menu-icon fa-solid fa-house"></i>
                <div data-i18n="Dashboards">HOME</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{url('/escritorio')}}" class="menu-link">
                <i class="menu-icon fa-solid fa-table-columns"></i>
                <div data-i18n="Dashboards">ESCRITORIO</div>
            </a>
        </li>
        <!-- Dashboards -->
        <li class="menu-item active">
            <a href="{{url('/medios')}}" class="menu-link">
                <i class="menu-icon fa-solid fa-image"></i>
                <div data-i18n="Dashboards">MEDIOS</div>
            </a>
        </li>
        <li class="menu-item active">
            <a href="{{url('/entradas')}}" class="menu-link">
                <i class="menu-icon fa-solid fa-paperclip"></i>
                <div data-i18n="Dashboards">ENTRADAS</div>
            </a>
        </li>
        <li class="menu-item active">
            <a href="{{url('/entradas-vehiculos')}}" class="menu-link">
                <i class="menu-icon fa-solid fa-car-side"></i>
                <div data-i18n="Dashboards">VEHÍCULOS</div>
            </a>
        </li>
        <li class="menu-item active">
            <a href="{{url('/entradas-equipos')}}" class="menu-link">
                <i class="menu-icon fa-solid fa-people-group"></i>
                <div data-i18n="Dashboards">EQUIPOS</div>
            </a>
        </li> 
        <li class="menu-item active">
            <a href="{{url('/entradas-dorsales')}}" class="menu-link">
                <i class="menu-icon fa-solid fa-bookmark"></i>
                <div data-i18n="Dashboards">DORSALES</div>
            </a>
        </li>   
        <li class="menu-item active">
            <a href="{{url('/entradas-patrocinadores')}}" class="menu-link">
                <i class="menu-icon fa-solid fa-euro-sign"></i>
                <div data-i18n="Dashboards">PATROCINADORES</div>
            </a>
        </li>
        <li class="menu-item active">
            <a href="{{url('/entradas-pilotos')}}" class="menu-link">
                <i class="menu-icon fa-solid fa-id-card"></i>
                <div data-i18n="Dashboards">PILOTOS</div>
            </a>
        </li>
        <li class="menu-item active">
            <a href="{{url('/entradas-reconocimientos')}}" class="menu-link">
                <i class="menu-icon fa-solid fa-trophy"></i>
                <div data-i18n="Dashboards">RECONOCIMIENTOS</div>
            </a>
        </li> 
        <li class="menu-item active">
            <a href="{{url('/estadisticas')}}" class="menu-link">
                <i class="menu-icon fa-solid fa-chart-simple"></i>
                <div data-i18n="Dashboards">ESTADÍSTICAS</div>
            </a>
        </li> 
        <li class="menu-item active">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon fa-solid fa-gear"></i>
                <div data-i18n="Dashboards">CONFIGURACION</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item ">
                    <a href="{{url('/configuracion/contador')}}" class="menu-link">
                        <i class="menu-icon fa-solid fa-clock"></i>
                        <div data-i18n="Analytics">Contador</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="{{url('/configuracion/usuarios')}}" class="menu-link">
                        <i class="menu-icon fa-solid fa-user"></i>
                        <div data-i18n="Analytics">Usuarios</div>
                    </a>
                </li>
                <li class="menu-item ">
                    <a href="{{ url('/configuracion/acerca-de')}}" class="menu-link">
                        <i class="menu-icon fa-solid fa-circle-info"></i>
                        <div data-i18n="Analytics">Acerca de</div>
                    </a>
                </li>

            </ul>
        </li>
        <li class="menu-item text-center">
            <form id="delete-form" action="{{ url('logout') }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="menu-icon fa-solid fa-right-from-bracket"></i>Cerrar sesión</button>
            </form>
        </li>

    </ul>
</aside>
