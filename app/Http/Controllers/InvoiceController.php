<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Order;

class InvoiceController extends Controller
{
    public function download(Order $order)
    {
        if ($order->user_id !== Auth::id()) {
            abort(403);
        }

        // Ruta al archivo dentro del disco 'public'
        $relativePath = "facturas/factura_pedido_{$order->id}.pdf";
        $fullPath = Storage::disk('public')->path($relativePath);

        if (!Storage::disk('public')->exists($relativePath)) {
            abort(404, 'Factura no encontrada.');
        }

        return response()->download($fullPath);
    }
}