<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperProduct
 */
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

    public function manufacturer ()
    {
        return $this->belongsTo(Manufacturer::class);
    }


    public function images ()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function firstImage()
    {
        return $this->hasOne(ProductImage::class)->orderBy('id','ASC');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
