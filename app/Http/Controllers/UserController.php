<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Role;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('guest')->only('create');
    }
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
            'password'=>'required|min:6',
            'rut' =>'required|max:30',
            'bdate' => 'required|date',
            'gender' => 'required|string'
        ]);

        $persona= new \App\Persona(['nombre'=>$request->name,
            'situacion_laboral' => 'temp',
            'rut'=>$request->rut,'genero'=>$request->gender,
            'fecha_nacimiento'=>$request->bdate,
        ]);

        $user = \App\User::create(['email'=>$request->email,
            'name'=>$request->name,
            'rut'=>$request->rut,
            'password'=>Hash::make($request->password)
        ]);

        $user
            ->roles()
            ->attach(Role::where('name', 'user')->first());

        $user->persona()->save($persona);
        if(Auth::attempt($request->only('email','password'))){
            return redirect('persona/'.$persona->id);
        }
        else{
            abort('401');
        }



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
