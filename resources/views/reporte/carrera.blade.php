<!DOCTYPE html>
<html lang="en">
@extends ('layouts.app')
@section ('h2',"Carreras más Visitadas")
@section ('content')
<script src="{{asset('js/sweetalert/sweetalert.min.js')}}"></script>

<!-- Fin del Titulo -->
<!-- Inicio del main -->
<a href="javascript:window.print()">Imprimir</a>

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <style>
        #div2 {
            width: 300px;
            height: 100px;
        }
    </style>
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


</head>

<body>




    <div class="row mt-5">
        <div class="col-5 text-center ml-5">
            <table width="261" height="79" class="table-sm table-bordered" id="datatable">
                <thead class="text-light">
                    <th width="249">nombre</th>
                    <th width="249">Cantidad</th>

                <tbody>

                    @foreach ($data as $obj)
                    <tr>

                        <td align="center">{{ $obj->nombre}}</td>
                        <td align="center">{{ $obj->conteo}}</td>



                        </td>
                    </tr>

                    @endforeach



                </tbody>
            </table>
        </div>
        <div class="col-5 ml-4">
            <table>


                <div id="div2">
                    <canvas id="myChart"></canvas>

                </div>
            </table>
        </div>
    </div>



    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [<?php echo $valores ?>],
                    backgroundColor: ['#42a5f5', 'red', 'green', 'blue', 'violet'],
                    label: 'Comparacion de navegadores'
                }],
                labels: [<?php echo $nombre ?>]
            },
            options: {
                responsive: true
            }
        });
    </script>









</body>
@endsection