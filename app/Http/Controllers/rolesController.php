<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
Use Redirect;
use App\Models\Roles;

class rolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tableRoles = Roles::all();
        return view('Roles.index',["tableRoles" => $tableRoles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('Roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // De forma automática regresa a la pantalla de origen creando una variable llamada $errors
        // la cual contiene las validaciones realizadas
        $validatedData = $request->validate([
            'nombre' => 'required|min:5|max:30'          
        ]);

        $mRol = new Roles($request->all());

        $mRol->save();

        // Regresa a lista de productos 
        Session::flash('message', 'Rol registrado!');
        return Redirect::to('Roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelo = Roles::find($id);
        return view('Roles.show', ["modelo" => $modelo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelo = Roles::find($id);
        $tableRoles = Roles::orderBy('nombre')->get()->pluck('nombre','id');
        return view('Roles.edit', ["modelo" => $modelo, "tableRoles"=>$tableRoles]);
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
        $validatedData = $request->validate([
            'nombre' => 'required|min:5|max:30',
 
        ]);

        $mRol = Roles::find($id);
        $mRol->fill($request->all());

        $mRol->save();

        Session::flash('message', 'Rol Actualizado!');
        return Redirect::to('Roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mRol = Roles::find($id);
        $mRol->delete();
        Session::flash('message', 'Rol eliminado!');
        return Redirect::to('Roles');
    }
}
