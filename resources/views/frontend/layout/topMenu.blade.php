<nav
    class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
    <div class="container-fluid">
        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="javascript:;">
            <img src="{{ url('frontend/assets/img/logo_2020p.png') }}" class="navbar-brand-img h-100" alt="main_logo" style="max-height: 30px;">
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-2">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </span>
        </button>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item {{ (Route::is('students.tests')) ? 'd-none' : ''}}">
                    <a class="nav-link d-flex align-items-center me-2 active" aria-current="page"
                        href="#">
                        <i class="fa fa-chart-pie opacity-6 text-dark me-1"></i>
                        C. Vocacional
                    </a>
                </li>
                <li class="nav-item {{ (Route::is('students.tests')) ? 'd-none' : ''}}">
                    <a class="nav-link me-2" href="#">
                        <i class="fa fa-user opacity-6 text-dark me-1"></i>
                        C. Trayectoria
                    </a>
                </li>
                <li class="nav-item {{ (Route::is('students.tests')) ? 'd-none' : ''}}">
                    <a class="nav-link me-2" href="#">
                        <i class="fas fa-user-circle opacity-6 text-dark me-1"></i>
                        C. Aprendizaje
                    </a>
                </li>
                <li class="nav-item d-lg-none d-block">
                    <a class="nav-link me-2" href="{{ route('student.log-out') }}">
                        <i class="ni ni-single-02 opacity-6 text-dark me-1"></i>
                        Cerrar sesión
                    </a>
                </li>
                <li class="nav-item d-lg-none d-block">
                    <a class="nav-link me-2" href="#" data-bs-toggle="modal" data-bs-target="#modal-notification">
                        <i class="fas fa-eye opacity-6 text-dark me-1"></i>
                        Ver mi contraseña
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav d-lg-block d-none">
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="btn btn-icon btn-3 btn-round mb-0 me-1 bg-gradient-dark" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="btn-inner--icon"><i class="ni ni-single-02 me-1"></i></span>
                        Jhon Doe
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                        aria-labelledby="dropdownMenuButton">
                        <li>
                            <a class="dropdown-item border-radius-md" href="{{ route('student.log-out') }}">
                                <div class="d-flex py-1">
                                    <div class="avatar avatar-sm bg-gradient-danger  me-3  my-auto">
                                        <i class="ni ni-button-power text-white"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-0">
                                            Cerrar sesión
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item border-radius-md" href="#" data-bs-toggle="modal" data-bs-target="#modal-notification">
                                <div class="d-flex py-1">
                                    <div class="avatar avatar-sm bg-gradient-success  me-3  my-auto">
                                        <i class="fa fa-eye text-white"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-0">
                                            Ver mi contraseña
                                        </h6>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
