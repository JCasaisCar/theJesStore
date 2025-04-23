<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categorias = Category::all(); // o Category::take(3)->get() si solo quieres 3
        return view('welcome', compact('categorias'));
    }
}