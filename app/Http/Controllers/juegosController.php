<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
Use Redirect;
use Illuminate\Support\Facades\DB;
use App\Models\Juegos;
use App\Models\Proveedor;
use App\Models\Genero;
use App\Models\venta;
use App\Models\detalle_venta;




class juegosController extends Controller
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
    public function index(Request $request)
    {
        $tableJuegos = DB::table('juegos')
        ->join('genero', 'juegos.genero_id', '=', 'genero.id')
        ->select('juegos.*', 'genero.nombre as genero')
        ->get();


        $whereClause = [];
		if($request->nombre){
			array_push($whereClause, [ "nombre" ,'like', '%'.$request->nombre.'%' ]);
		}
		$tableJuegos = Juegos::orderBy('nombre')->where($whereClause)->get();
		return view('Juegos.index', ["tableJuegos" => $tableJuegos, "filtroNombre" => $request->nombre ]);


        return view('Juegos.index', ["tableJuegos" =>  $tableJuegos ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tableJuegos = Genero::orderBy('nombre')->get()->pluck('nombre','id');
        $tableJuegosP = Proveedor::orderBy('nombre')->get()->pluck('nombre','id');
        return view('Juegos.create',[ 'tableJuegos' => $tableJuegos, 'tableJuegosP' => $tableJuegosP]);

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
            'nombre' => 'required|min:5|max:100',
            'descripcion' => 'required|min:10|max:1000',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|min:1|max:4',
            
        ]);

        $mJuegos = new Juegos($request->all());
        if($request->status){
            $mJuegos->status = true; 
        } else {
            $mJuegos->status = false;
        }

        $mJuegos->save();

        $file = $request->file('imagen');
        if($file){
        $imgNombreVirtual = $file->getClientOriginalName();
        $imgNombreFisico = $mJuegos->id.'-'.$imgNombreVirtual;
        \Storage::disk('local')->put($imgNombreFisico, \File::get($file));
        $mJuegos->imgNombreVirtual = $imgNombreVirtual;
        $mJuegos->imgNombreFisico = $imgNombreFisico;
        $mJuegos->save();
        }
        // Regresa a lista de productos
        Session::flash('message', 'Juego registrado');
        return Redirect::to('Juegos');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelo = Juegos::find($id);
        return view('Juegos.show', ["modelo" => $modelo]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $modelo = Juegos::find($id);
        $tableJuegos = Genero::orderBy('nombre')->get()->pluck('nombre','id');
        $tableJuegosP = Proveedor::orderBy('nombre')->get()->pluck('nombre','id');
        return view('Juegos.edit', ["modelo" => $modelo, "tableJuegos"=>$tableJuegos, 'tableJuegosP' => $tableJuegosP]);
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
            'nombre' => 'required|min:5|max:100',
            'descripcion' => 'required|min:10|max:1000',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|min:1|max:4',
            'genero_id' => 'required|exists:genero,id',
            'proveedor_id' => 'required|exists:proveedores,id'
            
        ]);

        $mJuegos = Juegos::find($id);
        $mJuegos->fill($request->all());
        if($request->status){
            $mJuegos->status = true; 
        } else {
            $mJuegos->status = false;
        }

        $mJuegos->save();

        $file = $request->file('imagen');
        if($file){
        $imgNombreVirtual = $file->getClientOriginalName();
        $imgNombreFisico = $mJuegos->id.'-'.$imgNombreVirtual;
        \Storage::disk('local')->put($imgNombreFisico, \File::get($file));
        $mJuegos->imgNombreVirtual = $imgNombreVirtual;
        $mJuegos->imgNombreFisico = $imgNombreFisico;
        $mJuegos->save();
        }
        // Regresa a lista de productos
        Session::flash('message', 'Juego actualizado');
        return Redirect::to('Juegos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mJuegos = Juegos::find($id);
        $mJuegos->delete();
        Session::flash('message', 'Juego eliminado');
        return Redirect::to('Juegos');
    }
    public function agregarCarrito(Request $request) {
        $carrito = $request->session()->get('carrito');
        if(!$carrito){
        $carrito = [];
        }

        if($request->cantidad <1){
            return Redirect()->route('Carrito.index')->withErrors(['Stock' => 'La cantidad minima debe de ser 1 '])->withInput();
            }

        array_push($carrito, [
        'id' => $request->id,
        'cantidad' =>intval($request->cantidad),
        'precio' => intval($request->precio),
        'nombre' => $request->nombre
        ] );
        $request->session()->put('carrito', $carrito);
        // echo var_dump($carrito);

        Session::flash('message', 'Juego agregado');
        return Redirect::to('Juegos');


        }


        public function ConcretarVenta(Request $request) {
        $carrito = $request->session()->get('carrito');
        if(!$carrito){
        $carrito = [];
        }

// registro de la venta

        foreach ($carrito as $value) {
           

            $juego=Juegos::find($value['id']);
            $juego->stock-=($value['cantidad']);

            if($juego->stock <0){
            return Redirect()->route('Carrito.index')->withErrors(['Stock' => 'No hay existencias suficientes del producto '.$juego->nombre])->withInput();
            }
    
        }
// validacion de existencias
        $venta=new venta();
        $venta->user_id=\Auth::user()->id;
        $venta->total=0;
        $venta->save();

      foreach ($carrito as $value) {
            $detalle_venta=new detalle_venta();
            $detalle_venta->cantidad=$value['cantidad'];
            $detalle_venta->juegos_id=$value['id'];
            $detalle_venta->venta_id=$venta->id;
            $detalle_venta->precio=$value['precio'];
            $detalle_venta->save();

            $venta->total+=($value['precio']*$value['cantidad']);


            $juego=Juegos::find($value['id']);
            $juego->stock-=($value['cantidad']);
            $juego->save();
        }



        $venta->save();
//descontar del inventario 

        $request->session()->put('carrito',[]);
        // echo var_dump($carrito);

        Session::flash('message', 'Venta concretada');
        return Redirect::to('Juegos');

        }




        
       
    
}

