@extends('frontend.layout.main')

@section('css')
    <link href="{{ url('frontend/testsAssets/css/custom.css') }}" rel="stylesheet">
@endsection

@section('contenido')
    <div id="preloader">
        <div data-loader="circle-side"></div>
    </div><!-- /Preload -->
    <div class="container-fluid full-height px-0">
        <div class="row row-height mx-0">
            <div class="col-lg-6 content-left px-0 bg-gradient-dark">
                <div class="content-left-wrapper">
                    <div>
                        <figure><img src="{{ url('frontend/testsAssets/img/info_graphic_5.svg') }}" alt=""
                                class="img-fluid"></figure>
                        <h2>Cuestionario de trayectoria académica</h2>
                        <p>En este cuestionario se te presentarán una serie de preguntas para conocer un poco más acerca de
                            tus conocimientos.
                            <br>Selecciona una de las opciones dependiendo de la pregunta que se te presente.
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
                    <form method="POST" role="form" action="{{ route('students.storeTrajectoryTest') }}">
                        @csrf
                        <!-- Leave for security protection, read docs for details -->
                        <div id="middle-wizard">
                            <!-- /step-->
                            @php
                                $numberTest = 0;
                            @endphp
                            @foreach($trajectoryTest as $questions)
                            @php
                                $numberTest++;
                                $totalQuestions = $trajectoryTest->count();
                            @endphp
                            <div class="step">
                                <h3 class="main_question"><strong>{{$numberTest}}/{{$totalQuestions}}</strong>
                                {{$questions->question}}
                                </h3>
                                <div class="form-group">
                                    <label class="container_radio version_2">Si
                                        <input type="radio" name="question_1" value="1" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="container_radio version_2">No
                                        <input type="radio" name="question_1" value="2" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            @endforeach
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
                                            <h5>Da clic en el boton <span class="bold">enviar</span> para
                                                finalizar el cuestionario</h5>
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
