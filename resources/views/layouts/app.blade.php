   <!doctype html>
   <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

  <head>


	

  
	
	
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
     <link href="{{ asset('css/style.css') }}" rel="stylesheet">
     <script src="{{ asset(mix('js/app.js')) }}"></script>

     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">
     <!-- Google ICONS -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
     <!-- Font Awesome JS -->
    <script src="https://kit.fontawesome.com/ae386035b2.js" crossorigin="anonymous"></script> 
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">
</head>
<body>





    <div class="wrapper">
        <!-- Sidebar  -->
        @if (Route::has('login'))
                @auth
                    @foreach(auth()->user()->usersRoles as $rol)
                        @if($rol->name == 'super admin')
                            @include('../sidebar/superadmin')
                        @elseif($rol->name == 'administrador')
                            @include('../sidebar/admin')
                        @endif
                    @endforeach
                @endauth
        @endif
        <!-- Page Content  -->

        <div id="content">
            <nav class="navbar fixed-top">
                <a class="navbar-brand ml-4" href="{{route('home')}}"><img src="{{asset('img/utec_brand.png')}}" alt="" width="225"></a>
                @if (Route::has('login'))
                    @auth
                        <button type="button" id="sidebarCollapse" class="btn btn-outline-light mr-3">
                            <i class="fas fa-align-justify"></i>
                        </button>
                    @endauth
                @endif  
            </nav>
            <!-- Inicio del Container-->
            <div class="container-fluid">
                <!-- Inicio del Titulo de cada agina -->
                <div class="row">
                    <div class="col"><h3 class="m-0 p-0 mt-4">@yield('h2')</h3></div>
                    <div class="col-1 d-flex justify-content-center align-items-end"><a class="m-0 p-0 text-secondary" href="{{url('/home')}}"><span class="material-icons">home</span></a></div>
                </div>
                <hr>
                <!-- Fin del Titulo -->
                <!-- Inicio del main -->
                @yield('content')
                <!-- fin del main --> 
            </div>
           <!-- fin del container --> 
           @include('footer')
        </div>
    </div>

    <div class="overlay"></div>
	

	

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

    

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
                $(".container-fluid").css("margin-top", "125px");
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
                $('.navbar').removeClass('fixed-top');
                $(".container-fluid").css("margin-top", "32px");
            });
            $('#btnAgregarUser').click( function(){
                $('#cardUserRegist').toggle('slow');
            });
            $('#btnCancelRegUser').click( function(){
                $('#cardUserRegist').toggle('slow');
            });

            $(function(){
            //Scrolling
            var obj = $(document);          //objeto sobre el que quiero detectar scroll
            var obj_top = obj.scrollTop()   //scroll vertical inicial del objeto
            obj.scroll(function(){
                var obj_act_top = $(this).scrollTop();  //obtener scroll top instantaneo
                if(obj_act_top > obj_top){
                    //scroll hacia abajo
                    $('.navbar').attr('hidden', true);
                }else{
                    //scroll hacia arriba
                    $('.navbar').removeAttr('hidden');
                }
                obj_top = obj_act_top;                  //almacenar scroll top anterior
                });
            });
    </script>
    
</body>
</html>
