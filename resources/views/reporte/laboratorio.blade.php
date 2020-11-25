<!DOCTYPE html>
<html lang="en">
@extends ('layouts.app')
@section ('h2',"LABORATORIOS  MÁS VISITADOS ")
@section ('content')
<script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
 <?php
    $nombre = "";
    $valores = "";

    foreach ($data as $obj) {

        $nombre = $nombre . "'" . $obj->nombre . "',";
        $valores = $valores .  $obj->conteo . ",";
    }
    $nombre = substr($nombre, 0, -1);
    $valores = substr($valores, 0, -1);



    ?>
     <style>
        #div2 {
            width: 300px;
            height: 100px;
        }
    </style>


<div class="row text-center my-4">
    <h4 class="m-auto">informacion del {{$f1}} al {{$f2}}</h4>
</div>

<div class="row mt-2">
    <div class="col-5 text-center ml-5">
        <a href="javascript:window.print()">Imprimir</a>
 </div>


    <div class="col-5 ml-5">
        <div>
            <a href="{{url('reporte/reporte')}}">Volver</a>
        </div>
    </div>
</div>



    <div class="row mt-2">
        <div class="col-4 text-center ml-5">
            <table width="261" height="79" class="table-sm table-bordered" id="datatable">
                <thead class="text-light">
                    <th width="200">nombre</th>
                    <th width="200">Cantidad</th>

                <tbody>

                    @foreach ($data as $obj)
                    <tr>
                        <td align="center">{{ $obj->nombre}}</td>
                        <td align="center">{{ $obj->conteo}}</td>
                     </td>
                    </tr>

                    @endforeach
                    <tr class="bg-secondary text-light">
                        <td><b>Total</b></td>
                        <td>{{$total}}</td>
                    </tr>
                    



                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="col-10 ml-2">
                <table>


                    <div id="div2">
                        <canvas id="myChart"></canvas>

                    </div>
                </table>
            </div>
        </div>

        



        <div class="row mt-1">
            <div class="col-12 ml-12">

                <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                    <div class="card-header">Laboratorio 2 </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <td align="center">{{ $obj->nombre}}</td>
                        </h5>

                    </div>
                </div>





            </div>
        </div>

        <div class="row mt-1">
            <div class="col-12 ml-12">

                <div class="card text-white bg-danger mb-3" style="max-width: 18rem;">
                    <div class="card-header">Laboratorio 2 </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <td align="center">{{ $obj->nombre}}</td>
                        </h5>

                    </div>
                </div>





            </div>
        </div>
    </div>











    <div id="div2">
        <canvas id="myChart"></canvas>

    </div>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [<?php echo $valores ?>],
                    backgroundColor: ['#42a5f5', 'red', 'green', 'blue', 'violet', 'pink', 'black', 'orange'],
                    label: 'Comparacion de navegadores'
                }],
                labels: [<?php echo $nombre ?>]
            },
            options: {
                responsive: true
            }
        });
    </script>

@endsection