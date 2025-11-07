<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperWishlist
 */
class Wishlist extends Model
{
    //    
    protected $fillable = [
        'user_id',
        'product_id'
    ];
    
    public function product ()
    {
        return $this->belongsTo(Product::class);
    }

}
