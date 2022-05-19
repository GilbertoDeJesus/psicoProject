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
                            @foreach ($trajectoryTest as $questions)
                                <div class="step">
                                    <h3 class="main_question">
                                        <strong>{{ $loop->iteration }}/{{ $trajectoryTest->count() }}</strong>
                                        {{ $questions->question }}
                                    </h3>
                                    @if ($questions->type_id == 3)
                                        <div class="form-group">
                                            <input type="text" name="question_{{ $questions->id }}"
                                                class="form-control required" placeholder="">
                                        </div>
                                    @else
                                        @foreach ($answers as $an)
                                            @foreach ($an as $ans)
                                                @if ($ans->question_id == $questions->id)
                                                    @if ($questions->type_id == 1)
                                                        <div class="form-group">
                                                            <label class="container_radio version_2">{{ $ans->answer }}
                                                                <input type="radio" name="question_{{ $questions->id }}" data-answ="{{ $ans->answer }}"
                                                                    value="{{ $ans->value }}" class="required">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                       
                                                    @endif
                                                    @if ($questions->type_id == 4)
                                                        <div class="form-group">
                                                            <label class="container_check version_2">{{ $ans->answer }}
                                                                <input type="checkbox"
                                                                    name="question_{{ $questions->id }}[]"
                                                                    value="{{ $ans->answer }}" class="required">
                                                                <span class="checkmark"></span>
                                                            </label>
                                                        </div>
                                                    @endif                                                    
                                                @endif
                                                
                                            @endforeach                                            
                                        @endforeach
                                        <div id="extra" class="form-group" style="display:none;">
                                            <input type="text"  class="form-control" placeholder="Escriba cual" id="otro" >
                                        </div>
                                    @endif
                                  
                                </div>
                            @endforeach
                            
                            <!-- /step-->
                            <div class="submit step">
                                <h3 class="main_question"><strong>{{ $trajectoryTest->count() }}/{{ $trajectoryTest->count() }}</strong>Finalizar</h3>
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
    <script>
        $('input:radio').click(function() { 
            // console.log($(this).data('answ')); 
            if($(this).data('answ') === "Otras"){
                console.log($(this).data('answ')); 
                $("#extra").css('display','block');
                // newName = $(this).attr('name'); 
                $("#otro").addClass('required');
                // $("#otro").attr('name',newName);
               
            }else{                
                $("#otro").removeClass('required');
                $("#otro").attr('name',"");
                $("#extra").css('display','none');
            }
            });

            $(document).ready(function () {
                    $("#otro").keyup(function () {
                        var value = $(this).val();
                        console.log(value);
                        $("input[name='question_3'").val(value);
                    });
            });
    </script>
@endsection
