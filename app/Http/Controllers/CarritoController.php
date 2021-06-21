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
use App\Http\Controllers\juegosController;


class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        $carrito = $request->session()->get('carrito');
        if(!$carrito){
        $carrito = [];
        }

        return view('Carrito.index',["carrito"=>$carrito]);


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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
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
        $carrito = Session::find($id);
        $carrito->delete();
        Session::flash('message', 'Produto eliminado');
        return Redirect::to('Carrito');
    }


    public function quitarCarrito(Request $request) {
        $carrito = $request->session()->get('carrito');
        if(!$carrito){
        $carrito = [];
        }
        $request->session()->forget('carrito', $carrito);
        // echo var_dump($carrito);

        return Redirect::to('Carrito');


        }


    
}
