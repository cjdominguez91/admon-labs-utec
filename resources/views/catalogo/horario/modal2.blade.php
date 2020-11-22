<!-- Modal Modificar Usuario*********************************************************-->
<div class="modal fade" id="modalInfoLab" tabindex="-1" role="dialog" aria-labelledby="myModalAdminUsu">
  <div style="width: 30%;" class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalAdminUsu">Información Laboratorio</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        
      </div>
      <div class="modal-body">

        <form method="POST" action="infoLab" accept-charset="UTF-8" enctype="multipart/form-data">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">

          <input type="text" hidden name="id" value="{{$id_lab}}" id="id_lab">

          Selecciona imagen de laboratorio:<br>
          <input type="file" name="file" class="btn btn-outline-secondary btn-block"><br>

          Digita cantidad de equipos en laboratorio:<br>
          <input type="number" name="equipos" min="0" class="form-control" value="{{$cant_lab}}">

          <input type="submit" class="btn btn-info btn-block" value="Guardar Cambios">
        </form>

        <hr>

        <br>Agrega softwares de Laboratorios:
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <select class="form-control" id="listSoftware" name="listSoftware" required>
          @foreach($software as $obj)
            <option value="{{$obj->id}}">{{$obj->nombre}}</option>
          @endforeach
        </select>
        <button class="btn btn-outline-primary btn-block" id="AgregarSoft">
            +Agregar Software
        </button> 

        <label id="respuesta" name="respuesta" >

          @foreach($lab_soft->softwares as $obj)
                  {{$obj->nombre}}
                  <a href="#" onclick="EliminarSoft( '{{$obj->id}}', '{{$id_lab}}' )"><i class="fa fa-trash fa-lg"></i></a>//
          @endforeach   
        </label>
        


      </div>
            

    </div>
  </div>
</div>
