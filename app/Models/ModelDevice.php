<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelDevice extends Model
{
    protected $fillable = ['brand_id', 'name'];

    public function brand()
{
    return $this->belongsTo(\App\Models\Brand::class, 'brand_id');
}

public function products()
{
    return $this->hasMany(Product::class);
}
}
