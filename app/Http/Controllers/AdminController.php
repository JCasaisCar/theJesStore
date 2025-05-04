<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
{
    $totalProductos = Product::count();
    $productosActivos = Product::where('active', true)->count();
    $stockBajo = Product::where('stock', '<', 5)->count();
    $totalCategorias = Category::count();

    $totalPedidos = Order::count();
    $pedidosPendientes = Order::where('status', 'pendiente')->count();
    $totalVentas = Order::sum('total');

    $totalUsuarios = User::count();
    $totalClientes = User::where('role', 'user')->count(); // 👈 Añadir esta línea
    $nuevosUsuarios = User::whereDate('created_at', '>=', now()->subMonth())->count();

    $totalContactos = Contact::count();

    $ultimosPedidos = Order::latest()->take(5)->get();
    $ultimosContactos = Contact::latest()->take(5)->get();

    return view('admin', compact(
        'totalProductos',
        'productosActivos',
        'stockBajo',
        'totalCategorias',
        'totalPedidos',
        'pedidosPendientes',
        'totalVentas',
        'totalUsuarios',
        'totalClientes', // 👈 Añadir esta variable
        'nuevosUsuarios',
        'totalContactos',
        'ultimosPedidos',
        'ultimosContactos'
    ));
}

}
