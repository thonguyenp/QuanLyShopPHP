<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperCategory
 */
class Category extends Model
{
    //
    protected $fillable = [
        'name',
        'slug',
        'description',
        'images'
    ];

    public function product ()
    {
        return $this->hasMany(Product::class);
    }
}
