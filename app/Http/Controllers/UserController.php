<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\userEloquent;
use Session;
use Redirect;
use App\Models\Roles;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $tableUsers = UserEloquent::all();
        // return view ('users.index',["tableUsers"=> $tableUsers]);

        $whereClause = [];
        if($request->nombre){
            array_push($whereClause, [ "name" ,'like', '%'.$request->nombre.'%' ]);
            }
            $tableUsers = UserEloquent::orderBy('name')->where($whereClause)->get();
            return view('users.index', ["tableUsers" => $tableUsers, "filtroNombre" => $request->nombre ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $tableRol = Roles::orderBy('nombre')->get()->pluck('nombre','id');
        return view('users.create',[ 'tableRol' => $tableRol ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $validateData=$request->validate([
        'name'=>'required|min:2|max:30',
        'password'=>'required|min:5|max:10',
        'email'=>'required|email|unique:users'
    ]);
        $usrExistente = UserEloquent::where('email', $request->email)->first(); 
        
        if($usrExistente){
            return Redirect()->route('users.create')->withErrors(['email' => 'Mi error'])->withInput();
        }

        $mUser = new UserEloquent();
        $mUser->fill($request->all());
        $mUser->password = bcrypt($mUser->password);
        $mUser->rol_id = $request->rol_id;
        $mUser->save();

        Session::flash('message','Usuario Creado!');
        return Redirect::to('users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelo = UserEloquent::find($id);
        return view('users.show', ["modelo" => $modelo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mUser = userEloquent::find($id);
        $tableRol = Roles::orderBy('nombre')->get()->pluck('nombre','id'); 
        return view('users.edit', ["modelo" => $mUser, "tableRol"=>$tableRol]);
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
        if ($request->rol_id==2) {
        $validatedData = $request->validate([
            'name' => 'required|min:2|max:30',
            'password' => 'min:5|max:10',
            'email' => 'required|email',
        ]);

        $mUser = UserEloquent::find($id);
        $mUser->name = $request->name;
        $mUser->email = $request->email;
        $mUser->updated_at = date('Y-m-d H:i:s');
        $mUser->rol_id = $request->rol_id;
        if($request->password != '*****'){
            $mUser->password = bcrypt($request->password);
        }
        $mUser->save();

        // Regresa a lista de usuario
        Session::flash('message', 'Usuario actualizado!');
        return Redirect::to('users');    
        }
        else{
            $validatedData = $request->validate([
            'name' => 'required|min:2|max:30',
            'password' => 'min:5|max:10',
            'email' => 'required|email',
        ]);

        $mUser = UserEloquent::find($id);
        $mUser->name = $request->name;
        $mUser->email = $request->email;
        $mUser->updated_at = date('Y-m-d H:i:s');
        $mUser->rol_id = $request->rol_id;
        if($request->password != '*****'){
            $mUser->password = bcrypt($request->password);
        }
        $mUser->save();

        // Regresa a lista de usuario
        Session::flash('message', 'Perfil actualizado!');
        $modelo = UserEloquent::find($id);
        return view('users.show', ["modelo" => $modelo]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mUser = UserEloquent::find($id);
        $mUser->delete();

        Session::flash('message', 'Usuario eliminado!');
        return Redirect::to('users');
    }
}
