<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
Use Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Noticias;

class noticiasController extends Controller
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
        $tableNoticias = Noticias::all();
        return view('Noticias.index',["tableNoticias" => $tableNoticias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Noticias.create');
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
            'nombre' => 'required|min:5|max:200',
            'descripcion' => 'required|min:5|max:200',
            'fuente' => 'required|min:5|max:200'
        ]);

        $mNoticias = new Noticias($request->all());
        
        $mNoticias->save();

        $file = $request->file('imagen');
        if($file){
        $imgNombreVirtual = $file->getClientOriginalName();
        $imgNombreFisico = $mNoticias->id.'-'.$imgNombreVirtual;
        \Storage::disk('local')->put($imgNombreFisico, \File::get($file));
        $mNoticias->imgNombreVirtual = $imgNombreVirtual;
        $mNoticias->imgNombreFisico = $imgNombreFisico;
        $mNoticias->save();
    }
         // Regresa a lista de productos
        Session::flash('message', 'Noticia registrada');
        return Redirect::to('Noticias');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelo = Noticias::find($id);
        return view('Noticias.show', ["modelo" => $modelo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelo = Noticias::find($id);
        $tableNoticias = Noticias::orderBy('nombre')->get()->pluck('nombre','id');
        return view('Noticias.edit', ["modelo" => $modelo, "tableNoticias"=>$tableNoticias]);
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
            'nombre' => 'required|min:5|max:200',
            'descripcion' => 'required|min:5|max:200',
            'fuente' => 'required|min:5|max:200'
 
        ]);

        $mNoticias = Noticias::find($id);
        $mNoticias->fill($request->all());

        $mNoticias->save();
        
        $file = $request->file('imagen');
        if($file){
        $imgNombreVirtual = $file->getClientOriginalName();
        $imgNombreFisico = $mNoticias->id.'-'.$imgNombreVirtual;
        \Storage::disk('local')->put($imgNombreFisico, \File::get($file));
        $mNoticias->imgNombreVirtual = $imgNombreVirtual;
        $mNoticias->imgNombreFisico = $imgNombreFisico;
        $mNoticias->save();
        }
        Session::flash('message', 'Noticia actualizada');
        return Redirect::to('Noticias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mNoticias = Noticias::find($id);
        $mNoticias->delete();
        Session::flash('message', 'Noticia eliminada');
        return Redirect::to('Noticias');
    }
}


























