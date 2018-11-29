<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkPersona')->only('show');
    }
    public function index()
    {
        $personas = Persona::all();
        return view('persona.index', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        $nombre =$persona->nombre;
        $rut = $persona->rut;
        $email ="test@test.com";
        if(!is_null($persona->user)){
            $email=$persona->user->email;
        }
        $genero = $persona->genero;
        $fecha_nacimiento = $persona->fecha_nacimiento;
        $situacion = $persona->situacion_laboral;
        $carreras = $persona->carreras;
        $postgrados = $persona->postgrados;
        $tipo = \App\TipoPostgrado::all();
        $universidades=\App\Universidad::all();
        $empresas = \App\Empresa::all();
        $tipoEmpresas = \App\Tipo_empresa::all();
        $nivel = \App\Nivel_cargo::all();
        $areas_trabajo =  \App\Area::all();
        $rubros = \App\Rubro::all();
        return view('Persona.update', compact('nombre','rut',
            'email', 'genero','fecha_nacimiento','carreras',
            'postgrados','tipo','universidades','situacion',
            'empresas','tipoEmpresas','nivel','areas_trabajo','rubros'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function edit(Persona $persona)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
