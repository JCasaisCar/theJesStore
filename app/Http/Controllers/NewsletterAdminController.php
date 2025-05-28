<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminNewsletterNotification;

class NewsletterAdminController extends Controller
{
    public function form()
    {
        return view('admin.newsletter.send');
    }

    public function send(Request $request)
{
    $request->validate([
        'subject' => 'required|string|max:255',
        'body' => 'required|string',
    ]);

    $subscribers = Newsletter::pluck('email');

    foreach ($subscribers as $email) {
    Notification::route('mail', $email)->notify(
        new AdminNewsletterNotification($request->subject, $request->body, $email)
    );
}

        return back()->with('success', __('newsletter.correo_enviado'));
}
}
