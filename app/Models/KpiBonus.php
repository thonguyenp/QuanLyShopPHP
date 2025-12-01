<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KpiBonus extends Model
{
    //
    protected $fillable = ['user_id', 'year', 'total_score', 'bonus_amount'];
    public function user() { return $this->belongsTo(User::class); }

}
