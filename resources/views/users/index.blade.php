@extends('layouts.app')
@section('title', 'Usuarios')
@section('tittle', 'Usuarios')
@section('content')
	<div class="card toggle-card mt-5 border" id="cardUserRegist">
        <h5 class="card-header bg-light"> Registro de Usuarios</h5>
        <div class="card-body p-5">
            @if (session('status_success'))
                <div class="alert alert-success" role="alert">
                    {{session('status_success')}}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul>
                      @foreach($errors->all() as $error)
                      <li>{{$error}}</li>
                      @endforeach
                    </ul>
                </div>
            @endif 
            <form method="POST" action="{{ route('register') }}">
              @csrf
              <div class="row d-flex justify-content-center">
                <div class="col-5">
                  <input id="nombres" type="text" class="form-control @error('nombres') is-invalid @enderror" placeholder="nombres" name="nombres" value="{{ old('nombres') }}" required autocomplete="nombres" autofocus>
                   @error('nombres')
	                   <span class="invalid-feedback" role="alert">
	                   		<strong>{{ $message }}</strong>
	                   </span>
	               @enderror
                </div>
                <div class="col-5">
                  <select id="rol" class="form-control @error('rol') is-invalid @enderror" name="rol" value="{{ old('rol') }}" required autofocus>
                  	@error('rol')
	                   <span class="invalid-feedback" role="alert">
	                   		<strong>{{ $message }}</strong>
	                   </span>
	                @enderror
                    <option value="1">admin</option>
                  </select>
                </div>
              </div>
              <div class="row mt-5 d-flex justify-content-center">
                <div class="col-5">
                  <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" placeholder="Apellidos" name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus>
                  	@error('apellidos')
	                   <span class="invalid-feedback" role="alert">
	                   		<strong>{{ $message }}</strong>
	                   </span>
	                  @enderror
                </div>
                <div class="col-5">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Correo" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                       <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                       </span>
                    @enderror
                </div>
              </div>
              <div class="row mt-5 d-flex justify-content-center">
                <div class="col-5">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
                  	@error('password')
	                   <span class="invalid-feedback" role="alert">
	                   		<strong>{{ $message }}</strong>
	                   </span>
	                @enderror
                </div>
                <div class="col-5">
                  
                </div>
              </div>
              <div class="row mt-5 d-flex justify-content-center">
                <div class="col-5">
                  <input id="password-confirm" type="password" class="form-control" placeholder="Confirmar Password" name="password_confirmation" required autocomplete="new-password">
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
                <tr>
                    <td>1</td>
                    <td>Carlos Jose</td>
                    <td>Chavarria Dominguez</td>
                    <td>cjdominguez91@gmail.com</td>
                    <td>superadmin</td>
                    <td colspan="3">
                      <button type="button" class="btn btn-primary mx-2" data-toggle="tooltip" data-placement="top" title="Ver Registro"><i class="fas fa-eye"></i></button>
                      <button type="button" class="btn btn-warning text-light mx-2" data-toggle="tooltip" data-placement="top" title="Modificar Registro"><i class="fas fa-pen-square"></i></button>
                      <button type="button" class="btn btn-danger mx-2" data-toggle="tooltip" data-placement="top" title="Eliminar/Inactivar"><i class="fas fa-times-circle"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Carlos Jose</td>
                    <td>Chavarria Dominguez</td>
                    <td>cjdominguez91@gmail.com</td>
                    <td>superadmin</td>
                    <td colspan="3">
                      <button type="button" class="btn btn-primary mx-2" data-toggle="tooltip" data-placement="top" title="Ver Registro"><i class="fas fa-eye"></i></button>
                      <button type="button" class="btn btn-warning text-light mx-2" data-toggle="tooltip" data-placement="top" title="Modificar Registro"><i class="fas fa-pen-square"></i></button>
                      <button type="button" class="btn btn-danger mx-2" data-toggle="tooltip" data-placement="top" title="Eliminar/Inactivar"><i class="fas fa-times-circle"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Carlos Jose</td>
                    <td>Chavarria Dominguez</td>
                    <td>cjdominguez91@gmail.com</td>
                    <td>superadmin</td>
                    <td colspan="3">
                      <button type="button" class="btn btn-primary mx-2" data-toggle="tooltip" data-placement="top" title="Ver Registro"><i class="fas fa-eye"></i></button>
                      <button type="button" class="btn btn-warning text-light mx-2" data-toggle="tooltip" data-placement="top" title="Modificar Registro"><i class="fas fa-pen-square"></i></button>
                      <button type="button" class="btn btn-danger mx-2" data-toggle="tooltip" data-placement="top" title="Eliminar/Inactivar"><i class="fas fa-times-circle"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Carlos Jose</td>
                    <td>Chavarria Dominguez</td>
                    <td>cjdominguez91@gmail.com</td>
                    <td>superadmin</td>
                    <td colspan="3">
                      <button type="button" class="btn btn-primary mx-2" data-toggle="tooltip" data-placement="top" title="Ver Registro"><i class="fas fa-eye"></i></button>
                      <button type="button" class="btn btn-warning text-light mx-2" data-toggle="tooltip" data-placement="top" title="Modificar Registro"><i class="fas fa-pen-square"></i></button>
                      <button type="button" class="btn btn-danger mx-2" data-toggle="tooltip" data-placement="top" title="Eliminar/Inactivar"><i class="fas fa-times-circle"></i></button>
                    </td>
                </tr>
            </tbody>    
        </table>
    </div> 
@endsection