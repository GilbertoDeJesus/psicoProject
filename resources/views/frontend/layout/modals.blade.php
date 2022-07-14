<div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification"
    aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p4">
                <div class="pt-3 pb-2 mt-3 text-center">
                    <span class="badge rounded-pill bg-light text-dark"><i class="ni ni-lock-circle-open ni-4x text-dark"></i></span>
                    <h4 class="mt-4" id="password"><span class="badge rounded-pill bg-light text-dark">{{ Session::get('passwordAlumno') }}</span></h4>
                    <hr class="horizontal dark my-0 mb-4">
                    <p>Da clic en el botón "Copiar" y guarda tu contraseña. <br>La necesitaras para iniciar sesión de nuevo</p>
                    <button type="button" class="btn bg-gradient-dark-green text-white ml-auto mt-1 mb-0 btn-block" data-toggle="popover"
                        data-bs-placement="top" title="Copiado!" data-content="Some content inside the popover"
                        id="copy_password">Copiar</button>
                    <span class="badge rounded-pill bg-light text-dark h-sm ml-0 mt-4 cursor-pointer" aria-hidden="true" data-bs-dismiss="modal" aria-label="Close">&#10006;</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-warning-1" tabindex="-1" role="dialog" aria-labelledby="modal-form"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-3">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-center">
                        <h3 class="font-weight-bolder text-info text-gradient">OOPS!</h3>
                        <div class="mt-4"><i class="ni ni-lock-circle-open ni-4x" aria-hidden="true"></i></div>
                    </div>
                    <div class="card-body text-center py-3 px-2">
                        <p class="mb-0 text-sm text-dark">Es necesario que contestes el cuestionario de estilo de
                            aprendizaje
                            para poder acceder a este cuestionario.</p>
                    </div>
                    <div class="card-footer text-center pt-0 px-lg-2 px-1 pb-3">
                        <p class="mb-0 text-sm mx-auto">
                            <button type="button" class="btn bg-gradient-dark-green btn-lg w-100 mt-4 mb-0 text-white"
                                data-bs-dismiss="modal">Aceptar</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-warning-2" tabindex="-1" role="dialog" aria-labelledby="modal-form"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-3">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-center">
                        <h3 class="font-weight-bolder text-info text-gradient">OOPS!</h3>
                        <div class="mt-4"><i class="ni ni-lock-circle-open ni-4x" aria-hidden="true"></i></div>
                    </div>
                    <div class="card-body text-center py-3 px-2">
                        <p class="mb-0 text-sm text-dark">Es necesario que contestes el cuestionario de orientación
                            vocacional
                            para poder acceder a este cuestionario.</p>
                    </div>
                    <div class="card-footer text-center pt-0 px-lg-2 px-1 pb-3">
                        <p class="mb-0 text-sm mx-auto">
                            <button type="button" class="btn bg-gradient-dark-green btn-lg w-100 mt-4 mb-0 text-white"
                                data-bs-dismiss="modal">Aceptar</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-warning-3" tabindex="-1" role="dialog" aria-labelledby="modal-form"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-body p-3">
                <div class="card card-plain">
                    <div class="card-header pb-0 text-center">
                        <h3 class="font-weight-bolder text-danger text-gradient">¿Estas seguro?</h3>
                        <div class="mt-4"><i class="ni ni-notification-70 ni-4x" aria-hidden="true"></i></div>
                    </div>
                    <div class="card-body text-center pb-3 pt-4 px-2">
                        <p class="mb-0 text-dark">¡Al salir del cuestionario sin finalizarlo todas tus respuestas se
                            perderan!</p>
                        <div class="text-center">
                            <a href="{{ route('students.tests') }}"
                                class="btn bg-gradient-danger btn-lg w-100 mt-4 mb-0">Salir</a>
                        </div>
                    </div>
                    <div class="card-footer mx-auto py-2">
                        <p class="mx-auto my-0">
                            <button type="button" class="btn btn-link text-dark mb-0"
                                data-bs-dismiss="modal">Cancelar</button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
