<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        return view('Historico_usuario.create', compact('tipoEmp','rubro','areaT','nivel'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idp=Auth::user()->id;
        //TODO
        //LLENAR VALIDACION
        $request->validate([
            'emp'=>'required|array|min:1',
            'emp.*' => 'required|string|min:3',
            'lvl'=>'required|array|min:1',
            'years'=>'required|array|min:1',
            'yeare'=>'required|array|min:1',
            'sal'=>'required|array|min:1'
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
