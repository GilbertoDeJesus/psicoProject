<div class="modal fade" id="modal-notification" tabindex="-1" role="dialog" aria-labelledby="modal-notification"
    aria-hidden="true">
    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Esta es tu contraseña</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="py-3 text-center">
                    <i class="ni ni-bell-55 ni-3x"></i>
                    <h4 class="text-gradient text-danger mt-4">{{Session::get('passwordAlumno')}}</h4>
                    <p>Copia y guarda tu contraseña, la necesitaras para iniciar sesión de nuevo</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-info text-white ml-auto mb-0" data-bs-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
