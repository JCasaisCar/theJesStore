<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactoMailable;
use App\Models\User;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto');
    }
}