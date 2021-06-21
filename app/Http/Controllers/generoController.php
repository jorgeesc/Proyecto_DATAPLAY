<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Genero;

class generoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); 
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tableGenero = Genero::all();
        return view('Genero.index',["tableGenero" => $tableGenero]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Genero.create');
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

        $mGenero = new Genero($request->all());
        
        $mGenero->save();

        $file = $request->file('imagen');
        if($file){
        $imgNombreVirtual = $file->getClientOriginalName();
        $imgNombreFisico = $mGenero->id.'-'.$imgNombreVirtual;
        \Storage::disk('local')->put($imgNombreFisico, \File::get($file));
        $mGenero->imgNombreVirtual = $imgNombreVirtual;
        $mGenero->imgNombreFisico = $imgNombreFisico;
        $mGenero->save();
    }


        // Regresa a lista de productos
        Session::flash('message', 'Género registrado');
        return Redirect::to('Genero');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelo = Genero::find($id);
        return view('Genero.show', ["modelo" => $modelo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $modelo = Genero::find($id);
        $tableGenero = Genero::orderBy('nombre')->get()->pluck('nombre','id');
        return view('Genero.edit', ["modelo" => $modelo, "tableGenero"=>$tableGenero]);
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

        $mGenero = Genero::find($id);
        $mGenero->fill($request->all());

        $mGenero->save();
        
        $file = $request->file('imagen');
        if($file){
        $imgNombreVirtual = $file->getClientOriginalName();
        $imgNombreFisico = $mGenero->id.'-'.$imgNombreVirtual;
        \Storage::disk('local')->put($imgNombreFisico, \File::get($file));
        $mGenero->imgNombreVirtual = $imgNombreVirtual;
        $mGenero->imgNombreFisico = $imgNombreFisico;
        $mGenero->save();
        }
        Session::flash('message', 'Género actualizado');
        return Redirect::to('Genero');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mGenero = Genero::find($id);
        $mGenero->delete();
        Session::flash('message', 'Género eliminado');
        return Redirect::to('Genero');
    }
}
