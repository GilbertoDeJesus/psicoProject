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
                    <a href="{{ route('admin') }}" class="{{ (Route::is('admin')) ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-home"></i>
                        Dashboard
                    </a>
                </li>
                <li class="app-sidebar__heading">ADMINISTRACIÓN</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-users"></i>
                        Alumnos
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-portfolio"></i>
                        Programas educativos
                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
                    </a>
                    <ul>
                        <li>
                            <a href="elements-buttons-standard.html">
                                <i class="metismenu-icon"></i>
                                Buttons
                            </a>
                        </li>
                        <li>
                            <a href="elements-dropdowns.html">
                                <i class="metismenu-icon">
                                </i>Dropdowns
                            </a>
                        </li>
                        <li>
                            <a href="elements-icons.html">
                                <i class="metismenu-icon">
                                </i>Icons
                            </a>
                        </li>
                        <li>
                            <a href="elements-badges-labels.html">
                                <i class="metismenu-icon">
                                </i>Badges
                            </a>
                        </li>
                        <li>
                            <a href="elements-cards.html">
                                <i class="metismenu-icon">
                                </i>Cards
                            </a>
                        </li>
                        <li>
                            <a href="elements-list-group.html">
                                <i class="metismenu-icon">
                                </i>List Groups
                            </a>
                        </li>
                        <li>
                            <a href="elements-navigation.html">
                                <i class="metismenu-icon">
                                </i>Navigation Menus
                            </a>
                        </li>
                        <li>
                            <a href="elements-utilities.html">
                                <i class="metismenu-icon">
                                </i>Utilities
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-network"></i>
                        Grupos
                    </a>
                </li>
                {{-- <li>
                    <a href="{{ route('admin.outputs') }}" class="{{ (Route::is('admin.outputs')) ? 'mm-active' : ''}}">
                        <i class="metismenu-icon pe-7s-left-arrow"></i>
                        Salidas
                    </a>
                </li> --}}
                <li class="app-sidebar__heading">Cuestionarios</li>
                <li>
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
                <li class="app-sidebar__heading">Estadisticas</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-display1"></i>
                        Graficas
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-print"></i>
                        Reportes
                    </a>
                </li>
                <li class="app-sidebar__heading">Configuración</li>
                <li>
                    <a href="#">
                        <i class="metismenu-icon pe-7s-add-user"></i>
                        Usuarios
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
