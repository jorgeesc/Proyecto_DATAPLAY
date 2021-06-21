<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Proveedor;

class proveedorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }
    
    
    public function index()
    {
        $tableProveedor = Proveedor::all();
        return view('Proveedor.index',["tableProveedor" => $tableProveedor]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Proveedor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|min:5|max:30'
        ]);

        $mProveedor = new Proveedor($request->all());
        
        $mProveedor->save();

        $file = $request->file('imagen');
        if($file){
            $imgNombreVirtual = $file->getClientOriginalName();
            $imgNombreFisico = $mProveedor->id.'-'.$imgNombreVirtual;
            \Storage::disk('local')->put($imgNombreFisico, \File::get($file));
            $mProveedor->imgNombreVirtual = $imgNombreVirtual;
            $mProveedor->imgNombreFisico = $imgNombreFisico;
            $mProveedor->save();
            
        }
            
        Session::flash('message', 'Proveedor registrado');
        return Redirect::to('Proveedor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Proveedor = Proveedor::find($id);
        return view('Proveedor.show', ["modelo" => $Proveedor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelo = Proveedor::find($id);
        $tableProveedor = Proveedor::orderBy('nombre')->get()->pluck('nombre','id');
        return view('Proveedor.edit', ["modelo" => $modelo, "tableProveedor"=>$tableProveedor]);
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

        $mProveedor = Proveedor::find($id);
        $mProveedor->fill($request->all());

        $mProveedor->save();
        
        $file = $request->file('imagen');
        if($file){
        $imgNombreVirtual = $file->getClientOriginalName();
        $imgNombreFisico = $mProveedor->id.'-'.$imgNombreVirtual;
        \Storage::disk('local')->put($imgNombreFisico, \File::get($file));
        $mProveedor->imgNombreVirtual = $imgNombreVirtual;
        $mProveedor->imgNombreFisico = $imgNombreFisico;
        $mProveedor->save();
        }
        Session::flash('message', 'Proveedor actualizado');
        return Redirect::to('Proveedor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mGenero = Proveedor::find($id);
        $mGenero->delete();
        Session::flash('message', 'Proveedor eliminado');
        return Redirect::to('Proveedor');
    }
}
