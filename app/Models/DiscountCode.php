<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiscountCode extends Model
{
    protected $fillable = ['code', 'percentage', 'expires_at', 'is_active'];

    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('used')
            ->withTimestamps();
    }

    public function orders()
{
    return $this->hasMany(\App\Models\Order::class);
}
}