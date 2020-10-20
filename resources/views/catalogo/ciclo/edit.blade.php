@extends ('sidebar.superadmin')
@section ('TituloVista' , 'Editar Ciclo')
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
                {!!Form::model($ciclo,['method'=>'PATCH','route'=>['ciclo.update',$ciclo->id]])!!}
                {{Form::token()}}
                <form class="form-horizontal">
                    <br>
                    <div class="form-group row">
                        <label class="control-label col-md-3" align="right">Año:</label>
                        <div class="col-md-6">
                            <input id="año" type="text" class="form-control @error('año') is-invalid @enderror" name="año" value="{{ $ciclo->año }}" required autocomplete="año" autofocus>
                               @error('año')
                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="control-label col-md-3" align="right">Ciclo:</label>
                        <div class="col-md-6">
                            <input id="nciclo" type="number" class="form-control @error('nciclo') is-invalid @enderror" name="nciclo" value="{{ $ciclo->nciclo }}" required autocomplete="nciclo" autofocus>
                               @error('nciclo')
                                   <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                   </span>
                               @enderror
                        </div>
                    </div>
                    <div class="form-group" align="center">
                        <button type="submit" class="btn btn-success">Aceptar</button>
                        <a href="{{url('catalogo/ciclo')}}"><button type="button"
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