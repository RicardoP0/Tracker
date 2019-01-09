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


//        $dataArr=$this->data_by_nivel_cargo();
//        $dataView = \App\DataView::all()->groupBy('nombre_tipo_empresa');
//        $qry = DB::table('data_view')->select('*',DB::raw('COUNT(nombre_carrera) as count'))->
//        groupBy('nombre_area')->get();
//        dd($dataView->first()->filter(function ($item) {
//            return (data_get($item, 'fecha_ingreso') > '2010');
//        })->avg('sueldo_cargo'));


        $dataArr = $this->data_array('nombre_cargo');


        return view('Graficos.soc', compact('dataArr'));
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

    public  function jsonResponse(Request $request)
    {

        $main_data_key = $request->main_data_key;
        $filters = $request->filters;


        $dataArr = $this->data_array($main_data_key,$filters);

        return response()->json($dataArr, 200);
    }

//    private function data_array(string $main_group_name,...$groups){
//        $startYear = Carbon::createFromFormat('Y-m-d',DB::table('cargos')->min('fecha_inicio'))->year;
//        $endYear =  Carbon::createFromFormat('Y-m-d',DB::table('cargos')->max('fecha_termino'))->year;
//        $dataCollect = collect();
//        $dataView = \App\DataView::all();
//        $arr_group = [];
//        $main_group = $dataView->groupBy($main_group_name);
//        foreach ($groups as $group){
//            array_push($arr_group,['nombre'=>$group,'arr'=>$dataView->groupBy($group)]);
//        }
//       // dd($dataView->get('Schaden, Dickens and Feest')->toarray();
//        for($i=$startYear; $i<$endYear; $i++){
//            foreach ( $main_group as $item){
//                foreach ($arr_group as $group){
//                    foreach ($group['arr']->keys() as $value){
//
//                        $row = $item->filter(function ($item) use($i,$group,$value) {
//                            return (data_get($item, 'cargo_inicio') <= strval($i) &&
//                                data_get($item, 'cargo_termino') > strval($i) &&
//                                data_get($item, $group['nombre']) == $value );
//                        });
//                        if (count($row)){
//                            $aux_row = [$i,$row->avg('sueldo_cargo'),count($row),$row->first()[$main_group_name],$value];
//                            $dataCollect->push($aux_row);
//                        }
//                        else{
//                            $aux_row = [$i,0,0,$item->first()[$main_group_name],$value];
//                            $dataCollect->push($aux_row);
//                        }
//                    }
//                }
//
//            }
//
//        }
//
//        $dataArr=$dataCollect->toArray();
//        $names_array = ['fecha','avg_sueldo','cantidad',$main_group_name];
//        foreach ($groups as $group){
//            array_push($names_array,$group);
//        }
//        $dataArr=array_prepend($dataArr,$names_array);
//
//
////        $dataArr=array_prepend($dataArr,["rut_persona","fecha_ingreso",
////            "fecha_egreso","nombre_carrera","univerdad_carrera",
////            "postgrado_nombre","fecha_postgrado","universidad_postgrado",
////            "nombre_rubro","nombre_tipo_empresa","cargo_inicio",
////            "cargo_termino","sueldo_cargo","nombre_cargo",
////            "nombre_area","fecha"]);
//        return $dataArr;
//
//    }
    private function data_array(string $maingroup, array $filters = null){
        $startYear = Carbon::createFromFormat('Y-m-d',DB::table('cargos')->min('fecha_inicio'))->year;
        $endYear =  Carbon::createFromFormat('Y-m-d',DB::table('cargos')->max('fecha_termino'))->year;
        $dataCollect = collect();
        $dataView = \App\DataView::all();

        $main_group = $dataView->groupBy($maingroup);

        for($i=$startYear; $i<$endYear; $i++){
            foreach ( $main_group as $item){
                $row = $item->filter(function ($item) use($i) {
                    return (date('Y',strtotime(data_get($item, 'cargo_inicio'))) <= strval($i));
                });

                if (count($row)) {
                    if ($filters) {
                        foreach ($filters as $filter) {

                            $row = $row->filter(function ($item) use ($filter) {
                                return in_array(data_get($item, $filter[0]), $filter[1]);
                            });
                        }
                    }
                    $row = $row->groupBy('rut_persona');

                    $aux_persona = $item->groupBy('rut_persona');
                    $sum_years = 0;
                    $cant_persona_exp = 0; //Contar personas que han trabajado en el area hasta la fecha
                    $sum_sueldo = 0;
                    $cant_persona_sueldo=0; //Contar persona trabajando actualmente

                    foreach ($row as $persona){
                        $aux_persona = $persona->unique('cargo_inicio');
                        $cant_persona_exp+=1;
                        foreach ($aux_persona as $val ){
                            //Revisar anios experencia
                            $start_date = intval(date('Y',strtotime($val['cargo_inicio'])));
                            if($start_date <= $i){
                                $end_date = intval(date('Y',strtotime($val['cargo_termino'])));
                                if($end_date <= $i){
                                    $sum_years = $sum_years+  $end_date -$start_date;
                                }
                                else{
                                    $sum_years  = $sum_years +  $i - $start_date;
                                    //Sumar sueldo para trabajo en la fecha actual
                                    $sum_sueldo += $val['sueldo_cargo'];
                                    $cant_persona_sueldo +=1;
                                }
                            }
                        }
                    }

//                    $row = $row->filter(function ($item) use($i) {
//                        dd($item);
//                        $dates_st = data_get($item, '*.cargo_inicio');
//                        $dates_end = data_get($item, '*.cargo_termino');
//                        array_walk_recursive($dates_st, function(&$element) {
//                            // notice: this will use the date of today and add the time to it.
//                            $element = date('Y',strtotime($element));
//                            // $element = strtotime($element, 0); // use 1.1.1970 as current date
//                        });
//                        array_walk_recursive($dates_end, function(&$element) {
//                            // notice: this will use the date of today and add the time to it.
//                            $element = date('Y',strtotime($element));
//                            // $element = strtotime($element, 0); // use 1.1.1970 as current date
//                        });
//
//                        dd($dates_st  );
//                        return (date('Y',strtotime(data_get($item, 'cargo_inicio'))) <= strval($i) &&
//                        date('Y',strtotime(data_get($item, 'cargo_termino'))) >= strval($i));
//                    });
//                    dump($row);
                    if($cant_persona_sueldo != 0){
                        $aux_row = [$i,$item->first()[$maingroup],$sum_sueldo/$cant_persona_sueldo,$cant_persona_sueldo,$sum_years/$cant_persona_exp];
                        $dataCollect->push($aux_row);
                    }
                    else{
                        $aux_row = [$i,$item->first()[$maingroup],0,0,0];
                        $dataCollect->push($aux_row);
                    }


                }
                else{
                    $aux_row = [$i,$item->first()[$maingroup],0,0,0];
                    $dataCollect->push($aux_row);
                }
            }

        }

        $dataArr=$dataCollect->toArray();
        $dataArr=array_prepend($dataArr,['fecha',$maingroup,'avg_sueldo','cantidad_persona','avg_experencia']);
        return $dataArr;

    }

//    private function data_by_nivel_cargo(){
//
//        $areas = \App\Area::all();
//        $nivel = \App\Nivel_cargo::all();
//
//
//        $startYear = Carbon::createFromFormat('Y-m-d',DB::table('cargos')->min('fecha_inicio'))->year;
//        $endYear =  Carbon::createFromFormat('Y-m-d',DB::table('cargos')->max('fecha_termino'))->year;
//        //Arreglo con informacion de la forma:
//        //["nombre_nivel_cargo","nivel_cargo","fecha","avg_sueldo","area","cantidad"]
//        //Area es determinada por la mayor cantidad de esa area en el nivel de cargo actual
//        $dataCollect = collect();
//        $idxs_nivel = $nivel->pluck(['id']);
//        $idxs_area = $areas->pluck(['id']);
//
//
//        for($i=$startYear; $i<$endYear; $i++){
//            //Buscar por nivel de cargo como clave primaria
//            foreach ($idxs_nivel as $niv_cargo_id){
//                foreach ($idxs_area as $area_id){
//                    $qry = DB::table('nivel_cargos')
//                        ->join('cargos',function($join) use($niv_cargo_id){
//                            $join->on('nivel_cargos.id','=','cargos.nivel_cargo_id')
//                                ->where('cargos.nivel_cargo_id','=',$niv_cargo_id);
//                        })
//                        ->join('areas',function($join) use($area_id){
//                            $join->on('areas.id','=','cargos.area_id')
//                                ->where('cargos.area_id','=',$area_id);
//                        })
//
//                        ->where(function($query) use($i){
//                            $query->whereYear('fecha_termino','>=',$i)
//                                ->whereYear('fecha_inicio','<=',$i);
//                        })
//                        ->select('nivel_cargos.nombre',
//                            'nivel_cargos.nivel',
//                            'cargos.fecha_inicio',
//                            'cargos.sueldo',
//                            'areas.nombre as nombre_area')->get();
//
//                    //Si hay mas de un record agregar al arreglo
//                    if($qry->count()>0){
//                        $itm = $qry[0];
//                        $itm->fecha_inicio = strval($i);
//                        $itm->sueldo = $qry->avg('sueldo');
//                        $arr = array_values((array)$itm);
//                        array_push($arr,$qry->count());
//                        $dataCollect->push($arr);
//
//                    }
//                    //En caso contrario agregar al arreglo datos dummy
//                    //Necesario para el correcto funcionamiento de grafico
//                    //ya que necesita datos continuos
//                    else{
//                        $temp = \App\Nivel_cargo::find($niv_cargo_id);
//                        $dataCollect->push([$temp->nombre,
//                            $temp->nivel,
//                            strval($i),
//                            1,
//                            "No_val",
//                            1,
//                        ]);
//                    }
//                }
//
//            }
//        }
//
//        $dataArr=$dataCollect->toArray();
//        $dataArr=array_prepend($dataArr,["nombre_nivel_cargo","nivel_cargo","fecha","avg_sueldo","area","cantidad"]);
//        return $dataArr;
//    }
//
//    private function data_by_area(){
//        $areas = \App\Area::all();
//        $niveles = \App\Nivel_cargo::all();
//
//        $startYear = Carbon::createFromFormat('Y-m-d',DB::table('cargos')->min('fecha_inicio'))->year;
//        $endYear =  Carbon::createFromFormat('Y-m-d',DB::table('cargos')->max('fecha_termino'))->year;
//        //Arreglo con informacion de la forma:
//        //["nombre_area","cantidad","fecha","avg_sueldo","nivel_cargo"]
//
//        $dataCollect = collect();
//
//        $idxs_nivel = $niveles->pluck(['id']);
//        $idxs_area = $areas->pluck(['id']);
//        for($i=$startYear; $i<$endYear; $i++){
//            //Buscar por nivel de cargo como clave primaria
//            foreach ($idxs_area as $area_id){
//                foreach ($idxs_nivel as $niv_cargo_id) {
//                    $qry = DB::table('areas')
//                        ->join('cargos',function($join) use($area_id){
//                            $join->on('areas.id','=','cargos.area_id')
//                                ->where('cargos.area_id','=',$area_id);
//                        })
//                        ->join('nivel_cargos',function($join) use ($niv_cargo_id){
//                            $join->on('nivel_cargos.id','=','cargos.nivel_cargo_id')
//                                ->where('nivel_cargos.id','=',$niv_cargo_id);
//                        })
//
//
//                        ->where(function($query) use($i){
//                            $query->whereYear('fecha_termino','>=',$i)
//                                ->whereYear('fecha_inicio','<=',$i);
//                        })
//                        ->select('areas.nombre',
//                            'cargos.fecha_inicio',
//                            'cargos.sueldo',
//                            'nivel_cargos.nombre as nombre_nivel_cargo')->get();
//
//                    //Si hay mas de un record agregar al arreglo
//                    if($qry->count()>0){
//                        $itm = $qry[0];
//                        $itm->fecha_inicio = strval($i);
//                        $itm->sueldo = $qry->avg('sueldo');
//
//                        $arr = array_values((array)$itm);
//                        array_push($arr,$qry->count());
//                        $dataCollect->push($arr);
//
//                    }
//                    //En caso contrario agregar al arreglo datos dummy
//                    //Necesario para el correcto funcionamiento de grafico
//                    //ya que necesita datos continuos
//                    else{
//
//                        $temp = \App\Area::find($area_id);
//                        $dataCollect->push([$temp->nombre,
//                            strval($i),
//                            1,
//                            $niveles->where('id','=',$niv_cargo_id)->first()->nombre,
//                            1,
//                        ]);
//                    }
//                }
//
//            }
//        }
//
//        $dataArr=$dataCollect->toArray();
//        $dataArr=array_prepend($dataArr,["nombre_area","fecha","avg_sueldo","nivel_cargo","cantidad"]);
//        return $dataArr;
//    }
}
