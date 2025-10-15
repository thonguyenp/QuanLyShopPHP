<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'description',
        'price',
        'stock',
        'status'
    ];

    public function category ()
    {
        return $this->belongsTo(Category::class);
    }

    public function image ()
    {
        return $this->hasMany(ProductImage::class);
    }
}
