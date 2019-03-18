<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NivelCargoController extends Controller
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
        $request->validate([
            'otros_cargo'=>'required',
            'new_cargo_name'=>'required|string',
        ]);
        $otros_cargo = \App\Nivel_cargo::findOrFail($request->otros_cargo);
        $otros_cargo->nombre = $request->new_cargo_name;
        $otros_cargo->nivel  = 4;
        $otros_cargo->save();
        return redirect()->back();
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
        $request->validate([
            'otros_cargo'=>'required',
            'new_cargo_name'=>'required|string',
        ]);
        $otros_cargo = \App\Nivel_cargo::findOrFail($request->otros_cargo);
        $new_cargo = \App\Nivel_cargo::findOrFail($request->new_cargo_name);
        $trabajo = $otros_cargo->cargos()->first();

        $trabajo->nivel_cargo()->associate($new_cargo);
        $trabajo->save();
        $otros_cargo->delete();
        return redirect()->back();

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
