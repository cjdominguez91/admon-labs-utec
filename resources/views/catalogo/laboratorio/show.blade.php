@extends ('layouts.app')
@section ('h2', $laboratorio->nombre)
@section ('content')
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
                    <br>
                    <div class="form-group row">
                        <label class="control-label col-md-3" align="right">Nombre:</label>
                        <div class="col-md-6">
                            <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{$laboratorio->nombre}}" required autocomplete="nombre" autofocus disabled>
                               @error('nombre')
                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3" align="right">Ubicacion:</label>
                        <div class="col-md-6">
                            <input id="ubicacion" type="text" class="form-control @error('ubicacion') is-invalid @enderror" name="ubicacion" value="{{$laboratorio->ubicacion}}" required autocomplete="ubicacion" autofocus disabled>
                               @error('ubicacion')
                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3" align="right">Encargado:</label>
                        <div class="col-md-6">
                            <input id="encargado" type="text" class="form-control @error('encargado') is-invalid @enderror" name="encargado" value="{{$laboratorio->user->nombres." ".$laboratorio->user->apellidos}}" required autocomplete="encargado" autofocus disabled>
                               @error('encargado')
                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                        </div>
                    </div>
                    <div class="form-group" align="center">
                        <a href="{{URL::action('catalogo\LaboratorioController@edit',$laboratorio->id)}}"><button type="button"
                                class="btn btn-warning">Editar</button></a>
                        <a href="{{url('catalogo/laboratorio')}}"><button type="button"
                                class="btn btn-primary">Cancelar</button></a>
                    </div>

                </form>
                {!!Form::close()!!}


            </div>
            @include('sweet::alert')
        </div>
    </div>
</div>
@endsection