<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use App\Models\Newsletter;
use App\Notifications\NewsletterWelcomeNotification;
use Illuminate\Support\Facades\Notification;

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
        'email' => 'required|email',
    ]);

    if (Newsletter::where('email', $request->email)->exists()) {
        return back()->with('error', '¡Ya estás suscrito!');
    }

    Newsletter::create([
        'email' => $request->email,
    ]);

    // 📧 Enviar notificación (a un Notifiable genérico anónimo)
    Notification::route('mail', $request->email)
        ->notify(new NewsletterWelcomeNotification($request->email));

    return back()->with('success', '¡Gracias por suscribirte!');
}


}