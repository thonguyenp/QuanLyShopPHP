<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KpiScore extends Model
{
    protected $fillable = [
        'user_id','criteria_id','rated_by','score','period','note'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function criteria() {
        return $this->belongsTo(KpiCriteria::class);
    }

    public function rater() {
        return $this->belongsTo(User::class, 'rated_by');
    }
}

