<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Support\Facades\Auth;
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
    public function index(Request $request)
    {
        $personas = Persona::all();
        $request->user()->authorizeRoles(['user','admin']);
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
        $email=$persona->user->email;

        $genero = $persona->genero;
        $fecha_nacimiento = $persona->fecha_nacimiento;
        $situacion = $persona->situacion_laboral;
        $carreras = $persona->carreras;
        $postgrados = $persona->postgrados;
        $tipo = \App\TipoPostgrado::all();
        $universidades=\App\Universidad::all();
        $empresas = $persona->empresas;
        $tipoEmpresas = \App\Tipo_empresa::all();
        $nivel = \App\Nivel_cargo::all();
        $areas_trabajo =  \App\Area::all();
        $rubros = \App\Rubro::all();
        $aux=[];

        foreach ($empresas as $empresa){
            foreach ($empresa->cargos as $cargo){
                array_push($aux,$cargo);
            }

        }

//        for($i=0;$i<sizeof($empresas);$i++){
//            if($cargos[$i]->empresa_id==$empresas[$i]->id){
//               $aux.push($cargos[$i]);
//            }
//        }

        return view('Persona.update', compact('nombre','rut',
            'email', 'genero','fecha_nacimiento','carreras',
            'postgrados','tipo','universidades','situacion',
            'empresas','tipoEmpresas','nivel','areas_trabajo','rubros','cargos','aux'));
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
        $request->validate([
            'estado_trabajo'=>'required|string',
            'tipo_tesis'=>'required',
            'fecha_ingreso'=>'required|date',
            'fecha_egreso' =>'required|date',
            'fecha_titulacion' => 'required|date'
        ]);
        $persona->situacion_laboral=$request->estado_trabajo;
        $persona->carreras()->detach();
        $persona->carreras()->attach($request->carrera,['tipo_tesis'=>$request->tipo_tesis,
            'fecha_ingreso'=>$request->fecha_ingreso,
            'fecha_egreso'=>$request->fecha_egreso,
            "fecha_titulacion"=>$request->fecha_titulacion]);

        return redirect()->back()->with('Datos guardados');
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

    public function jsonAddCargo(Request $request)
    {
        //Agregas exists para revisar base de dato
        $request->validate([
            'fechaS'=>'required|date',
            'fechaE' =>'required|date|after:fechaS',
            'sueldo' => 'required|integer',
            'lvl' => 'required',
            'area' => 'required|integer',
            'nombre' => 'required|string',
            'tipoEmp' => 'required|string',
            'rubro' => 'required|integer',
        ]);
        $fechai=$request->fechaS;
        $fechat=$request->fechaE;
        $sal=$request->sueldo;
        $nivel=$request->lvl;
        $areaIn=$request->area;
        $nombreEmp=$request->nombre;
        $tipEmp=$request->tipoEmp;
        $ru=$request->rubro;

        $emp = new \App\Empresa(['nombre'=>$nombreEmp,
            'tipo_empresa_id'=>$tipEmp,
            'rubro_id'=>$ru]);
        Auth::user()->persona->empresas()->save($emp);
        $cargo= new \App\Cargo(['fecha_inicio'=>$fechai,
            'fecha_termino'=>$fechat,
            'sueldo'=>$sal,
            'nivel_cargo_id'=>$nivel,
            'area_id'=>$areaIn
        ]);
        $cargo->empresa()->associate($emp);
        $cargo->save();
        $otro = $request->otro;
        if($otro !=""){
            $cargo->otro_area()->create(['nombre_area'=>$otro]);
        }
        return response()->json($cargo->id, 200);
    }

    public  function jsonEditCargo(Request $request)
    {
        $request->validate([
            'fechaS'=>'required|date',
            'fechaE' =>'required|date|after:fechaS',
            'sueldo' => 'required|integer',
            'lvl' => 'required|integer',
            'area' => 'required|integer',
            'nombre' => 'required|string',
            'tipoEmp' => 'required|string',
            'rubro' => 'required|integer',
        ]);

        $fechaI=$request->fechaS;
        $fechaT=$request->fechaE;
        $sal=$request->sueldo;
        $nivel=$request->lvl;
        $areaT=$request->area;
        $name=$request->nombre;
        $type=$request->tipoEmp;
        $ru=$request->rubro;
        $idc=$request->id;
        //pendiente guardar en una tabla con id,id_persona,nombre
        $otro=$request->otro;


        $cargo= \App\Cargo::find($idc);
        $cargo->fecha_inicio=$fechaI;
        $cargo->fecha_termino=$fechaT;
        $cargo->sueldo=$sal;
        $cargo->nivel_cargo_id=$nivel;
        $cargo->area_id=$areaT;
        $cargo->save();
        #TODO
        #CHECK otro area
        if($otro !=""){
            $cargo->otro_area()->create(['nombre_area'=>$otro]);
        }

        $empresa=\App\Empresa::find($cargo->empresa_id);
        $empresa->nombre=$name;
        $empresa->tipo_empresa_id=$type;
        $empresa->rubro_id=$ru;
        $empresa->save();

    }
    public  function jsonDeleteCargo(Request $request)
    {
        $id=$request->id;
        $cargo= \App\Cargo::findOrFail($id);
        $cargo->delete();
    }

    public  function jsonAdd(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'tipo' => 'required|integer',
            'univ' => 'required|integer',
            'date' => 'required|date',
        ]);
        $nombre = $request->nombre;
        $tipo=$request->tipo;
        $uni=$request->univ;
        $date=$request->date;

        $postgrado= new \App\Postgrado(['nombre'=>$nombre,
            'fecha_obtencion'=>$date,
            'tipoPostgrado_id'=>$tipo,
            'universidad_id'=>$uni
        ]);
        Auth::user()->persona->postgrados()->save($postgrado);
        return $postgrado->id;
    }

    public  function jsonEdit(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string',
            'tipo' => 'required|integer',
            'univ' => 'required|integer',
            'date' => 'required|date',
        ]);
        $nombre = $request->nombre;
        $tipo=$request->tipo;
        $uni=$request->univ;
        $date=$request->date;
        $id=$request->id;

        $postgrado= \App\Postgrado::find($id);
        $postgrado->nombre=$nombre;
        $postgrado->fecha_obtencion=$date;
        $postgrado->tipoPostgrado_id=$tipo;
        $postgrado->universidad_id=$uni;
        $postgrado->save();
    }

    public  function jsonDelete(Request $request)
    {
        $id=$request->id;
        $postgrado= \App\Postgrado::find($id);
        $postgrado->delete();
    }

}
