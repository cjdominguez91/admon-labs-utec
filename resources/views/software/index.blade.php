@extends('layouts.app')
@section('title', 'Software')
@section('tittle', 'Software')
@section('content')
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
	<div class="card toggle-card mt-5 border" id="cardUserRegist">
    <h5 class="card-header bg-light"> Registro de Usuarios</h5>
    <div class="card-body p-5"> 
        <form method="POST" action="/software">
          @csrf
          <div class="row d-flex justify-content-center">
            <div class="col-5">
              <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>
              @error('nombre')
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
            <th>Nombre</th>
            <th colspan="3">Acciones</th>
        </thead>    
        <tbody> 
        	@foreach($softwares as $software)
        			<tr>
        				<td>{{$software['id']}}</td>
        				<td>{{$software['nombre']}}</td>
        				<td colspan="3"><button class="btn btn-sm btn-primary mx-1">Ver</button><button class="btn btn-sm btn-warning mx-1">Editar</button><button class="btn btn-sm btn-danger mx-1">Inactivar</button></td>
        			</tr>
        	@endforeach
        </tbody>    
    </table>
    {{$softwares->links()}}
</div>  
@endsection