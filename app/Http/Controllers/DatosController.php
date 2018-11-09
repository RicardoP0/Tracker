<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatosController extends Controller
{
    public function index()
    {
        $area = \App\Area::all();
        $rubro =  \App\Rubro::all();
        $tipoEmp =  \App\Tipo_empresa::all();
        return view('Registro.datost', compact('tipoEmp','rubro','area'));
    }

    public function indexPost()
    {
        $post = \App\Postgrado::all();
        return view('Registro.config', compact('post'));
    }

}
