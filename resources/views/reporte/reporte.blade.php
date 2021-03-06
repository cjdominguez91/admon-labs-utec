@extends ('layouts.app')
@section ('h2',"Reportes")
@section ('content')

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

                <form class="form-horizontal" method="POST" action="../reporte/reporte_aceptar">
                    {{Form::token()}}
                    <br>

                    <div class="form-group row">
                        <label class="control-label col-md-3" align="right">Reporte:</label>
                        <div class="col-md-6">
                            <select class="form-control" id="reporte" name="reporte">

                                <option value="1">CARRERAS CON MAS PRACTICAS LIBRES</option>
                                <option value="2">HORARIOS  MÁS FRECUENTADOS</option>
                                <option value="3">LABORATORIOS  MÁS VISITADOS</option>

                            </select>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3" align="right">Fecha Inicio</label>
                        <div class="col-md-6">
                            <input class="form-control" name="fecha_inicio" type="date" required="true" autofocus="true">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="control-label col-md-3" align="right">Fecha Fin</label>
                        <div class="col-md-6">
                            <input class="form-control" name="fecha_fin" type="date" autofocus="true">
                        </div>
                    </div>








                    <div class="form-group" align="center">
                        <button type="submit" class="btn btn-success">Generar Reporte</button>

                    </div>

                </form>


            </div>

        </div>
    </div>
    
    
    




</div>
@endsection