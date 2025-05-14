<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class OrdersUsersController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $orders = Order::with(['details.product'])
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('orders_users', compact('orders'));
    }
}