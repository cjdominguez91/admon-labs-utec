  @extends('layouts.main')
  @section('content')
  <script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>
      <div>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
          <a class="nav-item nav-link active" id="nav-labs-tab" data-toggle="tab" href="#nav-labs" role="tab" aria-controls="nav-labs" aria-selected="true">Laboratorios</a>
          <a class="nav-item nav-link" id="nav-schedules-tab" data-toggle="tab" href="#nav-schedules" role="tab" aria-controls="nav-schedules-tab" aria-selected="false">Horarios</a>
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
                  <select class="form-control" name="" id="">
                      <option value="">Seleccionar Edificio</option>
                  </select>
              </div>
              <div class="col-md-3 col-sm-12">
                  <select class="form-control" name="" id="">
                      <option value="">Seleccionar Dia</option>
                  </select>
              </div>
              <div class="col-md-3 col-sm-12">
                  <select class="form-control" name="" id="">
                      <option value="">Seleccionar Horario</option>
                  </select>
              </div>
              <div class="col-md-3 col-sm-12">
                  <input type="text" class="form-control" name="" placeholder="Software">
              </div>
          </div>
            <div class="row">

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
        <div class="tab-pane fade" id="nav-schedules" role="tabpanel" aria-labelledby="nav-schedules-tab">...</div>
         @include('sweet::alert')
      </div>
  @endsection
