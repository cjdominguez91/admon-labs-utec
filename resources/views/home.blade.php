  @extends('layouts.main')
  @section('content')
  <script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>
  <div>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
      <a class="nav-item nav-link active" id="nav-labs-tab" data-toggle="tab" href="#nav-labs" role="tab" aria-controls="nav-labs" aria-selected="true">Laboratorios</a>
      <a class="nav-item nav-link horarios" id="nav-schedules-tab" data-toggle="tab" href="#nav-schedules" role="tab" aria-controls="nav-schedules-tab" aria-selected="false">Horarios</a>
    </div>
  </div>
  <div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-labs" role="tabpanel" aria-labelledby="nav-labs-tab">
      <div class="row d-flex align-items-end">
        <div class="col-2">
          <h5 class="mt-4">Filtros:</h5>
        </div>
        <div class="col-1 mb-1 text-secondary">
          <span class="material-icons">filter_alt</span>
        </div>
      </div>
      <div class="row ">
        <div class="col-md-3 col-sm-12">
          <select class="form-control" name="Filtro1" id="Filtro1">
            <option value="">Seleccionar Filtro</option>
            <option value="1">Edificio</option>
            <option value="2">Horario</option>
            <option value="3">Software</option>
          </select>
        </div>



        <div class="col-md-3 col-sm-12" hidden id="flt2">
          <select class="form-control" id="Filtro2" name="Filtro2">
            <option value="">Elige Día-</option>
            <option value="Lunes">Lunes</option>
            <option value="Martes">Martes</option>
            <option value="Miercoles">Miercoles</option>
            <option value="Jueves">Jueves</option>
            <option value="Viernes">Viernes</option>
            <option value="Sabado">Sabado</option>
            <option value="Domingo">Domingo</option>

          </select>

        </div>

        <div class="col-md-3 col-sm-12">
          <select class="form-control" id="Filtro3" name="Filtro3">
            <option value="">Seleccionar un opcion</option>

          </select>

        </div>

        <div class="col-md-3 col-sm-12">
          <input type="button" class="btn btn-outline-dark" value="Buscar" id="btnBuscar">

        </div>




      </div>
      <div class="row" id='body'>
        @foreach($laboratorios as $laboratorio)
        <div class="col-md-3 col-sm-12 mt-5">
          <div class="card">
            <img src="img/laboratorios/{{$laboratorio->imagen}}" class="card-img-top" alt="...">
            <div class="card-body card-body-labs">
              <h5 class="card-title">{{$laboratorio->nombre}}</h5>
              <p class="card-text">{{Str::limit($laboratorio->ubicacion, 25)}}.</p>
              <a href="{{route('single',$laboratorio->id)}}" class="btn btn btn-outline-light">Ver información</a>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="tab-pane fade" id="nav-schedules" role="tabpanel" aria-labelledby="nav-schedules-tab">

      <table class="table table-sm text-center my-5">
        <thead class="text-light">
          <th>Id</th>
          <th>Laboratorio</th>
          <th>Ciclo</th>
          <th>Dia</th>
          <th>Horario</th>
          <th>Materia</th>
          <th>Seminarios</th>
        </thead>
        <tbody>

        </tbody>
      </table>

    </div>

 @include('sweet::alert')

  <!-- jQuery -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
 <script type="text/javascript">
      $(document).ready(function() {
        //combo para Filtro
        $("#Filtro1").change(function() {
          // var para la Filtro1                            
          var Filtro1 = $(this).val();

          //console.log(Filtro1+" "+laboratorio);

          //funcionpara las Filtro
          switch (Filtro1) {
            case '1':
              $('#flt2').attr('hidden', true);
              $.get('catalogo/filtro/' + Filtro1, function(data) {
                //esta el la peticion, la cual se divide en tres partes. ruta,variables y funcion
                console.log(data);
                var _select = '<option value="">Seleccionar</option>'
                for (var i = 0; i < data.length; i++)
                  _select += '<option value="' + data[i].ubicacion + '">' + data[i].ubicacion + '</option>';

                $("#Filtro3").html(_select);

              })
              break;
            case '2':
              $('#flt2').removeAttr('hidden');
              $.get('catalogo/filtro/' + Filtro1, function(data) {
                //esta el la peticion, la cual se divide en tres partes. ruta,variables y funcion
                console.log(data);
                var _select = '<option value="">Seleccionar</option>'
                for (var i = 0; i < data.length; i++)
                  _select += '<option value="' + data[i].id + '">' + data[i].horario + '</option>';

                $("#Filtro3").html(_select);
              })

              break;
            case '3':
              $('#flt2').attr('hidden', true);
              $.get('catalogo/filtro/' + Filtro1, function(data) {
                //esta el la peticion, la cual se divide en tres partes. ruta,variables y funcion
                console.log(data);
                var _select = '<option value="">Seleccionar</option>'
                for (var i = 0; i < data.length; i++)
                  _select += '<option value="' + data[i].id + '">' + data[i].nombre + '</option>';

                $("#Filtro3").html(_select);

              })
              break;

            default:
              $('#flt2').attr('hidden', true);
              break;
          }


        });
        $("#btnBuscar").click(function() {
          // var para la Filtro2  
          var tipo = $('#Filtro1').val();
          var par1 = $('#Filtro3').val();
          var par2 = $('#Filtro2').val() || 1;


          //console.log(Filtro2+" "+laboratorio);

          //funcionpara las Filtro
          $.get('catalogo/filtros/' + tipo + '/' + par1 + '/' + par2 + '', function(laboratorios) {
            //esta el la peticion, la cual se divide en tres partes. ruta,variables y funcion
            var _select = ''
            if (tipo == 2) {
              for (var i = 0; i < laboratorios.length; i++)
                _select += '<div class="col-md-3 col-sm-12 mt-5">' +
                '<div class="card" name="body" id="body">' +
                '<img src="img/laboratorios/' + laboratorios[i].imagen + '" class="card-img-top" alt="...">' +
                '<div class="card-body card-body-labs">' +
                '<h5 class="card-title">' + laboratorios[i].nombre + '</h5>' +
                '<p class="card-text">' + laboratorios[i].ubicacion + '.</p>' +
                '<a href="/single/' + laboratorios[i].laboratorio_id + '" class="btn btn btn-outline-light">Ver información</a>' +
                '</div>' +
                '</div>' +
                '</div>';
            } else if (tipo == 3) {
              laboratorios.forEach(function(data) {
                data.laboratorios.forEach(function(lab) {
                  _select += `
                    
                       <div class="col-md-3 col-sm-12 mt-5">
                         <div class="card" name="body" id="body">
                           <img src="img/laboratorios/${lab.imagen}" class="card-img-top" alt="...">
                             <div class="card-body card-body-labs">
                               <h5 class="card-title">${lab.nombre}</h5>
                               <p class="card-text">${lab.ubicacion}.</p>
                               <a href="/single/${lab.laboratorio_id}" class="btn btn btn-outline-light">Ver información</a>
                             </div>
                         </div>
                       </div>
                     `;
                });
              });
            } else {
              for (var i = 0; i < laboratorios.length; i++)
                _select += '<div class="col-md-3 col-sm-12 mt-5">' +
                '<div class="card" name="body" id="body">' +
                '<img src="img/laboratorios/' + laboratorios[i].imagen + '" class="card-img-top" alt="...">' +
                '<div class="card-body card-body-labs">' +
                '<h5 class="card-title">' + laboratorios[i].nombre + '</h5>' +
                '<p class="card-text">' + laboratorios[i].ubicacion + '.</p>' +
                '<a href="/single/' + laboratorios[i].id + '" class="btn btn btn-outline-light">Ver información</a>' +
                '</div>' +
                '</div>' +
                '</div>';
            }


             if(_select == '') {
              _select = `
                  <div class='col-12 text-center mt-4'>
                    No se generaron resultados de su busqueda
                 </div> `;
            }

            $("#body").html(_select);

          })
        });
      });
    </script>
  </div>
  @endsection