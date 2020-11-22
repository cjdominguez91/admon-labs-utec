@extends ('layouts.app')
@section ('h2',$laboratorio->nombre)
@section ('content')
<script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>
<!-- Fin del Titulo -->
<!-- Inicio del main -->

<div class="row my-5">
<form action="{{route('encargado',$laboratorio->id)}}" method="POST" class="col-md-6">
   @csrf
  <div class="row">
      <div class="form-group col-10">
        <label for="exampleFormControlSelect2">Usuarios Activos:</label>
        <select multiple class="form-control" id="userList" name="user" required>
          @foreach($users as $user)
            <option value="{{$user->id}}">{{$user->nombres." ".$user->apellidos}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-md-2 d-flex justify-content-center align-items-center col-2">
          <button class="btn btn-outline-primary"  type="submit">
              >>
          </button>
          <br>
      </div>
  </div>
  </form>
  <div class="form-group col-md-6">
    <label for="exampleFormControlSelect2">Encargado:</label>
    <table class="table table-sm table-stripedtext-center">
        <thead class="text-light">
            <th>Nombre:</th>
        </thead>
        <tbody>
         @foreach($laboratorio->users as $user)
            <tr><td>{{$user->nombres." ".$user->apellidos}}</td></tr>
          @endforeach
            
        </tbody>
    </table>
  </div>
    @include('sweet::alert')
</div>
<!-- fin del main -->

<script>
    $('#btnAdd').click(function(){
        alert($('#userList').val())
    })
</script>

@endsection