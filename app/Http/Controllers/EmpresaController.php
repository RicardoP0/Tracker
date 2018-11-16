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
        $area = \App\Area::all();
        $rubro =  \App\Rubro::all();
        $tipoEmp =  \App\Tipo_empresa::all();
        $nivel= \App\Nivel_cargo::all();
        return view('Registro.datost', compact('tipoEmp','rubro','area','nivel'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->only('emp','typeEmp','rubro','lvl','years','yeare','sal'));
        $request->validate([
            'emp'=>'required',
            'lvl'=>'required',
            'years'=>'required',
            'yeare'=>'required',
            'sal'=>'required'
        ]);
        $emp = \App\Empresa::create($request->only('emp','typeEmp','rubro'));
        $cargo= new \App\Cargo(['years'=>$request->fecha_inicio,'yeare'=>$request->fecha_termino,'sal'=>$request->sueldo,'lvl'=>$request->nivel_cago_id,'area'=>$request->area_id]);
        $emp->persona()->save($cargo);
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
