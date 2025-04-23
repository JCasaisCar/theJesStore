<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $fillable = [
        'user_id', 'nombre', 'apellidos', 'email', 'telefono',
        'direccion', 'direccion2', 'ciudad', 'provincia', 'codigo_postal', 'pais'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
