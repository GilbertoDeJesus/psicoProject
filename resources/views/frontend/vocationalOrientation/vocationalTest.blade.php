@extends('frontend.layout.main')

@section('css')
    <link href="{{ url('frontend/testsAssets/css/custom.css') }}" rel="stylesheet">
@endsection

@section('contenido')
    <div class="container-fluid full-height px-0">
        <div class="row row-height mx-0">
            <div class="col-lg-6 content-left px-0 bg-gradient-dark-green">
                <div class="content-left-wrapper">
                    <div>
                        <figure><img src="{{ url('frontend/testsAssets/img/info_graphic_2.svg') }}" alt=""
                                class="img-fluid"></figure>
                        <h2>Cuestionario de orientación vocacional</h2>
                        <p>En este cuestionario se te presentarán una serie de preguntas para determinar a que carreras eres afín.
                            <br>Selecciona si o no para responder.
                        </p>

                        <a href="#start" class="btn_1 rounded mobile_btn">Comenzar!</a>
                    </div>
                    <div class="copy">© 2022 UTTehuacan</div>
                </div>
                <!-- /content-left-wrapper -->
            </div>
            <!-- /content-left -->

            <div class="col-lg-6 content-right px-4" id="start">
                <div id="wizard_container">
                    <div id="top-wizard">
                        <div id="progressbar"></div>
                    </div>
                    <!-- /top-wizard -->
                    <form method="POST" role="form" action="{{ route('students.storeVocationalTest') }}">
                        @csrf
                        <!-- Leave for security protection, read docs for details -->
                        <div id="middle-wizard">
                            <!-- /step-->
                            <div class="step">
                                <h3 class="main_question"><strong>1/4</strong>Escuela de procedencia.</h3>
                                <div class="form-group">
                                    <input type="text" name="firstname" class="form-control required" placeholder="Escuela de procedencia">
                                </div>
                                <h3 class="main_question">Promedio</h3>
                                <div class="form-group">
                                    <input type="text" name="lastname" class="form-control required" placeholder="Promedio">
                                </div>
                            </div>
                            <!-- /step-->
                            <div class="step">
                                <h3 class="main_question"><strong>2/4</strong>¿Cúal fue la especialidad que tomaste en el bachillerato?</h3>
                                <div class="form-group">
                                    <label class="container_radio version_2">Económico-Administrativo
                                        <input type="radio" name="question_2" value="1" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="container_radio version_2">Humanidades
                                        <input type="radio" name="question_2" value="2" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="container_radio version_2">Ciencias de la Salud
                                        <input type="radio" name="question_2" value="3" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="container_radio version_2">Tecnológico
                                        <input type="radio" name="question_2" value="4" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label class="container_radio version_2">Ninguna
                                        <input type="radio" name="question_2" value="5" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <!-- /step-->
                            <div class="step">
                                <h3 class="main_question"><strong>3/4</strong>¿Cuál o cuáles materias reprobaste(s)?</h3>
                                <div class="form-group">
                                    <label class="container_check version_2">Matemáticas Básicas
                                        <input type="checkbox" name="question_2[]" value="1" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="container_check version_2">Biologia Ciencias de la Salud
                                        <input type="checkbox" name="question_2[]" value="2" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="container_check version_2">Razonamiento Analítico
                                        <input type="checkbox" name="question_2[]" value="3" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="container_check version_2">Conocimiento de la Lengua
                                        <input type="checkbox" name="question_2[]" value="4" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="container_check version_2">Química
                                        <input type="checkbox" name="question_2[]" value="5" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="container_check version_2">Habilidad Comunicativa
                                        <input type="checkbox" name="question_2[]" value="6" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="container_check version_2">Comprensión de Textos
                                        <input type="checkbox" name="question_2[]" value="7" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="container_check version_2">Inglés
                                        <input type="checkbox" name="question_2[]" value="8" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="container_check version_2">Ninguna
                                        <input type="checkbox" name="question_2[]" value="0" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <!-- /step-->
                            <div class="step">
                                <h3 class="main_question"><strong>4/4</strong>¿Cuál o cuáles materias reprobaste(s)?</h3>
                                <div class="row">
                                    <div class="col-7 my-auto">
                                        <div class="form-group my-auto">
                                            <label for="gender1" class="container_check version_2">Matemáticas</label>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group radio_input">
                                            <label class="container_radio">Si
                                                <input type="radio" name="gender1" value="Si" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio">No
                                                <input type="radio" name="gender1" value="No" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-7 my-auto">
                                        <div class="form-group my-auto">
                                            <label for="gender2" class="container_check version_2">Fisica </label>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group radio_input">
                                            <label class="container_radio">Si
                                                <input type="radio" name="gender2" value="Si" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio">No
                                                <input type="radio" name="gender2" value="No" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-7 my-auto">
                                        <div class="form-group my-auto">
                                            <label for="gender3" class="container_check version_2">Química</label>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group radio_input">
                                            <label class="container_radio">Si
                                                <input type="radio" name="gender3" value="Si" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio">No
                                                <input type="radio" name="gender3" value="No" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-7 my-auto">
                                        <div class="form-group my-auto">
                                            <label for="gender4" class="container_check version_2">Biología</label>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group radio_input">
                                            <label class="container_radio">Si
                                                <input type="radio" name="gender4" value="Si" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio">No
                                                <input type="radio" name="gender4" value="No" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-7 my-auto">
                                        <div class="form-group my-auto">
                                            <label for="gender5" class="container_check version_2">Inglés</label>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group radio_input">
                                            <label class="container_radio">Si
                                                <input type="radio" name="gender5" value="Si" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio">No
                                                <input type="radio" name="gender5" value="No" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-7 my-auto">
                                        <div class="form-group my-auto">
                                            <label for="gender6" class="container_check version_2">Ecología</label>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group radio_input">
                                            <label class="container_radio">Si
                                                <input type="radio" name="gender6" value="Si" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio">No
                                                <input type="radio" name="gender6" value="No" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-7 my-auto">
                                        <div class="form-group my-auto">
                                            <label for="gender7" class="container_check version_2">Administración</label>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group radio_input">
                                            <label class="container_radio">Si
                                                <input type="radio" name="gender7" value="Si" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio">No
                                                <input type="radio" name="gender7" value="No" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-7 my-auto">
                                        <div class="form-group my-auto">
                                            <label for="gender8" class="container_check version_2">Taller de lectura y redacción</label>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="form-group radio_input">
                                            <label class="container_radio">Si
                                                <input type="radio" name="gender8" value="Si" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio">No
                                                <input type="radio" name="gender8" value="No" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /step-->
                            <div class="submit step">
                                <h3 class="main_question"><strong>3/3</strong>Finalizar</h3>
                                <div class="summary">
                                    <ul>
                                        <li><strong><i class="icon-check-1"></i></strong>
                                            <h5>Has terminado el cuestionario</h5>
                                            <p id="question_1"></p>
                                        </li>
                                        <li><strong><i class="icon-check-1"></i></strong>
                                            <h5>Da clic en el boton <span class="bold">enviar</span> para finalizar el cuestionario</h5>
                                            <p id="question_1"></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /step-->
                        </div>
                        <!-- /middle-wizard -->
                        <div id="bottom-wizard">
                            <button type="button" name="backward" class="backward">Anterior</button>
                            <button type="button" name="forward" class="forward">Siguiente</button>
                            <button type="submit" name="process" class="submit">Enviar</button>
                        </div>
                        <!-- /bottom-wizard -->
                    </form>
                </div>
                <!-- /Wizard container -->
            </div>
            <!-- /content-right-->
        </div>
        <!-- /row-->
    </div>
@endsection

@section('js')
    <script src="{{ url('frontend/testsAssets/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ url('frontend/testsAssets/js/common_scripts.min.js') }}"></script>
    <script src="{{ url('frontend/testsAssets/js/velocity.min.js') }}"></script>
    <script src="{{ url('frontend/testsAssets/js/functions.js') }}"></script>

    <!-- Wizard script -->
    <script src="{{ url('frontend/testsAssets/js/survey_func.js') }}"></script>
@endsection
