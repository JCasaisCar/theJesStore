<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Newsletter;

class HomeController extends Controller
{
    public function index()
    {
        $categorias = Category::all(); // o Category::take(3)->get() si solo quieres 3
        return view('welcome', compact('categorias'));
    }


    public function newsletter(Request $request)
{
    $request->validate([
        'email' => 'required|email|email',
    ]);

    // Comprobar si ya existe el correo
    if (Newsletter::where('email', $request->email)->exists()) {
        return back()->with('error', '¡Ya estás suscrito!');
    }

    Newsletter::create([
        'email' => $request->email,
    ]);

    return back()->with('success', '¡Gracias por suscribirte!');
}


}