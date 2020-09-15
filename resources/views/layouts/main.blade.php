<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
     <link href="{{ asset('css/style.css') }}" rel="stylesheet">
     <script src="{{ asset(mix('js/app.js')) }}"></script>
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
     <!-- Google ICONS -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/ae386035b2.js" crossorigin="anonymous"></script>   
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        @include('../sidebar/superadmin')

        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar fixed-top" hidden>
                <a class="navbar-brand ml-4" href="#"><img src="img/utec_brand.png" alt="" width="225"></a>
                <button type="button" id="sidebarCollapse" class="btn btn-outline-light mr-3">
                    <i class="fas fa-align-justify"></i>
                </button>
            </nav>
            <div class="jumbotron-fluid d-flex justify-content-between align-items-start">
                <a class="navbar-brand ml-4" href="#"><img src="img/utec_brand.png" alt="" width="225"></a>
                <button type="button" id="sidebarCollapse2" class="btn btn-outline-light mt-2 mr-3">
                    <i class="fas fa-align-justify"></i>
                </button>
            </div>
            <!-- Inicio del Container-->
            <div class="container-fluid mt-0">
                <!-- Inicio del Titulo de cada agina -->
                <div class="row mt-4">
                    <div class="col"><h2 class="m-0 p-0">Laboratorios de informática UTEC</h2></div>
                </div>
                <hr>
                <!-- Fin del Titulo -->
                <!-- Inicio del main -->
                <div>
                  <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-labs-tab" data-toggle="tab" href="#nav-labs" role="tab" aria-controls="nav-labs" aria-selected="true">Laboratorios</a>
                    <a class="nav-item nav-link" id="nav-schedules-tab" data-toggle="tab" href="#nav-schedules" role="tab" aria-controls="nav-schedules-tab" aria-selected="false">Horarios</a>
                  </div>
                </div>
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-labs" role="tabpanel" aria-labelledby="nav-labs-tab">
                    <div class="row d-flex align-items-end">
                        <div class="col-2">
                            <h5 class="mt-4">Filtros:</h5>
                        </div>
                        <div class="col-1 mb-1 text-secondary">
                            <span class="material-icons">filter_alt</span>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-3 col-sm-12">
                            <select class="form-control" name="" id="">
                                <option value="">Seleccionar Edificio</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <select class="form-control" name="" id="">
                                <option value="">Seleccionar Dia</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <select class="form-control" name="" id="">
                                <option value="">Seleccionar Horario</option>
                            </select>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <input type="text" class="form-control" name="" placeholder="Software">
                        </div>
                    </div>
                      <div class="row">
                        <div class="col-md-3 col-sm-12 mt-5">
                            <div class="card">
                              <img src="img/card.png" class="card-img-top" alt="...">
                              <div class="card-body card-body-labs">
                                <h5 class="card-title">Laboratorio 2</h5>
                                <p class="card-text">Edificio Simon Bolivar.</p>
                                <a href="#" class="btn btn btn-outline-light">Ver información</a>
                              </div>
                            </div>
                        </div>
                        <div class="col-3 mt-5">
                            <div class="card">
                              <img src="img/card.png" class="card-img-top" alt="...">
                              <div class="card-body card-body-labs">
                                <h5 class="card-title">Laboratorio 2</h5>
                                <p class="card-text">Edificio Simon Bolivar.</p>
                                <a href="#" class="btn btn btn-outline-light">Ver información</a>
                              </div>
                            </div>
                        </div>
                        <div class="col-3 mt-5">
                            <div class="card">
                              <img src="img/card.png" class="card-img-top" alt="...">
                              <div class="card-body card-body-labs">
                                <h5 class="card-title">Laboratorio 2</h5>
                                <p class="card-text">Edificio Simon Bolivar.</p>
                                <a href="#" class="btn btn btn-outline-light">Ver información</a>
                              </div>
                            </div>
                        </div>
                        <div class="col-3 mt-5">
                            <div class="card">
                              <img src="img/card.png" class="card-img-top" alt="...">
                              <div class="card-body card-body-labs">
                                <h5 class="card-title">Laboratorio 2</h5>
                                <p class="card-text">Edificio Simon Bolivar.</p>
                                <a href="#" class="btn btn btn-outline-light">Ver información</a>
                              </div>
                            </div>
                        </div>
                        <div class="col-3 mt-5">
                            <div class="card">
                              <img src="img/card.png" class="card-img-top" alt="...">
                              <div class="card-body card-body-labs">
                                <h5 class="card-title">Laboratorio 2</h5>
                                <p class="card-text">Edificio Simon Bolivar.</p>
                                <a href="#" class="btn btn btn-outline-light">Ver información</a>
                              </div>
                            </div>
                        </div>
                        <div class="col-3 mt-5">
                            <div class="card">
                              <img src="img/card.png" class="card-img-top" alt="...">
                              <div class="card-body card-body-labs">
                                <h5 class="card-title">Laboratorio 2</h5>
                                <p class="card-text">Edificio Simon Bolivar.</p>
                                <a href="#" class="btn btn btn-outline-light">Ver información</a>
                              </div>
                            </div>
                        </div>
                        <div class="col-3 mt-5">
                            <div class="card">
                              <img src="img/card.png" class="card-img-top" alt="...">
                              <div class="card-body card-body-labs">
                                <h5 class="card-title">Laboratorio 2</h5>
                                <p class="card-text">Edificio Simon Bolivar.</p>
                                <a href="#" class="btn btn btn-outline-light">Ver información</a>
                              </div>
                            </div>
                        </div>
                        <div class="col-3 mt-5">
                            <div class="card">
                              <img src="img/card.png" class="card-img-top" alt="...">
                              <div class="card-body card-body-labs">
                                <h5 class="card-title">Laboratorio 2</h5>
                                <p class="card-text">Edificio Simon Bolivar.</p>
                                <a href="#" class="btn btn btn-outline-light">Ver información</a>
                              </div>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="tab-pane fade" id="nav-schedules" role="tabpanel" aria-labelledby="nav-schedules-tab">...</div>
                </div>
                <!-- fin del main --> 
            </div>
           <!-- fin del container --> 
           @include('footer')
        </div>
    </div>

    <div class="overlay"></div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
                $('.navbar').addClass('fixed-top');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                $('.navbar').removeClass('fixed-top');
            });
            $('#sidebarCollapse2').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                $('.navbar').removeClass('fixed-top');
            });

            $(function(){
            //Scrolling
            var obj = $(document);          //objeto sobre el que quiero detectar scroll
            var obj_top = obj.scrollTop()   //scroll vertical inicial del objeto
            obj.scroll(function(){
                var obj_act_top = $(this).scrollTop();  //obtener scroll top instantaneo
                if(obj_act_top > obj_top){
                    //scroll hacia abajo
                    
                    
                    $('.navbar').removeAttr('hidden');
                }else{
                    //scroll hacia arriba
                    
                    $('.navbar').attr('hidden', true);
                }
                obj_top = obj_act_top;                  //almacenar scroll top anterior
                });
            });
        });
    </script>
</body>

</html>