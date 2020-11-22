<?php 
use App\catalogo\Ciclo;

function ciclo(){
	return Ciclo::where('estatus','=','A')->firstOrFail();
}