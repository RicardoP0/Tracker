<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
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
        return view('registro.create');
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
            'name'=>'required|max:120',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:6'
        ]);
        $user = \App\User::create($request->only('email', 'name', 'password'));
        $persona= new \App\Persona(['nombre'=>$request->name,'rut'=>$request->rut,'genero'=>$request->gender,'fecha_nacimiento'=>$request->bdate]);
        $user->persona()->save($persona);
        return redirect()->route('home');
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
    //agregar id
    public function config(){
        $post = \App\Postgrado::all();
        $tipo = \App\TipoPostgrado::all();
        $universidades=\App\Universidad::all();
        $areaT = \App\Area::all();
        $rubro =  \App\Rubro::all();
        $tipoEmp =  \App\Tipo_empresa::all();
        $nivel= \App\Nivel_cargo::all();
        $emp= \App\Empresa::all();
        return view('Registro.config', compact
        ('post','tipo','universidades','areaT','rubro','tipoEmp','nivel','emp'));
    }


}
