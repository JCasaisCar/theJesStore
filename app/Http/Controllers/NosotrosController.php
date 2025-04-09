<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;

class NosotrosController extends Controller
{
    public function index()
    {
        return view('nosotros');
    }
}