<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Redirect;



class ConocenosController extends Controller
{


	public function __construct()
    {
        $this->middleware('auth'); 
    }


	public function index()
    {

             return view('Conocenos.index');
    }
    //
}


