<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NuestraEmpresaController extends Controller
{
    public function index()
    {
        return view('nuestra_empresa');
    }
}
