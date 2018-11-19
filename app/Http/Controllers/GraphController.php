<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
class GraphController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas =  \App\Persona::all();
        $empresas = \App\Empresa::all();
        $areas = \App\Area::all();
        $cargos = \App\Cargo::all();
        $nivel = \App\Nivel_cargo::all()->first();
        $qr = DB::table('nivel_cargos')
            ->join('cargos','nivel_cargos.id','=','cargos.nivel_cargo_id')
            ->join('areas','cargos.area_id','=','areas.id')
            ->whereYear('fecha_inicio',2009)
            ->orWhereYear('fecha_termino',2010);
        $av = $qr->avg('sueldo');
        $myVar = $qr->get()->push($av);
        //dd(\App\Cargo::whereYear('fecha_inicio',2009)->get());

        $startYear = Carbon::createFromFormat('Y-m-d',DB::table('cargos')->min('fecha_inicio'))->year;
        $endYear =  Carbon::createFromFormat('Y-m-d',DB::table('cargos')->max('fecha_termino'))->year;
        $dataCollect = collect();
        $dataCounter = 0;
        for($i=$startYear; $i<$endYear; $i++){
            $idxs = \App\Nivel_cargo::all()->pluck(['id']);
            foreach ($idxs as $niv_cargo_id){
                $qry = DB::table('nivel_cargos')
                    ->join('cargos',function($join) use($niv_cargo_id){
                        $join->on('nivel_cargos.id','=','cargos.nivel_cargo_id')
                            ->where('nivel_cargos.id','=',$niv_cargo_id);
                    })
                    ->join('areas','cargos.area_id','=','areas.id')
                    ->where(function($query) use($i){
                        $query->whereYear('fecha_termino','>=',$i)
                            ->whereYear('fecha_inicio','<=',$i);

                    })

                    ->select('nivel_cargos.nombre',
                        'nivel_cargos.nivel',
                        'cargos.fecha_inicio',
                        'cargos.sueldo',
                        'areas.nombre as nombre_area')->get();
                if($qry->count()>0){
                    $itm = $qry[0];
                    $itm->fecha_inicio = strval($i);
                    $arr = array_values((array)$itm);
                    array_unshift ($arr,$dataCounter);
                    $dataCounter +=1;
                    array_push($arr,round($qry->avg('sueldo')));
                    $dataCollect->push($arr);

                }


//                foreach ($areas as $itm){
//                    $temp =$qry->where('nombre_area','=','Otro')
//                        ->count();
//                    dd($qry,$temp);
//                }



            }


            //FIX START AND END DATE ON SAME YEAR
            //ADD AVERAGE SUELDO

        }

        $dataArr=$dataCollect->toArray();

        return view('Graficos.soc', compact('personas','cargos','empresas','areas','dataArr'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


}
