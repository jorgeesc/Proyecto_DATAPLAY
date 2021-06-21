<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('views', function(){

// return view('Conocenos/index');
// });

Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');

Route::get('/cache', function() {
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    return "Caché limpio";
})->name('cache');

Route::group(['middleware' => ['auth'] ], function(){
    Route::resource('users', 'UserController');
    Route::resource('Roles', 'rolesController');
    Route::resource('Juegos', 'juegosController');
    Route::resource('Genero', 'generoController');
    Route::resource('Noticias', 'noticiasController');
    Route::resource('Proveedor', 'proveedorController');
    Route::resource('Conocenos', 'ConocenosController');
    Route::resource('Ventas', 'VentasController');
    Route::resource('DetalleVentas', 'Detalle_VentasController');
    Route::resource('Carrito', 'CarritoController');


Route::post('/agregarCarrito', 'juegosController@agregarCarrito')
->name('agregarCarrito');

Route::post('/ConcretarVenta', 'juegosController@ConcretarVenta')
->name('ConcretarVenta');

Route::post('/quitarCarrito', 'CarritoController@quitarCarrito')
->name('quitarCarrito');


   
});

