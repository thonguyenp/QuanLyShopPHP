<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Manufacturer extends Model
{
    use HasFactory;

    protected $table = 'manufacturers';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'images',
    ];

    // Tự động tạo slug khi lưu
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($manufacturer) {
            if (empty($manufacturer->slug)) {
                $manufacturer->slug = Str::slug($manufacturer->name);
            }
        });
    }

    /**
     * Quan hệ 1-n với Product
     * Một manufacturer có thể có nhiều sản phẩm
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
