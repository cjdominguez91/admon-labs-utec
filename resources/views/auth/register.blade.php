@extends('layouts.app')
@section('tit,le', 'Usuarios')
@section('tittle', 'Usuarios' )
@section('content')
<div class="card toggle-card mt-5 border" id="cardUserRegist">
    <h5 class="card-header bg-light"> Registro de Usuarios</h5>
    <div class="card-body p-5"> 
        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="row d-flex justify-content-center">
            <div class="col-5">
              <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" placeholder="Nombres" name="nombres" value="{{ old('nombres') }}" required autocomplete="nombres" autofocus>
              @error('nombres')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-5">
              <select id="rol" class="form-control" name="rol"  autocomplete="rol" autofocus>
                <option value="">Rol</option>
              </select>
            </div>
          </div>
          <div class="row mt-5 d-flex justify-content-center">
            <div class="col-5">
              <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" placeholder="Apellidos" name="apellidos" value="{{ old('nombres') }}" required autocomplete="apellidos" autofocus>
              @error('apellidos')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
            <div class="col-5">
              <select id="laboratorio" class="form-control" name="laboratorio"  autocomplete="laboratorio" autofocus>
                <option value="">laboratorio</option>
              </select>
            </div>
          </div>
          <div class="row mt-5 d-flex justify-content-center">
            <div class="col-5">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-5">
               <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Correo" name="email" value="{{ old('email') }}" required autocomplete="email">
              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror     
            </div>
          </div>
          <div class="row mt-5 d-flex justify-content-center">
            <div class="col-5">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirme su password" required autocomplete="new-password">
            </div>
            <div class="col-5">
                 
            </div>
          </div>
           <div class="row mt-5 d-flex justify-content-center">
            <div class="col-5">
              <input type="submit" class="btn btn-info" value="Guardar">
              <input type="button" class="btn btn-danger ml-2" id="btnCancelRegUser" value="Cancelar">
            </div>
            <div class="col-5">
                    
            </div>
          </div>
        </form>
    </div>
  </div>
    <div class="row my-5">
    <button class="btn btn-dark ml-auto d-flex align-items-end" id="btnAgregarUser">
        Agregar Nuevo Usuario <span class="material-icons m-0 p-0"> add_circle_outline </span>
    </button>
    <table class="table text-center table-sm table-striped table-bordered mt-1 table-hover">    
        <thead class="text-light">  
            <th>id</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Rol</th>
            <th colspan="3">Acciones</th>
        </thead>    
        <tbody> 
         
        
        </tbody>    
    </table>
</div>  
@endsection
