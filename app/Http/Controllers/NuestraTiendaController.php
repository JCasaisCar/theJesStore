<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NuestraTiendaController extends Controller
{
    public function index()
    {
        return view('nuestra_tienda');
    }
}
