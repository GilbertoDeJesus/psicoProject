<div class="app-sidebar sidebar-shadow bg-night-sky sidebar-text-light">
    <div class="app-header__logo">
        <div class="logo-src"></div>
        <div class="header__pane ml-auto">
            <div>
                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </button>
            </div>
        </div>
    </div>
    <div class="app-header__mobile-menu">
        <div>
            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </button>
        </div>
    </div>
    <div class="app-header__menu">
        <span>
            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                <span class="btn-icon-wrapper">
                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                </span>
            </button>
        </span>
    </div>
    <div class="scrollbar-sidebar " style="overflow-y: auto !important;">
        <div class="app-sidebar__inner">
            <ul class="vertical-nav-menu">

                <li class="app-sidebar__heading">Inicio</li>
                <li>
                    <a href="{{ route('admin') }}" class="{{ Route::is('admin') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-home"></i>
                        Dashboard
                    </a>
                </li>
                <li class="app-sidebar__heading">ADMINISTRACIÓN</li>
                @can('Ver alumnos sencillo')
                    <li>
                        <a href="{{ route('admin.students') }}" class="{{ Route::is('admin.students', 'admin.student.info', 'admin.students.search') ? 'mm-active' : '' }}">
                            <i class="metismenu-icon pe-7s-users"></i>
                            Alumnos
                        </a>
                    </li>
                @endcan

                    {{-- <li>
                        <a href="{{ route('admin.educationalProgram') }}" class="{{ Route::is('admin.educationalProgram', 'admin.educationalProgram.indexGroups', 'admin.educationalProgram.infoStudent', 'admin.educationalProgram.search', 'admin.educationalProgram.searchStudent') ? 'mm-active' : '' }}">
                            <i class="metismenu-icon pe-7s-portfolio"></i>
                            Programas educativos
                        </a>
                    </li> --}}
                <li>
                    <a href="{{ route('admin.educationalProgram.indexGroups') }}" class="{{ Route::is('admin.educationalProgram', 'admin.educationalProgram.indexGroups', 'admin.educationalProgram.infoStudent', 'admin.educationalProgram.search', 'admin.educationalProgram.searchStudent') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-portfolio"></i>
                        Aspitantes
                    </a>
                </li>
                <li class="app-sidebar__heading">Cuestionarios</li>
                {{-- <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-box2"></i>
                        Estilo de aprendizaje
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-study"></i>
                        Orientacion Vocacional
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-notebook"></i>
                        Trayectoria academica
                    </a>
                </li>
                <li class="app-sidebar__heading">Estadisticas</li> --}}
                {{-- <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-display1"></i>
                        Graficas
                    </a>
                </li> --}}
                <li>
                    <a href="{{ route('admin.reports') }}" class="{{ Route::is('admin.reports') ? 'mm-active' : '' }}">
                        <i class="metismenu-icon pe-7s-print"></i>
                        Reportes
                    </a>
                </li>
                @can('Ver administradores')
                    <li class="app-sidebar__heading">Configuración</li>
                    <li>
                        <a href="{{ route('admin.users') }}" class="{{ Route::is('admin.users', 'admin.users.editUser', 'admin.users.search') ? 'mm-active' : '' }}">
                            <i class="metismenu-icon pe-7s-add-user"></i>
                            Usuarios
                        </a>
                    </li>
                @endcan
            </ul>
        </div>
    </div>
</div>
