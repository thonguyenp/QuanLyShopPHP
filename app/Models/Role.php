<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperRole
 */
class Role extends Model
{
    //
    protected $fillable = ['name'];

    public function permissions ()
    {
        return $this->belongsToMany(Permission::class, 'role_permissions');
    }
}
