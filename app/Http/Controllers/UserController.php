<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Role;
use App\User;
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
    public function index(Request $request)
    {
        $usuarios=User::all();
        $privilegios=Role::all();
        $request->user()->authorizeRoles(['admin']);
        return view('permisos',compact('usuarios','privilegios'));
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
            'password'=>'required|min:6|confirmed',
            'rut' =>'required|max:30',
            'bdate' => 'required|date|before:"2001-01-01"',
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
//            'password'=>Hash::make($request->password)
            'password'=>$request->password
        ]);


        if($request->op==null){
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
        }else{
            if($request->op==2){
                $user
                    ->roles()
                    ->attach(Role::where('name', 'user')->first());
            }else{
                $user
                    ->roles()
                    ->attach(Role::where('name', 'admin')->first());
            }
            $user->persona()->save($persona);
            return $user->id;
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
    public function update(Request $request)
    {
        $request->validate([
            'name'=>'required|max:120',
//            'email'=>'required|email|unique:users',
            'rut' =>'required|max:30',
            'gender' => 'required|string'
        ]);

        $user=User::find($request->id);
        $user->name=$request->name;
        $user->rut=$request->rut;
        $user->email=$request->email;

        $persona=Persona::where('user_id',$request->id)->first();
        $persona->genero=$request->gender;
        $persona->save();
        $user->roles()->sync([$request->op]);

        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        if($id!=1){
            $user=User::find($id);
            $user->forceDelete();
            return redirect('/permisos')->with('success','Se ha eliminado correctamente.');
        }else{
            return redirect('/permisos')->with('fail','No se puede eliminar el administrador original.');
        }

    }

}
