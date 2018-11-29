<?php

namespace App\Http\Controllers;

use App\Postgrado;
use Illuminate\Http\Request;

class PostgradoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $idp=2;
        ($request->only('inputName','inputTipo','inputUni','inputDate'));
        $request->validate([
            'inputName'=>'required',
            'inputTipo'=>'required',
            'inputUni'=>'required',
            'inputDate'=>'required',
        ]);

        $empresas_nombre = $request->emp;
        $niveles_cargo= $request->lvl;
        $anios_inicio= $request->years;
        $anios_termino = $request->yeare;
        $sueldos = $request->sal;
        $rubros = $request->rubro;
        $tipos_empr = $request->typeEmp;
        $areas = $request->area;

        // TODO
        // AGREGAR PERSONA LOGIN
        $persona = \App\Persona::findOrFail($idp)->first();
        $num_emprs = count($empresas_nombre);
        for($i = 0; $i<$num_emprs; ++$i){
            $emp = new \App\Empresa(['nombre'=>$empresas_nombre[$i]]);

            $emp->persona()->associate($persona->id);
            $emp->tipo_empresa()->associate(\App\Tipo_empresa::findOrFail($tipos_empr[$i])->id);
            $emp->rubro()->associate(\App\Rubro::findOrFail($rubros[$i])->id);

            $emp->save();

            $cargo= new \App\Cargo(['fecha_inicio'=>$anios_inicio[$i],'fecha_termino'=>$anios_termino[$i],'sueldo'=>$sueldos[$i]]);
            $cargo->area()->associate(\App\Area::findOrFail($areas[$i])->id);
            $cargo->nivel_cargo()->associate(\App\Nivel_cargo::findOrFail($niveles_cargo[$i])->id);
            $emp->cargos()->save($cargo);
        }


        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Postgrado  $postgrado
     * @return \Illuminate\Http\Response
     */
    public function show(Postgrado $postgrado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Postgrado  $postgrado
     * @return \Illuminate\Http\Response
     */
    public function edit(Postgrado $postgrado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Postgrado  $postgrado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postgrado $postgrado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Postgrado  $postgrado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postgrado $postgrado)
    {
        //
    }
}
