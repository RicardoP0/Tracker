<?php

namespace App\Http\Controllers;

use App\Otro_area;
use Illuminate\Http\Request;

class OtroAreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except('create');
        $this->middleware('guest')->only('create');
    }
    public function index(Request $request)
    {
        $otros = Otro_area::all();
        $areas = \App\Area::all();
        $universidades = \App\Universidad::where('sede',"otro")->get();
        //99 es para niveles guardados como otro
        $cargos = \App\Nivel_cargo::where('nivel',99)->get();
        $niveles = \App\Nivel_cargo::where('nivel','<',99)->get();
        $request->user()->authorizeRoles(['admin']);
        return view('otros_area', compact('otros','areas','universidades','cargos','niveles'));
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
        $request->validate([
            'otros_area'=>'required',
            'new_area_name'=>'required|string',
        ]);
        $otros_area = \App\Otro_area::findOrFail($request->otros_area);
        $cargo = $otros_area->cargo;
        $area = \App\Area::create(['nombre'=>$request->new_area_name]);
        $cargo->area()->associate($area);
        $cargo->save();
        $otros_area->delete();
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Otro_area  $otro_area
     * @return \Illuminate\Http\Response
     */
    public function show(Otro_area $otro_area)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Otro_area  $otro_area
     * @return \Illuminate\Http\Response
     */
    public function edit(Otro_area $otro_area)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Otro_area  $otro_area
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Otro_area $otro_area)
    {
        $request->validate([
            'otros_area'=>'required',
            'new_area'=>'required',
        ]);
        $otro = \App\Otro_area::findOrFail($request->otros_area);
        $area = \App\Area::findOrFail($request->new_area);

        $cargo = $otro->cargo;
        $cargo->area()->associate($area);
        $cargo->save();
        $otro->delete();
        return redirect()->back()->with("Dato editado");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Otro_area  $otro_area
     * @return \Illuminate\Http\Response
     */
    public function destroy(Otro_area $otro_area)
    {
        //
    }
}
