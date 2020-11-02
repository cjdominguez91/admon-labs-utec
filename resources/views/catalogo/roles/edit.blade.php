@extends ('layouts.app')
@section ('h2',"Editar Rol ")
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

            {!!Form::model($roles,['method'=>'PATCH','route'=>['roles.update',$roles->id]])!!}
            {{Form::token()}}

            <form class="form-horizontal">
                <br>

                <div class="form-group row">
                    <label class="control-label col-md-3" align="right">Nombre</label>
                    <div class="col-md-6">
                        <input class="form-control" name="name" type="text" value="{{$roles->name}}" onblur="this.value = this.value.toUpperCase();">
                    </div>
                </div>


                <div class="form-group" align="center">
                    <button class="btn btn-success" type="submit">Guardar</button>
                    <a href="{{url('catalogo/roles')}}"><button type="button" class="btn btn-primary">Cancelar</button></a>
                </div>

            </form>

            {!!Form::close()!!}


            <form action="../../rol/add_permiso" method="POST">
                {{Form::token()}}

                <div class="col-md-3 col-sm-12 col-xs-12"></div>

                <div class="form-group">
                    <div class="col-md-2 col-sm-12 col-xs-12">
                    </div>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="hidden" id="role" name="id" value="{{$roles->id}}">
                            <select name="Permission" class="form-control select2">
                                @foreach ($Permission as $obj)
                                <option value="{{$obj->id}}">{{$obj->name}}</option>
                                @endforeach
                            </select>
                            <span class="input-group-btn">

                                <input type="submit" value="Agregar Permission" class="btn btn-primary">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="divider-dashed"></div>

                <div class="form-group">
                    <table id="datatable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Permiso</th>
                                <th><i class="fa fa-trash fa-lg"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($permisos_actuales as $obj) {
                            ?>
                                <tr>
                                    <td align="center">{{ $i}}</td>
                                    <td align="center">{{ $obj->name}}</td>
                                    <td>

                                        <i class="fa fa-trash fa-2x" onclick="modal(document.getElementById('role').value,
                                                <?php echo $obj->id; ?>)"></i>
                                    </td>
                                </tr>
                            <?php
                                $i++;
                            }
                            ?>

                        </tbody>
                    </table>
                </div>



            </form>






            <!-- Modal eliminar permiso -->
            <div class="modal fade" id="modal_borrar_permiso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-tipo="1">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form action="../delete_permiso" method="POST">
                            <div class="modal-header">
                                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                                    <h5 class="modal-title" id="exampleModalLabel">Eliminar</h5>
                                </div>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <input type="hidden" id="role_actual" name="role">
                            <input type="hidden" id="Permission" name="Permission">
                            <div class="modal-body">
                                <div class="box-body">
                                    {{Form::token()}}
                                    ¿Desea eliminar el archivo?
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Aceptar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>
        @include('sweet::alert')
    </div>





    <!-- jQuery -->
    <script src="{{asset('js/jquery.min.js')}}"></script>



    <script type="text/javascript">
        function modal(rol,permiso) {
        

            document.getElementById('role_actual').value = rol;
            document.getElementById('Permission').value = permiso;
            $('#modal_borrar_permiso').modal('show');
        }
    </script>

</div>
@endsection