@extends ('sidebar.superadmin')
@section ('TituloVista' ,ucfirst(trans($user->nombres))." ".ucfirst(trans($user->apellidos)) )
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
                <br />
                <form class="form-horizontal">
                  @csrf
                  <div class="row  d-flex justify-content-center">
                    <img src="../../img/{{$user->avatar}}" class="img user-img" alt="user-image"><br>
                  </div>
                 <div class="row d-flex justify-content-center">
                  <div class="col-md-5 col-sm-12 mt-4">
                    <label for="nombres">Nombres: </label>
                    <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" value="{{ $user->nombres }}" required autocomplete="nombres" autofocus disabled>
                     @error('nombres')
                         <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                         </span>
                     @enderror
                  </div>
                  <div class="col-md-5 col-sm-12 mt-4">
                    <label for="nombres">Apellidos: </label>
                    <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" placeholder="Apellidos" name="apellidos" value="{{ $user->apellidos }}" required autocomplete="apellidos" autofocus disabled>
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
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Correo" value="{{ $user->email }}" required autocomplete="email" disabled>
                      @error('email')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                         </span>
                      @enderror
                  </div>
                  <div class="col-md-5 col-sm-12 mt-4">
                    <label for="nombres">Rol: </label>
                    <input id="rol" type="rol" class="form-control @error('rol') is-invalid @enderror" name="rol" placeholder="Correo" @foreach($user->usersRoles as $rol)  value="{{ $rol->name }}" @endforeach required autocomplete="rol" disabled>
                    @error('rol')
                         <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                         </span>
                      @enderror
                  </div>
                </div>

                <div class="row d-flex justify-content-center">
                  <div class="col-md-5 col-sm-12 mt-4">
                    <label for="nombres">Estatus: </label>
                    <input id="estatus" type="estatus" class="form-control @error('estatus') is-invalid @enderror" name="estatus" placeholder="Estatus" value="{{ $user->estatus }}" required autocomplete="estatus" disabled>
                      @error('estatus')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                         </span>
                      @enderror
                  </div>
                  <div class="col-md-5 col-sm-12 mt-4">
                    <label for="nombres">Fecha Alta: </label>
                    <input id="rol" type="fecha_alta" class="form-control @error('fecha_alta') is-invalid @enderror" name="fecha_alta" placeholder="Correo" value="{{ $user->created_at }}" required autocomplete="fecha_alta" disabled>
                    @error('fecha_alta')
                         <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                         </span>
                      @enderror
                  </div>
                </div>

                <div class="row d-flex justify-content-center">
                  <div class="col-md-5 col-sm-12 mt-4">
                    <label for="nombres">Fecha Baja: </label>
                    <input id="fecha_baja" type="fecha_baja" class="form-control @error('fecha_baja') is-invalid @enderror" name="fecha_baja" placeholder="--" value="{{ $user->fecha_baja }}" required autocomplete="fecha_baja" disabled>
                      @error('fecha_baja')
                         <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                         </span>
                      @enderror
                  </div>
                  <div class="col-md-5 col-sm-12 mt-4">
                  </div>
                </div>


                <div class="row d-flex justify-content-center mt-5" align="center">
                  <div class="col-12">
                    <a href="{{URL::action('catalogo\UserController@edit',$user->id)}}"><button type="button"
                                class="btn btn-warning">Editar</button></a>
                    <a href="{{url('catalogo/user')}}"><button type="button"
                            class="btn btn-danger ml-2">Cancelar</button></a>
                  </div>
                </div>

                </form>
                {!!Form::close()!!}


            </div>
            @include('sweet::alert')
        </div>
    </div>
</div>
@endsection