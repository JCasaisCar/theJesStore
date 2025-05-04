<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'model_id', 'name', 'slug', 'description', 'price', 'sku', 'image', 'stock', 'active'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function brand()
{
    return $this->belongsTo(Brand::class);
}

public function model()
{
    return $this->belongsTo(\App\Models\ModelDevice::class, 'model_id');
}
}
