@extends ('sidebar.superadmin')
@section ('TituloVista' , 'Registro de Usuarios')
@section ('contenido')
<script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>
<div class="x_panel">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-horizontal form-label-left">
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="x_content">

            <form method="POST" action="{{ route('register') }}">
              @csrf
                 <div class="row d-flex justify-content-center">
                <div class="col-md-5 col-sm-12 mt-4">
                  <label for="nombres">Nombres: </label>
                  <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" value="{{ old('nombres') }}" required autocomplete="nombres" autofocus>
                   @error('nombres')
                       <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                       </span>
                   @enderror
                </div>
                <div class="col-md-5 col-sm-12 mt-4">
                  <label for="nombres">Apellidos: </label>
                  <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" placeholder="Apellidos" name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus>
                    @error('apellidos')
                       <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                       </span>
                      @enderror
                </div>             
              </div>
              <div class="row d-flex justify-content-center">
                <div class="col-md-5 col-sm-12 mt-4">
                  <label for="nombres">Correo: </label>
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Correo" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                       <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                       </span>
                    @enderror
                </div>
                <div class="col-md-5 col-sm-12 mt-4">
                  <label for="nombres">Rol: </label>
                  <select id="rol" class="form-control @error('rol') is-invalid @enderror" name="rol" value="{{ old('rol') }}" required autofocus>
                    @foreach($roles as $rol)
                        <option value="{{$rol->name}}">{{$rol->name}}</option>
                    @endforeach
                  </select>
                  @error('rol')
                       <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                       </span>
                    @enderror
                </div>
              </div>
              <div class="row d-flex justify-content-center mt-4" align="center">
                <div class="col-12">
                  <input type="submit" class="btn btn-info" value="Guardar">
                  <a href="{{url('catalogo/user')}}"><button type="button"
                                class="btn btn-danger ml-2">Cancelar</button></a>
                </div>
              </div>

            </form>

            </div>
            @include('sweet::alert')
        </div>
    </div>
</div>
@endsection