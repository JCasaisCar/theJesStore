<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;

class ContactoController extends Controller
{
    public function index()
    {
        return view('contacto');
    }

    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'telefono' => 'nullable|string|max:20',
        'asunto' => 'required|string|max:255',
        'mensaje' => 'required|string',
        'privacidad' => 'accepted',
    ]);

    ContactMessage::create([
        'user_id' => \Illuminate\Support\Facades\Auth::check() ? \Illuminate\Support\Facades\Auth::id() : null,
        'nombre' => $request->nombre,
        'email' => $request->email,
        'telefono' => $request->telefono,
        'asunto' => $request->asunto,
        'mensaje' => $request->mensaje,
    ]);

    return back()->with('success', 'Tu mensaje ha sido enviado correctamente.');
}



public function answer(Request $request)
{
    $request->validate([
        'contact_id' => 'required|exists:contacts,id',
        'answer' => 'required|string|max:1000',
    ]);

    $contact = ContactMessage::findOrFail($request->contact_id);
    $contact->answer = $request->answer;
    $contact->save();

    // Opcional: enviar por email aquí si quieres

    return redirect()->back()->with('success', 'Respuesta enviada correctamente.');
}



public function userMessages()
{
    $messages = ContactMessage::where('user_id', \Illuminate\Support\Facades\Auth::check() ? \Illuminate\Support\Facades\Auth::id() : null)
        ->latest()
        ->get();

    return response()->json($messages);
}
}