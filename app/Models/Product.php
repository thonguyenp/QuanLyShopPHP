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
        'manufacturer_id',
        'description',
        'price',
        'stock',
        'status',
        'gpu',
        'cpu',
        'ram',
        'rom',
        'connection_port',
        'camera',
        'battery',
        'monitor_size',
        'monitor_resolution',
        'isArrival'
    ];

    protected $appends = ['image_url','average_rating'];

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

    public function getAverageRatingAttribute()
    {
        return $this->reviews->avg('rating') ?? 0;
    }

    public function getImageUrlAttribute()
    {
        return $this->firstImage?->image ? asset('storage/' . $this->firstImage->image) : asset('storage/upload/products/default-product.png');
    }
}
