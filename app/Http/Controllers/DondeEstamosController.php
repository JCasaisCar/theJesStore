<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DondeEstamosController extends Controller
{
    public function index()
    {
        return view('donde_estamos');
    }
}
