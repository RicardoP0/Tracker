<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
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
        $areaT = \App\Area::all();
        $rubro =  \App\Rubro::all();
        $tipoEmp =  \App\Tipo_empresa::all();
        $nivel= \App\Nivel_cargo::all();
        return view('Registro.datost', compact('tipoEmp','rubro','areaT','nivel'));
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
        //($request->only('emp','typeEmp','rubro','lvl','years','yeare','sal'));
        $request->validate([
            'emp'=>'required',
            'lvl'=>'required',
            'years'=>'required',
            'yeare'=>'required',
            'sal'=>'required'
        ]);
        $persona = \App\Persona::findOrFail($idp)->first();
        $emp = new \App\Empresa(['nombre'=>$request->emp[0]]);
        $emp->persona()->associate($persona->id);
        $emp->tipo_empresa()->associate(\App\Tipo_empresa::findOrFail($request->typeEmp)->first()->id);
        $emp->rubro()->associate(\App\Rubro::findOrFail($request->rubro)->first()->id);
        $emp->save();
        $cargo= new \App\Cargo(['fecha_inicio'=>$request->years[0],'fecha_termino'=>$request->yeare[0],'sueldo'=>$request->sal[0]]);
        $cargo->area()->associate(\App\Area::findOrFail($request->area)->first()->id);
        $cargo->nivel_cargo()->associate(\App\Nivel_cargo::find($request->area)->first()->id);
        $emp->cargos()->save($cargo);
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
