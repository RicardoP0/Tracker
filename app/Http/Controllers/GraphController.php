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


        $dataArr=$this->data_by_nivel_cargo();
        $dataView = \App\DataView::all()->groupBy('nombre_tipo_empresa');
        $qry = DB::table('data_view')->select('*',DB::raw('COUNT(nombre_carrera) as count'))->
        groupBy('nombre_area')->get();
//        dd($dataView->first()->filter(function ($item) {
//            return (data_get($item, 'fecha_ingreso') > '2010');
//        })->avg('sueldo_cargo'));


        $dataArr = $this->data_array('nombre_cargo','nombre_area');


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
        $color_data_key = $request->color_data_key;

        $dataArr = $this->data_array($main_data_key,$color_data_key);

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
    private function data_array(string $maingroup,string $colorGroup){
        $startYear = Carbon::createFromFormat('Y-m-d',DB::table('cargos')->min('fecha_inicio'))->year;
        $endYear =  Carbon::createFromFormat('Y-m-d',DB::table('cargos')->max('fecha_termino'))->year;
        $dataCollect = collect();
        $dataView = \App\DataView::all();
        $main_group = $dataView->groupBy($maingroup);
        $color_group = $dataView->groupBy($colorGroup)->keys();

        for($i=$startYear; $i<$endYear; $i++){
            foreach ( $main_group as $item){
                foreach ($color_group as $color){
                    $row = $item->filter(function ($item) use($i,$colorGroup,$color) {
                        return (data_get($item, 'cargo_inicio') <= strval($i) &&
                            data_get($item, 'cargo_termino') > strval($i) &&
                            data_get($item, $colorGroup) == $color );
                    });

                    if (count($row)){
                        $row = $row->unique('rut_persona');
                        $aux_row = [$i,$row->first()[$maingroup],$color,$row->avg('sueldo_cargo'),count($row)];
                        $dataCollect->push($aux_row);
                    }
                    else{
                        $aux_row = [$i,$item->first()[$maingroup],$color,0,0];
                        $temp = $item->filter(function ($item) use($i,$colorGroup,$color) {
                            return (data_get($item, $colorGroup) == $color );
                        });
                        $dataCollect->push($aux_row);
                    }

                }
            }

        }

        $dataArr=$dataCollect->toArray();
        $dataArr=array_prepend($dataArr,['fecha',$maingroup,$colorGroup,'avg_sueldo','cantidad_persona']);
        return $dataArr;

    }

    private function data_by_nivel_cargo(){

        $areas = \App\Area::all();
        $nivel = \App\Nivel_cargo::all();


        $startYear = Carbon::createFromFormat('Y-m-d',DB::table('cargos')->min('fecha_inicio'))->year;
        $endYear =  Carbon::createFromFormat('Y-m-d',DB::table('cargos')->max('fecha_termino'))->year;
        //Arreglo con informacion de la forma:
        //["nombre_nivel_cargo","nivel_cargo","fecha","avg_sueldo","area","cantidad"]
        //Area es determinada por la mayor cantidad de esa area en el nivel de cargo actual
        $dataCollect = collect();
        $idxs_nivel = $nivel->pluck(['id']);
        $idxs_area = $areas->pluck(['id']);


        for($i=$startYear; $i<$endYear; $i++){
            //Buscar por nivel de cargo como clave primaria
            foreach ($idxs_nivel as $niv_cargo_id){
                foreach ($idxs_area as $area_id){
                    $qry = DB::table('nivel_cargos')
                        ->join('cargos',function($join) use($niv_cargo_id){
                            $join->on('nivel_cargos.id','=','cargos.nivel_cargo_id')
                                ->where('cargos.nivel_cargo_id','=',$niv_cargo_id);
                        })
                        ->join('areas',function($join) use($area_id){
                            $join->on('areas.id','=','cargos.area_id')
                                ->where('cargos.area_id','=',$area_id);
                        })

                        ->where(function($query) use($i){
                            $query->whereYear('fecha_termino','>=',$i)
                                ->whereYear('fecha_inicio','<=',$i);
                        })
                        ->select('nivel_cargos.nombre',
                            'nivel_cargos.nivel',
                            'cargos.fecha_inicio',
                            'cargos.sueldo',
                            'areas.nombre as nombre_area')->get();

                    //Si hay mas de un record agregar al arreglo
                    if($qry->count()>0){
                        $itm = $qry[0];
                        $itm->fecha_inicio = strval($i);
                        $itm->sueldo = $qry->avg('sueldo');
                        $arr = array_values((array)$itm);
                        array_push($arr,$qry->count());
                        $dataCollect->push($arr);

                    }
                    //En caso contrario agregar al arreglo datos dummy
                    //Necesario para el correcto funcionamiento de grafico
                    //ya que necesita datos continuos
                    else{
                        $temp = \App\Nivel_cargo::find($niv_cargo_id);
                        $dataCollect->push([$temp->nombre,
                            $temp->nivel,
                            strval($i),
                            1,
                            "No_val",
                            1,
                        ]);
                    }
                }

            }
        }

        $dataArr=$dataCollect->toArray();
        $dataArr=array_prepend($dataArr,["nombre_nivel_cargo","nivel_cargo","fecha","avg_sueldo","area","cantidad"]);
        return $dataArr;
    }

    private function data_by_area(){
        $areas = \App\Area::all();
        $niveles = \App\Nivel_cargo::all();

        $startYear = Carbon::createFromFormat('Y-m-d',DB::table('cargos')->min('fecha_inicio'))->year;
        $endYear =  Carbon::createFromFormat('Y-m-d',DB::table('cargos')->max('fecha_termino'))->year;
        //Arreglo con informacion de la forma:
        //["nombre_area","cantidad","fecha","avg_sueldo","nivel_cargo"]

        $dataCollect = collect();

        $idxs_nivel = $niveles->pluck(['id']);
        $idxs_area = $areas->pluck(['id']);
        for($i=$startYear; $i<$endYear; $i++){
            //Buscar por nivel de cargo como clave primaria
            foreach ($idxs_area as $area_id){
                foreach ($idxs_nivel as $niv_cargo_id) {
                    $qry = DB::table('areas')
                        ->join('cargos',function($join) use($area_id){
                            $join->on('areas.id','=','cargos.area_id')
                                ->where('cargos.area_id','=',$area_id);
                        })
                        ->join('nivel_cargos',function($join) use ($niv_cargo_id){
                            $join->on('nivel_cargos.id','=','cargos.nivel_cargo_id')
                                ->where('nivel_cargos.id','=',$niv_cargo_id);
                        })


                        ->where(function($query) use($i){
                            $query->whereYear('fecha_termino','>=',$i)
                                ->whereYear('fecha_inicio','<=',$i);
                        })
                        ->select('areas.nombre',
                            'cargos.fecha_inicio',
                            'cargos.sueldo',
                            'nivel_cargos.nombre as nombre_nivel_cargo')->get();

                    //Si hay mas de un record agregar al arreglo
                    if($qry->count()>0){
                        $itm = $qry[0];
                        $itm->fecha_inicio = strval($i);
                        $itm->sueldo = $qry->avg('sueldo');

                        $arr = array_values((array)$itm);
                        array_push($arr,$qry->count());
                        $dataCollect->push($arr);

                    }
                    //En caso contrario agregar al arreglo datos dummy
                    //Necesario para el correcto funcionamiento de grafico
                    //ya que necesita datos continuos
                    else{

                        $temp = \App\Area::find($area_id);
                        $dataCollect->push([$temp->nombre,
                            strval($i),
                            1,
                            $niveles->where('id','=',$niv_cargo_id)->first()->nombre,
                            1,
                        ]);
                    }
                }

            }
        }

        $dataArr=$dataCollect->toArray();
        $dataArr=array_prepend($dataArr,["nombre_area","fecha","avg_sueldo","nivel_cargo","cantidad"]);
        return $dataArr;
    }
}
