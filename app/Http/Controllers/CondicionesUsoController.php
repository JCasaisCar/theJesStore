<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CondicionesUsoController extends Controller
{
    public function index()
    {
        return view('condiciones_uso');
    }
}
