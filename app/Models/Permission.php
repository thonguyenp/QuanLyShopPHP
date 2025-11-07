<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperPermission
 */
class Permission extends Model
{
    //
    protected $fillable = ['name'];

    public function permissions()
    {
        return $this->belongsToMany(Role::class, 'role_permissions');
    }
}
