@extends('frontend.layout.main')

@section('css')
    <link href="{{ url('frontend/testsAssets/css/custom.css') }}" rel="stylesheet">
@endsection

@section('contenido')
    <div class="container-fluid full-height px-0">
        <div class="row row-height mx-0">
            <div class="col-lg-6 content-left px-0 bg-gradient-dark">
                <div class="content-left-wrapper">
                    <div>
                        <figure><img src="{{url('frontend/testsAssets/img/info_graphic_1.svg')}}" alt="" class="img-fluid"></figure>
                        <h2>Cuestionario de estilo de aprendizaje</h2>
                        <p>En este cuestionario se evaluara tu. Eu dictas concludaturque usu, facete
                            detracto patrioque an per, lucilius pertinacia eu vel. Adhuc invidunt duo ex. Eu tantas dolorum
                            ullamcorper qui.</p>
                        
                        <a href="#start" class="btn_1 rounded mobile_btn">Start Now!</a>
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
                    <form id="wrapped" method="POST">
                        <input id="website" name="website" type="text" value="">
                        <!-- Leave for security protection, read docs for details -->
                        <div id="middle-wizard">
                            <div class="step">
                                <h3 class="main_question"><strong>1/5</strong>Please fill with your details</h3>
                                <div class="form-group">
                                    <input type="text" name="firstname" class="form-control required"
                                        placeholder="First Name">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="lastname" class="form-control required"
                                        placeholder="Last Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control required" placeholder="Your Email">
                                </div>
                                <div class="form-group">
                                    <div class="styled-select clearfix">
                                        <select class="wide required" name="country">
                                            <option value="">Your Country</option>
                                            <option value="Europe">Europe</option>
                                            <option value="Asia">Asia</option>
                                            <option value="North America">North America</option>
                                            <option value="South America">South America</option>
                                            <option value="Oceania">Oceania</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <input type="text" name="age" class="form-control" placeholder="Age">
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="form-group radio_input">
                                            <label class="container_radio">Male
                                                <input type="radio" name="gender" value="Male" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                            <label class="container_radio">Female
                                                <input type="radio" name="gender" value="Female" class="required">
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <!-- /row -->
                                <div class="form-group terms">
                                    <label class="container_check">Please accept our <a href="#" data-toggle="modal"
                                            data-target="#terms-txt">Terms and conditions</a>
                                        <input type="checkbox" name="terms" value="Yes" class="required">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <!-- /step-->
                            <div class="step">
                                <h3 class="main_question"><strong>2/5</strong>How do rate your overall satisfaction about
                                    the service provided?</h3>
                                <div class="form-group">
                                    <label class="container_radio version_2">Not Satisfied
                                        <input type="radio" name="question_1" value="Not Satisfied" class="required"
                                            onchange="getVals(this, 'question_1');">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="container_radio version_2">Quite Satisfied
                                        <input type="radio" name="question_1" value="Quite Satisfied" class="required"
                                            onchange="getVals(this, 'question_1');">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="container_radio version_2">Satisfied
                                        <input type="radio" name="question_1" value="Satisfied" class="required"
                                            onchange="getVals(this, 'question_1');">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="container_radio version_2">Completely Satisfied
                                        <input type="radio" name="question_1" value="Completely Satisfied"
                                            class="required" onchange="getVals(this, 'question_1');">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label class="container_radio version_2">Extremely Satisfied
                                        <input type="radio" name="question_1" value="Extremely Satisfied"
                                            class="required" onchange="getVals(this, 'question_1');">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <!-- /step-->
                            <div class="step">
                                <h3 class="main_question"><strong>3/5</strong>How did you hear about our company?</h3>
                                <div class="form-group">
                                    <label class="container_check version_2">Google Search Engine
                                        <input type="checkbox" name="question_2[]" value="Google Search Engine"
                                            class="required" onchange="getVals(this, 'question_2');">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="container_check version_2">A friend of mine
                                        <input type="checkbox" name="question_2[]" value="A friend of mine"
                                            class="required" onchange="getVals(this, 'question_2');">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="container_check version_2">Print Advertise
                                        <input type="checkbox" name="question_2[]" value="Print Advertise"
                                            class="required" onchange="getVals(this, 'question_2');">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="container_check version_2">Newspaper
                                        <input type="checkbox" name="question_2[]" value="Newspaper" class="required"
                                            onchange="getVals(this, 'question_2');">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="container_check version_2">Other
                                        <input type="checkbox" name="question_2[]" value="Other" class="required"
                                            onchange="getVals(this, 'question_2');">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                            <!-- /step-->
                            <div class="step">
                                <h3 class="main_question"><strong>4/5</strong>Do you think to suggest our company to a
                                    friend or parent?</h3>
                                <div class="form-group">
                                    <label class="container_radio version_2">No
                                        <input type="radio" name="question_3" value="No" class="required"
                                            onchange="getVals(this, 'question_3');">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="container_radio version_2">Maybe
                                        <input type="radio" name="question_3" value="Maybe" class="required"
                                            onchange="getVals(this, 'question_3');">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="container_radio version_2">Probably
                                        <input type="radio" name="question_3" value="Probably" class="required"
                                            onchange="getVals(this, 'question_3');">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label class="container_radio version_2">100% Sure
                                        <input type="radio" name="question_3" value="100% Sure" class="required"
                                            onchange="getVals(this, 'question_3');">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>In no, please describe with few words why</label>
                                    <textarea name="additional_message" class="form-control" style="height:100px;"
                                        placeholder="Type here additional info..."
                                        onkeyup="getVals(this, 'additional_message');"></textarea>
                                </div>
                            </div>
                            <!-- /step-->
                            <div class="submit step">
                                <h3 class="main_question"><strong>5/5</strong>Summary</h3>
                                <div class="summary">
                                    <ul>
                                        <li><strong>1</strong>
                                            <h5>How do rate your overall satisfaction about the service provided?</h5>
                                            <p id="question_1"></p>
                                        </li>
                                        <li><strong>2</strong>
                                            <h5>How did you hear about our company?</h5>
                                            <p id="question_2"></p>
                                        </li>
                                        <li><strong>3</strong>
                                            <h5>Do you think to suggest our company to a friend or parent?</h5>
                                            <p id="question_3"></p>
                                            <p id="additional_message"></p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /step-->
                        </div>
                        <!-- /middle-wizard -->
                        <div id="bottom-wizard">
                            <button type="button" name="backward" class="backward">Prev</button>
                            <button type="button" name="forward" class="forward">Next</button>
                            <button type="submit" name="process" class="submit">Submit</button>
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
