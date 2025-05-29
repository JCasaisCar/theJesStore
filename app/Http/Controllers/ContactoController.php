<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\ContactMessage;
use App\Mail\ContactUserConfirmation;
use App\Mail\ContactAdminNotification;
use App\Mail\ContactUserResponse;
use Illuminate\Support\Facades\Log;

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

        $contact = ContactMessage::create([
            'user_id' => Auth::check() ? Auth::id() : null,
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'asunto' => $request->asunto,
            'mensaje' => $request->mensaje,
        ]);

        Mail::to($contact->email)->send(new ContactUserConfirmation($contact));

        Mail::to('thejesstoremail@gmail.com')->send(new ContactAdminNotification($contact));

        return back()->with('success', __('contacto.mensaje_enviado'));
    }

    public function answer(Request $request)
    {
        Log::info('Respuesta recibida', $request->all());

        $request->validate([
'contact_id' => 'required|exists:contact_messages,id',
'answer' => 'required|string|max:1000',
        ]);

        $contact = ContactMessage::findOrFail($request->contact_id);
        $contact->answer = $request->answer;
        $contact->save();

        Log::info('Enviando respuesta al contacto', [
    'contact_id' => $contact->id,
    'email' => $contact->email,
    'respuesta' => $request->answer,
]);

        Mail::to($contact->email)->send(new ContactUserResponse($contact));

        return redirect()->back()->with('success', __('respuesta_enviada_correctamente'));
    }

    public function userMessages()
    {
        $messages = ContactMessage::where('user_id', Auth::check() ? Auth::id() : null)
            ->latest()
            ->get();

        return response()->json($messages);
    }
}