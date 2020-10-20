<?php

namespace App\Http\Controllers\catalogo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\catalogo\HorasClases;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\catalogo\HorasClasesFormRequest;
use DB;

class HorasClasesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getHorasClases($id) {
        return HorasClases::where('id_horario','=',$id)->get();
    }

}
