<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\ShippingAddress;
use App\Notifications\CustomVerifyEmail;



class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'active',
        'email_verified_at',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime', // Asegura que email_verified_at sea un timestamp
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            if ($user->role === 'admin') {
                $user->email_verified_at = now();
            }
        });
    }

    /**
 * @property \Illuminate\Database\Eloquent\Collection|\App\Models\ShippingAddress[] $shippingAddresses
 */

    public function shippingAddresses()
{
    return $this->hasMany(ShippingAddress::class);
}

    // Relación con product
    public function product()
    {
        return $this->hasOne(Product::class, 'user_id');
    }



    public function sendEmailVerificationNotification()
{
    $this->notify(new CustomVerifyEmail($this));
}
}
