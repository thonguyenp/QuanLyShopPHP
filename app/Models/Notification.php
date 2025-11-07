<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperNotification
 */
class Notification extends Model
{
    //
    protected $fillable = [
        'user_id',
        'type',
        'message',
        'link',
        'is_read'
    ];
}
