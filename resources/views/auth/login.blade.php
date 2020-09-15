<!DOCTYPE html>
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
     <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <div class="login-container d-flex justify-content-center align-items-center bg-light">
        <div class="login-form text-center">
            <form method="POST" action="{{ route('login') }}">
            @csrf
                <h5 class="login-tittle">Administracion de Laboratorios</h5>
                <div class="input-group mt-5">
                    <input id="email" type="email" placeholder="Correo" class="custom-input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus><span class="material-icons text-secondary">email</span>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="input-group mt-5">
                    <input id="password" type="password" placeholder="Password" class="custom-input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"><span class="material-icons text-secondary">vpn_key</span>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                    <input type="submit" class="btn-login mt-5" value="Iniciar Sesion"><br><br>
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">¿Recuperar Contraseña?</a>
                    @endif
            </form>
        </div>
    </div>
    <!-- Librerias -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script><script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script type="text/javascript">

        $(document).ready(function(){
              var height = $(window).height();
              $('.login-container').height(height);
              $( ".login-form" ).animate({
                  height: "toggle",
                  opacity: "toggle"
                }, "slow" );
        });

    </script>
</body>
</html>

