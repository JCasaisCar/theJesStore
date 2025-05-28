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
        $categorias = Category::all();
        return view('welcome', compact('categorias'));
    }


    public function newsletter(Request $request)
{
    $request->validate([
        'email' => 'required|email',
    ]);

    if (Newsletter::where('email', $request->email)->exists()) {
            return back()->with('error', __('newsletter.ya_suscrito'));
    }

    Newsletter::create([
        'email' => $request->email,
    ]);

    Notification::route('mail', $request->email)
        ->notify(new NewsletterWelcomeNotification($request->email));

        return back()->with('success', __('newsletter.suscripcion_exitosa'));
}


}