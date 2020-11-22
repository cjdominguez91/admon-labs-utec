<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Carrera</title>
	
	
	

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/ae386035b2.js" crossorigin="anonymous"></script>
    <!-- Google ICONS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header text-center">
                <h3>UTEC</h3>
            </div>
            <div class="user-info text-center">
                <img src="img/user.png" class="img user-img" alt="user-image"><br>
                <b><span>Carlos Chavarria</span></b><br>
                <span>superadmin</span>
            </div>
            <ul class="list-unstyled components">
                <p class="text-center">Menu principal</p>
                <li>
                    <a href="#"><i class="fas fa-home ml-3"></i> Home</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-users ml-3"></i> Usuarios</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-network-wired ml-3"></i> Laboratorios</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-book-reader ml-3"></i> Materias</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-calendar-alt ml-3"></i> Horarios</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-folder-open ml-3"></i> Practicas Libres</a>
                </li>
                <li>
                    <a href="#"><i class="fas fa-chart-pie ml-3"></i> Reportes</a>
                </li>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i
                            class="fas fa-list ml-3"></i> List</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">List Item 1</a>
                        </li>
                        <li>
                            <a href="#">List Item 2</a>
                        </li>
                        <li>
                            <a href="#">List Item 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fas fa-sign-out-alt ml-3"></i> Cerrar Sesion</a>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar fixed-top">
                <a class="navbar-brand ml-4" href="#"><img src="img/utec_brand.png" alt="" width="225"></a>
                <button type="button" id="sidebarCollapse" class="btn btn-outline-light mr-3">
                    <i class="fas fa-align-justify"></i>
                </button>
            </nav>
            <!-- Inicio del Container-->
            <div class="container-fluid">
                <!-- Inicio del Titulo de cada agina -->
                <div class="row mt-5">
                    <div class="col">
                        <h2 class="m-0 p-0">Carrera</h2>
                    </div>
                    <div class="col-1 d-flex justify-content-center align-items-end"><a class="m-0 p-0 text-secondary"
                            href="#"><span class="material-icons">home</span></a></div>
                </div>
                <hr>
                <!-- Fin del Titulo -->
                <!-- Inicio del main -->
                <div class="card toggle-card mt-5 border" id="cardUserRegist">
                    <h5 class="card-header bg-light"> Registro de Carrera</h5>
                    <div class="card-body p-5">
                        <form>
                            <div class="row d-flex justify-content-center">
                                <div class="col-5">
                                    <input type="text" class="form-control exampleInputEmail1" placeholder="Carrera"
                                        id="exampleInputEmail1">
                                </div>
                                <div class="col-5">
                                    <select class="form-control" name="" id="">
                                        <option value="">Facultad</option>
                                        <option value="">Ciencia Aplicada</option>
                                    </select>
                                </div>

                            </div>
                            <div class="row mt-4">
                                <div class="col-5">
                                    <input type="button" class="btn btn-info" value="Guardar">
                                    <input type="button" class="btn btn-danger ml-2" id="btnCancelRegUser"
                                        value="Cancelar">
                                </div>
                                <div class="col-5">

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row my-5">
                    <button class="btn btn-dark ml-auto d-flex align-items-end" id="btnAgregarUser">
                        Agregar Nuevo Carrera <span class="material-icons m-0 p-0"> add_circle_outline </span>
                    </button>

                    <table class="table text-center table-sm table-striped table-bordered mt-1 table-hover">
                        <thead class="text-light">
                            <th>id</th>
                            <th>Software</th>
                            <th colspan="3">Acciones</th>
                        </thead>
                        <tbody>

                            <tr>
                                <td>1</td>
                                <td>Visual Studio</td>
                                <td colspan="3"><button class="btn btn-sm btn-primary mx-1">Ver</button><button
                                        class="btn btn-sm btn-warning mx-1">Editar</button><button
                                        class="btn btn-sm btn-danger mx-1">Inactivar</button></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Android Studio</td>
                                <td colspan="3"><button class="btn btn-sm btn-primary mx-1">Ver</button><button
                                        class="btn btn-sm btn-warning mx-1">Editar</button><button
                                        class="btn btn-sm btn-danger mx-1">Inactivar</button></td>
                            </tr>


                        </tbody>
                    </table>
                </div>
                <!-- fin del main -->
            </div>
            <!-- fin del container -->
            <footer class="text-light">
                Copyright © 2020 Universidad Tecnológica de El Salvador - UTEC - San Salvador, El Salvador, C.A.
            </footer>
        </div>
    </div>

    <div class="overlay"></div>



		
		
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });
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
        $('#btnAgregarUser').click(function () {
            $('#cardUserRegist').toggle('slow');
        });
        $('#btnCancelRegUser').click(function () {
            $('#cardUserRegist').toggle('slow');
        });
    </script>
</body>

</html>