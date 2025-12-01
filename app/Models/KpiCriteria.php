<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KpiCriteria extends Model
{
    //
    protected $table = 'kpi_criteria';

    protected $fillable = [
        'name',
        'max_score',
    ];

    // Một tiêu chí có nhiều bản ghi KPI
    public function scores()
    {
        return $this->hasMany(KpiScore::class, 'criteria_id');
    }

}
