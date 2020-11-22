@extends ('layouts.app')
@section ('h2',"Ciclos")
@section ('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>
<!-- Fin del Titulo -->
<!-- Inicio del main -->

<input type="hidden" name="token" value="{{ csrf_token() }}" id="token">
<div class="row my-5">
    <a href="{{url('catalogo/ciclo/create')}}">
        <button class="btn btn-dark ml-auto d-flex align-items-end" id="btnAgregarUser">
            Agregar Nuevo Ciclo <span class="material-icons m-0 p-0"> add_circle_outline </span>
        </button>
    </a>

    <table id="datatable" class="table table-striped table-bordered text-center">
        <thead class="text-light">
            <th>id</th>
            <th>Año</th>
            <th>Ciclo</th>
            <th>Codigo</th>
            <th>Estado</th>
            <th colspan="3">Acciones</th>
            <th>Current</th>
        </thead>
        <tbody id="table">
            @foreach ($ciclos as $ciclo)
            <tr>
                <td align="center">{{ $ciclo->id}}</td>
                <td>{{ $ciclo->año}}</td>
                <td>{{ $ciclo->nciclo}}</td>
                <td>{{ $ciclo->codigo}}</td>
                <td>{{ $ciclo->estatus}}</td>
                <td colspan="3" align="center">
                    <a href="{{URL::action('catalogo\CicloController@edit',$ciclo->id)}}"
                        class="on-default edit-row"><i class="fa fa-pencil fa-lg"></i></a>
                    &nbsp;&nbsp;
                    <a href="" data-target="#modal-delete-{{$ciclo->id}}" data-toggle="modal"><i
                            class="fa fa-trash fa-lg"></i></a>
                </td>
                <td>
                    <div class="form-check text-center">
                    @if($ciclo->estatus == 'A')
                      <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="{{$ciclo->id}}" checked>
                    @else
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="{{$ciclo->id}}" >
                    </div>
                    @endif
                </td>
            </tr>
            @include('catalogo.ciclo.modal')
            @endforeach



        </tbody>
    </table>
    @include('sweet::alert')
</div>
<script>
    $("[name='exampleRadios']").click(function(){  
        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success m-1',
            cancelButton: 'btn btn-danger m-1'
          },
          buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
          title: 'Desea definir este ciclo como el actual?',
          text: "Esto afectara a toda la plataforma!",
          icon: 'warning',
          allowEscapeKey: false,
          allowOutsideClick: false,
          showCancelButton: true,
          confirmButtonText: 'Si, Activar!',
          cancelButtonText: 'No, Cancelar!',
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
            var idCiclo = $(this).val();
            var route = '../catalogo/setciclo/'+idCiclo+'';
            var token = $('#token').val();
            
            $.ajax({
                url: route,
                headers: {'X_CSRF-TOKEN': token},
                type: 'PUT',
                dataType: 'json'
                success: function(data){

                  
                }
            });
            swalWithBootstrapButtons.fire(
              'Ciclo Activado!',
              'Se ha difinido como el ciclo curso ',
              'success'
            )
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            location.href ="http://127.0.0.1:8000/catalogo/ciclo";
            swalWithBootstrapButtons.fire(
              'Cancelado',
              'Se cancelo la accion',
              'error'
            )
          }
})
    })
</script>
<!-- fin del main -->



@endsection